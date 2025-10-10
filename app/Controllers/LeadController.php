<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Exceptions\FileUploadException;
use App\Services\LeadImporterService;
use App\Services\LeadService;
use RuntimeException;

/**
 *
 */
class LeadController extends Controller
{
    /**
     * @var LeadImporterService
     */
    private LeadImporterService $importer;
    /**
     * @var LeadService
     */
    private LeadService $leadService;

    /**
     * @param LeadImporterService $importer
     * @param LeadService $leadService
     */
    public function __construct(LeadImporterService $importer, LeadService $leadService)
    {
        $this->importer = $importer;
        $this->leadService = $leadService;
    }

    /**
     * @return void
     */
    public function index(): void
    {
        $leads = $this->leadService->getAll();
        $this->view('lead/index', ['leads' => $leads]);
    }

    /**
     * @return void
     */
    public function importForm(): void
    {
        $this->view('lead/import');
    }

    /**
     * @return void
     */
    public function import(): void
    {
        try {
            $path = $_FILES['file']['tmp_name'];
            $originalName = $_FILES['file']['name'];
            $results = $this->importer->import($path, $originalName);
        } catch (FileUploadException $e) {
            $this->view('lead/import', ['error' => $e->getMessage()]);
            return;
        }

        $this->view('lead/import_result', compact('results'));
    }
}
