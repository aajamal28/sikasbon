<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_status';
    protected $primaryKey           = 'st_id';
    protected $returnType           = 'array';
    protected $allowedFields        = [];

    public function postStatus($data)
    {
        return $this->table($this->table)->insert($data);
    }
}
