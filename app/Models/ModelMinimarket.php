<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMinimarket extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_minimarket')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_minimarket')->insert($data);
    }

    public function DetailData($id_minimarket)
    {
        return $this->db->table('tbl_minimarket')
            ->where('id_minimarket', $id_wilayah)
            ->get()
            ->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_minimarket')
            ->where('id_minimarket', $data['id_minimarket'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_minimarket')
            ->where('id_minimarket', $data['id_minimarket'])
            ->delete();
    }

}