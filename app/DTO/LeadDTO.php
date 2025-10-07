<?php

namespace App\DTO;

/**
 * LeadDTO
 */
class LeadDTO
{
    /**
     * @var string
     */
    private string $email;

    /**
     * @var string
     */
    private string $source;

    /**
     * @param string $email
     * @param string $source
     */
    public function __construct(string $email, string $source)
    {
        $this->email = $email;
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source): void
    {
        $this->source = $source;
    }

}