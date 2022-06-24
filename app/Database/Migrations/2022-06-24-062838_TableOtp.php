<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableOtp extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'otp_id'    => [
                'type' => 'CHAR',
                'constraint' => '30'
            ],
            'otp_order'   => [
                'type'  => 'CHAR',
                'constraint' => '15'
            ],
            'otp_token'   => [
                'type'  => 'CHAR',
                'constraint' => '6'
            ],
            'otp_usrid'   => [
                'type'  => 'CHAR',
                'constraint' => '6'
            ],
            'otp_status' => [
                'type'  => 'ENUM',
                'constraint' => ['0', '1'],
                'default'    => '1',
            ],
            'otp_date datetime default current_timestamp',
        ]);
        $this->forge->addKey('otp_id', TRUE);

		//table generated
		$this->forge->createTable('tb_otp');
    }

    public function down()
    {
        //
        $this->forge->dropTable('tb_otp');
    }
}
