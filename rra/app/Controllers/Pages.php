<?php

namespace App\Controllers;

use App\Models\AirportTechModel;
use App\Models\AkunUnitModal;
use App\Models\RkaModel;
use App\Models\AirsideModel;
use App\Models\RkaCobaModel;
use App\Models\AkunAirsideModel;
use App\Models\JenisModel;
use App\Models\JenisKontrakModel;
use App\Models\StatusModel;
use App\Models\BulanModel;
use App\Models\TahunModel;
use App\Models\AkunUnitModel;
use App\Models\BebanModel;
use App\Models\LandsideModel;
use App\Models\MechanicalModel;
use App\Models\ElectricalModel;
use App\Models\UnitModel;
use App\Models\RekapitulasiModel;
use App\Models\UsersModel;
//use App\Models\AirsideCobaModel;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Pages extends BaseController
{
    protected $rkaModel;
    protected $airsideModel;
    protected $rkacobaModel;
    protected $akunairsideModel;
    protected $jenisModel;
    protected $jeniskontrakModel;
    protected $statusModel;
    protected $bulanModel;
    protected $tahunModel;
    protected $akununitModel;
    protected $bebanModel;
    protected $unitModel;
    protected $rekapitulasiModel;
    protected $landsideModel;
    protected $electricalModel;
    protected $usersModel;

    public function __construct()
    {
        
        $this->airsideModel = new AirsideModel();
        $this->rkacobaModel = new RkaCobaModel();
        $this->akunairsideModel = new AkunAirsideModel();
        $this->jenisModel = new JenisModel();
        $this->jeniskontrakModel = new JenisKontrakModel();
        $this->statusModel = new StatusModel();
        $this->bulanModel = new BulanModel();
        $this->tahunModel = new TahunModel();
        $this->akununitModel = new AkunUnitModel();
        $this->bebanModel = new BebanModel();
        $this->unitModel = new UnitModel();
        $this->rekapitulasiModel = new RekapitulasiModel();
        $this->landsideModel = new LandsideModel();
        $this->electricalModel = new ElectricalModel();
        $this->usersModel = new UsersModel();
        //$this->airsidecobaModel = new AirsideCobaModel();
    }

    public function index()
{
    if(session('id_user')){
        $kelompok = session('kelompok');
        
        if ($kelompok == 'admin_airside') {
            return redirect()->to(site_url('pages/dashairside'));
        } elseif ($kelompok == 'admin_landside') {
            return redirect()->to(site_url('/dashlandside'));
        }elseif ($kelompok == 'admin_mechanical') {
            return redirect()->to(site_url('/pages/mechanical/dashmechanical'));
        }
    }
    return redirect()->to(site_url('pages/login'));
}

    public function dashutama()
    {
        $rekapDataModel = new RekapitulasiModel(); 
        $rekapData = $rekapDataModel->findAll(); // Ambil seluruh data rekap
    
        // Inisialisasi array untuk menyimpan total berdasarkan beban
        $totalsByBeban = [];
    
        // Loop melalui seluruh data rekap untuk menghitung total berdasarkan beban
        foreach ($rekapData as $row) {
            $beban = $row['beban'];
            
            // Periksa apakah beban sudah ada di dalam array total
            if (!isset($totalsByBeban[$beban])) {
                // Jika belum ada, inisialisasi total menjadi 0
                $totalsByBeban[$beban] = 0;
            }
            
            // Tambahkan nilai rka dan geser_anggaran ke total berdasarkan beban
            $totalsByBeban[$beban] += $row['rka'] + $row['geser_anggaran'];
        }
    
        // Menyiapkan data untuk dikirim ke view
        $data = [
            'title' => 'Dashboard Airside | RRA Angkasa Pura|Airports',
            'rekapData' => $rekapData,
            'totalsByBeban' => $totalsByBeban, // Menambahkan total berdasarkan beban ke data yang dikirim ke view
        ];
    
        // Debugging
        //dd($data);
        // Menampilkan view
        echo view('pages/dashutama', $data);
        echo view('layout/template');
    }
    

    public function rka()
    {
        $rka = $this->rkaModel->findAll();
        $data = [
            'title' => 'Rencana Kerja Anggaran | RRA Angkasa Pura|Airports',
            'rka' => $rka
        ];

        echo view('pages/rka', $data);
        echo view('layout/template');
    }
    //RKA COBA// 
    public function rkacoba()
    {
        $rkacoba = $this->rkacobaModel->findAll();
        $akununit = $this->akununitModel->findAll();
        $uniqueYears = $this->rkacobaModel->getUniqueYears();
        $uniqueAccount = $this->rkacobaModel->getUniqueAccount();

        $tahun = $this->request->getPost('tahunSelectMain'); 
        $gl_account = $this->request->getPost('accountSelectMain');

        if (empty($tahun)) {
            $tahun = 'all';
        }
        
        if (empty($gl_account)) {
            $gl_account = 'all';
        }
        if ($tahun == 'all' && $gl_account == 'all') {
            $rkacoba = $this->rkacobaModel->findAll();
            // Jika keduanya dipilih selain "Semua", terapkan filter
        } elseif ($tahun != 'all' && $gl_account != 'all') {
            // Jika keduanya dipilih sebagai "Semua", tampilkan semua data
            $rkacoba = $this->rkacobaModel->getDataByYearAndGLAccount($tahun, $gl_account);
        } elseif ($tahun == 'all' && $gl_account != 'all') {
            // Jika hanya GL account yang dipilih, terapkan filter berdasarkan GL account saja
            $rkacoba = $this->rkacobaModel->getDataByGLAccount($gl_account);
        } elseif ($tahun != 'all' && $gl_account == 'all') {
            // Jika hanya tahun yang dipilih, terapkan filter berdasarkan tahun saja
            $rkacoba = $this->rkacobaModel->getDataByYear($tahun);
        }
        
       
        $data = [
            'title' => 'Rencana Kerja Anggaran | RRA Angkasa Pura|Airports',
            'rkacoba' => $rkacoba, 
            'uniqueYears' => $uniqueYears,
            'uniqueAccount' => $uniqueAccount,
            'akununit' => $akununit,
            'tahun' => $tahun, 
            'gl_account' => $gl_account
            ];

        echo view('pages/rkacoba', $data);
        echo view('layout/template');
    }
    public function airside()
{
    
    $rkacoba = $this->rkacobaModel->findAll();
   // $akununit = $this->akununitModel->findAll();
    $airside = $this->airsideModel->findAll();
    $uniqueYears = $this->airsideModel->getUniqueYears();
    $uniqueAccount = $this->airsideModel->getUniqueAccount();
    $tahunFilter = $this->request->getPost();


    $tahun = $this->request->getPost('tahunSelectMain'); 
    $gl_account = $this->request->getPost('accountSelectMain');

    // Menetapkan kondisi awal
if (empty($tahun)) {
    $tahun = 'all';
}

if (empty($gl_account)) {
    $gl_account = 'all';
}
    if ($tahun == 'all' && $gl_account == 'all')
    {
    $airside = $this->airsideModel->findAll();
        // Jika keduanya dipilih selain "Semua", terapkan filter
    } elseif    ($tahun != 'all' && $gl_account != 'all')  {
        // Jika keduanya dipilih sebagai "Semua", tampilkan semua data
        $airside = $this->airsideModel->getDataByYearAndGLAccount($tahun, $gl_account);
    } elseif ($tahun == 'all' && $gl_account != 'all') {
        // Jika hanya GL account yang dipilih, terapkan filter berdasarkan GL account saja
        $airside = $this->airsideModel->getDataByGLAccount($gl_account);
    } elseif ($tahun != 'all' && $gl_account == 'all') {
        // Jika hanya tahun yang dipilih, terapkan filter berdasarkan tahun saja
        $airside = $this->airsideModel->getDataByYear($tahun);
    }
    


    foreach($airside as &$rc) {
        $totalRealisasi = $rc['januari'] + $rc['februari'] + $rc['maret'] + $rc['april'] + $rc['mei'] + $rc['juni'] + $rc['juli'] + $rc['agustus'] + $rc['september'] + $rc['oktober'] + $rc['november'] + $rc['desember'];
        $sisaBelum = ($rc['nilai_pekerjaan'] - $rc['realisasi']); 
        // Gunakan fungsi abs() untuk mendapatkan nilai absolut

        $sisaRka = ($rc['rka'] + $rc['geser']) - ($totalRealisasi+ $rc['nilai_program']);
        $updateData = [
            'realisasi' => $totalRealisasi,
            'sisa_belum' => $sisaBelum,
            'sisa_rka' => $sisaRka,
        ];
        
        $this->airsideModel->update($rc['id_airside'], $updateData);

        $rc['realisasi'] = number_format($totalRealisasi, 0, ',', '.');
        $rc['sisa_belum'] = number_format($sisaBelum, 0, ',', '.');
        $rc['sisa_rka'] = number_format($sisaRka, 0, ',', '.');
    }
    $this->airsideModel->deleteRecordsNotInRkacoba();
    $data = [
        'title' => 'Airside Facilities | RRA Angkasa Pura|Airports',
        'airside' => $airside, 
        'uniqueYears' => $uniqueYears,
        'uniqueAccount' => $uniqueAccount,
        //'akununit' => $akununit,
        'tahun' => $tahun, 
        'gl_account' => $gl_account
    ];

    echo view('pages/airside', $data);
    echo view('layout/template');
}
   
    //Untuk memasukkan excel ke tabel rka -------------------------------------------------------------------------//
    public function importexcel()
    {
        $file = $this->request->getFile('rka_excel');
        $extension = $file->getClientExtension();
    
        if ($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') {
            if ($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } elseif ($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } elseif ($extension == 'csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            }
    
            $spreadsheet = $reader->load($file);
            $data = $spreadsheet->getActiveSheet()->toArray();
    
            $columnMapping = [
                'Tahun' => 'tahun',
                'Kelompok' => 'unit',
                'Kode MA' => 'kode',
                'MA' => 'ma',
                'GL Account' => 'gl_account',
                'Keterangan' => 'keterangan',
                'Detail Program' => 'detail_program',
                'Qty' => 'qty',
                'Uom' => 'uom',
                'Satuan' => 'nilaisatuan',
                'Angka' => 'angka',
                'Jumlah' => 'jumlah',
                'Januari' => 'januari',
                'Februari' => 'februari',
                'Maret' => 'maret',
                'April' => 'april',
                'Mei' => 'mei',
                'Juni' => 'juni',
                'Juli' => 'juli',
                'Agustus' => 'agustus',
                'September' => 'september',
                'Oktober' => 'oktober',
                'November' => 'november',
                'Desember' => 'desember',
            ];
    
            $insertedData = []; // Inisialisasi array untuk menyimpan semua data yang baru saja dimasukkan
    
            foreach ($data as $key => $value) {
                if ($key == 0 || !array_filter($value)) {
                    continue; // Skip the header row or empty rows
                }
    
                $dataToInsert = [];
                foreach ($columnMapping as $excelColumn => $dbColumn) {
                    $excelValue = $value[array_search($excelColumn, $data[0])];
    
                    // Modifikasi untuk menangani nilai yang merupakan campuran antara angka dan teks
                    if ($excelColumn == 'Satuan' || $excelColumn == 'Angka' ||$excelColumn == 'Jumlah' || $excelColumn == 'Februari' || $excelColumn == 'Maret' || $excelColumn == 'April' || $excelColumn == 'Mei' || $excelColumn == 'Juni' || $excelColumn == 'Juli' || $excelColumn == 'Agustus' || $excelColumn == 'September' ||
                     $excelColumn == 'Oktober' || $excelColumn == 'November' || $excelColumn == 'Desember') {
                            $decimalPart = floatval('0.' . substr(strrchr($excelValue, '.'), 1));
                            $roundedValue = $decimalPart >= 0.5 ? ceil(floatval(str_replace(',', '', $excelValue))) : floor(floatval(str_replace(',', '', $excelValue)));
                            $dataToInsert[$dbColumn] = (int) $roundedValue;
                        // Check apakah nilai adalah angka
                    } else {
                        $dataToInsert[$dbColumn] = $excelValue;
                    }
                }
    
                // Melakukan insert data
                $newlyInsertedId = $this->rkacobaModel->insert($dataToInsert);
    
                // Menambahkan data ke dalam array
                $insertedData[] = $newlyInsertedId;
            } 
    
            $this->insertDataAirside($insertedData);
            $this->insertDataLandside($insertedData);
            $this->insertDataMechanical($insertedData);
            $this->insertDataElectrical($insertedData);
            $this->insertDataAirportTech($insertedData);
            
            return redirect()->back()->with('success', 'Data Berhasil Dimasukkan');
        } else {
            return redirect()->back()->with('error', 'Format File Tidak Sesuai');
        }
    }
    

// Untuk memasukkan data ke airside -------------------------------------------------------------------------------//
public function insertDataAirside($insertedData)
{
    $newDataRka = $this->rkacobaModel->find($insertedData);
    $dataToInsert = [];

    foreach ($newDataRka as $row) {
        if ($row['unit'] == 'AIRSIDE FACILITIES') {
            $akunUnitModel = new AkunUnitModel();
            $akunUnitData = $akunUnitModel->where('gl_account', $row['gl_account'])->first();
            
            if ($akunUnitData) {
                $idAkun = $akunUnitData['id_akun'];

                $unitModel = new UnitModel();
                $unitData = $unitModel->where('nama_unit', $row['unit'])->first();
                
                if ($unitData) {
                    $idUnit = $unitData['id_unit'];
                    $namaBeban = $akunUnitData['nama_beban'];
                    $namaBebanUnit = $namaBeban . " Airside Facilities";
                
                    $dataToInsert[] = [
                        'id_unit'         => $idUnit,
                        'id_rka'          => $row['id_rka'],
                        'tahun'           => $row['tahun'],
                        'unit'            => $row['unit'],
                        'gl_account'      => $row['gl_account'],
                        'id_akun'         => $idAkun,
                        'detail_program'  => $row['detail_program'],
                        'rka'             => $row['jumlah'],
                        'beban'           => $namaBebanUnit,
                    ];
                }
                
            }
        }
    }

    $airsideModel = new AirsideModel();

    foreach ($dataToInsert as $data) {
        $existingData = $airsideModel->where('id_rka', $data['id_rka'])->first();

        if (!$existingData) {
            $airsideModel->insert($data);
        } else {
            // Jika data sudah ada, lakukan update jika diperlukan
            // $airsideModel->update($existingData['id'], $data);
        }
    }
}
public function insertDataLandside($insertedData)
{
    $newDataRka = $this->rkacobaModel->find($insertedData);
    $dataToInsert = [];

    foreach ($newDataRka as $row) {
        if ($row['unit'] == 'LANDSIDE FACILITIES') {
            $akunUnitModel = new AkunUnitModel();
            $akunUnitData = $akunUnitModel->where('gl_account', $row['gl_account'])->first();
            
            if ($akunUnitData) {
                $idAkun = $akunUnitData['id_akun'];

                // Hapus pencarian data unit karena sudah dipastikan 'LANDSIDE FACILITIES'
                $idUnit = 2; // Ganti dengan ID unit landside yang sesuai

                $namaBeban = $akunUnitData['nama_beban'];
                $namaBebanUnit = $namaBeban . " Landside Facilities";

                $dataToInsert[] = [
                    'id_unit'         => $idUnit,
                    'id_rka'          => $row['id_rka'],
                    'tahun'           => $row['tahun'],
                    'unit'            => $row['unit'],
                    'gl_account'      => $row['gl_account'],
                    'id_akun'         => $idAkun,
                    'detail_program'  => $row['detail_program'],
                    'rka'             => $row['jumlah'],
                    'beban'           => $namaBebanUnit,
                ];
            }
        } else {
            // Jangan cetak pesan di sini, cukup lewati
            continue;
        }
    }

    $landsideModel = new LandsideModel();

    foreach ($dataToInsert as $data) {
        try {
            $existingData = $landsideModel->where('id_rka', $data['id_rka'])->first();

            if (!$existingData) {
                $landsideModel->insert($data);
            } else {
                // Lakukan sesuatu jika data sudah ada, misalnya lakukan update
            }
        } catch (\Exception $e) {
            // Alirkan pesan kesalahan ke log atau sistem pemantauan yang sesuai
            log_message('error', 'Error: ' . $e->getMessage());
        }
    }
}
public function insertDataElectrical($insertedData)
{
    $newDataRka = $this->rkacobaModel->find($insertedData);
    $dataToInsert = [];

    foreach ($newDataRka as $row) {
        if ($row['unit'] == 'EQUIPMENT-ELECTRICAL') {
            $akunUnitModel = new AkunUnitModel();
            $akunUnitData = $akunUnitModel->where('gl_account', $row['gl_account'])->first();
            
            if ($akunUnitData) {
                $idAkun = $akunUnitData['id_akun'];

                // Hapus pencarian data unit karena sudah dipastikan 'LANDSIDE FACILITIES'
                $idUnit = 4; // Ganti dengan ID unit landside yang sesuai

                $namaBeban = $akunUnitData['nama_beban'];
                $namaBebanUnit = $namaBeban . " Electrical Facilities";

                $dataToInsert[] = [
                    'id_unit'         => $idUnit,
                    'id_rka'          => $row['id_rka'],
                    'tahun'           => $row['tahun'],
                    'unit'            => $row['unit'],
                    'gl_account'      => $row['gl_account'],
                    'id_akun'         => $idAkun,
                    'detail_program'  => $row['detail_program'],
                    'rka'             => $row['jumlah'],
                    'beban'           => $namaBebanUnit,
                ];
            }
        } else {
            // Jangan cetak pesan di sini, cukup lewati
            continue;
        }
    }

    $electricalModel = new ElectricalModel();

    foreach ($dataToInsert as $data) {
        try {
            $existingData = $electricalModel->where('id_rka', $data['id_rka'])->first();

            if (!$existingData) {
                $electricalModel->insert($data);
            } else {
                // Lakukan sesuatu jika data sudah ada, misalnya lakukan update
            }
        } catch (\Exception $e) {
            // Alirkan pesan kesalahan ke log atau sistem pemantauan yang sesuai
            log_message('error', 'Error: ' . $e->getMessage());
        }
    }
}
public function insertDataMechanical($insertedData)
{
    $newDataRka = $this->rkacobaModel->find($insertedData);
    $dataToInsert = [];

    foreach ($newDataRka as $row) {
        if ($row['unit'] == 'EQUIPMENT-MECHANICAL') {
            $akunUnitModel = new AkunUnitModel();
            $akunUnitData = $akunUnitModel->where('gl_account', $row['gl_account'])->first();
            
            if ($akunUnitData) {
                $idAkun = $akunUnitData['id_akun'];

                // Hapus pencarian data unit karena sudah dipastikan 'LANDSIDE FACILITIES'
                $idUnit = 3; // Ganti dengan ID unit landside yang sesuai

                $namaBeban = $akunUnitData['nama_beban'];
                $namaBebanUnit = $namaBeban . " Landside Facilities";

                $dataToInsert[] = [
                    'id_unit'         => $idUnit,
                    'id_rka'          => $row['id_rka'],
                    'tahun'           => $row['tahun'],
                    'unit'            => $row['unit'],
                    'gl_account'      => $row['gl_account'],
                    'id_akun'         => $idAkun,
                    'detail_program'  => $row['detail_program'],
                    'rka'             => $row['jumlah'],
                    'beban'           => $namaBebanUnit,
                ];
            }
        } else {
            // Jangan cetak pesan di sini, cukup lewati
            continue;
        }
    }

    $mechanicalModel = new MechanicalModel();

    foreach ($dataToInsert as $data) {
        try {
            $existingData = $mechanicalModel->where('id_rka', $data['id_rka'])->first();

            if (!$existingData) {
                $mechanicalModel->insert($data);
            } else {
                // Lakukan sesuatu jika data sudah ada, misalnya lakukan update
            }
        } catch (\Exception $e) {
            // Alirkan pesan kesalahan ke log atau sistem pemantauan yang sesuai
            log_message('error', 'Error: ' . $e->getMessage());
        }
    }
}
public function insertDataAirportTech($insertedData)
{
    $newDataRka = $this->rkacobaModel->find($insertedData);
    $dataToInsert = [];

    foreach ($newDataRka as $row) {
        if ($row['unit'] == 'AIRPORT TECHNOLOGY') {
            $akunUnitModel = new AkunUnitModel();
            $akunUnitData = $akunUnitModel->where('gl_account', $row['gl_account'])->first();
            
            if ($akunUnitData) {
                $idAkun = $akunUnitData['id_akun'];

                // Hapus pencarian data unit karena sudah dipastikan 'LANDSIDE FACILITIES'
                $idUnit = 5; // Ganti dengan ID unit landside yang sesuai

                $namaBeban = $akunUnitData['nama_beban'];
                $namaBebanUnit = $namaBeban . " Airport Technology";

                $dataToInsert[] = [
                    'id_unit'         => $idUnit,
                    'id_rka'          => $row['id_rka'],
                    'tahun'           => $row['tahun'],
                    'unit'            => $row['unit'],
                    'gl_account'      => $row['gl_account'],
                    'id_akun'         => $idAkun,
                    'detail_program'  => $row['detail_program'],
                    'rka'             => $row['jumlah'],
                    'beban'           => $namaBebanUnit,
                ];
            }
        } else {
            // Jangan cetak pesan di sini, cukup lewati
            continue;
        }
    }

    $airporttechModel = new AirportTechModel();

    foreach ($dataToInsert as $data) {
        try {
            $existingData = $airporttechModel->where('id_rka', $data['id_rka'])->first();

            if (!$existingData) {
                $airporttechModel->insert($data);
            } else {
                // Lakukan sesuatu jika data sudah ada, misalnya lakukan update
            }
        } catch (\Exception $e) {
            // Alirkan pesan kesalahan ke log atau sistem pemantauan yang sesuai
            log_message('error', 'Error: ' . $e->getMessage());
        }
    }
}
public function addairside()
{
    $akununit = $this->akununitModel->findAll();
    $jenis = $this->jenisModel->findAll();
    $jeniskontrak = $this->jeniskontrakModel->findAll();
    $status = $this->statusModel->findAll();
    $bulan = $this->bulanModel->findAll();
    $tahun = $this->tahunModel->findAll();
    $uniqueYears = $this->airsideModel->getUniqueYears();
    $uniqueAccount = $this->airsideModel->getUniqueAccount();
   
    $data = [
        'title' => 'Add Airside Facilities | RRA Angkasa Pura|Airports',
        'akununit' => $akununit, 
        'jenis' => $jenis,
        'jeniskontrak' => $jeniskontrak,  
        'status' => $status,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'uniqueYears' => $uniqueYears,
        'uniqueAccount' => $uniqueAccount,
     ];

    echo view('pages/addairside', $data);
    echo view('layout/template');
}
    public function deleteAirside($id_airside){
        $this->airsideModel->delete($id_airside);
        return redirect()->to('/pages/airside')->with('success', 'Data Berhasil Dihapus');
    }
    public function saveAirside(){
        $tahun = $this->request->getPost('tahun');
        $akununit = $this->request->getPost('nama_gl');
        $jenis = $this->request->getPost('jenis');
        $jeniskontrak = $this->request->getPost('jenis_kontrak');
        $status = $this->request->getPost('status');
        $namaprogram = $this->request->getPost('nama_program');
        $nilaipekerjaan = $this->request->getPost('nilai_pekerjaan');
        $nilaiprogram = $this->request->getPost('nilai_program');
        $geseran = $this->request->getPost('geser');
        $januari = $this->request->getPost('januariText');
        $februari = $this->request->getPost('februariText');
        $maret = $this->request->getPost('maretText');
        $april = $this->request->getPost('aprilText');
        $mei = $this->request->getPost('meiText');
        $juni = $this->request->getPost('juniText');
        $juli = $this->request->getPost('juliText');
        $agustus = $this->request->getPost('agustusText');
        $september = $this->request->getPost('septemberText');
        
        $oktober = $this->request->getPost('oktoberText');
        $november = $this->request->getPost('novemberText');
        $desember = $this->request->getPost('desemberText');
        $keterangan = $this->request->getPost('keterangan');
    
        // Mendapatkan id_akun dari model AkunUnitModel berdasarkan gl_account
        $akunUnitModel = new AkunUnitModel();
        $akunUnitData = $akunUnitModel->where('gl_account', $akununit)->first();
        
        if (!$akunUnitData) {
            // Handle jika gl_account tidak ditemukan
            return redirect()->to('/pages/airside')->with('error', 'Akun Unit tidak ditemukan untuk GL Account ini');
        }
    
        $idAkun = $akunUnitData['id_akun'];
        $namaBeban = $akunUnitModel->select('nama_beban')->where('id_akun', $idAkun)->first()['nama_beban'];
        $namaBebanUnit = $namaBeban . " Airside Facilities";

    // Mendapatkan data unit dari model UnitModel berdasarkan id_unit
        $unitModel = new UnitModel();
        $defaultUnitData = $unitModel->find(1);

        if (!$defaultUnitData) {
            // Handle jika default unit tidak ditemukan
            return redirect()->to('/pages/airside')->with('error', 'Default Unit tidak ditemukan');
        }
        $namaUnit = $defaultUnitData['nama_unit'];
        // untuk disimpan ke database
        $data = [
            'tahun' => $tahun,
            'unit'=> $namaUnit,
            'id_unit' =>$defaultUnitData['id_unit'],
            'gl_account' => $akununit,
            'id_akun' => $idAkun,  // Menambah kolom id_akun
            'jenis' => $jenis,
            'jeniskontrak' => $jeniskontrak,
            'status' => $status,
            'detail_program' => $namaprogram,
            'geser' => $geseran,
            'nilai_pekerjaan' => $nilaipekerjaan,
            'nilai_program' => $nilaiprogram,
            'januari' => $januari,
            'februari' => $februari,
            'maret' => $maret,
            'april' => $april,
            'mei' => $mei,
            'juni' => $juni, 
            'juli' => $juli, 
            'agustus' => $agustus, 
            'september' => $september,
            'oktober' => $oktober, 
            'november' => $november,
            'desember' => $desember,
            'keterangan' => $keterangan,
            'beban' => $namaBebanUnit,
        ];
     
        $this->airsideModel->insert($data); 
        return redirect()->to('/pages/airside')->with('success', 'Data Berhasil Disimpan');
    }
    
public function editAirside($id_airside){
    $airside = $this->airsideModel->findAll();
    $akununit = $this->akununitModel->findAll();
    $jenis = $this->jenisModel->findAll();
    $jeniskontrak = $this->jeniskontrakModel->findAll();
    $status = $this->statusModel->findAll();
    $bulan = $this->bulanModel->findAll();
    $tahun = $this->tahunModel->findAll();

    $data['editairside'] = $this->airsideModel->find($id_airside);

    $data = [
        'title' => 'Edit Airside Facilities | RRA Angkasa Pura|Airports',
        'airside' => $airside,
        'akununit' => $akununit, 
        'jenis' => $jenis,
        'jeniskontrak' => $jeniskontrak,  
        'status' => $status,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'editairside' => $data['editairside'],

     ];
     echo view('pages/editairside', $data);
     echo view('layout/template');
}
public function updateAirside($id_airside)
{
    //$id = $this->request->getPost('id_airside');
    $tahun = $this->request->getPost('tahun');
    $gl_account = $this->request->getPost('nama_gl');
    $jenis = $this->request->getPost('jenis');
    $jeniskontrak = $this->request->getPost('jenis_kontrak');
    $status = $this->request->getPost('status');
    $namaprogram = $this->request->getPost('nama_program');
    $nilaipekerjaan = $this->request->getPost('nilai_pekerjaan');
    $nilaiprogram = $this->request->getPost('nilai_program');
    $geseran = $this->request->getPost('geser');
    $januari = $this->request->getPost('januariText');
    $februari = $this->request->getPost('februariText');
    $maret = $this->request->getPost('maretText');
    $april = $this->request->getPost('aprilText');
    $mei = $this->request->getPost('meiText');
    $juni = $this->request->getPost('juniText');
    $juli = $this->request->getPost('juliText');
    $agustus = $this->request->getPost('agustusText');
    $september = $this->request->getPost('septemberText');
    $oktober = $this->request->getPost('oktoberText');
    $november = $this->request->getPost('novemberText');
    $desember = $this->request->getPost('desemberText');
    $keterangan = $this->request->getPost('keterangan');

    $akunUnitModel = new AkunUnitModel();
    $akunUnitData = $akunUnitModel->where('gl_account', $gl_account)->first();
    
    if (!$akunUnitData) {
        // Handle jika gl_account tidak ditemukan
        return redirect()->to('/pages/airside')->with('error', 'Akun Unit tidak ditemukan untuk GL Account ini');
    }

    $idAkun = $akunUnitData['id_akun'];
    $namaBeban = $akunUnitModel->select('nama_beban')->where('id_akun', $idAkun)->first()['nama_beban'];
    $namaBebanUnit = $namaBeban . " Airside Facilities";

    $unitModel = new UnitModel();
    $defaultUnitData = $unitModel->find(1);

    if (!$defaultUnitData) {
        // Handle jika default unit tidak ditemukan
        return redirect()->to('/pages/airside')->with('error', 'Default Unit tidak ditemukan');
    }
    $idUnit = $defaultUnitData['id_unit'];
    $namaUnit = $defaultUnitData['nama_unit'];

    // Pastikan ID tidak NULL dan data ada dalam database
    if (!empty($id_airside) && $this->airsideModel->find($id_airside)) {
        // untuk disimpan ke database
        $data = [
            'tahun' => $tahun,
            'id_unit' => $idUnit,
            'id_akun' => $idAkun,  
            'unit' => $namaUnit,
            'gl_account' => $gl_account,
            'jenis' => $jenis,
            'jeniskontrak' => $jeniskontrak,
            'status' => $status,
            'detail_program' => $namaprogram,
            'geser' => $geseran,
            'nilai_pekerjaan' => $nilaipekerjaan,
            'nilai_program' => $nilaiprogram,
            'januari' => $januari,
            'februari' => $februari,
            'maret' => $maret,
            'april' => $april,
            'mei' => $mei,
            'juni' => $juni,
            'juli' => $juli,
            'agustus' => $agustus,
            'september' => $september,
            'oktober' => $oktober,
            'november' => $november,
            'desember' => $desember,
            'keterangan' => $keterangan,
            'beban' => $namaBebanUnit,
        ];

        $this->airsideModel->update($id_airside, $data);
        return redirect()->to('/pages/airside')->with('success', 'Perubahan Data Berhasil Disimpan');
    } else {
        return redirect()->to('/pages/airside')->with('error', 'Gagal mengupdate data');
    }
}
public function glAccount(){
    $validation = \Config\Services::validation();
    $akununit = $this->akununitModel->findAll();
    $data = [
        'title' => 'List GL Account',
        'akununit' => $akununit,
        'validation' => $validation
    ];

    echo view('pages/list_gl_account', $data);
    echo view('layout/template');
}

public function saveAccount(){
    // Mendapatkan data dari request
    $kode = $this->request->getPost('kode'); 
    $nama = $this->request->getPost('namaakun'); 
    $beban = $this->request->getPost('beban'); 
    
    // Validasi apakah kode sudah ada di database
    $existing_akun = $this->akununitModel->where('kode', $kode)->first();
    if (!empty($existing_akun)) {
        // Jika kode sudah ada, tampilkan pesan error
        return redirect()->to('pages/akun')->with('error', 'Gagal menambahkan data. Kode sudah digunakan oleh data lain.');
    }

    // Validasi apakah namaakun sudah ada di database
    $existing_namaakun = $this->akununitModel->where('nama', $nama)->first();
    if (!empty($existing_namaakun)) {
        // Jika namaakun sudah ada, tampilkan pesan error
        return redirect()->to('pages/akun')->with('error', 'Gagal menambahkan data. Nama akun sudah digunakan oleh data lain.');
    }

    // Data yang akan disimpan
    $data=[
        'kode' => $kode, 
        'nama' => $nama,
        'gl_account' => $kode.'-'.$nama,
        'nama_beban' => $beban,
    ];

    // Melakukan penambahan data baru
    $this->akununitModel->insert($data); 

    // Redirect dengan pesan sukses
    return redirect()->to('pages/akun')->with('success', 'Data Berhasil Disimpan');
}



public function deleteAccount($id_akun){
    $this->akununitModel->delete($id_akun);
    return redirect()->to('pages/akun')->with('success', 'Data Berhasil Dihapus');
}
public function editAccount($id_akun){
    $akununit = $this->akununitModel->findAll();

    $data['editakun'] = $this->akununitModel->find($id_akun);

    $data = [
        'title' => 'Edit GL Account | RRA Angkasa Pura|Airports',
        'akununit' => $akununit,
        'editakun' => $data['editakun'],
    ];

    echo view('pages/list_gl_account', $data);
    echo view('layout/template');
}

public function updateAccount($id_akun){
    // Mendapatkan data akun yang akan diupdate
    $akununit = $this->akununitModel->find($id_akun);

    // Mendapatkan data dari request
    $id = $this->request->getPost('id_akun');
    $kode_baru = $this->request->getPost('kode');
    $nama = $this->request->getPost('namaakun'); 
    $beban = $this->request->getPost('beban'); 

    // Jika data akun dengan ID yang dimaksud ditemukan
    if (!empty($akununit)) {
        // Validasi hanya jika kode baru tidak sama dengan kode lama
        if ($kode_baru !== $akununit['kode']) {
            // Lakukan pencarian data berdasarkan kode baru
            $existing_akun = $this->akununitModel->where('kode', $kode_baru)->first();

            // Jika ada data dengan kode yang sama dan ID yang berbeda
            if (!empty($existing_akun) && $existing_akun['id_akun'] != $id_akun) {
                return redirect()->to('/pages/akun')->with('error', 'Gagal mengupdate data. Kode sudah digunakan oleh data lain.');
            }
        }

        // Validasi apakah namaakun sudah ada di database
        $existing_namaakun = $this->akununitModel->where('nama', $nama)->first();
        if (!empty($existing_namaakun) && $existing_namaakun['id_akun'] != $id_akun) {
            return redirect()->to('/pages/akun')->with('error', 'Gagal mengupdate data. Nama akun sudah digunakan oleh data lain.');
        }

        // Data yang akan diupdate
        $data = [
            'kode' => $kode_baru, 
            'nama' => $nama,
            'gl_account' => $kode_baru.'-'.$nama,
            'nama_beban' => $beban,
        ];

        // Melakukan update data
        $this->akununitModel->update($id_akun, $data);
        
        // Redirect dengan pesan sukses
        return redirect()->to('/pages/akun')->with('success', 'Perubahan Data Berhasil Disimpan');
    } else {
        // Jika data dengan ID yang dimaksud tidak ditemukan
        return redirect()->to('/pages/akun')->with('error', 'Gagal mengupdate data. ID tidak valid atau data tidak ditemukan.');
    }
}


public function rekapitulasi()
{
    $rekapitulasiModel = new RekapitulasiModel(); 

    $rekapitulasiModel->fillRekapitulasi();
    
    $rekapitulasiData = $rekapitulasiModel->findAll();

  
    $gl_account = [];
    $unit = [];

    foreach ($rekapitulasiData as $row) {
        // Perhatikan bahwa kita menggunakan $row['id_akun'] alih-alih $row->id_akun
        $gl_account[$row['id_akun']] = $rekapitulasiModel->getGlAccountByIdAkun($row['id_akun']);
        $unit[$row['id_unit']] = $rekapitulasiModel->getUnitbyIdunit($row['id_unit']);

    }

    $data = [
        'title' => 'Rekapitulasi Data | RRA Angkasa Pura | Airports', 
        'rekapitulasi' => $rekapitulasiData,
        'gl_account' => $gl_account,
        'unit' =>  $unit,
    ];

    echo view('pages/rekapitulasi', $data); // Sesuaikan dengan nama view yang Anda gunakan
    echo view('layout/template'); // Sesuaikan dengan nama layout/template yang Anda gunakan
}
public function dashAirside()
{
    $rekapDataModel = new RekapitulasiModel(); 
    $rekapData = $rekapDataModel->where('id_unit', 1)->findAll();
    $jenisValues = $rekapDataModel->getAllJenisAirside();
    $jeniskontrakValues = $rekapDataModel->getAllJenisKontrakAirside();
    $statusValues = $rekapDataModel->getAllStatusAirside();
    $rrbulanan = $rekapDataModel->getRRAirside();


    $gl_account = [];

    // Menghitung total nilai realisasi
    $totalRealisasi = 0.0;
    $totalsisaRka = 0.0;
    $totalEstimasi = 0.0;
    $totalnilaiPekerjaan = 0.0;
    $totalAnggaran = 0.0;
    $totalProgram = 0.0;
    $categories = array_keys($rrbulanan);
    $rencanaData = array_column($rrbulanan, 'rencana');
    $realisasiData = array_column($rrbulanan, 'realisasi');

  
    

    foreach ($rekapData as $row) {
        // Memanggil fungsi getGlAccountByIdAkun dari model
       $gl_account[$row['id_akun']] = $rekapDataModel->getGlAccountByIdAkun($row['id_akun']);
       $totalRealisasi += $row['bulan'];
       $totalsisaRka += $row['sisa_rka'];
       $totalEstimasi += $row['estimasi_sisa'];
       $totalnilaiPekerjaan += $row['rka'];
       $totalAnggaran += $row['rka'] + $row['geser_anggaran'];
       $totalProgram += $row['rencana_program'];
      
    

        // Tambahkan informasi ke array dataForChart
        $glAccountKey = key($gl_account[$row['id_akun']]);
        $glAccountData = $gl_account[$row['id_akun']][$glAccountKey]['gl_account'];
        $totalAnggaranPerId = $row['rka'] + $row['geser_anggaran'];
        $totalSisaPerId =  $row['sisa_rka'];
        $totalRealisasiPerId =  $row['bulan'] + $row['rencana_program'];

        $dataForChart[] = [
            'id_akun' => $row['id_akun'],
            'glAccountData' => $glAccountData,
            'totalAnggaranPerId' => $totalAnggaranPerId,
            'totalSisaPerId' => $totalSisaPerId , 
            'totalRealisasiPerId' =>$totalRealisasiPerId
            
            // Tambahkan data lain yang diperlukan
        ];
    }
    //dd($dataForChart);
    $totalPengeluaran =  $totalRealisasi + $totalProgram ;
    // Calculate the percentage of realisasi
    $persentaseTotalAnggaran = ($totalAnggaran / $totalAnggaran) * 100;

    $persentaseRealisasi = ($totalPengeluaran / $totalAnggaran) * 100;

    // Calculate the percentage of sisa anggaran
    $persentaseSisaAnggaran = ($totalsisaRka / $totalAnggaran) * 100;

    // Verify that the total percentage is 100%
    $totalPercentage = $persentaseRealisasi + $persentaseSisaAnggaran;

    // Menyiapkan data untuk dikirim ke view
    $data = [
        'title' => 'Dashboard Airside | RRA Angkasa Pura|Airports',
        'rekapData' => $rekapData,
        'gl_account' => $gl_account, // Menambahkan gl_account ke data yang dikirim ke view
        'totalRealisasi' => $totalRealisasi,
        'totalsisaRka' => $totalsisaRka,
        'totalEstimasi' => $totalEstimasi,
        'totalnilaiPekerjaan'=> $totalnilaiPekerjaan, 
        'persentaseRealisasi' => $persentaseRealisasi,
        'persentaseSisaAnggaran' => $persentaseSisaAnggaran,
        'persentaseTotalAnggaran' =>  $persentaseTotalAnggaran,
        'totalPercentage' => $totalPercentage,
        'totalAnggaran' => $totalAnggaran, 
        'totalPengeluaran' =>  $totalPengeluaran,// Menambahkan totalPercentage ke data yang dikirim ke view
        'dataForChart' => $dataForChart,
        'jenisValues' => $jenisValues ,
        'jeniskontrakValues' => $jeniskontrakValues,
        'statusValues' =>  $statusValues ,
        'rrbulanan' =>  $rrbulanan, 
        'categories' => $categories,
        'rencanaData' => $rencanaData,
        'realisasiData' => $realisasiData,

    ];
//dd($data);

    // Menampilkan view
    echo view('pages/dash-airside', $data);
    echo view('layout/template');
}
public function dashAirsideGM()
{
    $rekapDataModel = new RekapitulasiModel(); 
    $rekapData = $rekapDataModel->where('id_unit', 1)->findAll();
    $jenisValues = $rekapDataModel->getAllJenisAirside();
    $jeniskontrakValues = $rekapDataModel->getAllJenisKontrakAirside();
    $statusValues = $rekapDataModel->getAllStatusAirside();
    $rrbulanan = $rekapDataModel->getRRAirside();


    $gl_account = [];

    // Menghitung total nilai realisasi
    $totalRealisasi = 0.0;
    $totalsisaRka = 0.0;
    $totalEstimasi = 0.0;
    $totalnilaiPekerjaan = 0.0;
    $totalAnggaran = 0.0;
    $totalProgram = 0.0;
    $categories = array_keys($rrbulanan);
    $rencanaData = array_column($rrbulanan, 'rencana');
    $realisasiData = array_column($rrbulanan, 'realisasi');

  
    

    foreach ($rekapData as $row) {
        // Memanggil fungsi getGlAccountByIdAkun dari model
       $gl_account[$row['id_akun']] = $rekapDataModel->getGlAccountByIdAkun($row['id_akun']);
       $totalRealisasi += $row['bulan'];
       $totalsisaRka += $row['sisa_rka'];
       $totalEstimasi += $row['estimasi_sisa'];
       $totalnilaiPekerjaan += $row['rka'];
       $totalAnggaran += $row['rka'] + $row['geser_anggaran'];
       $totalProgram += $row['rencana_program'];
      
    

        // Tambahkan informasi ke array dataForChart
        $glAccountKey = key($gl_account[$row['id_akun']]);
        $glAccountData = $gl_account[$row['id_akun']][$glAccountKey]['gl_account'];
        $totalAnggaranPerId = $row['rka'] + $row['geser_anggaran'];
        $totalSisaPerId =  $row['sisa_rka'];
        $totalRealisasiPerId =  $row['bulan'] + $row['rencana_program'];

        $dataForChart[] = [
            'id_akun' => $row['id_akun'],
            'glAccountData' => $glAccountData,
            'totalAnggaranPerId' => $totalAnggaranPerId,
            'totalSisaPerId' => $totalSisaPerId , 
            'totalRealisasiPerId' =>$totalRealisasiPerId
            
            // Tambahkan data lain yang diperlukan
        ];
    }
    //dd($dataForChart);
    $totalPengeluaran =  $totalRealisasi + $totalProgram ;
    // Calculate the percentage of realisasi
    $persentaseTotalAnggaran = ($totalAnggaran / $totalAnggaran) * 100;

    $persentaseRealisasi = ($totalPengeluaran / $totalAnggaran) * 100;

    // Calculate the percentage of sisa anggaran
    $persentaseSisaAnggaran = ($totalsisaRka / $totalAnggaran) * 100;

    // Verify that the total percentage is 100%
    $totalPercentage = $persentaseRealisasi + $persentaseSisaAnggaran;

    // Menyiapkan data untuk dikirim ke view
    $data = [
        'title' => 'Dashboard Airside | RRA Angkasa Pura|Airports',
        'rekapData' => $rekapData,
        'gl_account' => $gl_account, // Menambahkan gl_account ke data yang dikirim ke view
        'totalRealisasi' => $totalRealisasi,
        'totalsisaRka' => $totalsisaRka,
        'totalEstimasi' => $totalEstimasi,
        'totalnilaiPekerjaan'=> $totalnilaiPekerjaan, 
        'persentaseRealisasi' => $persentaseRealisasi,
        'persentaseSisaAnggaran' => $persentaseSisaAnggaran,
        'persentaseTotalAnggaran' =>  $persentaseTotalAnggaran,
        'totalPercentage' => $totalPercentage,
        'totalAnggaran' => $totalAnggaran, 
        'totalPengeluaran' =>  $totalPengeluaran,// Menambahkan totalPercentage ke data yang dikirim ke view
        'dataForChart' => $dataForChart,
        'jenisValues' => $jenisValues ,
        'jeniskontrakValues' => $jeniskontrakValues,
        'statusValues' =>  $statusValues ,
        'rrbulanan' =>  $rrbulanan, 
        'categories' => $categories,
        'rencanaData' => $rencanaData,
        'realisasiData' => $realisasiData,

    ];
//dd($data);

    // Menampilkan view
    echo view('pages/dash-airside-gm', $data);
    echo view('layout/header-gm');
}


// EXPORT EXCEL AIRSIDE 
public function exportExcel() {
    $airside  = $this->airsideModel->getExportExcel();
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet(); 
    $sheet->setCellValue('A1','No');
    $sheet->setCellValue('B1','Tahun');
    $sheet->setCellValue('C1','Unit');
    $sheet->setCellValue('D1','GL Account');
    $sheet->setCellValue('E1','Jenis');
    $sheet->setCellValue('F1','Jenis Kontrak');
    $sheet->setCellValue('G1','Status');
    $sheet->setCellValue('H1','Detail Program');
    $sheet->setCellValue('I1','RKA');
    $sheet->setCellValue('J1','Geser Anggaran');
    $sheet->setCellValue('K1','Nilai Pekerjaan');
    $sheet->setCellValue('L1','Realisasi');
    $sheet->setCellValue('M1','Sisa Belum');
    $sheet->setCellValue('N1','Nilai Program');
    $sheet->setCellValue('O1','Sisa RKA');
    $sheet->setCellValue('P1','Keterangan');
    $sheet->setCellValue('Q1','Januari');
    $sheet->setCellValue('R1','Februari');
    $sheet->setCellValue('S1','Maret');
    $sheet->setCellValue('T1','April');
    $sheet->setCellValue('U1','Mei');
    $sheet->setCellValue('V1','Juni');
    $sheet->setCellValue('W1','Juli');
    $sheet->setCellValue('X1','Agustus');
    $sheet->setCellValue('Y1','September');
    $sheet->setCellValue('Z1','Oktober');
    $sheet->setCellValue('AA1','November');
    $sheet->setCellValue('AB1','Desember');

    $column = 2; 
    foreach ($airside as $key => $value){
        $sheet->setCellValue('A'.$column, ($column-1)); 
        $sheet->setCellValue('B'.$column,$value['tahun']);
        $sheet->setCellValue('C'.$column,$value['unit']); 
        $sheet->setCellValue('D'.$column,$value['gl_account']);
        $sheet->setCellValue('E'.$column,$value['jenis']); 
        $sheet->setCellValue('F'.$column,$value['jeniskontrak']); 
        $sheet->setCellValue('G'.$column,$value['status']);  
        $sheet->setCellValue('H'.$column,$value['detail_program']);
        $sheet->setCellValue('I'.$column,'Rp'.number_format($value['rka'], 0, ',', '.')); 
        $sheet->setCellValue('J'.$column,'Rp'.number_format($value['geser'], 0, ',', '.'));
        $sheet->setCellValue('K'.$column,'Rp '.number_format($value['nilai_pekerjaan'], 0, ',', '.'));
        $sheet->setCellValue('L'.$column,'Rp '.number_format($value['realisasi'], 0, ',', '.'));
        $sheet->setCellValue('M'.$column,'Rp '.number_format($value['sisa_belum'], 0, ',', '.'));
        $sheet->setCellValue('N'.$column,'Rp '.number_format($value['nilai_program'], 0, ',', '.'));
        $sheet->setCellValue('O'.$column,'Rp '.number_format($value['sisa_rka'], 0, ',', '.'));
        $sheet->setCellValue('P'.$column,$value['keterangan']);
        $sheet->setCellValue('Q'.$column,'Rp '.number_format($value['januari'], 0, ',', '.'));
        $sheet->setCellValue('R'.$column,'Rp '.number_format($value['februari'], 0, ',', '.'));
        $sheet->setCellValue('S'.$column,'Rp '.number_format($value['maret'], 0, ',', '.'));
        $sheet->setCellValue('T'.$column,'Rp '.number_format($value['april'], 0, ',', '.'));
        $sheet->setCellValue('U'.$column,'Rp '.number_format($value['mei'], 0, ',', '.'));
        $sheet->setCellValue('V'.$column,'Rp '.number_format($value['juni'], 0, ',', '.'));
        $sheet->setCellValue('W'.$column,'Rp '.number_format($value['juli'], 0, ',', '.'));
        $sheet->setCellValue('X'.$column,'Rp '.number_format($value['agustus'], 0, ',', '.'));
        $sheet->setCellValue('Y'.$column,'Rp '.number_format($value['september'], 0, ',', '.'));
        $sheet->setCellValue('Z'.$column,'Rp '.number_format($value['oktober'], 0, ',', '.'));
        $sheet->setCellValue('AA'.$column,'Rp '.number_format($value['november'], 0, ',', '.'));
        $sheet->setCellValue('AB'.$column,'Rp '.number_format($value['desember'], 0, ',', '.'));
        $column++;
    }

 // Mengatur gaya teks
$sheet->getStyle('A1:AB1')->getFont()->setBold(true);
// Mengatur warna teks menjadi putih
$sheet->getStyle('A1:AB1')->getFont()->setColor(
    new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE)
);

// Mengatur gaya warna latar belakang
$sheet->getStyle('A1:AB1')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('4985BB');

    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);
    $sheet->getColumnDimension('D')->setAutoSize(true);
    $sheet->getColumnDimension('E')->setAutoSize(true);
    $sheet->getColumnDimension('F')->setAutoSize(true);
    $sheet->getColumnDimension('G')->setAutoSize(true);
    $sheet->getColumnDimension('H')->setAutoSize(true);
    $sheet->getColumnDimension('I')->setAutoSize(true);
    $sheet->getColumnDimension('J')->setAutoSize(true);
    $sheet->getColumnDimension('K')->setAutoSize(true);
    $sheet->getColumnDimension('L')->setAutoSize(true);
    $sheet->getColumnDimension('M')->setAutoSize(true);
    $sheet->getColumnDimension('N')->setAutoSize(true);
    $sheet->getColumnDimension('O')->setAutoSize(true);
    $sheet->getColumnDimension('P')->setAutoSize(true);
    $sheet->getColumnDimension('Q')->setAutoSize(true);
    $sheet->getColumnDimension('R')->setAutoSize(true);
    $sheet->getColumnDimension('S')->setAutoSize(true);
    $sheet->getColumnDimension('T')->setAutoSize(true);
    $sheet->getColumnDimension('U')->setAutoSize(true);
    $sheet->getColumnDimension('V')->setAutoSize(true);
    $sheet->getColumnDimension('W')->setAutoSize(true);
    $sheet->getColumnDimension('X')->setAutoSize(true);
    $sheet->getColumnDimension('Y')->setAutoSize(true);
    $sheet->getColumnDimension('Z')->setAutoSize(true);
    $sheet->getColumnDimension('AA')->setAutoSize(true);
    $sheet->getColumnDimension('AB')->setAutoSize(true);

    $writer = new Xlsx($spreadsheet); 
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=Airside.xlsx');
    header('Cache-Control:max-age=0');
    $writer->save('php://output');
    exit();
}
public function exportDashAirside(){
    $data = [
        'title' => 'Landside Facilities | RRA Angkasa Pura|Airports'
    ];
    echo view('pages/print_dashairside', $data);
}

// Controller Log in 

public function user()
{
    $validation = \Config\Services::validation();
    $user = $this->usersModel->findAll();   
    $data = [
        'user' => $user,
        'validation' => $validation
    ];
    echo view('pages/user', $data);
    echo view('layout/template');
}


    public function exportExcelRekapitulasi() {
        $rekap  = $this->rekapitulasiModel->getExportExcel();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); 
        $sheet->setCellValue('A1','No');
        $sheet->setCellValue('B1','Beban');
        $sheet->setCellValue('C1','Section');
        $sheet->setCellValue('D1','GL Account');
        $sheet->setCellValue('E1','RKA');
        $sheet->setCellValue('F1','Geser Anggaran');
        $sheet->setCellValue('G1','Nilai Pekerjaan');
        $sheet->setCellValue('H1','Realisasi');
        $sheet->setCellValue('I1','Sisa Belum');
        $sheet->setCellValue('J1','Rencana Program');
        $sheet->setCellValue('K1','Sisa RKA');
        $sheet->setCellValue('L1','Estimasi Sisa');
        $sheet->setCellValue('M1','Januari');
        $sheet->setCellValue('N1','Februari');
        $sheet->setCellValue('O1','Maret');
        $sheet->setCellValue('P1','April');
        $sheet->setCellValue('Q1','Mei');
        $sheet->setCellValue('R1','Juni');
        $sheet->setCellValue('S1','Juli');
        $sheet->setCellValue('T1','Agustus');
        $sheet->setCellValue('U1','September');
        $sheet->setCellValue('V1','Oktober');
        $sheet->setCellValue('W1','November');
        $sheet->setCellValue('X1','Desember');
    
        // Instance model di luar loop
        $rekapDataModel = new RekapitulasiModel();
    
        $column = 2; 
        foreach ($rekap as $key => $value){
            $glAccountName = $rekapDataModel->getGlAccountName($value['id_akun']);
            $unitName = $this->rekapitulasiModel->getUnitName($value['id_unit']);
         
    
            $sheet->setCellValue('A'.$column, ($column-1));
            $sheet->setCellValue('B'.$column, $value['beban']);  
            $sheet->setCellValue('C'.$column, $unitName); 
            $sheet->setCellValue('D'.$column, $glAccountName);
            $sheet->setCellValue('E'.$column, 'Rp'.number_format($value['rka'], 0, ',', '.')); 
            $sheet->setCellValue('F'.$column, 'Rp'.number_format($value['geser_anggaran'], 0, ',', '.'));
    
            $sheet->setCellValue('G'.$column, 'Rp '.number_format($value['nilai_pekerjaan'], 0, ',', '.'));
            $sheet->setCellValue('H'.$column, 'Rp '.number_format($value['bulan'], 0, ',', '.'));
            $sheet->setCellValue('I'.$column, 'Rp '.number_format($value['sisa_belum'], 0, ',', '.'));
            $sheet->setCellValue('J'.$column, 'Rp '.number_format($value['rencana_program'], 0, ',', '.'));
            $sheet->setCellValue('K'.$column, 'Rp '.number_format($value['sisa_rka'], 0, ',', '.'));
            $sheet->setCellValue('L'.$column, 'Rp '.number_format($value['estimasi_sisa'], 0, ',', '.'));
            $sheet->setCellValue('M'.$column, 'Rp '.number_format($value['januari'], 0, ',', '.'));
            $sheet->setCellValue('N'.$column, 'Rp '.number_format($value['februari'], 0, ',', '.'));
            $sheet->setCellValue('O'.$column, 'Rp '.number_format($value['maret'], 0, ',', '.'));
            $sheet->setCellValue('P'.$column, 'Rp '.number_format($value['april'], 0, ',', '.'));
            $sheet->setCellValue('Q'.$column, 'Rp '.number_format($value['mei'], 0, ',', '.'));
            $sheet->setCellValue('R'.$column, 'Rp '.number_format($value['juni'], 0, ',', '.'));
            $sheet->setCellValue('S'.$column, 'Rp '.number_format($value['juli'], 0, ',', '.'));
            $sheet->setCellValue('T'.$column, 'Rp '.number_format($value['agustus'], 0, ',', '.'));
            $sheet->setCellValue('U'.$column, 'Rp '.number_format($value['september'], 0, ',', '.'));
            $sheet->setCellValue('V'.$column, 'Rp '.number_format($value['oktober'], 0, ',', '.'));
            $sheet->setCellValue('W'.$column, 'Rp '.number_format($value['november'], 0, ',', '.'));
            $sheet->setCellValue('X'.$column, 'Rp '.number_format($value['desember'], 0, ',', '.'));
    
            $column++;
        }
    
        // Mengatur gaya teks
        $sheet->getStyle('A1:X1')->getFont()->setBold(true);
        // Mengatur warna teks menjadi putih
        $sheet->getStyle('A1:X1')->getFont()->setColor(
            new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE)
        );
    
        // Mengatur gaya warna latar belakang
        $sheet->getStyle('A1:X1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setRGB('4985BB');
    
        // Mengatur lebar kolom secara otomatis
        foreach(range('A','X') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    
        // Output ke file excel
        $writer = new Xlsx($spreadsheet); 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Rekapitulasi.xlsx');
        header('Cache-Control:max-age=0');
        $writer->save('php://output');
        exit();
    }
    public function exportExcelGlAccount() {
        $unit  = $this->akununitModel->getExportExcel();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); 
        $sheet->setCellValue('A1','No');
        $sheet->setCellValue('B1','Kode');
        $sheet->setCellValue('C1','Nama');
        $sheet->setCellValue('D1','GL Account');
        $sheet->setCellValue('E1','Beban');
    

    
        $column = 2; 
        foreach ($unit as $key => $value){
        
         
    
            $sheet->setCellValue('A'.$column, ($column-1));
            $sheet->setCellValue('B'.$column, $value['kode']);  
            $sheet->setCellValue('C'.$column, $value['nama']); 
             $sheet->setCellValue('D'.$column, $value['gl_account']); 
             $sheet->setCellValue('E'.$column, $value['nama_beban']); 
        
    
            $column++;
        }
    
        // Mengatur gaya teks
        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        // Mengatur warna teks menjadi putih
        $sheet->getStyle('A1:E1')->getFont()->setColor(
            new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE)
        );
    
        // Mengatur gaya warna latar belakang
        $sheet->getStyle('A1:E1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setRGB('4985BB');
    
        // Mengatur lebar kolom secara otomatis
        foreach(range('A','E') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    
        // Output ke file excel
        $writer = new Xlsx($spreadsheet); 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=List Akun.xlsx');
        header('Cache-Control:max-age=0');
        $writer->save('php://output');
        exit();
    }

    
}    