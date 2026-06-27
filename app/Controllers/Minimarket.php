<?php

namespace App\Controllers;

use App\Models\ModelMinimarket;
use App\Models\ModelWilayah;
use App\Models\ModelSetting;

class Minimarket extends BaseController
{
    protected $ModelMinimarket;
    protected $ModelWilayah;
    protected $ModelSetting;

    public function __construct()
    {
        // Memulai session & load helper form
        helper('form');
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelSetting = new ModelSetting();
        $this->ModelMinimarket = new ModelMinimarket();
    }

 public function index()
{
    $data = [
        'Judul'      => 'Minimarket',
        'menu'       => 'minimarket', // Tambahkan ini agar menu Minimarket aktif di sidebar
        'page'       => 'minimarket/v_index',
        'minimarket' => $this->ModelMinimarket->AllData(),
    ];
    
    // GANTI v_template_front_end MENJADI v_template_back_end
    return view('v_template_back_end', $data); 
}

    public function InsertData()
    {
        $foto = $this->request->getFile('foto');
        $nama_file_foto = $foto->getRandomName();
        $foto->move('foto', $nama_file_foto);

        $data = [
            'nama_minimarket' => $this->request->getPost('nama_minimarket'),
            'id_kategori'     => $this->request->getPost('id_kategori'),
            'rating'          => $this->request->getPost('rating'),
            'status'          => $this->request->getPost('status'),
            'koordinat'       => $this->request->getPost('koordinat'),
            'id_wilayah'      => $this->request->getPost('id_wilayah'),
            'alamat'          => $this->request->getPost('alamat'),
            'foto'            => $nama_file_foto,
        ];

        $this->ModelMinimarket->InsertData($data);
        session()->setFlashdata('insert', 'Data Minimarket Berhasil Ditambahkan!');
        return redirect()->to(base_url('Minimarket'));
    }

    // Fungsi Delete ini yang dicari oleh CodeIgniter kamu
    public function Delete($id_minimarket)
    {
        $data = [
            'id_minimarket' => $id_minimarket
        ];

        $this->ModelMinimarket->DeleteData($data);
        session()->setFlashdata('delete', 'Data Minimarket Berhasil Dihapus!');
        return redirect()->to(base_url('Minimarket'));
    }
}