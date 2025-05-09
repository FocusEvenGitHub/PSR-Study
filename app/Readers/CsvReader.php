<?php

namespace App\Readers;

use App\Interfaces\ReaderInterface;

class CsvReader implements ReaderInterface
{
    /**
     * Lê CSV e retorna array de rows (associativo)
     * Espera cabeçalho com 'email' e 'source'
     */
    public function read(string $filePath): array
    {
        if (!file_exists($filePath) || !is_readable($filePath)) {
            throw new \RuntimeException("Arquivo CSV não encontrado ou não legível: {$filePath}");
        }

        $rows = [];
        $handle = fopen($filePath, 'r');
        $header = fgetcsv($handle, 1000, ',');

        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $rows[] = array_combine($header, $data);
        }

        fclose($handle);
        return $rows;
    }
}