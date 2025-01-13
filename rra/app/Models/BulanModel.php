<?php

namespace App\Models;

use CodeIgniter\Model;

class BulanModel extends Model
{
    protected $table = 'bulan';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_bulan'];

}