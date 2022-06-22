<?php

namespace App\Controllers\Transaction;

use App\Controllers\BaseController;
use App\Models\RequestModel;

class RequestController extends BaseController
{
    protected $reqModel;

    function __construct()
    {
        $this->reqModel = new RequestModel();
    }

    public function index()
    {
        $data['uri'] = $this->request->uri->getSegments();
        //$data['noRequest'] = $this->reqModel->getNomorRequest();
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
        $message = "Ada Permintaan kasbon baru dengan nomor '$rqno' sebesar Rp. ".number_format($post['trCredit'])." untuk ".$post['trDesc'];
        $this->reqModel->postRequest($dataRequest);
        $this->sendMessageTg('453164060',$message);
        session()->setFlashdata("success", "Request anda berhasil disimpan dengan Nomor ". $rqno);
		return redirect()->to(site_url('/transaction/overview'));
    }

    public function detail($id)
    {
        $data['request'] = $this->reqModel->getRequest($id);
        return view('transaction/detail',$data);
    }
}
