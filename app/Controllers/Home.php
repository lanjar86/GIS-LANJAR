<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function __construct()
    {
        // Sementara kita kosongkan karena belum ada ModelUser
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
            $PASSWORD = $this->request->getPost('password');

            // AKAL-AKALAN SEMENTARA TANPA DATABASE
            // Akun admin: admin@gmail.com | password: admin
            if ($EMAIL == 'admin@gmail.com' && $PASSWORD == 'admin') {
                
                session()->set('id_user', '1');
                session()->set('nama_user', 'Lanjar JMK48');
                session()->set('foto', 'default.png');
                session()->set('level', 1); // 1 = Admin
                session()->set('logged_in', true);

                session()->setFlashdata('pesan', 'Anda Berhasil Login !!');
                return redirect()->to(base_url('admin'));

            } else {
                // Gagal login sementara
                session()->setFlashdata('gagal', 'E-mail Atau Password Sementara Salah !!');
                return redirect()->to(base_url('home'));
            }

        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('public/home'))->withInput()->with('validation', $this->validator);
        }
    }

    public function LogOut()
    {
        session()->destroy();
        return redirect()->to('/public/home');
    }
}