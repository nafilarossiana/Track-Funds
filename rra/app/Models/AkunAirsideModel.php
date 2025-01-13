<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunAirsideModel extends Model
{
    protected $table = 'akunairside';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = ['id','nama_akun'];

}