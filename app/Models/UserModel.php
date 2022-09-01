<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_user';
    protected $primaryKey           = 'usr_id';
    protected $returnType           = 'array';
    protected $allowedFields        = ['usr_id', 'usr_name', 'usr_dvid', 'usr_mail', 'usr_phone', 'usr_telegram', 'usr_role', 'usr_password'];

    public function saveUser($data)
    {
        return $this->table($this->table)->insert($data);
    }

    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->table($this->table)
                ->join('tb_divisi', 'dv_id = usr_dvid')
                ->get()
                ->getResultArray();
        } else {
            return $this->table($this->table)
                ->join('tb_divisi', 'dv_id = usr_dvid')
                ->where('usr_id', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function getUserbyRole($role,$dept = false){
        if ($dept == false){
            return $this->table($this->table)
                ->where('usr_role', $role)
                ->get()
                ->getRowArray();
        }else{
            return $this->table($this->table)
                ->where('usr_role', $role)
                ->where('usr_dvid', $dept)
                ->get()
                ->getRowArray();
        }
        
    }
}
