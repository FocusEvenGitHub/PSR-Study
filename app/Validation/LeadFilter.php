<?php

namespace App\Validation;

use App\Interfaces\FilterInterface;

class LeadFilter implements FilterInterface
{
    /**
     * Sanitiza os campos de entrada
     * Retorna array com 'email' e 'source'
     */
    public function sanitize(array $row): array
    {
        return [
            'email'  => filter_var(trim((string)($row['email'] ?? '')), FILTER_SANITIZE_EMAIL),
            'source' => filter_var(trim((string)($row['source'] ?? '')), FILTER_SANITIZE_STRING),
        ];
    }
}
