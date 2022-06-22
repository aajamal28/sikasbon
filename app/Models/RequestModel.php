<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_request';
    protected $primaryKey           = 'rq_id';
    protected $returnType           = 'array';
    protected $allowedFields        = ['rq_id', 'rq_no', 'rq_date', 'rq_month', 'rq_year', 'rq_type', 'rq_amount', 'rq_desc', 'rq_status', 'rq_usrid', 'rq_dvid'];

    public function getNomorRequest()
    {
        $sql = $this->db->query("select max(rq_no) as maxNo, rq_year from " . $this->table . ";");
        $no =  $sql->getRowArray();
        //[no_trans] => P20211200002

        if ($no['maxNo'] == null) {
            $no = sprintf("%04s", '1');
            $rqno = $no;
        } else {
            if ($no['rq_year'] == date('Y')) {
                $newno = $no['maxNo'] + 1;
                $rqno = sprintf("%04s", $newno);
            } else {
                $rqno = sprintf("%04s", '1');
            }
        }
        $trno = $rqno;
        return $trno;
    }

    public function postRequest($data)
    {
        return $this->table($this->table)->insert($data);
    }

    public function getRequest($status = false, $dept = false)
    {
        if ($status == false and $dept == false) {
            return $this->table($this->table)
                ->join('tb_status', 'rq_status = st_code')
                ->join('tb_divisi', 'rq_dvid = dv_id')
                ->get()
                ->getResultArray();
        } elseif ($status == false and $dept != false) {
            return $this->table($this->table)
                ->join('tb_status', 'rq_status = st_code')
                ->join('tb_divisi', 'rq_dvid = dv_id')
                ->where('rq_dvid', $dept)
                ->get()
                ->getResultArray();
        } elseif ($status != false and $dept == false) {
            return $this->table($this->table)
                ->join('tb_status', 'rq_status = st_code')
                ->join('tb_divisi', 'rq_dvid = dv_id')
                ->where('rq_status', $status)
                ->get()
                ->getResultArray();
        } else {
            return $this->table($this->table)
                ->join('tb_status', 'rq_status = st_code')
                ->join('tb_divisi', 'rq_dvid = dv_id')
                ->where('rq_status', $status)
                ->where('rq_dvid', $dept)
                ->get()
                ->getResultArray();
        }
    }

    public function getRequestByID($id)
    {
        return $this->table($this->table)
            ->join('tb_status', 'rq_status = st_code')
            ->where('rq_id', $id)
            ->get()
            ->getRowArray();
    }
}
