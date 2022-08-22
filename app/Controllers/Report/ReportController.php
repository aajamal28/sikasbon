<?php

namespace App\Controllers\Report;

use App\Controllers\BaseController;
use App\Models\SaldoModel;
use App\Models\TransactionModel;

class ReportController extends BaseController
{
    protected $sldModel;
    protected $trnModel;

    function __construct()
    {
        $this->sldModel =  new SaldoModel();
        $this->trnModel = new TransactionModel();
    }

    public function index()
    {
        //
    }

    public function showSaldo()
    {
        $data['uri'] = $this->request->uri->getSegments();
        $data['saldoCash'] = $this->sldModel->getSaldo('CSH');
        $data['saldoAdvance'] = $this->sldModel->getSaldo('ADV');
        $data['trans'] = $this->trnModel->getTransByPeriod(date('Y'), date('m'));
        return view('report/cash', $data);
    }
}
