<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_user';
    protected $primaryKey           = 'usr_id';
    protected $returnType           = 'array';
    protected $allowedFields        = ['usr_id','usr_name','usr_dvid','usr_mail','usr_phone','usr_telegram','usr_role','usr_password'];

    public function saveUser($data)
    {
        return $this->table($this->table)->insert($data);
    }

    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->table($this->table)
                ->get()
                ->getResultArray();
        } else {
            return $this->table($this->table)
                ->where('usr_id', $id)
                ->get()
                ->getRowArray();
        }
    }
}
