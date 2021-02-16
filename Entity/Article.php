<?php
declare(strict_types=1);

namespace Proxia\Cms\Entity;

use DateTime;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;

class Article
{
    private int $id;
    private int $authorId;
    private string $updateAuthors;
    private DateTimeImmutable $createdAt;
    private bool $isPublished;
    private bool $isTrash;
    private bool $isArchive;
    private int $access;
    private string $accessGroups;
    private string $editors;
    private string $editorGroups;
    private DateTime $expiresAt;
    private string $image;
    private string $mapImage;
    private string $mapAreaShape;
    private string $mapAreaCoordinates;
    private bool $isNews;
    private bool $isFlashNews;
    private bool $showFullVersionOnFrontpage;
    private int $usableBy;

    /**
     * @var ArticleTranslation[]|ArrayCollection
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

    public function getUpdateAuthors(): string
    {
        return $this->updateAuthors;
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

    public function isArchive(): bool
    {
        return $this->isArchive;
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

    public function getEditorGroups(): string
    {
        return $this->editorGroups;
    }

    public function getExpiresAt(): DateTime
    {
        return $this->expiresAt;
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

    public function isNews(): bool
    {
        return $this->isNews;
    }

    public function isFlashNews(): bool
    {
        return $this->isFlashNews;
    }

    public function isShowFullVersionOnFrontpage(): bool
    {
        return $this->showFullVersionOnFrontpage;
    }

    public function getUsableBy(): int
    {
        return $this->usableBy;
    }

    public function getTranslation(Language $language)
    {
        return $this->translations
            ->filter(fn(ArticleTranslation $t) => $t->getLanguage() === $language->getCode())
            ->first();
    }
}
