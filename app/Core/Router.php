<?php

namespace App\Core;

class Router
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function dispatch(string $uri)
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = trim($uri, '/');
        $segments = explode('/', $uri);

        $controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'LeadController';
        $method = $segments[1] ?? 'index';
        $params = array_slice($segments, 2);

        $controllerClass = "App\\Controllers\\$controllerName";

        if (!class_exists($controllerClass)) {
            http_response_code(404);
            echo "Controller não encontrado.";
            return;
        }

        $controller = $this->container->get($controllerClass);

        if (!method_exists($controller, $method)) {
            http_response_code(404);
            echo "Método não encontrado.";
            return;
        }

        call_user_func_array([$controller, $method], $params);
    }
}
