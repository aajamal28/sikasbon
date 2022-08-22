<?php

namespace App\Models;

use CodeIgniter\Model;

class SaldoModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_saldo';
    protected $primaryKey           = 'sld_id';
    protected $returnType           = 'array';
    protected $allowedFields        = ['sld_id', 'sld_date', 'sld_status', 'sld_saldo'];

    public function saveSaldo($data)
    {
        return $this->table($this->table)->insert($data);
    }

    public function getSaldo($type = false)
    {
        if ($type == false) {
            return $this->table($this->table)
                ->where('sld_status', '1')
                ->get()
                ->getResultArray();
        } else {
            return $this->table($this->table)
                ->where('sld_status', '1')
                ->where('sld_type', $type)
                ->get()
                ->getRowArray();
        }
    }

    public function updateSaldo($data, $id)
    {
        return $this->db->table($this->table)->update($data, array($this->primaryKey => $id));
    }
}
