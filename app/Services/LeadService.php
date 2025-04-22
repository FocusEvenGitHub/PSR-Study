<?php

namespace App\Services;

use App\Repositories\LeadRepository;
use App\DTO\LeadDTO;

class LeadService
{
    private LeadRepository $repository;

    public function __construct(LeadRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): array
    {
        return $this->repository->getAll();
    }

    public function createFromDTO(LeadDTO $dto): void
    {
        // Cria entidade e salva
        $lead = new \App\Domain\Lead($dto->getEmail(), $dto->getSource());
        $this->repository->save($lead);
    }
}

