<?php

declare(strict_types=1);

namespace Tiagolopes\DesignPatterns\Proxy;

readonly class Report
{
    private function __construct(
        public int $id,
        public string $content
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            content: $data['content']
        );
    }
}
