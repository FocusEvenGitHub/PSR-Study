<?php

namespace App\Core;

class Router
{
    public function dispatch($uri)
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = trim($uri, '/');

        $segments = explode('/', $uri);

        $controller = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'HomeController';
        $method = $segments[1] ?? 'index';

        $controllerClass = "App\\Controllers\\$controller";

        if (class_exists($controllerClass)) {
            $controllerObject = new $controllerClass();

            if (method_exists($controllerObject, $method)) {
                call_user_func_array([$controllerObject, $method], array_slice($segments, 2));
                return;
            }
        }

        http_response_code(404);
        echo "Página não encontrada.";
    }
}
