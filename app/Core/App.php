<?php

namespace App\Core;

class App
{
    public function run(): void
    {
        $container = new Container();
        $router = new Router($container);
        $router->dispatch($_SERVER['REQUEST_URI']);
    }
}
