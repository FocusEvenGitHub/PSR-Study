<?php

namespace App\Validators;

class LeadValidator
{
    /**
     * Valida email e source
     * Retorna array de erros ou vazio
     */
    public function validate(array $data): array
    {
        $errors = [];

        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email inválido.';
        }

        if (empty($data['source'])) {
            $errors[] = 'Source não pode ser vazio.';
        }

        return $errors;
    }
}
