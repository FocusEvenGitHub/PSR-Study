<?php

namespace App\Core;

class Router
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Dispara a rota baseada na URI
     *
     * @param string $uri
     */
    public function dispatch(string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $path = trim($path, '/');
        $segments = $path === '' ? [] : explode('/', $path);

        $defaultController = 'Home';
        $defaultMethod     = 'index';

        $controllerName = $segments[0] ?? '';
        $methodName     = $segments[1] ?? '';

        $controllerClass = 'App\\Controllers\\'
            . ($controllerName !== '' ? ucfirst($controllerName) : $defaultController)
            . 'Controller';

        $method = $methodName !== '' ? $methodName : $defaultMethod;

        if (!class_exists($controllerClass)) {
            http_response_code(404);
            echo "Controller '" . htmlspecialchars($controllerClass) . "' não encontrado.";
            return;
        }

        $controller = $this->container->get($controllerClass);

        if (!method_exists($controller, $method)) {
            http_response_code(404);
            echo "Método '" . htmlspecialchars($method) . "' não encontrado em " . htmlspecialchars($controllerClass) . ".";
            return;
        }

        $params = array_slice($segments, 2);

        call_user_func_array([$controller, $method], $params);
    }
}
