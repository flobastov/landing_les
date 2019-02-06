<?php

namespace App\Repository;

use App\Entity\PageBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PageBlock|null find($id, $lockMode = null, $lockVersion = null)
 * @method PageBlock|null findOneBy(array $criteria, array $orderBy = null)
 * @method PageBlock[]    findAll()
 * @method PageBlock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageBlockRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PageBlock::class);
    }

    public function findByPage()
    {
        $result = [];
        $blocks = $this->findAll();

        foreach ($blocks as $block) {
            $result[$block->getCode()] = $block;
        }

        return $result;
    }

}
