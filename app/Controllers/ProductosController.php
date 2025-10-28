<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProductosController extends BaseController
{
    public function index()
    {
        return view('productos');
    }
}
