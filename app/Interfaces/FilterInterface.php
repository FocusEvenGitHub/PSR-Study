<?php

namespace App\Interfaces;

interface FilterInterface
{
    /**
     * @param array<string, mixed> $row
     * @return array<string, mixed>
     */
    public function sanitize(array $row): array;
}