<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    // 1. Jika pakai properti bawaan CI4, sesuaikan nama tabelnya di sini:
    protected $table = 'tbl_user'; 
    protected $primaryKey = 'id_user';

    public function LoginUser($EMAIL, $PASSWORD)
    {
        // 2. Sesuaikan nama tabel di baris pencarian login
        return $this->db->table('tbl_user') 
            ->where([
                'email'    => $EMAIL,
                'password' => $PASSWORD,
            ])->get()->getRowArray();
    }

    public function GetAllData()
    {
        // 3. Sesuaikan nama tabel di baris ambil semua data
        return $this->db->table('tbl_user')->get()->getResultArray();
    }

    public function InsertData($DATA)
    {
        // 4. Sesuaikan nama tabel di baris tambah data
        $this->db->table('tbl_user')->insert($DATA);
    }

    public function UpdateData($ID_USER, $DATA)
    {
        // 5. Sesuaikan nama tabel di baris update data
        $this->db->table('tbl_user')->where('id_user', $ID_USER)->update($DATA);
    }

    public function DeleteData($ID_USER)
    {
        // 6. Sesuaikan nama tabel di baris hapus data
        $this->db->table('tbl_user')->where('id_user', $ID_USER)->delete();
    }
}