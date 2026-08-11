<?php

declare(strict_types=1);

namespace Tiagolopes\DesignPatterns\Proxy;

use RuntimeException;

class ReportGenerator implements ReportGeneratorInterface
{
    private(set) string $path;

    public function __construct()
    {
        $this->path = dirname(__DIR__, 2) . '/reports';
    }

    public function generate(Report $report): string
    {
        // Lógica para montagem do relatório

        sleep(seconds: 5); // Simulando uma requisição demorada

        $filename = "$this->path/report_$report->id.txt";
        $result = file_put_contents(
            filename: $filename,
            data: $report->content
        );

        if ($result === false) {
            throw new RuntimeException('Não foi possível gerar o relatório');
        }

        return $filename;
    }
}
