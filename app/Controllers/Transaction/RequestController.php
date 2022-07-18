<?php

namespace App\Controllers\Transaction;

use App\Controllers\BaseController;
use App\Models\ApprovalModel;
use App\Models\OtpModel;
use App\Models\RequestModel;

class RequestController extends BaseController
{
    protected $reqModel;
    protected $otpModel;
    protected $aprModel;
    protected $session;
    //protected $uri =  $this->request->uri->getSegments();

    function __construct()
    {
        $this->reqModel = new RequestModel();
        $this->otpModel = new OtpModel();
        $this->aprModel = new ApprovalModel();
        $this->session = session();
    }

    public function index()
    {
        $data['uri'] = $this->request->uri->getSegments();
        //$data['noRequest'] = $this->reqModel->getNomorRequest();
        $data['user'] = $this->session->get('usrid');
        $data['dvid'] = $this->session->get('div');
        $data['tr_type'] = [
            [
                "code" => "100",
                "name" => "Entertaint"
            ],
            [
                "code" => "200",
                "name" => "Non Entertaint"
            ],
            [
                "code" => "300",
                "name" => "Transport Cash"
            ],
            [
                "code" => "400",
                "name" => "Transport E-Toll"
            ],
        ];
        return view('transaction\request', $data);
    }

    public function post()
    {
        $post = $this->request->getPost();
        $noReq = $this->reqModel->getNomorRequest();
        $month = date('m');
        $year = date('Y');
        $rqno = $noReq . "/" . $month . "/" . $year;
        $dataRequest = [
            "rq_id" => uniqid(),
            "rq_no" => $rqno,
            "rq_date" => $post['trDate'],
            "rq_month" => $month,
            "rq_year" => $year,
            "rq_type" => $post['trType'],
            "rq_amount" => $post['trCredit'],
            "rq_desc" => $post['trDesc'],
            "rq_usrid" => $post['trUser'],
            "rq_dvid" => $post['trDept'],
            "rq_status" => '50'
        ];
        //print_r($dataRequest);
        $message = "Ada Permintaan kasbon baru dengan nomor '$rqno' sebesar Rp. " . number_format($post['trCredit']) . " untuk " . $post['trDesc'];
        $this->reqModel->postRequest($dataRequest);
        $this->sendMessageTg('453164060', $message);
        session()->setFlashdata("success", "Request anda berhasil disimpan dengan Nomor " . $rqno);
        return redirect()->to(site_url('/transaction/overview'));
    }

    public function detail($id)
    {
        $data['request'] = $this->reqModel->getRequestByID($id);
        return view('transaction/detail', $data);
    }

    public function approve($id, $mode)
    {
        $data['uri'] = $this->request->uri->getSegments();
        $data['order'] = $id;
        $data['mode'] = $mode;

        if ($mode == 'cancel' || $mode == 'reject') {
            return view('transaction\reject', $data);
        } elseif ($mode == 'confirm') {
            $req = $this->reqModel->getRequestByID($id);
            $status = $req['rq_status'] + 50;
            $setConfirm = [
                'rq_status' => $status
            ];
            $dataApprove = [
                'apr_id' => uniqid('apr', false),
                'apr_order' => $id,
                'apr_date' => date('Y-m-d H:i:s'),
                'apr_usrid' => session()->get('usrid'),
                'apr_token' => uniqid(),
                'apr_stfrom' => $req['rq_status'],
                'apr_stto' => $status,
                'apr_note' => ''
            ];
            $this->reqModel->updateRequest($setConfirm, $id);
            $this->aprModel->saveApprove($dataApprove);
            session()->setFlashdata("success", "Konfirmasi berhasil, menunggu Approval Manager");
            return redirect()->to(site_url('/transaction/overview'));
        } else {
            $otp = $this->generateOtp();
            $dataOtp = [
                'otp_id' => uniqid(),
                'otp_order' => $id,
                'otp_token' => $otp,
                'otp_date' => date('Y-m-d H:i:s'),
                'otp_status' => '1'
            ];
            $this->otpModel->saveOtp($dataOtp);
            $message = "Nih coy OTP nya " . $otp . ". Rahasia kita aja yaaa!";
            $this->sendMessageTg('453164060', $message);
            $data['otp'] = $otp;
            return view('transaction\approve', $data);
        }
    }

    public function process_approval()
    {
        $post = $this->request->getPost();
        $req = $this->reqModel->getRequestByID($post['aprOrder']);
        if ($post['mode'] == 'approve') {
            $status = $req['rq_status'] + 100;
            $token = $this->generateToken($post['aprOtp']);
            $note = "Transaksi disetujui oleh " . session()->get('usrid');
            $msg = "Proses berhasil, Menunggu Persertujuan berikutnya.";
        } elseif($post['mode'] == 'cancel') {
            $status = $req['rq_status'] + 30;
            $token = uniqid();
            $note = "Transaksi dibatalkan. ( " . $post['aprNote'] . " )";
            $msg = "Proses berhasil, transaksi dibatalkan";
        }else{
            $status = $req['rq_status'] + 50;
            $token = uniqid();
            $note = "Transaksi ditolak. ( " . $post['aprNote'] . " )";
            $msg = "Proses berhasil, transaksi dibatalkan";
        }
        $setApprove = [
            'rq_status' => $status
        ];
        $dataApprove = [
            'apr_id' => uniqid('apr', false),
            'apr_order' => $post['aprOrder'],
            'apr_date' => date('Y-m-d H:i:s'),
            'apr_usrid' => session()->get('usrid'),
            'apr_token' => $token,
            'apr_stfrom' => $req['rq_status'],
            'apr_stto' => $status,
            'apr_note' => $note
        ];
        $this->reqModel->updateRequest($setApprove, $post['aprOrder']);
        $this->aprModel->saveApprove($dataApprove);
        session()->setFlashdata("success", $msg);
        return redirect()->to(site_url('/transaction/overview'));
    }

    public function paid($id)
    {
        
    }
}
