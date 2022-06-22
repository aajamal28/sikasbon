<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DivisiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'dv_id' => 'D01',
                'dv_desc' => 'Accounting'
            ],
            [
                'dv_id' => 'D02',
                'dv_desc' => 'Marketing'
            ],
            [
                'dv_id' => 'D03',
                'dv_desc' => 'Purchasing'
            ],
            [
                'dv_id' => 'D04',
                'dv_desc' => 'PPC'
            ],
            [
                'dv_id' => 'D05',
                'dv_desc' => 'Logistic'
            ],
            [
                'dv_id' => 'D06',
                'dv_desc' => 'Prod. Chassis'
            ],
            [
                'dv_id' => 'D07',
                'dv_desc' => 'Prod. Nylon'
            ],
            [
                'dv_id' => 'D08',
                'dv_desc' => 'Prod. Brazing'
            ],
            [
                'dv_id' => 'D09',
                'dv_desc' => 'Eng & QC'
            ],
            [
                'dv_id' => 'D10',
                'dv_desc' => 'HR & GA'
            ]
        ];
        $this->db->table('tb_divisi')->insertBatch($data);
    }
}
