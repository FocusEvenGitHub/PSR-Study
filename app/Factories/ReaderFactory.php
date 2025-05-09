<?php

namespace App\Factories;

use App\Interfaces\ReaderInterface;
use App\Readers\CsvReader;
use App\Readers\JsonReader;
use App\Readers\XmlReader;
use RuntimeException;

class ReaderFactory
{
    private array $map = [
        'csv'  => CsvReader::class,
        'json' => JsonReader::class,
        'xml'  => XmlReader::class,
    ];

    public function make(string $filePath, ?string $originalName = null): ReaderInterface
    {
        $ext = strtolower(pathinfo($originalName ?? $filePath, PATHINFO_EXTENSION));

        if (!isset($this->map[$ext])) {
            throw new RuntimeException("Formato {$ext} não suportado para importação.");
        }

        $class = $this->map[$ext];
        return new $class;
    }
}

