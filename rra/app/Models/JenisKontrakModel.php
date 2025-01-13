<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisKontrakModel extends Model
{
    protected $table = 'jeniskontrak';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $primaryKey = 'id_jeniskontrak';
    protected $allowedFields = ['jenis_kontrak'];

}