<?php

namespace App\Controllers;

use App\Models\UsersModel;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class User extends BaseController
{
    protected $usersModel;

    public function __construct(){
        $this->usersModel = new UsersModel();
    }
    public function login()
{
    if(session('id_user')){
        $kelompok = session('kelompok');
        
        if ($kelompok == 'admin_airside') {
            return redirect()->to(site_url('pages/dashairside'));
        } elseif ($kelompok == 'admin_landside') {
            return redirect()->to(site_url('/dashlandside'));
        }
    }
    // Remove the redirection logic from here, since it's already handled in the index function.
    return view('user/login'); // Assuming you want to load the login view here.
}
    
    public function loginProcess()
    {
        $request = $this->request;
    
        if ($request) {
            $username = $request->getPost('user');
            $password = $request->getPost('password');
            $error = '';
    
            if ($username == '' or $password == '') {
                $error = "Silahkan masukkan username dan password";
            }
    
            if (empty($error)) {
                $dataUser = $this->usersModel->where("nama_user", $username)->first();
    
                if (!$dataUser || $dataUser['pass_user'] != md5($password)) {
                    return redirect()->to('/pages/login')->withInput()->with('error', 'Username atau password salah');
                }
    
                // Simpan data pengguna ke dalam sesi
                session()->set([
                    'id_user' => $dataUser['id_user'],
                    'kelompok' => $dataUser['kelompok']
                    // Anda dapat menyimpan informasi pengguna lainnya di sini sesuai kebutuhan
                ]);
    
                // Memeriksa kelompok pengguna dan mengarahkan ke halaman dashboard yang sesuai
                if ($dataUser['kelompok'] == 'admin_airside') {
                    return redirect()->to('pages/rekapitulasi');
                } elseif ($dataUser['kelompok'] == 'admin_landside') {
                    return redirect()->to('landside/dashlandside');
                }elseif ($dataUser['kelompok'] == 'admin_mechanical') {
                    return redirect()->to('/pages/mechanical/dashmechanical');
                }elseif ($dataUser['kelompok'] == 'admin_utama') {
                    return redirect()->to('/pages/rekapitulasi');
                }
                elseif ($dataUser['kelompok'] == 'admin_technology') {
                    return redirect()->to('/pages/airporttech/dashairporttech');
                }elseif ($dataUser['kelompok'] == 'general_manager') {
                    return redirect()->to('/pages/dashairsidegm');
                }
                 else {
                    // Redirect ke halaman default untuk kelompok lainnya
                    return redirect()->to('pages/default');
                }
            } else {
                return redirect()->to('/pages/login')->withInput()->with('error', $error);
            }
        }
    }
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
public function addUser()
{
    return view('pages/adduser');
}
public function saveUser()
{
    // Mendapatkan data yang diinputkan dari form
    $namaUser = $this->request->getPost('namauser');
    $password = $this->request->getPost('namapass');
    $kelompok = $this->request->getPost('kelompok');

    // Validasi inputan (misalnya, pastikan tidak ada yang kosong)
    if (empty($namaUser) || empty($password)) {
        return "Nama pengguna dan kata sandi harus diisi.";
    }
    $existing_user = $this->usersModel->where('nama_user', $namaUser)->first();
    if (!empty($existing_user)) {
        // Jika kode sudah ada, tampilkan pesan error
        return redirect()->to('pages/user')->with('error', 'Gagal menambahkan data. Username sudah digunakan oleh data lain.');
    }

    // Validasi apakah namaakun sudah ada di database
    $existing_password = $this->usersModel->where('nama_pass', $password)->first();
    if (!empty($existing_password)) {
        // Jika namaakun sudah ada, tampilkan pesan error
        return redirect()->to('pages/user')->with('error', 'Gagal menambahkan data. Nama akun sudah digunakan oleh data lain.');
    }

    // Melakukan hashing kata sandi dengan md5
    $hashedPassword = md5($password);

    // Menyimpan data pengguna ke dalam tabel
    $usersModel = new UsersModel();
    $data = [
        'nama_user' => $namaUser,
        'pass_user' => $hashedPassword,
        'nama_pass' => $password,
        'kelompok' => $kelompok
    ];

    $usersModel->insert($data);

    // Redirect ke halaman lain atau tampilkan pesan sukses
    return redirect()->to('pages/user')->with('success', 'Pengguna berhasil ditambahkan.');
}
public function updateUser($id_user){
    $user = $this->usersModel->find($id_user);
    $namaUser = $this->request->getPost('namauser');
    $password = $this->request->getPost('namapass');
    $kelompok = $this->request->getPost('kelompok');

    // Validasi inputan (misalnya, pastikan tidak ada yang kosong)
    if (empty($namaUser) || empty($password)) {
        return "Nama pengguna dan kata sandi harus diisi.";
    }
    $existing_user = $this->usersModel->where('nama_user', $namaUser)->first();
    if (!empty($existing_user) && $existing_user['id_user'] != $id_user) {
        // Jika kode sudah ada, tampilkan pesan error
        return redirect()->to('pages/user')->with('error', 'Gagal menambahkan data. Username sudah digunakan oleh data lain.');
    }

    // Validasi apakah namaakun sudah ada di database
    $existing_password = $this->usersModel->where('nama_pass', $password)->first();
    if (!empty($existing_password)&& $existing_password['id_user'] != $id_user) {
        // Jika namaakun sudah ada, tampilkan pesan error
        return redirect()->to('pages/user')->with('error', 'Gagal menambahkan data. Nama akun sudah digunakan oleh data lain.');
    }

    // Melakukan hashing kata sandi dengan md5
    $hashedPassword = md5($password);

    // Menyimpan data pengguna ke dalam tabel
    $usersModel = new UsersModel();
    $data = [
        'nama_user' => $namaUser,
        'pass_user' => $hashedPassword,
        'nama_pass' => $password,
        'kelompok' => $kelompok
    ];

    $usersModel->update($id_user,$data);

    // Redirect ke halaman lain atau tampilkan pesan sukses
    return redirect()->to('pages/user')->with('success', 'Data pengguna berhasil diubah.');
}

public function deleteUser($id_user){
    $this->usersModel->delete($id_user);
    return redirect()->to('pages/user')->with('success', 'Data Berhasil Dihapus');
}

public function exportExcelUser() {
    $user  = $this->usersModel->getExportExcel();
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet(); 
    $sheet->setCellValue('A1','No');
    $sheet->setCellValue('B1','Username');
    $sheet->setCellValue('C1','Password');
  
    $column = 2; 
    foreach ($user as $key => $value){
        $sheet->setCellValue('A'.$column, ($column-1)); 
        $sheet->setCellValue('B'.$column,$value['nama_user']);
        $sheet->setCellValue('C'.$column,$value['nama_pass']); 
        $column++;
    }

 // Mengatur gaya teks
$sheet->getStyle('A1:C1')->getFont()->setBold(true);
// Mengatur warna teks menjadi putih
$sheet->getStyle('A1:C1')->getFont()->setColor(
    new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE)
);

// Mengatur gaya warna latar belakang
$sheet->getStyle('A1:C1')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('4985BB');

    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);
   

    $writer = new Xlsx($spreadsheet); 
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=Data Pengguna.xlsx');
    header('Cache-Control:max-age=0');
    $writer->save('php://output');
    exit();
}

    public function logout(){
        session()->remove('id_user');
        session()->remove('kelompok'); 
        log_message('info', 'User logged out');// Hapus semua data sesi yang terkait dengan pengguna
       
    return redirect()->to(site_url('/pages/login'));
    }


}
