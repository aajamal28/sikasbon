<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_transaction';
    protected $primaryKey           = 'trn_id';
    protected $returnType           = 'array';
    protected $allowedFields        = ['trn_id', 'trn_date', 'trn_time', 'trn_year', 'trn_month', 'trn_posted', 'trn_account', 'trn_desc', 'trn_type', 'trn_reff', 'trn_amount', 'trn_saldo'];

    public function saveTrans($data)
    {
        return $this->table($this->table)->insert($data);
    }

    public function getTrans($id = false)
    {
        if ($id == false) {
            return $this->table($this->table)
                ->get()
                ->getResultArray();
        } else {
            return $this->table($this->table)
                ->where('trn_id', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function getTransByPeriod($year, $month)
    {
        return $this->table($this->table)
                ->join('tb_coa', 'coa_id = trn_account', 'left')
                ->where('trn_year', $year)
                ->where('trn_month', $month)
                ->get()
                ->getResultArray();
    }
}
