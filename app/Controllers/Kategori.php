<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;

class Kategori extends BaseController
{
    protected $ModelKategori;

    public function __construct()
    {
        // Memulai session agar fitur dengan flashdata/validation berfungsi
        session();
        $this->ModelKategori = new ModelKategori();
    }

    public function index()
    {
        $data = [
            'Judul' => 'Kategori',
            'menu'  => 'kategori',
            'page'  => 'v_kategori',
            'kategori' => $this->ModelKategori->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function updateMarker($id_kategori)
    {
        // 1. Validasi Input Gambar
        if (!$this->validate([
            'marker' => [
                'rules' => 'uploaded[marker]|max_size[marker,2048]|is_image[marker]|mime_in[marker,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Silakan pilih file foto terlebih dahulu.',
                    'max_size' => 'Ukuran foto maksimal adalah 2MB.',
                    'is_image' => 'File yang Anda pilih harus berupa gambar.',
                    'mime_in'  => 'Format gambar harus .png, .jpg, atau .jpeg'
                ]
            ]
        ])) {
            // Jika validasi gagal, kembali ke halaman sebelumnya membawa pesan error
            return redirect()->back()->withInput();
        }

        // 2. Ambil data kategori lama untuk mencari nama file gambar lama
        // Pastikan di ModelKategori Anda punya fungsi DetailData($id) atau sejenisnya
        // Jika tidak ada, kita bisa pakai query builder alternatif di bawah
       $db = \Config\Database::connect();
        $kategoriLama = $db->table('tbl_kategori')->where('id_kategori', $id_kategori)->get()->getRowArray();
        
        // Jika model Anda tidak menggunakan find/first bawaan CI4, aktifkan baris query builder di bawah ini:
        // $db = \Config\Database::connect();
        // $kategoriLama = $db->table('tbl_kategori')->where('id_kategori', $id_kategori)->get()->getRowArray();

        // 3. Hapus foto lama dari folder public/marker jika file-nya ada
        if (!empty($kategoriLama['marker'])) {
            $pathFotoLama = ROOTPATH . 'public/marker/' . $kategoriLama['marker'];
            if (file_exists($pathFotoLama)) {
                unlink($pathFotoLama); // Menghapus file lama
            }
        }

        // 4. Proses upload file baru
        $fileMarker = $this->request->getFile('marker');
        $namaMarker = $fileMarker->getRandomName(); // Membuat nama acak baru
        $fileMarker->move(ROOTPATH . 'public/marker', $namaMarker); // Pindahkan ke folder public/marker

        // 5. Update data baru ke database
        $data = [
            'id_kategori' => $id_kategori,
            'marker'      => $namaMarker
        ];

        // Menggunakan query builder agar aman dan langsung eksekusi ke tabel kategori Anda
        $db = \Config\Database::connect();
        $db->table('tbl_kategori')->where('id_kategori', $id_kategori)->update(['marker' => $namaMarker]); 
        // Note: Silakan sesuaikan nama 'tbl_kategori' dengan nama tabel database Anda jika berbeda

        // 6. Set flashdata sukses dan redirect kembali ke halaman kategori
        session()->setFlashdata('update', 'Marker berhasil diperbarui!');
        return redirect()->to(base_url('Kategori'));
    }
}