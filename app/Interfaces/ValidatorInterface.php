<?php

namespace App\Interfaces;

interface ValidatorInterface
{
    /**
     * @param array<string, mixed> $data
     * @return string[]
     */
    public function validate(array $data): array;
}