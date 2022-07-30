<?php

namespace App\Models;

use CodeIgniter\Model;

class ApprovalModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_approve';
    protected $primaryKey           = 'apr_id';
    protected $returnType           = 'array';
    protected $allowedFields        = ['apr_id','apr_order','apr_date','apr_usrid','apr_token','apr_stfrom','apr_stto','apr_note'];

    public function saveApprove($data)
    {
        return $this->table($this->table)->insert($data);
    }

    public function getApprove($order)
    {
        return $this->table($this->table)
                ->join('tb_user', 'apr_usrid = usr_id')
                ->where('apr_order', $order)
                ->get()
                ->getResultArray();
    }
}
