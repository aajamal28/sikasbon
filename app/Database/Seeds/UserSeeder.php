<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'usr_id' => '000000',
            'usr_name' => 'Administrator',
            'usr_dvid' => 'D01',
            'usr_mail' => 'jamaludin@sanohindonesia.co.id',
            'usr_phone' => '089654089650',
            'usr_telegram' => '',
            'usr_role'  => 'R00',
            'usr_password' => password_hash('P@ssw0rd',PASSWORD_DEFAULT)
        ];
        $this->db->table('tb_user')->insert($data);
    }
}
