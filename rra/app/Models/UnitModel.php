<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $table = 'unit';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $primaryKey = 'id_unit';
    protected $allowedFields = ['nama_unit'];

}