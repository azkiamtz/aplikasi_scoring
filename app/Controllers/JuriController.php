<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class JuriController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Juri Page'
        ];
        return view('juri/index', $data);
    }
}
