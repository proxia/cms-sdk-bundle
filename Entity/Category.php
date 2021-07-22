<?php
declare(strict_types=1);

namespace Proxia\Cms\Entity;

use DateTime;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;

class Category
{
    private int $id;
    private int $authorId;
    private DateTimeImmutable $createdAt;
    private bool $isPublished;
    private bool $isTrash;
    private int $access;
    private string $accessGroups;
    private string $editors;
    private string $image;
    private string $mapImage;
    private string $mapAreaShape;
    private string $mapAreaCoordinates;
    private int $usableBy;

    /**
     * @var CategoryTranslation[]|ArrayCollection
     */
    private $translations;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function isPublished(): bool
    {
        return $this->isPublished;
    }

    public function isTrash(): bool
    {
        return $this->isTrash;
    }

    public function getAccess(): int
    {
        return $this->access;
    }

    public function getAccessGroups(): string
    {
        return $this->accessGroups;
    }

    public function getEditors(): string
    {
        return $this->editors;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getMapImage(): string
    {
        return $this->mapImage;
    }

    public function getMapAreaShape(): string
    {
        return $this->mapAreaShape;
    }

    public function getMapAreaCoordinates(): string
    {
        return $this->mapAreaCoordinates;
    }

    public function getUsableBy(): int
    {
        return $this->usableBy;
    }

    public function getTranslation(Language $language)
    {
        return $this->translations
            ->filter(fn(CategoryTranslation $t) => $t->getLanguage() === $language->getCode())
            ->first();
    }
}
