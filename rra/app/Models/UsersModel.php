<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama_user','nama_pass','pass_user','kelompok'];


    public function getUserByName($nama_user) {
        // Query ke database untuk mendapatkan data user berdasarkan nama
        $query = $this->where('nama_user', $nama_user)->get();
        
        // Mengembalikan satu baris hasil dari query
        return $query->getRow();

    }
    public function getExportExcel()
    {
        $select = $this->db->table('users')
        ->select('nama_user, nama_pass, pass_user, kelompok')
        ->get()
        ->getResultArray(); // Menggunakan getResultArray() agar hasilnya dalam bentuk array asosiatif
        return $select;
        }
    
}