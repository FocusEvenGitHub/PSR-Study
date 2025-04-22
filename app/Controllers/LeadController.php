<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\LeadService;
use App\Readers\CsvReader;
use App\Filters\LeadFilter;
use App\Validators\LeadValidator;
use App\DTO\LeadDTO;

class LeadController extends Controller
{
    private LeadService $leadService;

    public function __construct(LeadService $leadService)
    {
        $this->leadService = $leadService;
    }

    // Exibe form de upload CSV
    public function importForm(): void
    {
        $this->view('lead/import');
    }

    // Processa upload CSV
    public function import(): void
    {
        if (!isset($_FILES['csv_file']) || $_FILES['csv_file']['error'] !== UPLOAD_ERR_OK) {
            echo 'Erro no upload';
            return;
        }

        $path = $_FILES['csv_file']['tmp_name'];
        $reader = new CsvReader();
        $filter = new LeadFilter();
        $validator = new LeadValidator();

        $rows = $reader->read($path);
        $results = ['success' => [], 'errors' => []];

        foreach ($rows as $index => $row) {
            $data = $filter->sanitize($row);
            $errors = $validator->validate($data);

            if (empty($errors)) {
                $dto = new LeadDTO($data['email'], $data['source']);
                // Mapeia DTO para entidade e salva
                $this->leadService->createFromDTO($dto);
                $results['success'][] = $dto;
            } else {
                $results['errors'][] = ['line' => $index + 2, 'errors' => $errors];
            }
        }

        $this->view('lead/import_result', compact('results'));
    }
}
