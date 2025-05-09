<?php

namespace App\Services;

use App\Factories\ReaderFactory;
use App\Interfaces\FilterInterface;
use App\Interfaces\ValidatorInterface;
use App\DTO\LeadDTO;
use App\Repositories\LeadRepository;

class LeadImporterService
{
    private ReaderFactory $readerFactory;
    private FilterInterface $filter;
    private ValidatorInterface $validator;
    private LeadRepository $repository;

    public function __construct(
        ReaderFactory $readerFactory,
        FilterInterface $filter,
        ValidatorInterface $validator,
        LeadRepository $repository
    ) {
        $this->readerFactory = $readerFactory;
        $this->filter        = $filter;
        $this->validator     = $validator;
        $this->repository    = $repository;
    }

    /**
     * Importa arquivo (CSV, JSON ou XML) e retorna resultados.
     * @param string $filePath
     * @param string|null $originalName
     * @return array{success: LeadDTO, errors: array<int,array{index:int,errors:string[]}>}
     */
    public function import(string $filePath, ?string $originalName = null): array
    {
        $reader = $this->readerFactory->make($filePath, $originalName);
        $rows   = $reader->read($filePath);
        $results = ['success' => [], 'errors' => []];

        foreach ($rows as $index => $row) {
            $data   = $this->filter->sanitize($row);
            $errors = $this->validator->validate($data);

            if (empty($errors)) {
                $dto = new LeadDTO($data['email'], $data['source']);
                $this->repository->save(new \App\Domain\Lead($dto->getEmail(), $dto->getSource()));
                $results['success'][] = $dto;
            } else {
                $results['errors'][] = ['index' => $index, 'errors' => $errors];
            }
        }

        return $results;
    }
}
