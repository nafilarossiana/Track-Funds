<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
       $data = [
        [
            'nama_user' => 'airside',
             'nama_pass' => 'airsidesatu',
            'pass_user' => md5('airsidesatu'),
        ],
        [
            'nama_user' => 'landside', 
            'nama_pass' => 'landsidesatu',
            'pass_user' => md5('landsidesatu'),
        ], 
       
        ];
       $this->db->table('users')->insertBatch($data);
    }
}
