<?php
declare(strict_types=1);

namespace Proxia\CmsBundle\Entity;

class CategoryTranslation
{
    private Category $category;
    private string $language;
    private string $title;
    private string $description;
    private string $quickHelp;
    private bool $isTranslationVisible;
    private string $localizedImage;

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getQuickHelp(): string
    {
        return $this->quickHelp;
    }

    public function isVisible(): bool
    {
        return $this->isTranslationVisible;
    }

    public function getLocalizedImage(): string
    {
        return $this->localizedImage;
    }
}
