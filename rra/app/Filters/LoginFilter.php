<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Ambil kelompok pengguna dari sesi
        $kelompok = session()->get('kelompok');

        // Periksa apakah pengguna telah login
        if (!session()->get('id_user')) {
            // Jika belum, arahkan pengguna ke halaman login
            return redirect()->to(base_url('pages/login'));
        }

        // Jika pengguna adalah admin_airside, langsung arahkan ke dashairside
        if ($kelompok === 'admin_airside') {
            // Periksa hak akses pengguna berdasarkan URL yang diminta
            $requestedUrl = $request->uri->getPath();
            if ($requestedUrl === 'pages/rkacoba') {
                // Jika pengguna adalah admin_airside dan mencoba mengakses rkacoba, arahkan ke halaman login
                return redirect()->to(base_url('pages/login'));
            }
        }

        // Array halaman yang dapat diakses oleh pengguna selain admin_airside
        $allowedPages = [
            'pages/dashutama',
            'pages/rekapitulasi',
        ];

        // Halaman yang tidak boleh diakses oleh pengguna selain admin_airside
        $restrictedPages = [
            'pages/rkacoba',
        ];

        // Periksa jika pengguna mencoba mengakses halaman login
        if ($request->uri->getPath() === 'pages/login') {
            // Tidak perlu melakukan pengecekan lebih lanjut, izinkan pengguna untuk mengakses halaman login
            return;
        }

        // Periksa hak akses pengguna berdasarkan URL yang diminta
        $requestedUrl = $request->uri->getPath();
        if (in_array($requestedUrl, $allowedPages)) {
            // Jika URL yang diminta ada dalam daftar halaman yang diizinkan, izinkan pengguna mengaksesnya
            return;
        }

        // Jika URL yang diminta ada dalam daftar halaman yang tidak diizinkan, arahkan pengguna ke halaman login
        if (in_array($requestedUrl, $restrictedPages)) {
            return redirect()->to(base_url('pages/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
