<?php

namespace App\Models;

use CodeIgniter\Model;

class CoaModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_coa';
    protected $primaryKey           = 'coa_id';
    protected $returnType           = 'array';
    protected $allowedFields        = ['coa_id', 'coa_desc', 'coa_max', 'coa_status', 'coa_date'];

    public function saveAccount($data)
    {
        return $this->table($this->table)->insert($data);
    }

    public function getAccount($id = false)
    {
        if ($id == false) {
            return $this->table($this->table)
                ->get()
                ->getResultArray();
        } else {
            return $this->table($this->table)
                ->where('coa_id', $id)
                ->get()
                ->getRowArray();
        }
    }
}
