<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
    protected $table = 'status';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $primaryKey = 'id_status';
    protected $allowedFields = ['namastatus'];

}