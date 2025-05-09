<?php

namespace App\Readers;

use App\Interfaces\ReaderInterface;

class XmlReader implements ReaderInterface
{
    /**
     * Espera XML no formato:
     * <leads>
     *   <lead><email>...</email><source>...</source></lead>
     * </leads>
     * @param string $filePath
     * @return array<int, array<string, mixed>>
     */
    public function read(string $filePath): array
    {
        if (!file_exists($filePath) || !is_readable($filePath)) {
            throw new \RuntimeException("Arquivo XML não encontrado ou não legível: {$filePath}");
        }

        $xml = simplexml_load_file($filePath, "SimpleXMLElement", LIBXML_NOCDATA);
        if ($xml === false) {
            throw new \RuntimeException("Erro ao parsear XML.");
        }

        $rows = [];
        foreach ($xml->lead as $lead) {
            $rows[] = [
                'email'  => (string) $lead->email,
                'source' => (string) $lead->source,
            ];
        }

        return $rows;
    }
}