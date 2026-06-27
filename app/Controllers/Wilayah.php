<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelWilayah;
use App\Models\ModelSetting;

class Wilayah extends BaseController
{
    protected $ModelWilayah;
    protected $ModelSetting;

    public function __construct()
    {
        // Memulai session agar fitur withInput() dan old() berfungsi
        session();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelSetting = new ModelSetting();
    }

    public function index()
    {
        $data = [
            'Judul'   => 'Wilayah',
            'menu'    => 'wilayah',
            'page'    => 'wilayah/v_index',
            'wilayah' => $this->ModelWilayah->AllData(),
            'web'     => $this->ModelSetting->DataWeb(),
        ];

        return view('v_template_back_end', $data);
    }

    public function input()
    {
        helper('form');
        return view('v_template_back_end', [
            'Judul' => 'Input Wilayah',
            'menu'  => 'wilayah', // <-- TAMBAHKAN INI AGAR TIDAK ERROR UNDEFINED VARIABLE $menu
            'page'  => 'wilayah/v_input',
            'web'   => $this->ModelSetting->DataWeb(), // <-- TAMBAHKAN INI JUGA JIKA TEMPLATE MEMBUTUHKAN DATA WEB
        ]);
    }

    public function InsertData()
    {
        $rules = [
            'nama_wilayah' => [
                'label' => 'Nama Wilayah',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'warna' => [
                'label' => 'Warna',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'geojson' => [
                'label' => 'GeoJson',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
        ];

        // Memeriksa validasi
        if ($this->validate($rules)) {
            // JIKA VALIDASI BERHASIL
            $data = [
                'nama_wilayah' => $this->request->getPost('nama_wilayah'),
                'warna'        => $this->request->getPost('warna'),
                'geojson'      => $this->request->getPost('geojson'),
            ];
            
            $this->ModelWilayah->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan YA !!');
            return redirect()->to('Wilayah'); // Menggunakan huruf kapital sesuai jalurmu
            
        } else {
            // JIKA VALIDASI GAGAL
            return redirect()->to('Wilayah/Input')->withInput();
        }
    }

    public function Edit($id_wilayah)
    {
        helper('form');
        
        // Mengambil data wilayah spesifik berdasarkan ID untuk dilempar ke form edit
        $data = [
            'Judul'   => 'Edit Wilayah',
            'menu'    => 'wilayah', // <-- TAMBAHKAN INI JUGA AGAR SAAT EDIT TIDAK ERROR UNDEFINED
            'page'    => 'wilayah/v_edit',
            'wilayah' => $this->ModelWilayah->DetailData($id_wilayah), // Pastikan di ModelWilayah sudah ada fungsi DetailData() ya!
            'web'     => $this->ModelSetting->DataWeb(),
        ];

        return view('v_template_back_end', $data);
    }

    public function UpdateData($id_wilayah)
    {
        $rules = [
            'nama_wilayah' => [
                'label' => 'Nama Wilayah',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'warna' => [
                'label' => 'Warna',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'geojson' => [
                'label' => 'GeoJson',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
        ];

        // Memeriksa validasi
        if ($this->validate($rules)) {
            // JIKA VALIDASI BERHASIL
            $data = [
                'id_wilayah'   => $id_wilayah,
                'nama_wilayah' => $this->request->getPost('nama_wilayah'),
                'warna'        => $this->request->getPost('warna'),
                'geojson'      => $this->request->getPost('geojson'),
            ];
            
            $this->ModelWilayah->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate !!');
            return redirect()->to('Wilayah'); // Menggunakan huruf kapital sesuai jalurmu
            
        } else {
            // JIKA VALIDASI GAGAL
            return redirect()->to('Wilayah/Input')->withInput();
        }
    }

    public function Delete($id_wilayah)
    {
        $data = [
            'id_wilayah' => $id_wilayah,
        ];

        $this->ModelWilayah->DeleteData($data);
        session()->setFlashdata('update', 'Data Berhasil Di Delete !!');

        return redirect()->to('Wilayah'); // Menggunakan huruf kapital sesuai jalurmu
    }

} // Kurung kurawal penutup class HARUS ada di paling bawah sendiri