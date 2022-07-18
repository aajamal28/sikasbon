<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusMigration extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'st_code' => [
                'type' => 'CHAR',
                'constraint' => '4'
            ],
            'st_type' => [
                'type' => 'ENUM',
                'constraint' => '"RQ","RF"'
            ],
            'st_desc' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'st_desc2' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'st_active' => [
                'type' => 'ENUM',
                'constraint' => '"0","1"',
                'default' => '1'
            ]
        ]);

        $this->forge->addKey(['st_code','st_type'], TRUE);

		//table generated
		$this->forge->createTable('tb_status');
    }

    public function down()
    {
        $this->forge->dropTable('tb_status');
    }
}
