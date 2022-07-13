<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableUser extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'usr_id'    => [
                'type' => 'CHAR',
                'constraint' => '6'
            ],
            'usr_name'    => [
                'type' => 'VARCHAR',
                'constraint' => '35'
            ],
            'usr_dvid'    => [
                'type' => 'CHAR',
                'constraint' => '4'
            ],
            'usr_mail'    => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'usr_phone'    => [
                'type' => 'VARCHAR',
                'constraint' => '15'
            ],
            'usr_telegram'    => [
                'type' => 'VARCHAR',
                'constraint' => '15'
            ],
            'usr_role'    => [
                'type' => 'CHAR',
                'constraint' => '3'
            ],
            'usr_password'    => [
                'type' => 'TEXT',
            ],
        ]);

        //define primary key
		$this->forge->addKey('usr_id', TRUE);

		//table generated
		$this->forge->createTable('tb_user');
    }

    public function down()
    {
        $this->forge->dropTable('tb_user');
    }
}
