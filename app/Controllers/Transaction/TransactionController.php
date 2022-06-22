<?php

namespace App\Controllers\Transaction;

use App\Controllers\BaseController;
use App\Models\RequestModel;

class TransactionController extends BaseController
{   
    protected $reqModel;
    
    function __construct()
    {
        $this->reqModel =  new RequestModel();
    }

    public function index()
    {
        $data['uri'] = $this->request->uri->getSegments();
        $data['request'] = $this->reqModel->getRequest();
        return view('transaction\overview',$data);
    }
}
