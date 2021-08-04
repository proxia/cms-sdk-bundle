<?php
declare(strict_types=1);

namespace Proxia\CmsBundle\Repository;

use Proxia\CmsBundle\Entity\Language;
use Doctrine\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;

final class LanguageRepository
{
    private EntityManagerInterface $manager;
    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $manager)
    {;
        $this->manager = $manager;
        $this->repository = $manager->getRepository(Language::class);
    }

    /**
     * @param string $code
     * @return Language|null
     */
    public function findOneByCode(string $code): ?Language
    {
        /** @var $result Language */
        $result = $this->repository->findOneBy([
            'code' => $code
        ]);

        return $result;
    }
}
