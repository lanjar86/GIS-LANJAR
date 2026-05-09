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
            'page'  => 'wilayah/v_input',
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
            return redirect()->to('wilayah');
            
        } else {
            // JIKA VALIDASI GAGAL
            // withInput() mengirimkan data form kembali agar bisa dibaca fungsi old()
            return redirect()->to('Wilayah/Input')->withInput();
        }
    }
}