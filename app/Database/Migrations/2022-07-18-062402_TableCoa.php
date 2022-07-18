<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableCoa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'coa_id'    => [
                'type' => 'CHAR',
                'constraint' => '10'
            ],
            'coa_desc'    => [
                'type' => 'VARCHAR',
                'constraint' => '45'
            ],
            'coa_max'    => [
                'type' => 'DECIMAL',
                'constraint' => '19,2'
            ],
            'coa_status'    => [
                'type'  => 'ENUM',
                'constraint' => ['0', '1'],
                'default'    => '1',
            ],
            'coa_date'    => [
                'type' => 'DATETIME',
            ],
        ]);

        //define primary key
		$this->forge->addKey('coa_id', TRUE);

		//table generated
		$this->forge->createTable('tb_coa');
    }

    public function down()
    {
        $this->forge->dropTable('tb_coa');
    }
}
