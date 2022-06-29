<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableApprove extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'apr_id'    => [
                'type' => 'CHAR',
                'constraint' => '16'
            ],
            'apr_order'    => [
                'type' => 'CHAR',
                'constraint' => '16'
            ],
            'apr_date' => [
                'type' => 'DATETIME'
            ],
            'apr_usrid'    => [
                'type' => 'CHAR',
                'constraint' => '6'
            ],
            'apr_token'    => [
                'type' => 'TEXT'
            ],
            'apr_stfrom'    => [
                'type' => 'CHAR',
                'constraint' => '5'
            ],
            'apr_stto'    => [
                'type' => 'CHAR',
                'constraint' => '5'
            ],
            'apr_note'    => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
        ]);

        //define primary key
		$this->forge->addKey('apr_id', TRUE);

		//table generated
		$this->forge->createTable('tb_approve');
    }

    public function down()
    {
        //
        $this->forge->dropTable('tb_approve');
    }
}
