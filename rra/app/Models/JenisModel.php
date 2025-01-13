<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model
{
    protected $table = 'jenis';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $primaryKey = 'id_jenis';
    protected $allowedFields = ['namajenis'];

}