<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'Judul' => 'User',
            'menu'  => 'user',
            'page'  => 'v_user',
        ];
        return view('v_template_back_end', $data);
    }
}