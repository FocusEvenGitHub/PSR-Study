<?php

namespace App\Core;

class App
{
    public function run()
    {
        $router = new Router();
        $router->dispatch($_SERVER['REQUEST_URI']);
    }
}
