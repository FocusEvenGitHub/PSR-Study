<?php

namespace App\DTO;

class LeadDTO
{
    private string $email;
    private string $source;

    public function __construct(string $email, string $source)
    {
        $this->email = $email;
        $this->source = $source;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSource(): string
    {
        return $this->source;
    }
}
