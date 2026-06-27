<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    protected $ModelUser;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        // Semua key data diatur agar sinkron dengan kebutuhan variabel template Anda
        $DATA = [
            'Judul' => 'User',
            'menu'  => 'user',
            'USER'  => $this->ModelUser->GetAllData(),
            'page'  => 'v_user' // Huruf kecil agar dibaca oleh template Anda
        ];
        
        return view('v_template_back_end', $DATA); 
    }

    public function InsertData()
    {
        $DATA = [
            'nama_user' => $this->request->getPost('NAMA_USER'),
            'email'     => $this->request->getPost('EMAIL'),
            'password'  => sha1($this->request->getPost('PASSWORD'))
        ];

        $this->ModelUser->InsertData($DATA);
        session()->setFlashdata('PESAN', 'Data User Baru Berhasil Ditambahkan!');
        return redirect()->to(base_url('User'));
    }

    public function UpdateData($ID_USER)
    {
        $PASSWORD_BARU = $this->request->getPost('PASSWORD');
        
        $DATA = [
            'nama_user' => $this->request->getPost('NAMA_USER'),
            'email'     => $this->request->getPost('EMAIL'),
        ];

        if (!empty($PASSWORD_BARU)) {
            $DATA['password'] = sha1($PASSWORD_BARU);
        }

        $this->ModelUser->UpdateData($ID_USER, $DATA);
        session()->setFlashdata('PESAN', 'Data User Berhasil Diperbarui!');
        return redirect()->to(base_url('User'));
    }

    public function Delete($ID_USER)
    {
        $this->ModelUser->DeleteData($ID_USER);
        session()->setFlashdata('PESAN', 'User Berhasil Dihapus!');
        return redirect()->to(base_url('User'));
    }
}