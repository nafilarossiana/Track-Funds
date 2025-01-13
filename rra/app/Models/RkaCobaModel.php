<?php

namespace App\Models;

use CodeIgniter\Model;

class RkaCobaModel extends Model
{
    protected $table = 'rkacoba';
    protected $primaryKey = 'id_rka';  // Sesuaikan dengan primary key yang sesuai
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = ['tahun', 'unit', 'kode', 'ma', 'gl_account', 'keterangan', 'detail_program', 'qty', 'uom', 'nilaisatuan',
                                'angka', 'jumlah', 'januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];

    
    public function getUniqueYears()
{
    $result = $this->select('tahun')->distinct()->groupBy('tahun')->findAll();

    $uniqueYears = [];
    foreach ($result as $row) {
        $uniqueYears[] = $row['tahun'];
    }

    return $uniqueYears;
}
public function getUniqueAccount()
{
    $result = $this->distinct()->select('gl_account')->findAll();


    $uniqueAccount = [];
    foreach ($result as $row) {
        $uniqueAccount[] = $row['gl_account'];
    }

    return $uniqueAccount;
}
    public function getDataByYearAndGLAccount($tahun, $gl_account)
    {
        return $this->where('tahun', $tahun)
                    ->where('gl_account', $gl_account)
                    ->findAll();
    }
    public function getDataByGLAccount($gl_account){
        return $this->where('gl_account', $gl_account)
        ->findAll();
    }
    public function getDataByYear($tahun){
        return $this->where('tahun', $tahun)
        ->findAll();
    }
}
