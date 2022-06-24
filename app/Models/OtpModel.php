<?php

namespace App\Models;

use CodeIgniter\Model;

class OtpModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_otp';
    protected $primaryKey           = 'otp_id';
    protected $returnType           = 'array';
    protected $allowedFields        = ['otp_id','otp_order','otp_token','otp_usrid','otp_status','otp_date'];

    public function saveOtp($data)
    {
        return $this->table($this->table)->insert($data);
    }

    public function getOtp($order,$otp,$user)
    {
        return $this->table($this->table)
                ->where('otp_order', $order)
                ->where('otp_token', $$otp)
                ->where('otp_usidr', $user)
                ->get()
                ->getRowArray();
    }
}
