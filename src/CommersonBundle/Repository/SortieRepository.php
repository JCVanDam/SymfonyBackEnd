<?php

namespace CommersonBundle\Repository;

/**
 * SortieRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SortieRepository extends \Doctrine\ORM\EntityRepository
{
    public function existThisCode($code)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('s.id')
           ->from('CommersonBundle:Sortie','s')
           ->where('s.codeSortie = ?1')
           ->setParameter(1, $code);
        $res = $qb->getQuery()->getResult();
        return (count($res)>=1);
    }

    public function existThisCodeWithId($code, $id)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('s.id')
           ->from('CommersonBundle:Sortie','s')
           ->where('s.codeSortie = ?1 AND s.id <> ?2')
           ->setParameter(1, $code)
           ->setParameter(2, $id);
        $res = $qb->getQuery()->getResult();
        return (count($res)>=1);
    }

    public function selectAll()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('s')
           ->from('CommersonBundle:Sortie','s')
        ;
        return $qb->getQuery()->getResult();
    }
}
