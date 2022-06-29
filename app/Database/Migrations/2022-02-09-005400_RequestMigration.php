<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RequestMigration extends Migration
{
    public function up()
    {
        //generating field for table request
        $this->forge->addField([
            'rq_id'    => [
                'type' => 'CHAR',
                'constraint' => '16'
            ],
            'rq_no'    => [
                'type' => 'CHAR',
                'constraint' => '4'
            ],
            'rq_date' => [
                'type' => 'DATETIME'
            ],
            'rq_month' => [
                'type' => 'CHAR',
                'constraint' => '2'
            ],
            'rq_year' => [
                'type' => 'CHAR',
                'constraint' => '4'
            ],
            'rq_type' => [
                'type' => 'ENUM',
                'constraint' => "'100','200','300','400'"
            ],
            'rq_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '19,2'
            ],
            'rq_refund' => [
                'type' => 'DECIMAL',
                'constraint' => '19,2'
            ],
            'rq_desc' => [
                'type' => 'TEXT'
            ],
            'rq_status' => [
                'type' => 'CHAR',
                'constraint' => '5'
            ],
            'rq_usrid' => [
                'type' => 'CHAR',
                'constraint' => '8'
            ],
            'rq_dvid' =>[
                'type' => 'CHAR',
                'constraint' => '4'
            ]
        ]);

        //define primary key
		$this->forge->addKey('rq_id', TRUE);

		//table generated
		$this->forge->createTable('tb_request');
    }

    public function down()
    {
        //rollback mode, delete table
		$this->forge->dropTable('tb_request'); 
    }
}
