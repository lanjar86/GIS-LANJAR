<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'Judul' => 'Home',
            'page' => 'v_home',
        ];     
        return view('v_template_front_end', $data);
    }
}
