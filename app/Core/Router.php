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
        // Extrai apenas o path (/foo/bar)
        $path = parse_url($uri, PHP_URL_PATH);
        $path = trim($path, '/');
        $segments = $path === '' ? [] : explode('/', $path);

        // Define controller/método padrão
        $defaultController = 'Home';
        $defaultMethod     = 'index';

        // Controller e método da URI
        $controllerName = $segments[0] ?? '';
        $methodName     = $segments[1] ?? '';

        $controllerClass = 'App\\Controllers\\'
            . ($controllerName !== '' ? ucfirst($controllerName) : $defaultController)
            . 'Controller';

        $method = $methodName !== '' ? $methodName : $defaultMethod;

        // Checa existência da classe
        if (!class_exists($controllerClass)) {
            http_response_code(404);
            echo "Controller '" . htmlspecialchars($controllerClass) . "' não encontrado.";
            return;
        }

        // Instancia controladora via container
        $controller = $this->container->get($controllerClass);

        // Checa método
        if (!method_exists($controller, $method)) {
            http_response_code(404);
            echo "Método '" . htmlspecialchars($method) . "' não encontrado em " . htmlspecialchars($controllerClass) . ".";
            return;
        }

        // Parâmetros adicionais (após controller/método)
        $params = array_slice($segments, 2);

        // Executa ação
        call_user_func_array([$controller, $method], $params);
    }
}
