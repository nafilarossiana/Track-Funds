<?php

namespace App\Models;

use CodeIgniter\Model;

class BebanModel extends Model
{
    protected $table = 'beban';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $primaryKey = 'id_beban';
    protected $allowedFields = ['nama_beban'];

}