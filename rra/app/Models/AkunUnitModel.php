<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunUnitModel extends Model
{
    protected $table = 'akun_unit';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $primaryKey = 'id_akun';
    protected $allowedFields = ['id_akun','kode', 'nama','gl_account','nama_beban'];
    // public function saveData($data)
    // {
    //    return $this->insert($data);
    // }
   // memanggil database untuk export gl account
    public function getExportExcel()
    {
        $select = $this->db->table('akun_unit')
        ->select('id_akun, kode, nama, gl_account, nama_beban')
        ->get()
        ->getResultArray(); // Menggunakan getResultArray() agar hasilnya dalam bentuk array asosiatif
        return $select;
        }
}