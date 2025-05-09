<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\LeadImporterService;
use RuntimeException;

class LeadController extends Controller
{
    private LeadImporterService $importer;

    public function __construct(LeadImporterService $importer)
    {
        $this->importer = $importer;
    }

    public function importForm(): void
    {
        $this->view('lead/import');
    }

    public function import(): void
    {
        if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            throw new RuntimeException('Erro no upload do arquivo.');
        }

        $path = $_FILES['file']['tmp_name'];
        $originalName = $_FILES['file']['name'];
        $results = $this->importer->import($path, $originalName);

        $this->view('lead/import_result', compact('results'));
    }
}
