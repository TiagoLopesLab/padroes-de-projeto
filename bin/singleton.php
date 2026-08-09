<?php

declare(strict_types=1);

date_default_timezone_set('America/Sao_Paulo');

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Tiagolopes\DesignPatterns\Singleton\Logger;

$logger = Logger::getInstance();
$logger->log(content: 'Conteúdo do log');

$logger2 = Logger::getInstance();

var_dump($logger);
var_dump($logger2);
