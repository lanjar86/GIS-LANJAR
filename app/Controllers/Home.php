<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class Home extends BaseController
{
    protected $ModelUser;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'judul' => 'Login Kasir',
        ];
        return view('v_login', $data);
    }

    public function CekLogin()
    {
        if ($this->validate([
            'email' => [
                'label' => 'E-mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong !!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong !!',
                ]
            ],
        ])) {
            $EMAIL = $this->request->getPost('email');
            
            // Menggunakan sha1 sesuai dengan enkripsi standar bawaan codinganmu sebelumnya
            $PASSWORD = sha1($this->request->getPost('password'));
            
            // Cek ke tabel user database
            $cek_login = $this->ModelUser->LoginUser($EMAIL, $PASSWORD);

            if ($cek_login) {
                // Set Session dari data database asli
                session()->set('id_user', $cek_login['id_user']);
                session()->set('nama_user', $cek_login['nama_user']);
                session()->set('logged_in', true);

                session()->setFlashdata('pesan', 'Anda Berhasil Login !!');
                return redirect()->to(base_url('Admin'));
            } else {
                session()->setFlashdata('gagal', 'E-mail Atau Password Salah !!');
                return redirect()->to(base_url('home'));
            }

        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('home'))->withInput()->with('validation', $this->validator);
        }
    }

    public function LogOut()
    {
        session()->destroy();
        return redirect()->to(base_url('home'));
    }
}