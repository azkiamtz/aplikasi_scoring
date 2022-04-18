<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class WasitController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Wasit Page'
        ];
        return view('wasit/index', $data);
    }
}
