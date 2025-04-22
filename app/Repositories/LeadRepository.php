<?php

namespace App\Repositories;

use App\Domain\Lead;
use App\Core\Database;
use PDO;

class LeadRepository
{
    private PDO $pdo;

    public function __construct(Database $db)
    {
        $this->pdo = $db->getConnection();
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query('SELECT email, source FROM leads');
        $rows = $stmt->fetchAll();

        return array_map(fn($row) => new Lead($row['email'], $row['source']), $rows);
    }

    public function save(Lead $lead): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO leads (email, source) VALUES (:email, :source)'
        );
        $stmt->execute([
            ':email'  => $lead->getEmail(),
            ':source' => $lead->getSource(),
        ]);
    }
}
