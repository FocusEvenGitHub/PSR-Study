<?php

namespace App\Readers;

use App\Interfaces\ReaderInterface;

class JsonReader implements ReaderInterface
{
    /**
     * Lê JSON e retorna array de rows associativos
     */
    public function read(string $filePath): array
    {
        if (!file_exists($filePath) || !is_readable($filePath)) {
            throw new \RuntimeException("Arquivo JSON não encontrado ou não legível: {$filePath}");
        }

        $json = file_get_contents($filePath);
        $data = json_decode($json, true);

        if (!is_array($data)) {
            throw new \RuntimeException("Formato JSON inválido.");
        }

        return $data;
    }
}
