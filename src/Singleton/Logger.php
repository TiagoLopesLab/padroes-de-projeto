<?php

declare(strict_types=1);

namespace Tiagolopes\DesignPatterns\Singleton;

use RuntimeException;

class Logger
{
    private string $filename;
    private static ?self $instance = null;

    private function __construct()
    {
        $this->filename = dirname(path: __DIR__, levels: 2) . '/app.log';
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function log(string $content): void
    {
        $resource = fopen(filename: $this->filename, mode: 'a');

        if (!$resource) {
            throw new RuntimeException('Não foi possível abrir o arquivo.');
        }

        $date = date('Y-m-d H:i:s');
        $result = fwrite(
            stream: $resource,
            data: "[$date] - $content" . PHP_EOL
        );

        if ($result === false) {
            throw new RuntimeException('Não foi possível escrever no arquivo.');
        }

        fclose($resource);
    }
}
