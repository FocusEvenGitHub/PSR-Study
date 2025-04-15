<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->view('home', ['mensagem' => 'Olá mundo MVC com PSR-4']);
    }
}
