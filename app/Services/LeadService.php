<?php

namespace App\Services;

use App\Interfaces\ServiceInterface;
use App\DTO\LeadDTO;
use App\Domain\Lead;
use App\Repositories\LeadRepository;

class LeadService implements ServiceInterface
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
        $lead = new Lead($dto->getEmail(), $dto->getSource());
        $this->repository->save($lead);
    }
}
