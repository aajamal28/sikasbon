<?php

namespace App\Models;

use CodeIgniter\Model;

class DivisiModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_divisi';
    protected $primaryKey           = 'dv_id';
    protected $returnType           = 'array';

    public function insertDivisi($data)
    {
        return $this->table($this->table)->insert($data);
    }

    public function getDivisi($id = false)
    {
        if ($id == false) {
            return $this->table($this->table)
                ->get()
                ->getResultArray();
        } else {
            return $this->table($this->table)
                ->where('dv_id', $id)
                ->get()
                ->getRowArray();
        }
    }
}
