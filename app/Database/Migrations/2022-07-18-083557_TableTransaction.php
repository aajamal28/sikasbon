<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableTransaction extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'trn_id'    => [
                'type' => 'CHAR',
                'constraint' => '16'
            ],
            'trn_date'    => [
                'type' => 'DATE',
            ],
            'trn_time' => [
                'type' => 'TIME',
            ],
            'trn_year' => [
                'type' => 'VARCHAR',
                'constraint' => '4'
            ],
            'trn_month' => [
                'type' => 'VARCHAR',
                'constraint' => '2'
            ],
            'trn_posted' => [
                'type'  => 'ENUM',
                'constraint' => ['0', '1'],
                'default'    => '0',
            ],
            'trn_account' => [
                'type' => 'CHAR',
                'constraint' => '10'
            ],
            'trn_desc' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'trn_type' => [
                'type'  => 'ENUM',
                'constraint' => ['D', 'C'],
            ],
            'trn_reff' => [
                'type' => 'VARCHAR',
                'constraint' => '35'
            ],
            'trn_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '19,2'
            ],
            'trn_saldo' => [
                'type' => 'DECIMAL',
                'constraint' => '19,2'
            ],
        ]);

        //define primary key
        $this->forge->addKey('trn_id', TRUE);

        //table generated
        $this->forge->createTable('tb_transaction');
    }

    public function down()
    {
        //
    }
}
