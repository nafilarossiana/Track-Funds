<?php

namespace App\Models;

use CodeIgniter\Model;

class AirportTechModel extends Model
{
    protected $table = 'airport_tech';
    protected $returnType = 'array';
    protected $primaryKey = 'id_airporttech';

    protected $useTimestamps = false;
    protected $allowedFields = ['id_airporttech','tahun','unit','gl_account','jenis','jeniskontrak','status','no','detail_program','rka','geser','nilai_pekerjaan',
                                'realisasi','sisa_belum','nilai_program','sisa_rka','keterangan','januari','februari', 
                                'maret','april','mei','juni','juli','agustus','september','oktober','november','desember','id_rka','id_akun','id_unit','beban'];

    public function getPages($id_airporttech){

        return $this->find($id_airporttech);
    }
    public function getAirsideDataById($id_airporttech)
    {
        return $this->find($id_airporttech);
    }
// Di dalam AirsideModel.php

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
    $result = $this->select('gl_account')->distinct()->groupBy('gl_account')->findAll();

    $uniqueYears = [];
    foreach ($result as $row) {
        $uniqueYears[] = $row['gl_account'];
    }

    return $uniqueYears;
}


    public function getTabelByTahunGlAccount($tahun, $gl_account) {
        $builder = $this->db->table($this->table);

        // Menambahkan filter untuk tahun jika tidak 'all'
        if ($tahun !== 'Semua') {
            $builder->where('tahun', $tahun);
        }

        // Menambahkan filter untuk GL Account jika tidak 'Semua'
        if ($gl_account !== 'Semua') {
            $builder->where('gl_account', $gl_account);
        }

        $query = $builder->get();
        return $query->getResultArray();
    }
    public function deleteRecordsNotInRkacoba()
    {
        // Use Query Builder to perform the delete operation
        $builder = $this->db->table($this->table);
        
        // Select records from airside where id_rka is not found in rkacoba
        $builder->whereNotIn('id_rka', function ($builder) {
            $builder->select('id_rka')->from('rkacoba');
        });

        // Perform the delete operation
        $builder->delete();
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
    public function getExportExcel()
    {
        $select = $this->db->table('airport_tech')
        ->select('tahun, unit, gl_account, jenis, jeniskontrak, status, detail_program, rka, geser, nilai_pekerjaan, realisasi, sisa_belum, nilai_program, sisa_rka, keterangan, 
        januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember')
        ->get()
        ->getResultArray(); // Menggunakan getResultArray() agar hasilnya dalam bentuk array asosiatif
        return $select;
        }



}