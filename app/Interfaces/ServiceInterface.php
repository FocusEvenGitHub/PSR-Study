<?php

namespace App\Interfaces;

interface ServiceInterface
{
    /**
     * @return array<int, object>
     */
    public function getAll(): array;
}
