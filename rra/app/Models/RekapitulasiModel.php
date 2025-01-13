<?php

namespace App\Models;

use CodeIgniter\Model;

class RekapitulasiModel extends Model
{
    protected $table = 'rekapitulasi';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $primaryKey = 'id_rekap';
    protected $allowedFields = ['id_unit', 'beban', 'id_akun', 'rka', 'geser_anggaran', 'nilai_pekerjaan', 'bulan', 'sisa_belum', 'rencana_program', 'sisa_rka', 'januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember', 'estimasi_sisa','jenis','jenis_kontrak','status'];

    // Fungsi untuk mendapatkan id_akun yang unik
    public function getUniqueAccountRekap()
    {
        $result = $this->select('id_akun')->distinct()->groupBy('id_akun')->findAll();

        $uniqueYears = [];
        foreach ($result as $row) {
            $uniqueYears[] = $row['id_akun'];
        }
        return $uniqueYears;
    }

    // Fungsi untuk mengisi tabel rekapitulasi
    public function fillRekapitulasi()
    {
        $id_akun_airside = $this->db->table('airside')->select('id_akun')->distinct()->get()->getResultArray();
        $id_akun_airside_array = array_column($id_akun_airside, 'id_akun');
        
        // Mendapatkan id_akun dari landside
        $id_akun_landside = $this->db->table('landside')->select('id_akun')->distinct()->get()->getResultArray();
        $id_akun_landside_array = array_column($id_akun_landside, 'id_akun');

        $id_akun_mechanical = $this->db->table('landside')->select('id_akun')->distinct()->get()->getResultArray();
        $id_akun_mechanical_array = array_column($id_akun_mechanical, 'id_akun');
    
        $id_akun_electrical = $this->db->table('electrical')->select('id_akun')->distinct()->get()->getResultArray();
        $id_akun_electrical_array = array_column($id_akun_electrical, 'id_akun');

        $id_akun_airporttech = $this->db->table('airport_tech')->select('id_akun')->distinct()->get()->getResultArray();
        $id_akun_airporttech_array = array_column($id_akun_airporttech, 'id_akun');
        // Menghapus data yang tidak ada di airsid
        $this->deleteRekapDataNotInAirside($id_akun_airside_array);
        $this->deleteRekapDataNotInAirportTech($id_akun_airporttech_array);
    
        // Menghapus data yang tidak ada di landside
        $this->deleteRekapDataNotInLandside($id_akun_landside_array);
        $this->deleteRekapDataNotInMechanical($id_akun_mechanical_array);
        $this->deleteRekapDataNotInElectrical($id_akun_electrical_array);

        $query = $this->db->query("

        
            SELECT 
                id_akun, id_unit, beban,
                SUM(rka) as total_rka,
                SUM(geser) as total_geser,
                SUM(nilai_pekerjaan) as total_nilai_pekerjaan,
                SUM(realisasi) as total_realisasi,
                SUM(sisa_belum) as total_sisa_belum,
                SUM(nilai_program) as total_rencana_program,
                SUM(sisa_rka) as total_sisa_rka,
                SUM(januari) as total_januari,
                SUM(februari) as total_februari,
                SUM(maret) as total_maret,
                SUM(april) as total_april,
                SUM(mei) as total_mei,
                SUM(juni) as total_juni,
                SUM(juli) as total_juli,
                SUM(agustus) as total_agustus,
                SUM(september) as total_september,
                SUM(oktober) as total_oktober,
                SUM(november) as total_november,
                SUM(desember) as total_desember,
                COUNT(jenis) as total_jenis,
                COUNT(jeniskontrak) as total_jenis_kontrak,
                COUNT(status) as total_status
            FROM (
                SELECT id_akun, id_unit, beban, rka, geser, nilai_pekerjaan, realisasi, sisa_belum, nilai_program, sisa_rka, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, jenis, jeniskontrak, status
                FROM airside
                UNION ALL
                SELECT id_akun, id_unit, beban, rka, geser, nilai_pekerjaan, realisasi, sisa_belum, nilai_program, sisa_rka, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, jenis, jeniskontrak, status
                FROM landside
                UNION ALL
                SELECT id_akun, id_unit, beban, rka, geser, nilai_pekerjaan, realisasi, sisa_belum, nilai_program, sisa_rka, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, jenis, jeniskontrak, status
                FROM mechanical
                UNION ALL
                SELECT id_akun, id_unit, beban, rka, geser, nilai_pekerjaan, realisasi, sisa_belum, nilai_program, sisa_rka, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, jenis, jeniskontrak, status
                FROM electrical
                UNION ALL
                SELECT id_akun, id_unit, beban, rka, geser, nilai_pekerjaan, realisasi, sisa_belum, nilai_program, sisa_rka, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, jenis, jeniskontrak, status
                FROM electrical
                UNION ALL
                SELECT id_akun, id_unit, beban, rka, geser, nilai_pekerjaan, realisasi, sisa_belum, nilai_program, sisa_rka, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, jenis, jeniskontrak, status
                FROM airport_tech

            ) AS combined_data
            GROUP BY id_akun, id_unit, beban
        ");
    
        $rekapData = $query->getResult();
    
        // Mengisi data ke tabel rekapitulasi
        foreach ($rekapData as $row) {
            $existingData = $this->where([
                'id_akun' => $row->id_akun,
                'id_unit' => $row->id_unit,
                'beban'   => $row->beban,
            ])->first();
    
            if (!$existingData) {
                // Memasukkan data baru ke tabel rekapitulasi
                $this->insertRekapData($row);
            } else {
                // Memperbarui data yang sudah ada di tabel rekapitulasi
                $this->updateRekapData($existingData['id_rekap'], $row);
            }
            
        }
       
       // $this->deleteRekapDataNotInLandside();
    }
    
    public function insertRekapData($row)
    {
        $total_estimasi_sisa = ($row->total_rka + $row->total_geser) - ($row->total_sisa_belum + $row->total_realisasi + $row->total_rencana_program);

        $dataInsert = [
            'id_akun'         => $row->id_akun,
            'beban'           => $row->beban,
            'id_unit'         => $row->id_unit,
            'rka'             => $row->total_rka,
            'geser_anggaran'  => $row->total_geser,
            'nilai_pekerjaan' => $row->total_nilai_pekerjaan,
            'bulan'           => $row->total_realisasi,
            'sisa_belum'      => $row->total_sisa_belum,
            'rencana_program' => $row->total_rencana_program,
            'sisa_rka'        => $row->total_sisa_rka,
            'januari'         => $row->total_januari,
            'februari'        => $row->total_februari,
            'maret'           => $row->total_maret,
            'april'           => $row->total_april,
            'mei'             => $row->total_mei,
            'juni'            => $row->total_juni,
            'juli'            => $row->total_juli,
            'agustus'         => $row->total_agustus,
            'september'       => $row->total_september,
            'oktober'         => $row->total_oktober,
            'november'        => $row->total_november,
            'desember'        => $row->total_desember,
            'estimasi_sisa'   => $total_estimasi_sisa,
            'jenis'            => $row->total_jenis,
            'jenis_kontrak'    => $row->total_jenis_kontrak,
            'status'            => $row->total_status,
        ];

        $this->insert($dataInsert);
    }

    // Fungsi untuk memperbarui data yang sudah ada
    public function updateRekapData($id_rekap, $row)
    {
        $total_estimasi_sisa = ($row->total_rka + $row->total_geser) - ($row->total_sisa_belum + $row->total_realisasi + $row->total_rencana_program);

        $dataUpdate = [
            'id_akun'         => $row->id_akun,
            'beban'           => $row->beban,
            'id_unit'         => $row->id_unit,
            'rka'             => $row->total_rka,
            'geser_anggaran'  => $row->total_geser,
            'nilai_pekerjaan' => $row->total_nilai_pekerjaan,
            'bulan'           => $row->total_realisasi, // Menambah kolom realisasi
            'sisa_belum'      => $row->total_sisa_belum,
            'rencana_program' => $row->total_rencana_program,
            'sisa_rka'        => $row->total_sisa_rka,
            'januari'         => $row->total_januari,
            'februari'        => $row->total_februari,
            'maret'           => $row->total_maret,
            'april'           => $row->total_april,
            'mei'             => $row->total_mei,
            'juni'            => $row->total_juni,
            'juli'            => $row->total_juli,
            'agustus'         => $row->total_agustus,
            'september'       => $row->total_september,
            'oktober'         => $row->total_oktober,
            'november'        => $row->total_november,
            'desember'        => $row->total_desember,
            'estimasi_sisa'   => $total_estimasi_sisa,
            'jenis'            => $row->total_jenis,
            'jenis_kontrak'    => $row->total_jenis_kontrak,
            'status'            => $row->total_status,
        ];

        $condition = [
            'id_rekap' => $id_rekap,
        ];

        $this->update($condition, $dataUpdate);
    }

    // Fungsi untuk menghapus data dari airside dan rekapitulasi
    public function deleteRekapDataNotInAirside()
    {
        // Mendapatkan id_akun yang dimiliki oleh tabel airside
        $id_akun_airside = $this->db->table('airside')->select('id_akun')->distinct()->get()->getResultArray();
        $id_akun_airside_array = array_column($id_akun_airside, 'id_akun');

        // Menghapus data dari rekapitulasi yang tidak memiliki id_akun pada tabel airside
        $this->db->table('rekapitulasi')
            ->whereNotIn('id_akun', $id_akun_airside_array)
            ->delete();
    }
    public function deleteRekapDataNotInLandside()
    {
        // Mendapatkan id_akun yang dimiliki oleh tabel airside
        $id_akun_landside = $this->db->table('landside')->select('id_akun')->distinct()->get()->getResultArray();
        $id_akun_landside_array = array_column($id_akun_landside, 'id_akun');

        // Menghapus data dari rekapitulasi yang tidak memiliki id_akun pada tabel airside
        $this->db->table('rekapitulasi')
            ->whereNotIn('id_akun', $id_akun_landside_array)
            ->delete();
    }
    public function deleteRekapDataNotInMechanical()
    {
        // Mendapatkan id_akun yang dimiliki oleh tabel airside
        $id_akun_mechanical= $this->db->table('mechanical')->select('id_akun')->distinct()->get()->getResultArray();
        $id_akun_mechanical_array = array_column($id_akun_mechanical, 'id_akun');

        // Menghapus data dari rekapitulasi yang tidak memiliki id_akun pada tabel airside
        $this->db->table('rekapitulasi')
            ->whereNotIn('id_akun', $id_akun_mechanical_array)
            ->delete();
    }
    public function deleteRekapDataNotInElectrical()
    {
        // Mendapatkan id_akun yang dimiliki oleh tabel airside
        $id_akun_mechanical= $this->db->table('electrical')->select('id_akun')->distinct()->get()->getResultArray();
        $id_akun_mechanical_array = array_column($id_akun_mechanical, 'id_akun');

        // Menghapus data dari rekapitulasi yang tidak memiliki id_akun pada tabel airside
        $this->db->table('rekapitulasi')
            ->whereNotIn('id_akun', $id_akun_mechanical_array)
            ->delete();
    }
    public function deleteRekapDataNotInAirportTech()
    {
        // Mendapatkan id_akun yang dimiliki oleh tabel airside
        $id_akun_landside = $this->db->table('airport_tech')->select('id_akun')->distinct()->get()->getResultArray();
        $id_akun_landside_array = array_column($id_akun_landside, 'id_akun');

        // Menghapus data dari rekapitulasi yang tidak memiliki id_akun pada tabel airside
        $this->db->table('rekapitulasi')
            ->whereNotIn('id_akun', $id_akun_landside_array)
            ->delete();
    }
    // Fungsi untuk mendapatkan gl_account berdasarkan id_akun
    public function getGlAccountByIdAkun($id_akun)
    {
        return $this->db->table('akun_unit')
            ->select('gl_account')
            ->where('id_akun', $id_akun)
            ->get()
            ->getResultArray();
    }

    // Fungsi untuk mendapatkan unit berdasarkan id_unit
    public function getUnitbyIdunit($id_unit)
    {
        return $this->db->table('unit')
            ->select('nama_unit')
            ->where('id_unit', $id_unit)
            ->get()
            ->getResultArray();
    }

    // Fungsi untuk mendapatla semua data kolom jenis pada airside kemudian mneghitung jumlah masing-masing nilai jenis pada airside 
    public function getAllJenisAirside()
{
    $jenisValues = $this->db->table('airside')
                    ->select('jenis')
                    ->get()
                    ->getResultArray();

    $countPerJenis = [];

    // Iterasi melalui array data untuk menghitung jumlah masing-masing nilai
    foreach ($jenisValues as $data) {
        $jenis = $data['jenis'];
        // Mengganti nilai null atau kosong dengan 'None'
        if ($jenis === null || $jenis === '') {
            $jenis = 'None';
        }
        if (!isset($countPerJenis[$jenis])) {
            $countPerJenis[$jenis] = 1;
        } else {
            $countPerJenis[$jenis]++;
        }
    }

    $tableData = [];
    foreach ($countPerJenis as $jenis => $jumlah) {
        // Modifikasi nilai null atau kosong menjadi 'None'
        if ($jenis === null || $jenis === '') {
            $jenis = 'None';
        }
        $tableData[] = [
            'nama' => $jenis,
            'jumlah' => $jumlah,
        ];
    }
        
    return $tableData; 
} 


    
  // Fungsi untuk mendapatla semua data kolom jenis pada airside kemudian mneghitung jumlah masing-masing nilai jenis pada Landside  
    public function getAllJenisLandside()
    {
        $jenisValues = $this->db->table('landside')
                        ->select('jenis')
                        ->get()
                        ->getResultArray(); // Menggunakan getResultArray() agar hasilnya dalam bentuk array asosiatif
    
        $countPerJenis = [];
    
        // Iterasi melalui array data untuk menghitung jumlah masing-masing nilai
        foreach ($jenisValues as $data) {
            $jenis = $data['jenis'];
            // Mengganti nilai null atau kosong dengan 'None'
            if ($jenis === null || $jenis === '') {
                $jenis = 'None';
            }
            if (!isset($countPerJenis[$jenis])) {
                $countPerJenis[$jenis] = 1;
            } else {
                $countPerJenis[$jenis]++;
            }
        }
    
        $tableData = [];
        foreach ($countPerJenis as $jenis => $jumlah) {
            // Modifikasi nilai null atau kosong menjadi 'None'
            if ($jenis === null || $jenis === '') {
                $jenis = 'None';
            }
            $tableData[] = [
                'nama' => $jenis,
                'jumlah' => $jumlah,
            ];
        }
            
        return $tableData; 
    } 
    
  // Fungsi untuk mendapatla semua data kolom jenis pada mechanical kemudian mneghitung jumlah masing-masing nilai jenis pada Landside  
  public function getAllJenisMechanical()
  {
      $jenisValues = $this->db->table('mechanical')
                      ->select('jenis')
                      ->get()
                      ->getResultArray(); // Menggunakan getResultArray() agar hasilnya dalam bentuk array asosiatif
  
      $countPerJenis = [];
  
      // Iterasi melalui array data untuk menghitung jumlah masing-masing nilai
      foreach ($jenisValues as $data) {
          $jenis = $data['jenis'];
          // Mengganti nilai null atau kosong dengan 'None'
          if ($jenis === null || $jenis === '') {
              $jenis = 'None';
          }
          if (!isset($countPerJenis[$jenis])) {
              $countPerJenis[$jenis] = 1;
          } else {
              $countPerJenis[$jenis]++;
          }
      }
  
      $tableData = [];
      foreach ($countPerJenis as $jenis => $jumlah) {
          // Modifikasi nilai null atau kosong menjadi 'None'
          if ($jenis === null || $jenis === '') {
              $jenis = 'None';
          }
          $tableData[] = [
              'nama' => $jenis,
              'jumlah' => $jumlah,
          ];
      }
          
      return $tableData; 
  } 
  public function getAllJenisElectrical()
  {
      $jenisValues = $this->db->table('electrical')
                      ->select('jenis')
                      ->get()
                      ->getResultArray(); // Menggunakan getResultArray() agar hasilnya dalam bentuk array asosiatif
  
      $countPerJenis = [];
  
      // Iterasi melalui array data untuk menghitung jumlah masing-masing nilai
      foreach ($jenisValues as $data) {
          $jenis = $data['jenis'];
          // Mengganti nilai null atau kosong dengan 'None'
          if ($jenis === null || $jenis === '') {
              $jenis = 'None';
          }
          if (!isset($countPerJenis[$jenis])) {
              $countPerJenis[$jenis] = 1;
          } else {
              $countPerJenis[$jenis]++;
          }
      }
  
      $tableData = [];
      foreach ($countPerJenis as $jenis => $jumlah) {
          // Modifikasi nilai null atau kosong menjadi 'None'
          if ($jenis === null || $jenis === '') {
              $jenis = 'None';
          }
          $tableData[] = [
              'nama' => $jenis,
              'jumlah' => $jumlah,
          ];
      }
          
      return $tableData; 
  }
  public function getAllJenisAirportTech()
  {
      $jenisValues = $this->db->table('airport_tech')
                      ->select('jenis')
                      ->get()
                      ->getResultArray(); // Menggunakan getResultArray() agar hasilnya dalam bentuk array asosiatif
  
      $countPerJenis = [];
  
      // Iterasi melalui array data untuk menghitung jumlah masing-masing nilai
      foreach ($jenisValues as $data) {
          $jenis = $data['jenis'];
          // Mengganti nilai null atau kosong dengan 'None'
          if ($jenis === null || $jenis === '') {
              $jenis = 'None';
          }
          if (!isset($countPerJenis[$jenis])) {
              $countPerJenis[$jenis] = 1;
          } else {
              $countPerJenis[$jenis]++;
          }
      }
  
      $tableData = [];
      foreach ($countPerJenis as $jenis => $jumlah) {
          // Modifikasi nilai null atau kosong menjadi 'None'
          if ($jenis === null || $jenis === '') {
              $jenis = 'None';
          }
          $tableData[] = [
              'nama' => $jenis,
              'jumlah' => $jumlah,
          ];
      }
          
      return $tableData; 
  }
  
    //  fungsi untuk mendapatkan semua data kolom jenis pada airside kemudian mneghitung jumlah masing-masing nilai jenis kontrak airside  
    public function getAllJenisKontrakAirside()
    {
        $jeniskontrakValues = $this->db->table('airside')
                        ->select('jeniskontrak')
                        ->get()
                        ->getResultArray(); // Menggunakan getResultArray() agar hasilnya dalam bentuk array asosiatif
    
        $countPerJenisKontrak= [];
    
        // Iterasi melalui array data untuk menghitung jumlah masing-masing nilai
        foreach ($jeniskontrakValues as $data) {
            $jeniskontrak = $data['jeniskontrak'];
            // Mengganti nilai null atau kosong dengan 'None'
            if ($jeniskontrak === null || $jeniskontrak === '') {
                $jeniskontrak = 'None';
            }
            if (!isset($countPerJenisKontrak[$jeniskontrak])) {
                $countPerJenisKontrak[$jeniskontrak] = 1;
            } else {
                $countPerJenisKontrak[$jeniskontrak]++;
            }
        }
        $tableData = [];
        foreach ($countPerJenisKontrak as $jeniskontrak => $jumlah) {
            // Modifikasi nilai null atau kosong menjadi 'None'
            if ($jeniskontrak === null || $jeniskontrak === '') {
                $jeniskontrak = 'None';
            }
            $tableData[] = [
                'nama' => $jeniskontrak,
                'jumlah' => $jumlah,
            ];
        }
                        
        return $tableData; 
    } 
    

//  fungsi untuk mendapatkan semua data kolom jenis pada airside kemudian mneghitung jumlah masing-masing nilai jenis kontrak landside 
public function getAllJenisKontrakLandside()
{
    $jeniskontrakValues = $this->db->table('landside')
                    ->select('jeniskontrak')
                    ->get()
                    ->getResultArray(); // Menggunakan getResultArray() agar hasilnya dalam bentuk array asosiatif

    $countPerJenisKontrak= [];

    // Iterasi melalui array data untuk menghitung jumlah masing-masing nilai
    foreach ($jeniskontrakValues as $data) {
        $jeniskontrak = $data['jeniskontrak'];
        // Mengganti nilai null atau kosong dengan 'None'
        if ($jeniskontrak === null || $jeniskontrak === '') {
            $jeniskontrak = 'None';
        }
        if (!isset($countPerJenisKontrak[$jeniskontrak])) {
            $countPerJenisKontrak[$jeniskontrak] = 1;
        } else {
            $countPerJenisKontrak[$jeniskontrak]++;
        }
    }
    $tableData = [];
    foreach ($countPerJenisKontrak as $jeniskontrak => $jumlah) {
        // Modifikasi nilai null atau kosong menjadi 'None'
        if ($jeniskontrak === null || $jeniskontrak === '') {
            $jeniskontrak = 'None';
        }
        $tableData[] = [
            'nama' => $jeniskontrak,
            'jumlah' => $jumlah,
        ];
    }
                    
    return $tableData; 
} 

//  fungsi untuk mendapatkan semua data kolom jenis pada mechanical kemudian mneghitung jumlah masing-masing nilai jenis kontrak mechanical 
public function getAllJenisKontrakMechanical()
{
    $jeniskontrakValues = $this->db->table('mechanical')
                    ->select('jeniskontrak')
                    ->get()
                    ->getResultArray(); // Menggunakan getResultArray() agar hasilnya dalam bentuk array asosiatif

    $countPerJenisKontrak= [];

    // Iterasi melalui array data untuk menghitung jumlah masing-masing nilai
    foreach ($jeniskontrakValues as $data) {
        $jeniskontrak = $data['jeniskontrak'];
        // Mengganti nilai null atau kosong dengan 'None'
        if ($jeniskontrak === null || $jeniskontrak === '') {
            $jeniskontrak = 'None';
        }
        if (!isset($countPerJenisKontrak[$jeniskontrak])) {
            $countPerJenisKontrak[$jeniskontrak] = 1;
        } else {
            $countPerJenisKontrak[$jeniskontrak]++;
        }
    }
    $tableData = [];
    foreach ($countPerJenisKontrak as $jeniskontrak => $jumlah) {
        // Modifikasi nilai null atau kosong menjadi 'None'
        if ($jeniskontrak === null || $jeniskontrak === '') {
            $jeniskontrak = 'None';
        }
        $tableData[] = [
            'nama' => $jeniskontrak,
            'jumlah' => $jumlah,
        ];
    }
                    
    return $tableData; 
} 
public function getAllJenisKontrakElectrical()
{
    $jeniskontrakValues = $this->db->table('electrical')
                    ->select('jeniskontrak')
                    ->get()
                    ->getResultArray(); // Menggunakan getResultArray() agar hasilnya dalam bentuk array asosiatif

    $countPerJenisKontrak= [];

    // Iterasi melalui array data untuk menghitung jumlah masing-masing nilai
    foreach ($jeniskontrakValues as $data) {
        $jeniskontrak = $data['jeniskontrak'];
        // Mengganti nilai null atau kosong dengan 'None'
        if ($jeniskontrak === null || $jeniskontrak === '') {
            $jeniskontrak = 'None';
        }
        if (!isset($countPerJenisKontrak[$jeniskontrak])) {
            $countPerJenisKontrak[$jeniskontrak] = 1;
        } else {
            $countPerJenisKontrak[$jeniskontrak]++;
        }
    }
    $tableData = [];
    foreach ($countPerJenisKontrak as $jeniskontrak => $jumlah) {
        // Modifikasi nilai null atau kosong menjadi 'None'
        if ($jeniskontrak === null || $jeniskontrak === '') {
            $jeniskontrak = 'None';
        }
        $tableData[] = [
            'nama' => $jeniskontrak,
            'jumlah' => $jumlah,
        ];
    }
                    
    return $tableData; 
} 
public function getAllJenisKontrakAirportTech()
{
    $jeniskontrakValues = $this->db->table('airport_tech')
                    ->select('jeniskontrak')
                    ->get()
                    ->getResultArray(); // Menggunakan getResultArray() agar hasilnya dalam bentuk array asosiatif

    $countPerJenisKontrak= [];

    // Iterasi melalui array data untuk menghitung jumlah masing-masing nilai
    foreach ($jeniskontrakValues as $data) {
        $jeniskontrak = $data['jeniskontrak'];
        // Mengganti nilai null atau kosong dengan 'None'
        if ($jeniskontrak === null || $jeniskontrak === '') {
            $jeniskontrak = 'None';
        }
        if (!isset($countPerJenisKontrak[$jeniskontrak])) {
            $countPerJenisKontrak[$jeniskontrak] = 1;
        } else {
            $countPerJenisKontrak[$jeniskontrak]++;
        }
    }
    $tableData = [];
    foreach ($countPerJenisKontrak as $jeniskontrak => $jumlah) {
        // Modifikasi nilai null atau kosong menjadi 'None'
        if ($jeniskontrak === null || $jeniskontrak === '') {
            $jeniskontrak = 'None';
        }
        $tableData[] = [
            'nama' => $jeniskontrak,
            'jumlah' => $jumlah,
        ];
    }
                    
    return $tableData; 
} 
// fungsi untuk mendapatla semua data kolom status pada airside kemudian mneghitung jumlah masing-masing nilai status airside 

public function getAllStatusAirside()
{
    $statusValues = $this->db->table('airside')
        ->select('status')
        ->get()
        ->getResultArray();
    
    $countPerStatus = [];

    // Iterasi melalui array data untuk menghitung jumlah masing-masing nilai
    foreach ($statusValues as $data) {
        $status = $data['status'];

        // Mengganti nilai null atau kosong dengan "None"
        if ($status === null || $status === '') {
            $status = 'None';
        }

        if (!isset($countPerStatus[$status])) {
            $countPerStatus[$status] = 1;
        } else {
            $countPerStatus[$status]++;
        }
    }

    // Menggabungkan nama status dan jumlah ke dalam satu array asosiatif
    $result = [];
    foreach ($countPerStatus as $status => $count) {
        $result[] = ['status' => $status, 'jumlah' => $count];
    }

    return $result;
}

//  fungsi untuk mendapatla semua data kolom status pada airside kemudian mneghitung jumlah masing-masing nilai status Landside 
public function getAllStatusLandside()
{
    $statusValues = $this->db->table('landside')
        ->select('status')
        ->get()
        ->getResultArray();
    
    $countPerStatus = [];

    // Iterasi melalui array data untuk menghitung jumlah masing-masing nilai
    foreach ($statusValues as $data) {
        $status = $data['status'];

        // Mengganti nilai null atau kosong dengan "None"
        if ($status === null || $status === '') {
            $status = 'None';
        }

        if (!isset($countPerStatus[$status])) {
            $countPerStatus[$status] = 1;
        } else {
            $countPerStatus[$status]++;
        }
    }

    // Menggabungkan nama status dan jumlah ke dalam satu array asosiatif
    $result = [];
    foreach ($countPerStatus as $status => $count) {
        $result[] = ['status' => $status, 'jumlah' => $count];
    }

    return $result;
}
public function getAllStatusMechanical()
{
    $statusValues = $this->db->table('mechanical')
        ->select('status')
        ->get()
        ->getResultArray();
    
    $countPerStatus = [];

    // Iterasi melalui array data untuk menghitung jumlah masing-masing nilai
    foreach ($statusValues as $data) {
        $status = $data['status'];

        // Mengganti nilai null atau kosong dengan "None"
        if ($status === null || $status === '') {
            $status = 'None';
        }

        if (!isset($countPerStatus[$status])) {
            $countPerStatus[$status] = 1;
        } else {
            $countPerStatus[$status]++;
        }
    }

    // Menggabungkan nama status dan jumlah ke dalam satu array asosiatif
    $result = [];
    foreach ($countPerStatus as $status => $count) {
        $result[] = ['status' => $status, 'jumlah' => $count];
    }

    return $result;
}
public function getAllStatusElectrical()
{
    $statusValues = $this->db->table('electrical')
        ->select('status')
        ->get()
        ->getResultArray();
    
    $countPerStatus = [];

    // Iterasi melalui array data untuk menghitung jumlah masing-masing nilai
    foreach ($statusValues as $data) {
        $status = $data['status'];

        // Mengganti nilai null atau kosong dengan "None"
        if ($status === null || $status === '') {
            $status = 'None';
        }

        if (!isset($countPerStatus[$status])) {
            $countPerStatus[$status] = 1;
        } else {
            $countPerStatus[$status]++;
        }
    }

    // Menggabungkan nama status dan jumlah ke dalam satu array asosiatif
    $result = [];
    foreach ($countPerStatus as $status => $count) {
        $result[] = ['status' => $status, 'jumlah' => $count];
    }

    return $result;
}
public function getAllStatusAirportTech()
{
    $statusValues = $this->db->table('airport_tech')
        ->select('status')
        ->get()
        ->getResultArray();
    
    $countPerStatus = [];

    // Iterasi melalui array data untuk menghitung jumlah masing-masing nilai
    foreach ($statusValues as $data) {
        $status = $data['status'];

        // Mengganti nilai null atau kosong dengan "None"
        if ($status === null || $status === '') {
            $status = 'None';
        }

        if (!isset($countPerStatus[$status])) {
            $countPerStatus[$status] = 1;
        } else {
            $countPerStatus[$status]++;
        }
    }

    // Menggabungkan nama status dan jumlah ke dalam satu array asosiatif
    $result = [];
    foreach ($countPerStatus as $status => $count) {
        $result[] = ['status' => $status, 'jumlah' => $count];
    }

    return $result;
}

public function getRRAirside()
{
    // Query untuk mendapatkan hasil penjumlahan kolom Januari
    $bulanValues = $this->db->table('rkacoba')
        ->select('
        COALESCE(SUM(januari), 0.0) as total_januari,
        COALESCE(SUM(februari), 0.0) as total_februari,
        COALESCE(SUM(maret), 0.0) as total_maret,
        COALESCE(SUM(april), 0.0) as total_april,
        COALESCE(SUM(mei), 0.0) as total_mei,
        COALESCE(SUM(juni), 0.0) as total_juni,
        COALESCE(SUM(juli), 0.0) as total_juli,
        COALESCE(SUM(agustus), 0.0) as total_agustus,
        COALESCE(SUM(september), 0.0) as total_september,
        COALESCE(SUM(oktober), 0.0) as total_oktober,
        COALESCE(SUM(november), 0.0) as total_november,
        COALESCE(SUM(desember), 0.0) as total_desember')
        ->where('unit', 'AIRSIDE FACILITIES')
        ->get()
        ->getRowArray();

    // Mengambil data dari tabel airside
    $builder = $this->db->table('airside');
    $builder->select('
        COALESCE(SUM(realisasi), 0.0) as total_realisasi,
        COALESCE(SUM(januari), 0.0) as total_januari, 
        COALESCE(SUM(februari), 0.0) as total_februari, 
        COALESCE(SUM(maret), 0.0) as total_maret, 
        COALESCE(SUM(april), 0.0) as total_april, 
        COALESCE(SUM(mei), 0.0) as total_mei, 
        COALESCE(SUM(juni), 0.0) as total_juni, 
        COALESCE(SUM(juli), 0.0) as total_juli, 
        COALESCE(SUM(agustus), 0.0) as total_agustus, 
        COALESCE(SUM(september), 0.0) as total_september, 
        COALESCE(SUM(oktober), 0.0) as total_oktober, 
        COALESCE(SUM(november), 0.0) as total_november, 
        COALESCE(SUM(desember), 0.0) as total_desember'
    );
    $realisasiData = $builder->get()->getRowArray();

    // Mengonversi hasil menjadi satu baris
    $bulanData = [
        'Januari' => [
            'bulan' => 'Januari',
            'rencana' => (float) $bulanValues['total_januari'],
            'realisasi' => (float) $realisasiData['total_januari']
        ],
        'Februari' => [
            'bulan' => 'Februari',
            'rencana' => (float) $bulanValues['total_februari'],
            'realisasi' => (float) $realisasiData['total_februari']
        ],
        'Maret' => [
            'bulan' => 'Maret',
            'rencana' => (float) $bulanValues['total_maret'],
            'realisasi' => (float) $realisasiData['total_maret']
        ],
        'April' => [
            'bulan' => 'April',
            'rencana' => (float) $bulanValues['total_april'],
            'realisasi' => (float) $realisasiData['total_april']
        ],
        'Mei' => [
            'bulan' => 'Mei',
            'rencana' => (float) $bulanValues['total_mei'],
            'realisasi' => (float) $realisasiData['total_mei']
        ],
        'Juni' => [
            'bulan' => 'Juni',
            'rencana' => (float) $bulanValues['total_juni'],
            'realisasi' => (float) $realisasiData['total_juni']
        ],
        'Juli' => [
            'bulan' => 'Juli',
            'rencana' => (float) $bulanValues['total_juli'],
            'realisasi' => (float) $realisasiData['total_juli']
        ],
        'Agustus' => [
            'bulan' => 'Agustus',
            'rencana' => (float) $bulanValues['total_agustus'],
            'realisasi' => (float) $realisasiData['total_agustus']
        ],
        'September' => [
            'bulan' => 'September',
            'rencana' => (float) $bulanValues['total_september'],
            'realisasi' => (float) $realisasiData['total_september']
        ],
        'Oktober' => [
            'bulan' => 'Oktober',
            'rencana' => (float) $bulanValues['total_oktober'],
            'realisasi' => (float) $realisasiData['total_oktober']
        ],
        'November' => [
            'bulan' => 'November',
            'rencana' => (float) $bulanValues['total_november'],
            'realisasi' => (float) $realisasiData['total_november']
        ],
        'Desember' => [
            'bulan' => 'Desember',
            'rencana' => (float) $bulanValues['total_desember'],
            'realisasi' => (float) $realisasiData['total_desember']
        ],
    ];
    return $bulanData;
}

public function getRRLandside()
{
    // Query untuk mendapatkan hasil penjumlahan kolom Januari
    $bulanValues = $this->db->table('rkacoba')
        ->select('
        COALESCE(SUM(januari), 0.0) as total_januari,
        COALESCE(SUM(februari), 0.0) as total_februari,
        COALESCE(SUM(maret), 0.0) as total_maret,
        COALESCE(SUM(april), 0.0) as total_april,
        COALESCE(SUM(mei), 0.0) as total_mei,
        COALESCE(SUM(juni), 0.0) as total_juni,
        COALESCE(SUM(juli), 0.0) as total_juli,
        COALESCE(SUM(agustus), 0.0) as total_agustus,
        COALESCE(SUM(september), 0.0) as total_september,
        COALESCE(SUM(oktober), 0.0) as total_oktober,
        COALESCE(SUM(november), 0.0) as total_november,
        COALESCE(SUM(desember), 0.0) as total_desember')
        ->where('unit', 'AIRSIDE FACILITIES')
        ->get()
        ->getRowArray();

    // Mengambil data dari tabel airside
    $builder = $this->db->table('landside');
    $builder->select('
        COALESCE(SUM(realisasi), 0.0) as total_realisasi,
        COALESCE(SUM(januari), 0.0) as total_januari, 
        COALESCE(SUM(februari), 0.0) as total_februari, 
        COALESCE(SUM(maret), 0.0) as total_maret, 
        COALESCE(SUM(april), 0.0) as total_april, 
        COALESCE(SUM(mei), 0.0) as total_mei, 
        COALESCE(SUM(juni), 0.0) as total_juni, 
        COALESCE(SUM(juli), 0.0) as total_juli, 
        COALESCE(SUM(agustus), 0.0) as total_agustus, 
        COALESCE(SUM(september), 0.0) as total_september, 
        COALESCE(SUM(oktober), 0.0) as total_oktober, 
        COALESCE(SUM(november), 0.0) as total_november, 
        COALESCE(SUM(desember), 0.0) as total_desember'
    );
    $realisasiData = $builder->get()->getRowArray();

    // Mengonversi hasil menjadi satu baris
    $bulanData = [
        'Januari' => [
            'bulan' => 'Januari',
            'rencana' => (float) $bulanValues['total_januari'],
            'realisasi' => (float) $realisasiData['total_januari']
        ],
        'Februari' => [
            'bulan' => 'Februari',
            'rencana' => (float) $bulanValues['total_februari'],
            'realisasi' => (float) $realisasiData['total_februari']
        ],
        'Maret' => [
            'bulan' => 'Maret',
            'rencana' => (float) $bulanValues['total_maret'],
            'realisasi' => (float) $realisasiData['total_maret']
        ],
        'April' => [
            'bulan' => 'April',
            'rencana' => (float) $bulanValues['total_april'],
            'realisasi' => (float) $realisasiData['total_april']
        ],
        'Mei' => [
            'bulan' => 'Mei',
            'rencana' => (float) $bulanValues['total_mei'],
            'realisasi' => (float) $realisasiData['total_mei']
        ],
        'Juni' => [
            'bulan' => 'Juni',
            'rencana' => (float) $bulanValues['total_juni'],
            'realisasi' => (float) $realisasiData['total_juni']
        ],
        'Juli' => [
            'bulan' => 'Juli',
            'rencana' => (float) $bulanValues['total_juli'],
            'realisasi' => (float) $realisasiData['total_juli']
        ],
        'Agustus' => [
            'bulan' => 'Agustus',
            'rencana' => (float) $bulanValues['total_agustus'],
            'realisasi' => (float) $realisasiData['total_agustus']
        ],
        'September' => [
            'bulan' => 'September',
            'rencana' => (float) $bulanValues['total_september'],
            'realisasi' => (float) $realisasiData['total_september']
        ],
        'Oktober' => [
            'bulan' => 'Oktober',
            'rencana' => (float) $bulanValues['total_oktober'],
            'realisasi' => (float) $realisasiData['total_oktober']
        ],
        'November' => [
            'bulan' => 'November',
            'rencana' => (float) $bulanValues['total_november'],
            'realisasi' => (float) $realisasiData['total_november']
        ],
        'Desember' => [
            'bulan' => 'Desember',
            'rencana' => (float) $bulanValues['total_desember'],
            'realisasi' => (float) $realisasiData['total_desember']
        ],
    ];
    return $bulanData;
}

public function getRRMechanical()
{
    // Query untuk mendapatkan hasil penjumlahan kolom Januari
    $bulanValues = $this->db->table('rkacoba')
        ->select('
        COALESCE(SUM(januari), 0.0) as total_januari,
        COALESCE(SUM(februari), 0.0) as total_februari,
        COALESCE(SUM(maret), 0.0) as total_maret,
        COALESCE(SUM(april), 0.0) as total_april,
        COALESCE(SUM(mei), 0.0) as total_mei,
        COALESCE(SUM(juni), 0.0) as total_juni,
        COALESCE(SUM(juli), 0.0) as total_juli,
        COALESCE(SUM(agustus), 0.0) as total_agustus,
        COALESCE(SUM(september), 0.0) as total_september,
        COALESCE(SUM(oktober), 0.0) as total_oktober,
        COALESCE(SUM(november), 0.0) as total_november,
        COALESCE(SUM(desember), 0.0) as total_desember')
        ->where('unit', 'EQUIPMENT-MECHANICAL')
        ->get()
        ->getRowArray();

    // Mengambil data dari tabel mechanical
    $builder = $this->db->table('mechanical');
    $builder->select('
        COALESCE(SUM(realisasi), 0.0) as total_realisasi,
        COALESCE(SUM(januari), 0.0) as total_januari, 
        COALESCE(SUM(februari), 0.0) as total_februari, 
        COALESCE(SUM(maret), 0.0) as total_maret, 
        COALESCE(SUM(april), 0.0) as total_april, 
        COALESCE(SUM(mei), 0.0) as total_mei, 
        COALESCE(SUM(juni), 0.0) as total_juni, 
        COALESCE(SUM(juli), 0.0) as total_juli, 
        COALESCE(SUM(agustus), 0.0) as total_agustus, 
        COALESCE(SUM(september), 0.0) as total_september, 
        COALESCE(SUM(oktober), 0.0) as total_oktober, 
        COALESCE(SUM(november), 0.0) as total_november, 
        COALESCE(SUM(desember), 0.0) as total_desember'
    );
    $realisasiData = $builder->get()->getRowArray();

    // Mengonversi hasil menjadi satu baris
    $bulanData = [
        'Januari' => [
            'bulan' => 'Januari',
            'rencana' => (float) $bulanValues['total_januari'],
            'realisasi' => (float) $realisasiData['total_januari']
        ],
        'Februari' => [
            'bulan' => 'Februari',
            'rencana' => (float) $bulanValues['total_februari'],
            'realisasi' => (float) $realisasiData['total_februari']
        ],
        'Maret' => [
            'bulan' => 'Maret',
            'rencana' => (float) $bulanValues['total_maret'],
            'realisasi' => (float) $realisasiData['total_maret']
        ],
        'April' => [
            'bulan' => 'April',
            'rencana' => (float) $bulanValues['total_april'],
            'realisasi' => (float) $realisasiData['total_april']
        ],
        'Mei' => [
            'bulan' => 'Mei',
            'rencana' => (float) $bulanValues['total_mei'],
            'realisasi' => (float) $realisasiData['total_mei']
        ],
        'Juni' => [
            'bulan' => 'Juni',
            'rencana' => (float) $bulanValues['total_juni'],
            'realisasi' => (float) $realisasiData['total_juni']
        ],
        'Juli' => [
            'bulan' => 'Juli',
            'rencana' => (float) $bulanValues['total_juli'],
            'realisasi' => (float) $realisasiData['total_juli']
        ],
        'Agustus' => [
            'bulan' => 'Agustus',
            'rencana' => (float) $bulanValues['total_agustus'],
            'realisasi' => (float) $realisasiData['total_agustus']
        ],
        'September' => [
            'bulan' => 'September',
            'rencana' => (float) $bulanValues['total_september'],
            'realisasi' => (float) $realisasiData['total_september']
        ],
        'Oktober' => [
            'bulan' => 'Oktober',
            'rencana' => (float) $bulanValues['total_oktober'],
            'realisasi' => (float) $realisasiData['total_oktober']
        ],
        'November' => [
            'bulan' => 'November',
            'rencana' => (float) $bulanValues['total_november'],
            'realisasi' => (float) $realisasiData['total_november']
        ],
        'Desember' => [
            'bulan' => 'Desember',
            'rencana' => (float) $bulanValues['total_desember'],
            'realisasi' => (float) $realisasiData['total_desember']
        ],
    ];
    return $bulanData;
}
public function getRRAirportTech()
{
    // Query untuk mendapatkan hasil penjumlahan kolom Januari
    $bulanValues = $this->db->table('rkacoba')
        ->select('
        COALESCE(SUM(januari), 0.0) as total_januari,
        COALESCE(SUM(februari), 0.0) as total_februari,
        COALESCE(SUM(maret), 0.0) as total_maret,
        COALESCE(SUM(april), 0.0) as total_april,
        COALESCE(SUM(mei), 0.0) as total_mei,
        COALESCE(SUM(juni), 0.0) as total_juni,
        COALESCE(SUM(juli), 0.0) as total_juli,
        COALESCE(SUM(agustus), 0.0) as total_agustus,
        COALESCE(SUM(september), 0.0) as total_september,
        COALESCE(SUM(oktober), 0.0) as total_oktober,
        COALESCE(SUM(november), 0.0) as total_november,
        COALESCE(SUM(desember), 0.0) as total_desember')
        ->where('unit', 'EQUIPMENT-MECHANICAL')
        ->get()
        ->getRowArray();

    // Mengambil data dari tabel airporttech
    $builder = $this->db->table('airport_tech');
    $builder->select('
        COALESCE(SUM(realisasi), 0.0) as total_realisasi,
        COALESCE(SUM(januari), 0.0) as total_januari, 
        COALESCE(SUM(februari), 0.0) as total_februari, 
        COALESCE(SUM(maret), 0.0) as total_maret, 
        COALESCE(SUM(april), 0.0) as total_april, 
        COALESCE(SUM(mei), 0.0) as total_mei, 
        COALESCE(SUM(juni), 0.0) as total_juni, 
        COALESCE(SUM(juli), 0.0) as total_juli, 
        COALESCE(SUM(agustus), 0.0) as total_agustus, 
        COALESCE(SUM(september), 0.0) as total_september, 
        COALESCE(SUM(oktober), 0.0) as total_oktober, 
        COALESCE(SUM(november), 0.0) as total_november, 
        COALESCE(SUM(desember), 0.0) as total_desember'
    );
    $realisasiData = $builder->get()->getRowArray();

    // Mengonversi hasil menjadi satu baris
    $bulanData = [
        'Januari' => [
            'bulan' => 'Januari',
            'rencana' => (float) $bulanValues['total_januari'],
            'realisasi' => (float) $realisasiData['total_januari']
        ],
        'Februari' => [
            'bulan' => 'Februari',
            'rencana' => (float) $bulanValues['total_februari'],
            'realisasi' => (float) $realisasiData['total_februari']
        ],
        'Maret' => [
            'bulan' => 'Maret',
            'rencana' => (float) $bulanValues['total_maret'],
            'realisasi' => (float) $realisasiData['total_maret']
        ],
        'April' => [
            'bulan' => 'April',
            'rencana' => (float) $bulanValues['total_april'],
            'realisasi' => (float) $realisasiData['total_april']
        ],
        'Mei' => [
            'bulan' => 'Mei',
            'rencana' => (float) $bulanValues['total_mei'],
            'realisasi' => (float) $realisasiData['total_mei']
        ],
        'Juni' => [
            'bulan' => 'Juni',
            'rencana' => (float) $bulanValues['total_juni'],
            'realisasi' => (float) $realisasiData['total_juni']
        ],
        'Juli' => [
            'bulan' => 'Juli',
            'rencana' => (float) $bulanValues['total_juli'],
            'realisasi' => (float) $realisasiData['total_juli']
        ],
        'Agustus' => [
            'bulan' => 'Agustus',
            'rencana' => (float) $bulanValues['total_agustus'],
            'realisasi' => (float) $realisasiData['total_agustus']
        ],
        'September' => [
            'bulan' => 'September',
            'rencana' => (float) $bulanValues['total_september'],
            'realisasi' => (float) $realisasiData['total_september']
        ],
        'Oktober' => [
            'bulan' => 'Oktober',
            'rencana' => (float) $bulanValues['total_oktober'],
            'realisasi' => (float) $realisasiData['total_oktober']
        ],
        'November' => [
            'bulan' => 'November',
            'rencana' => (float) $bulanValues['total_november'],
            'realisasi' => (float) $realisasiData['total_november']
        ],
        'Desember' => [
            'bulan' => 'Desember',
            'rencana' => (float) $bulanValues['total_desember'],
            'realisasi' => (float) $realisasiData['total_desember']
        ],
    ];
    return $bulanData;
}
public function getRRElectrical()
{
    // Query untuk mendapatkan hasil penjumlahan kolom Januari
    $bulanValues = $this->db->table('rkacoba')
        ->select('
        COALESCE(SUM(januari), 0.0) as total_januari,
        COALESCE(SUM(februari), 0.0) as total_februari,
        COALESCE(SUM(maret), 0.0) as total_maret,
        COALESCE(SUM(april), 0.0) as total_april,
        COALESCE(SUM(mei), 0.0) as total_mei,
        COALESCE(SUM(juni), 0.0) as total_juni,
        COALESCE(SUM(juli), 0.0) as total_juli,
        COALESCE(SUM(agustus), 0.0) as total_agustus,
        COALESCE(SUM(september), 0.0) as total_september,
        COALESCE(SUM(oktober), 0.0) as total_oktober,
        COALESCE(SUM(november), 0.0) as total_november,
        COALESCE(SUM(desember), 0.0) as total_desember')
        ->where('unit', 'EQUIPMENT-MECHANICAL')
        ->get()
        ->getRowArray();

    // Mengambil data dari tabel mechanical
    $builder = $this->db->table('electrical');
    $builder->select('
        COALESCE(SUM(realisasi), 0.0) as total_realisasi,
        COALESCE(SUM(januari), 0.0) as total_januari, 
        COALESCE(SUM(februari), 0.0) as total_februari, 
        COALESCE(SUM(maret), 0.0) as total_maret, 
        COALESCE(SUM(april), 0.0) as total_april, 
        COALESCE(SUM(mei), 0.0) as total_mei, 
        COALESCE(SUM(juni), 0.0) as total_juni, 
        COALESCE(SUM(juli), 0.0) as total_juli, 
        COALESCE(SUM(agustus), 0.0) as total_agustus, 
        COALESCE(SUM(september), 0.0) as total_september, 
        COALESCE(SUM(oktober), 0.0) as total_oktober, 
        COALESCE(SUM(november), 0.0) as total_november, 
        COALESCE(SUM(desember), 0.0) as total_desember'
    );
    $realisasiData = $builder->get()->getRowArray();

    // Mengonversi hasil menjadi satu baris
    $bulanData = [
        'Januari' => [
            'bulan' => 'Januari',
            'rencana' => (float) $bulanValues['total_januari'],
            'realisasi' => (float) $realisasiData['total_januari']
        ],
        'Februari' => [
            'bulan' => 'Februari',
            'rencana' => (float) $bulanValues['total_februari'],
            'realisasi' => (float) $realisasiData['total_februari']
        ],
        'Maret' => [
            'bulan' => 'Maret',
            'rencana' => (float) $bulanValues['total_maret'],
            'realisasi' => (float) $realisasiData['total_maret']
        ],
        'April' => [
            'bulan' => 'April',
            'rencana' => (float) $bulanValues['total_april'],
            'realisasi' => (float) $realisasiData['total_april']
        ],
        'Mei' => [
            'bulan' => 'Mei',
            'rencana' => (float) $bulanValues['total_mei'],
            'realisasi' => (float) $realisasiData['total_mei']
        ],
        'Juni' => [
            'bulan' => 'Juni',
            'rencana' => (float) $bulanValues['total_juni'],
            'realisasi' => (float) $realisasiData['total_juni']
        ],
        'Juli' => [
            'bulan' => 'Juli',
            'rencana' => (float) $bulanValues['total_juli'],
            'realisasi' => (float) $realisasiData['total_juli']
        ],
        'Agustus' => [
            'bulan' => 'Agustus',
            'rencana' => (float) $bulanValues['total_agustus'],
            'realisasi' => (float) $realisasiData['total_agustus']
        ],
        'September' => [
            'bulan' => 'September',
            'rencana' => (float) $bulanValues['total_september'],
            'realisasi' => (float) $realisasiData['total_september']
        ],
        'Oktober' => [
            'bulan' => 'Oktober',
            'rencana' => (float) $bulanValues['total_oktober'],
            'realisasi' => (float) $realisasiData['total_oktober']
        ],
        'November' => [
            'bulan' => 'November',
            'rencana' => (float) $bulanValues['total_november'],
            'realisasi' => (float) $realisasiData['total_november']
        ],
        'Desember' => [
            'bulan' => 'Desember',
            'rencana' => (float) $bulanValues['total_desember'],
            'realisasi' => (float) $realisasiData['total_desember']
        ],
    ];
    return $bulanData;
}
//Untuk mengambil nama id_akun untuk keperluan export excel rekapitulasi
public function getGlAccountName($id_akun)
    {
        $result = $this->db->table('akun_unit')
        ->select('gl_account')
        ->where('id_akun', $id_akun)
        ->get()
        ->getRowArray();

    return $result['gl_account'] ?? ''; 
    }

    
    //Untuk mengambil nama id_unit untuk keperluan export excel rekapitulasi
public function getUnitName($id_unit)
{
    $result = $this->db->table('unit')
    ->select('nama_unit')
    ->where('id_unit', $id_unit)
    ->get()
    ->getRowArray();

return $result['nama_unit'] ?? ''; 
}
    public function getExportExcel()
    {
        $select = $this->db->table('rekapitulasi')
        ->select('id_unit, beban, id_akun, rka, geser_anggaran, nilai_pekerjaan, bulan, persen_realisasi, sisa_belum, rencana_program, sisa_rka,
        januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, estimasi_sisa')
        ->get()
        ->getResultArray(); // Menggunakan getResultArray() agar hasilnya dalam bentuk array asosiatif
        return $select;
        }
        public function getUniqueBeban()
    {
        $result = $this->select('beban')->distinct()->findAll();
        return array_column($result, 'beban');
    }

}

