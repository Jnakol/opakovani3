<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ZakladC extends BaseController
{
    public function index()
    {
        
    $data = [

    ];
    return view('Zaklad', $data);
    }
}
