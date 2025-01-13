<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'   => [
                'type'  => 'BIGINT', 
                'constraint'    => 20, 
                'unsigned'  => true, 
                'auto_increment'    => true
            ],
            'nama_user' => [
                'type'  => 'VARCHAR', 
                'constraint'    => 50, 
            ], 
            'nama_pass' => [
                'type'  => 'VARCHAR', 
                'constraint'    => 50, 
            ],
            'pass_user' => [
                'type'  => 'VARCHAR', 
                'constraint'    => 50, 
            ],

        ]);
        $this->forge->addKey('id_user', true); 
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
