<?php

namespace App\Core;

class Controller
{
    protected function view(string $view, array $data = []): void
    {
        extract($data);
        $viewPath = __DIR__ . "/../Views/{$view}.php";

        if (!file_exists($viewPath)) {
            http_response_code(404);
            echo "View '{$view}' não encontrada.";
            return;
        }

        require $viewPath;
    }
}
