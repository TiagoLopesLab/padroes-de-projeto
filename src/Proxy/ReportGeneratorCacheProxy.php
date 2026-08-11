<?php

declare(strict_types=1);

namespace Tiagolopes\DesignPatterns\Proxy;

readonly class ReportGeneratorCacheProxy implements ReportGeneratorInterface
{
    public function __construct(
        private ReportGenerator $reportGenerator
    ) {
    }

    public function generate(Report $report): string
    {
        $filename = "{$this->reportGenerator->path}/report_$report->id.txt";
        if (file_exists($filename)) {
            return $filename;
        }

        return $this->reportGenerator->generate($report);
    }
}
