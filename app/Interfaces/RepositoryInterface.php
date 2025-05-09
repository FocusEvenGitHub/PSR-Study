<?php

namespace App\Interfaces;

interface RepositoryInterface
{
    /**
     * @return array<int, object>
     */
    public function getAll(): array;
}
