<?php

namespace App\Controllers;

use App\Core\Controller;

/**
 *
 */
class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home/index', [
            'title' => 'Bem-vindo ao PSR-Study',
            'mensagem' => 'Aqui você pode importar ou listar as leads, clique nos botões acima'
        ]);
    }
}
