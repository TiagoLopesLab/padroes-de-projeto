<?php

declare(strict_types=1);

namespace Tiagolopes\DesignPatterns\Proxy;

interface ReportGeneratorInterface
{
    public function generate(Report $report): string;
}
