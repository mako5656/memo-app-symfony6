<?php

namespace App\Repository;

use App\Entity\Memo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MemoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Memo::class);
    }

    public function findAllMemos(): array
    {
        return $this->findAll();
    }

    public function findMemoById($id): ?Memo
    {
        return $this->find($id);
    }

    public function saveMemo($memo): void
    {
        $this->_em->persist($memo);
        $this->_em->flush();
    }

    public function deleteMemo($memo): void
    {
        $this->_em->remove($memo);
        $this->_em->flush();
    }
}
