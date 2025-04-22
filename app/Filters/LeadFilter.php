<?php

namespace App\Filters;

class LeadFilter
{
    /**
     * Sanitiza os campos do CSV
     * Retorna array com 'email' e 'source'
     */
    public function sanitize(array $row): array
    {
        return [
            'email'  => filter_var(trim($row['email'] ?? ''), FILTER_SANITIZE_EMAIL),
            'source' => filter_var(trim($row['source'] ?? ''), FILTER_SANITIZE_STRING),
        ];
    }
}
