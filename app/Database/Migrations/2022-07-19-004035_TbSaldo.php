<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbSaldo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'sld_id'    => [
                'type' => 'CHAR',
                'constraint' => '4'
            ],
            'sld_date'    => [
                'type' => 'DATETIME',
            ],
            'sld_status' => [
                'type'  => 'ENUM',
                'constraint' => ['0', '1'],
            ],
            'sld_saldo' => [
                'type' => 'DECIMAL',
                'constraint' => '19,2'
            ],
        ]);

        //define primary key
        $this->forge->addKey('sld_id', TRUE);

        //table generated
        $this->forge->createTable('tb_saldo');
    }

    public function down()
    {
        $this->forge->dropTable('tb_saldo');
    }
}
