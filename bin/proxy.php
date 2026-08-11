<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Tiagolopes\DesignPatterns\Proxy\ReportGenerator;
use Tiagolopes\DesignPatterns\Proxy\ReportGeneratorCacheProxy;
use Tiagolopes\DesignPatterns\Proxy\ReportRepository;

if (count($argv) < 2) {
    throw new DomainException('Script deve receber um segundo argumento');
}

$reportId = (int) $argv[1];

$report = new ReportRepository()->findById($reportId);
$reportGenerator = new ReportGenerator();
$reportGeneratorCache = new ReportGeneratorCacheProxy($reportGenerator);

// Retorna instantaneamente se for um relatório já gerado
$filename = $reportGeneratorCache->generate($report);
echo $filename . PHP_EOL;
