<?php

namespace App\Readers;

class CsvReader
{
    /**
     * Lê CSV e retorna array de rows (associativo)
     * Espera cabeçalho com 'email' e 'source'
     */
    public function read(string $filePath): array
    {
        $rows = [];

        if (!file_exists($filePath) || !is_readable($filePath)) {
            throw new \Exception("Arquivo CSV não encontrado ou não legível: {$filePath}");
        }

        if (($handle = fopen($filePath, 'r')) !== false) {
            $header = fgetcsv($handle, 1000, ',');
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $rows[] = array_combine($header, $data);
            }
            fclose($handle);
        }

        return $rows;
    }
}