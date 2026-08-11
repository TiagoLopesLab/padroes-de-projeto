<?php

declare(strict_types=1);

namespace Tiagolopes\DesignPatterns\Proxy;

class ReportRepository
{
    public function findById(int $id): Report
    {
        $data = [
            'id' => $id,
            'content' => 'Conteúdo de exemplo'
        ];

        return Report::fromArray($data);
    }
}
