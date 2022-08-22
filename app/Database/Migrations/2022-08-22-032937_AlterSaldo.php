<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterSaldo extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tb_saldo',['sld_type VARCHAR(3)']);
    }

    public function down()
    {
        $this->forge->dropColumn('tb_saldo','sld_type');
    }
}
