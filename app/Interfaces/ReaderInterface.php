<?php

namespace App\Interfaces;

interface ReaderInterface
{
    /**
     * @param string $filePath
     * @return array<int, array<string, mixed>>
     */
    public function read(string $filePath): array;
}