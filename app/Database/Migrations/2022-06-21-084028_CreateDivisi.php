<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDivisi extends Migration
{
    public function up()
    {
        //create table divisi
        $this->forge->addField([
            'dv_id'    => [
                'type' => 'CHAR',
                'constraint' => '4'
            ],
            'dv_desc'   => [
                'type'  => 'VARCHAR',
                'constraint' => '35'
            ],
            'dv_status' => [
                'type'  => 'ENUM',
                'constraint' => ['0', '1'],
                'default'    => '1',
            ],
            'dv_date datetime default current_timestamp',
        ]);
        $this->forge->addKey('dv_id', TRUE);

		//table generated
		$this->forge->createTable('tb_divisi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_divisi');
    }
}