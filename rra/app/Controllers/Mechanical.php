<?php
namespace App\Controllers;
use App\Models\AkunUnitModal;

use App\Models\MechanicalModel;
use App\Models\RkaCobaModel;
use App\Models\AkunAirsideModel;
use App\Models\JenisModel;
use App\Models\JenisKontrakModel;
use App\Models\StatusModel;
use App\Models\BulanModel;
use App\Models\TahunModel;
use App\Models\AkunUnitModel;
use App\Models\BebanModel;
use App\Models\UnitModel;
use App\Models\RekapitulasiModel;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Mechanical extends BaseController
{
   
    protected $mechanicalModel;
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


    public function __construct()
    {
      
        $this->mechanicalModel = new MechanicalModel();
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
    }

    public function mechanical()
    {
        $rkacoba = $this->rkacobaModel->findAll();
        $akununit = $this->akununitModel->findAll();
        $mechanical = $this->mechanicalModel->findAll();
        $uniqueYears = $this->mechanicalModel->getUniqueYears();
        $uniqueAccount = $this->mechanicalModel->getUniqueAccount();
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
        $mechanical = $this->mechanicalModel->findAll();
            // Jika keduanya dipilih selain "Semua", terapkan filter
        } elseif    ($tahun != 'all' && $gl_account != 'all')  {
            // Jika keduanya dipilih sebagai "Semua", tampilkan semua data
            $mechanical = $this->mechanicalModel->getDataByYearAndGLAccount($tahun, $gl_account);
        } elseif ($tahun == 'all' && $gl_account != 'all') {
            // Jika hanya GL account yang dipilih, terapkan filter berdasarkan GL account saja
            $mechanical = $this->mechanicalModel->getDataByGLAccount($gl_account);
        } elseif ($tahun != 'all' && $gl_account == 'all') {
            // Jika hanya tahun yang dipilih, terapkan filter berdasarkan tahun saja
            $mechanical = $this->mechanicalModel->getDataByYear($tahun);
        }
        
    
    
        foreach($mechanical as &$rc) {
            $totalRealisasi = $rc['januari'] + $rc['februari'] + $rc['maret'] + $rc['april'] + $rc['mei'] + $rc['juni'] + $rc['juli'] + $rc['agustus'] + $rc['september'] + $rc['oktober'] + $rc['november'] + $rc['desember'];
            $sisaBelum = ($rc['nilai_pekerjaan'] - $rc['realisasi']); 
            // Gunakan fungsi abs() untuk mendapatkan nilai absolut
    
            $sisaRka = ($rc['rka'] + $rc['geser']) - ($totalRealisasi+ $rc['nilai_program']);
            $updateData = [
                'realisasi' => $totalRealisasi,
                'sisa_belum' => $sisaBelum,
                'sisa_rka' => $sisaRka,
            ];
            
            $this->mechanicalModel->update($rc['id_mechanical'], $updateData);
    
            $rc['realisasi'] = number_format($totalRealisasi, 0, ',', '.');
            $rc['sisa_belum'] = number_format($sisaBelum, 0, ',', '.');
            $rc['sisa_rka'] = number_format($sisaRka, 0, ',', '.');
        }
        $this->mechanicalModel->deleteRecordsNotInRkacoba();
        $data = [
            'title' => 'Mechanical Facilities | RRA Angkasa Pura|Airports',
            'mechanical' => $mechanical, 
            'uniqueYears' => $uniqueYears,
            'uniqueAccount' => $uniqueAccount,
            'akununit' => $akununit,
            'tahun' => $tahun, 
            'gl_account' => $gl_account
        ];
        echo view('pages/mechanical/mechanical', $data);
        echo view('layout/template');
    }
    public function addMechanical()
{
    $akununit = $this->akununitModel->findAll();
    $jenis = $this->jenisModel->findAll();
    $jeniskontrak = $this->jeniskontrakModel->findAll();
    $status = $this->statusModel->findAll();
    $bulan = $this->bulanModel->findAll();
    $tahun = $this->tahunModel->findAll();
    $uniqueYears = $this->mechanicalModel->getUniqueYears();
    $uniqueAccount = $this->mechanicalModel->getUniqueAccount();
   
    $data = [
        'title' => 'Add Mechanical Facilities | RRA Angkasa Pura|Airports',
        'akununit' => $akununit, 
        'jenis' => $jenis,
        'jeniskontrak' => $jeniskontrak,  
        'status' => $status,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'uniqueYears' => $uniqueYears,
        'uniqueAccount' => $uniqueAccount,
     ];

    echo view('pages/mechanical/add_mechanical', $data);
    echo view('layout/template');
}
public function saveMechanical(){
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
        return redirect()->to('/pages/mechanical')->with('error', 'Akun Unit tidak ditemukan untuk GL Account ini');
    }

    $idAkun = $akunUnitData['id_akun'];
    $namaBeban = $akunUnitModel->select('nama_beban')->where('id_akun', $idAkun)->first()['nama_beban'];
    $namaBebanUnit = $namaBeban . " Mechanical Facilities";

// Mendapatkan data unit dari model UnitModel berdasarkan id_unit
    $unitModel = new UnitModel();
    $defaultUnitData = $unitModel->find(3);

    if (!$defaultUnitData) {
        // Handle jika default unit tidak ditemukan
        return redirect()->to('/pages/mechanical')->with('error', 'Default Unit tidak ditemukan');
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
 
    $this->mechanicalModel->insert($data); 
    return redirect()->to('/pages/mechanical')->with('success', 'Data Berhasil Disimpan');
}
public function editMechanical($id_mechanical){
    $mechanical = $this->mechanicalModel->findAll();
    $akununit = $this->akununitModel->findAll();
    $jenis = $this->jenisModel->findAll();
    $jeniskontrak = $this->jeniskontrakModel->findAll();
    $status = $this->statusModel->findAll();
    $bulan = $this->bulanModel->findAll();
    $tahun = $this->tahunModel->findAll();

    $data['editmechanical'] = $this->mechanicalModel->find($id_mechanical);

    $data = [
        'title' => 'Edit Mechanical Facilities | RRA Angkasa Pura|Airports',
        'mechanical' => $mechanical,
        'akununit' => $akununit, 
        'jenis' => $jenis,
        'jeniskontrak' => $jeniskontrak,  
        'status' => $status,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'editmechanical' => $data['editmechanical'],

     ];
     echo view('pages/mechanical/edit_mechanical', $data);
     echo view('layout/template');
}
public function updateMechanical($id_mechanical)
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
        return redirect()->to('/pages/mechanical')->with('error', 'Akun Unit tidak ditemukan untuk GL Account ini');
    }

    $idAkun = $akunUnitData['id_akun'];
    $namaBeban = $akunUnitModel->select('nama_beban')->where('id_akun', $idAkun)->first()['nama_beban'];
    $namaBebanUnit = $namaBeban . " Mechanical Facilities";

    $unitModel = new UnitModel();
    $defaultUnitData = $unitModel->find(3);

    if (!$defaultUnitData) {
        // Handle jika default unit tidak ditemukan
        return redirect()->to('/pages/mechanical')->with('error', 'Default Unit tidak ditemukan');
    }
    $idUnit = $defaultUnitData['id_unit'];
    $namaUnit = $defaultUnitData['nama_unit'];

    // Pastikan ID tidak NULL dan data ada dalam database
    if (!empty($id_mechanical) && $this->mechanicalModel->find($id_mechanical)) {
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

        $this->mechanicalModel->update($id_mechanical, $data);
        return redirect()->to('/pages/mechanical')->with('success', 'Perubahan Data Berhasil Disimpan');
    } else {
        return redirect()->to('/pages/mechanical')->with('error', 'Gagal mengupdate data');
    }
}
public function deleteMechanical($id_mechanical){
    $this->mechanicalModel->delete($id_mechanical);
    return redirect()->to('/pages/mechanical')->with('success', 'Data Berhasil Dihapus');
}

//Tampilan Dashboard Landside 
public function dashMechanical()
{
    $rekapDataModel = new RekapitulasiModel(); 
    $rekapData = $rekapDataModel->where('id_unit', 3)->findAll();
    $jenisValues = $rekapDataModel->getAllJenisMechanical();
    $jeniskontrakValues = $rekapDataModel->getAllJenisKontrakMechanical();
    $statusValues = $rekapDataModel->getAllStatusMechanical();
    $rrbulanan = $rekapDataModel->getRRMechanical();


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
        'title' => 'Dashboard Mechanical | RRA Angkasa Pura|Airports',
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
    echo view('pages/mechanical/dash_mechanical', $data);
    echo view('layout/template');
}

public function dashMechanicalGm()
{
    $rekapDataModel = new RekapitulasiModel(); 
    $rekapData = $rekapDataModel->where('id_unit', 3)->findAll();
    $jenisValues = $rekapDataModel->getAllJenisMechanical();
    $jeniskontrakValues = $rekapDataModel->getAllJenisKontrakMechanical();
    $statusValues = $rekapDataModel->getAllStatusMechanical();
    $rrbulanan = $rekapDataModel->getRRMechanical();


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
        'title' => 'Dashboard Mechanical | RRA Angkasa Pura|Airports',
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
    echo view('pages/mechanical/dash-mechanical-gm', $data);
    echo view('layout/header-gm');
}

public function exportExcelMechanical() {
    $landside  = $this->mechanicalModel->getExportExcel();
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
    foreach ($landside as $key => $value){
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
    header('Content-Disposition: attachment;filename=Mechanical.xlsx');
    header('Cache-Control:max-age=0');
    $writer->save('php://output');
    exit();
}


}
