<?php

namespace App\Controllers\Transaction;

use App\Controllers\BaseController;
use App\Models\ApprovalModel;
use App\Models\OtpModel;
use App\Models\RequestModel;
use App\Models\SaldoModel;
use App\Models\TransactionModel;
use App\Models\UserModel;
use CodeIgniter\Session\Session;

class RequestController extends BaseController
{
    protected $reqModel;
    protected $otpModel;
    protected $aprModel;
    protected $session;
    protected $sldModel;
    protected $trnModel;
    protected $usrModel;
    //protected $uri =  $this->request->uri->getSegments();

    function __construct()
    {
        $this->reqModel = new RequestModel();
        $this->otpModel = new OtpModel();
        $this->aprModel = new ApprovalModel();
        $this->session = session();
        $this->sldModel = new SaldoModel();
        $this->trnModel = new TransactionModel();
        $this->usrModel = new UserModel();
    }

    public function index()
    {
        $data['uri'] = $this->request->uri->getSegments();
        //$data['noRequest'] = $this->reqModel->getNomorRequest();
        $data['user'] = $this->session->get('usrid');
        $data['dvid'] = $this->session->get('div');
        // $data['tr_type'] = [
        //     [
        //         "code" => "100",
        //         "name" => "Entertaint"
        //     ],
        //     [
        //         "code" => "200",
        //         "name" => "Non Entertaint"
        //     ],
        //     [
        //         "code" => "300",
        //         "name" => "Transport Cash"
        //     ],
        //     [
        //         "code" => "400",
        //         "name" => "Transport E-Toll"
        //     ],
        // ];
        $data['tr_type'] = [
            [
                "code" => "100",
                "name" => "Entertaint"
            ],
        ];
        return view('transaction/request', $data);
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
        //$message = "Ada Permintaan kasbon baru dengan nomor '$rqno' sebesar Rp. " . number_format($post['trCredit']) . " untuk " . $post['trDesc'];
        $this->reqModel->postRequest($dataRequest);
        //$this->sendMessageTg('5494097289', $message);
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
            $user = $this->usrModel->getUserbyRole('R02', session()->get('div'));
            $msg = "Hi Mr./Mrs. " . $user['usr_name'] . ", ada 1 transaksi menunggu persetujuan anda. Silakan cek aplikasi siKasBon. [https://apps.komporsumeng.my.id/public/]";
            $this->sendMessageTg($user['usr_telegram'], $msg);
            session()->setFlashdata("success", "Konfirmasi berhasil, menunggu Approval Manager");
            return redirect()->to(site_url('/transaction/overview'));
        } else {
            $otp = $this->generateOtp();
            $dataOtp = [
                'otp_id' => uniqid(),
                'otp_order' => $id,
                'otp_token' => $otp,
                'otp_usrid' => Session()->get('usrid'),
                'otp_date' => date('Y-m-d H:i:s'),
                'otp_status' => '1'
            ];
            $this->otpModel->saveOtp($dataOtp);
            $message = "Berikut OTP untuk approval anda " . $otp . ". Tolong jangan beritahu siapapun!";
            $user = $this->usrModel->getUser(session()->get('usrid'));
            $this->sendMessageTg($user['usr_telegram'], $message);
            $data['otp'] = $otp;
            return view('transaction\approve', $data);
        }
    }

    public function process_approval()
    {
        $post = $this->request->getPost();
        $req = $this->reqModel->getRequestByID($post['aprOrder']);
        $curRole = session()->get('role');
        switch ($curRole) {
            case "R02":
                $nextRole = "R05";
                $userApr = $this->usrModel->getUserbyRole($nextRole, '');
                break;
            case "R05":
                $nextRole = "R06";
                $userApr = $this->usrModel->getUserbyRole($nextRole, '');
                break;
            default:
                $nextRole = "R03";
                $userApr = $this->usrModel->getUserbyRole($nextRole, '');
        }
        if ($post['mode'] == 'approve') {
            $status = $req['rq_status'] + 100;
            $token = $this->generateToken($post['aprOtp']);
            $note = "Request Kasbon Anda sudah disetujui oleh Mr./Mrs. " . session()->get('name');
            $msg = "Proses berhasil, Menunggu Persertujuan berikutnya.";
        } elseif ($post['mode'] == 'cancel') {
            $status = $req['rq_status'] + 30;
            $token = uniqid();
            $note = "Transaksi dibatalkan. ( " . $post['aprNote'] . " )";
            $msg = "Proses berhasil, transaksi dibatalkan";
        } else {
            $status = $req['rq_status'] + 50;
            $token = uniqid();
            $note = "Transaksi ditolak. ( " . $post['aprNote'] . " )";
            $msg = "Proses berhasil, transaksi dibatalkan";
            //$user = $this->usrModel->getUser(session()->get('usrid'));
            //$this->sendMessageTg($user['usr_telegram'],$note);
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

        //pesan ke approval berikutnya
        if(session()->get('usrid') == "R06"){
            $msg = "Ada 1 Kasbon senilai Rp. " . number_format($req['rq_amount']) . " yang sudah disetujui dan menunggu pencairan!. Silakan cek aplikasi siKasBon [https://apps.komporsumeng.my.id/public/] .";
        }else{
            $msg = "Ada 1 Kasbon senilai Rp. " . number_format($req['rq_amount']) . " menunggu persetujuan anda!. Silakan cek aplikasi siKasBon [https://apps.komporsumeng.my.id/public/]";
        }
        //$msg = "Ada 1 Kasbon senilai Rp. " . number_format($req['rq_amount']) . " menunggu persetujuan anda!.";
        $this->sendMessageTg($userApr['usr_telegram'], $msg);

        //pesan ke requester
        $userReq = $this->usrModel->getUser($req['rq_usrid']);
        $this->sendMessageTg($userReq['usr_telegram'], $note);



        session()->setFlashdata("success", "Approval berhasil. Terima kasih");
        return redirect()->to(site_url('/transaction/overview'));
    }

    public function paid($id)
    {
        $otp = $this->generateOtp();
        $dataOtp = [
            'otp_id' => uniqid(),
            'otp_order' => $id,
            'otp_token' => $otp,
            'otp_usrid' => Session()->get('usrid'),
            'otp_date' => date('Y-m-d H:i:s'),
            'otp_status' => '1'
        ];
        $this->otpModel->saveOtp($dataOtp);
        $message = "Berikut OTP untuk pembayaran anda " . $otp . ". Tolong jangan beritahu siapapun!";
        $user  = $this->usrModel->getUser(session()->get('usrid'));
        $this->sendMessageTg($user['usr_telegram'], $message);
        $data['otp'] = $otp;
        $data['uri'] = $this->request->uri->getSegments();
        $data['order'] = $this->reqModel->getRequestByID($id);
        $data['approval'] = $this->aprModel->getApprove($id);
        return view('transaction/paid', $data);
    }

    public function process_paid()
    {
        $post = $this->request->getPost();
        $saldoCash = $this->sldModel->getSaldo('CSH');
        $newSaldoCash = $saldoCash['sld_saldo'] - $post['trAmount'];
        $saldoAdvance = $this->sldModel->getSaldo('ADV');
        $newSaldoAdvance = $saldoAdvance['sld_saldo'] + $post['trAmount'];
        $dataTrans = [
            "trn_id" => uniqid(),
            "trn_date" => date('Y-m-d'),
            "trn_time" => date('H:i:s'),
            "trn_year" => date('Y'),
            "trn_month" => date('m'),
            "trn_posted" => '0',
            "trn_desc" => $post['trOrderDesc'],
            "trn_type" => 'C',
            "trn_reff" => $post['trOrder'],
            "trn_amount" => $post['trAmount'],
            "trn_saldo" => $newSaldoCash
        ];
        $this->trnModel->saveTrans($dataTrans);
        $dataSaldoCash = [
            "sld_saldo" => $newSaldoCash
        ];
        $dataSaldoAdvance = [
            "sld_saldo" => $newSaldoAdvance
        ];
        $this->sldModel->updateSaldo($dataSaldoCash, $saldoCash['sld_id']);
        $this->sldModel->updateSaldo($dataSaldoAdvance, $saldoAdvance['sld_id']);
        $setApprove = [
            'rq_status' => '550'
        ];
        $dataApprove = [
            'apr_id' => uniqid('apr', false),
            'apr_order' => $post['trOrderId'],
            'apr_date' => date('Y-m-d H:i:s'),
            'apr_usrid' => session()->get('usrid'),
            'apr_token' => $post['trOtp'],
            'apr_stfrom' => '500',
            'apr_stto' => '600',
            'apr_note' => "Pembayaran sudah dilakukan oleh Kasir [ " . session()->get('name') . " ]"
        ];
        $this->reqModel->updateRequest($setApprove, $post['trOrderId']);
        $this->aprModel->saveApprove($dataApprove);
        session()->setFlashdata("success", "Pembayaran berhasil dilakukan");
        return redirect()->to(site_url('/transaction/overview'));
    }

    public function print($id)
    {
        $data['request'] = $this->reqModel->getRequestByID($id);
        return view('transaction/nota', $data);
    }
}
