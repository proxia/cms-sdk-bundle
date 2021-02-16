<?php
declare(strict_types=1);

namespace Proxia\Cms\Entity;

class ArticleTranslation
{
    private Article $article;
    private string $language;
    private string $title;
    private string $description;
    private string $text;
    private string $quickHelp;
    private bool $isTranslationVisible;
    private bool $isTranslationVisibleOnFrontpage;

    public function getArticle(): Article
    {
        return $this->article;
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

    public function getText(): string
    {
        return $this->text;
    }

    public function getQuickHelp(): string
    {
        return $this->quickHelp;
    }

    public function isVisible(): bool
    {
        return $this->isTranslationVisible;
    }

    public function isVisibleOnFrontpage(): bool
    {
        return $this->isTranslationVisibleOnFrontpage;
    }
}
