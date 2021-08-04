<?php
declare(strict_types=1);

namespace Proxia\CmsBundle\Repository;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\FetchMode;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Proxia\CmsBundle\Entity\Article;
use Proxia\CmsBundle\Entity\Language;

final class ArticleRepository
{
    private EntityManagerInterface $manager;
    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $manager)
    {;
        $this->manager = $manager;
        $this->repository = $manager->getRepository(Article::class);
    }

    public function find(int $id): ?Article
    {
        /** @var Article $article */
        $article = $this->repository->find($id);

        return $article;
    }

    /**
     * @param Language $language
     * @return Article[]
     * @throws DBALException
     */
    public function findRelevantFrontpageArticles(Language $language): array
    {
        $query = <<<SQL
select a.id
from articles a
         join articles_lang al on a.id = al.article_id
         join frontpage f on f.item_id = a.id and f.item_type = 2
where al.language = :languageCode
  and a.is_published = true
  and a.is_archive = false
  and a.is_trash = false
  and al.language_is_visible = true
  and al.frontpage_language_is_visible = true
  and (a.expiration is null or a.expiration >= now())
order by f.`order`
SQL;

        $statement = $this->manager->getConnection()->prepare($query);
        $statement->execute([
            'languageCode' => $language->getCode()
        ]);

        $articleIds = $statement->fetchAll(FetchMode::COLUMN, 0);

        $articles = $this->repository->findBy([
            'id' => $articleIds
        ]);

        usort($articles, function (Article $a, Article $b) use ($articleIds) {
            $aIdx = array_search($a->getId(), $articleIds);
            $bIdx = array_search($b->getId(), $articleIds);

            return $aIdx <=> $bIdx;
        });

        return $articles;
    }
}
