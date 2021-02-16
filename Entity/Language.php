<?php
declare(strict_types=1);

namespace Proxia\Cms\Entity;

class Language
{
    private int $id;
    private string $code;
    private string $nativeName;
    private bool $isVisibleGlobally;
    private bool $isVisibleLocally;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getNativeName(): string
    {
        return $this->nativeName;
    }

    public function isVisibleGlobally(): bool
    {
        return $this->isVisibleGlobally;
    }

    public function isVisibleLocally(): bool
    {
        return $this->isVisibleLocally;
    }
}
