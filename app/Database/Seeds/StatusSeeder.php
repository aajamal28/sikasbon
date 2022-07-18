<?php

namespace App\Database\Seeds;

use App\Models\StatusModel;
use CodeIgniter\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'st_code' => '50',
                'st_desc' => 'Created',
                'st_desc2' => '',
                'st_type' => 'RQ'
            ],
            [
                'st_code' => '80',
                'st_desc' => 'Cancel',
                'st_desc2' => '',
                'st_type' => 'RQ'
            ],
            [
                'st_code' => '100',
                'st_desc' => 'Confirmed',
                'st_desc2' => 'Waiting Manager Approve',
                'st_type' => 'RQ'
            ],
            [
                'st_code' => '150',
                'st_desc' => 'Rejected by Manager',
                'st_desc2' => '',
                'st_type' => 'RQ'
            ],
            [
                'st_code' => '200',
                'st_desc' => 'Approved by Manager',
                'st_desc2' => 'Waiting Acc. Mgr',
                'st_type' => 'RQ'
            ],
            [
                'st_code' => '250',
                'st_desc' => 'Rejected by Acc. Mgr',
                'st_desc2' => '',
                'st_type' => 'RQ'
            ],
            [
                'st_code' => '300',
                'st_desc' => 'Approved by Acc. Mgr',
                'st_desc2' => 'Waiting Director',
                'st_type' => 'RQ'
            ],
            [
                'st_code' => '350',
                'st_desc' => 'Rejected by Director',
                'st_desc2' => '',
                'st_type' => 'RQ'
            ],
            [
                'st_code' => '400',
                'st_desc' => 'Approved by Director',
                'st_desc2' => '',
                'st_type' => 'RQ'
            ],
            [
                'st_code' => '500',
                'st_desc' => 'Fund paid',
                'st_desc2' => 'Wait user Confirm',
                'st_type' => 'RQ'
            ],
            [
                'st_code' => '550',
                'st_desc' => 'Fund Receipt',
                'st_desc2' => 'On Going',
                'st_type' => 'RQ'
            ],
            [
                'st_code' => '600',
                'st_desc' => 'Finish',
                'st_desc2' => '',
                'st_type' => 'RQ'
            ],
            [
                'st_code' => '50',
                'st_desc' => 'Created',
                'st_desc2' => '',
                'st_type' => 'RF'
            ],
            [
                'st_code' => '80',
                'st_desc' => 'Cancel',
                'st_desc2' => '',
                'st_type' => 'RF'
            ],
            [
                'st_code' => '100',
                'st_desc' => 'Confirmed',
                'st_desc2' => 'Waiting Manager Approve',
                'st_type' => 'RF'
            ],
            [
                'st_code' => '150',
                'st_desc' => 'Rejected by Manager',
                'st_desc2' => '',
                'st_type' => 'RF'
            ],
            [
                'st_code' => '200',
                'st_desc' => 'Approved by Manager',
                'st_desc2' => 'Waiting Acc. Leader',
                'st_type' => 'RF'
            ],
            [
                'st_code' => '250',
                'st_desc' => 'Rejected by Acc. Leader',
                'st_desc2' => '',
                'st_type' => 'RF'
            ],
            [
                'st_code' => '300',
                'st_desc' => 'Approved by Acc. Leader',
                'st_desc2' => 'Waiting Acc. Manager',
                'st_type' => 'RF'
            ],
            [
                'st_code' => '350',
                'st_desc' => 'Rejected by Acc. Mgr',
                'st_desc2' => '',
                'st_type' => 'RF'
            ],
            [
                'st_code' => '400',
                'st_desc' => 'Approved by Acc. Mgr',
                'st_desc2' => 'Waiting Director',
                'st_type' => 'RF'
            ],
            [
                'st_code' => '450',
                'st_desc' => 'Rejected by Director',
                'st_desc2' => '',
                'st_type' => 'RF'
            ],
            [
                'st_code' => '500',
                'st_desc' => 'Approved by Director',
                'st_desc2' => '',
                'st_type' => 'RF'
            ],
            [
                'st_code' => '600',
                'st_desc' => 'Fund paid',
                'st_desc2' => '',
                'st_type' => 'RF'
            ],
            [
                'st_code' => '650',
                'st_desc' => 'Fund Receipt',
                'st_desc2' => 'On Going',
                'st_type' => 'RF'
            ],
            [
                'st_code' => '700',
                'st_desc' => 'Finish',
                'st_desc2' => '',
                'st_type' => 'RF'
            ],
        ];
        $this->db->table('tb_status')->insertBatch($data);
    }
}
