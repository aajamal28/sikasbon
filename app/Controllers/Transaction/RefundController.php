<?php

namespace App\Controllers\Transaction;

use App\Controllers\BaseController;
use App\Models\RequestModel;

class RefundController extends BaseController
{
    protected $reqModel;
    protected $session;

    function __construct()
    {
        $this->reqModel =  new RequestModel();
        $this->session = session();
    }

    public function index()
    {
        $data['uri'] = $this->request->uri->getSegments();
        $data['request'] = $this->reqModel->getRequest('550', $this->session->get('div'));
        return view('transaction/refund', $data);
    }

    public function create($id)
    {
        $data['uri'] = $this->request->uri->getSegments();
        $data['order'] = $this->reqModel->getRequestByID($id);
        return view('transaction/form_refund', $data);
    }

    public function post(){
        $post = $this->request->getPost();

        
    }
}
