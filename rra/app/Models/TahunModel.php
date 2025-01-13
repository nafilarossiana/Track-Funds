<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunModel extends Model
{
    protected $table = 'tahun';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = ['tahun'];

}