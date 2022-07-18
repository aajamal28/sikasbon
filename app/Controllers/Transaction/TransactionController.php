<?php

namespace App\Controllers\Transaction;

use App\Controllers\BaseController;
use App\Models\RequestModel;

class TransactionController extends BaseController
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
        switch ($this->session->get('role')) {
            case 'R01':
                $status = '50';
                $div = $this->session->get('div');
                break;
            case 'R02':
                $status = '100';
                $div = $this->session->get('div');
                break;
            case 'R05':
                $status = '200';
                $div = '';
                break;
            case 'R06':
                $status = '300';
                $div = '';
                break;
            case 'R03':
                $status = '400';
                $div = '';
                break;
            default:
                $status = '';
                $div = '';
        }
        $data['uri'] = $this->request->uri->getSegments();
        $data['request'] = $this->reqModel->getRequest($status, $div);
        return view('transaction\overview', $data);
    }
}
