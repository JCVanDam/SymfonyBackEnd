<?php

namespace CommersonBundle\Repository;

/**
 * FileRepository
 */
class FileRepository extends \Doctrine\ORM\EntityRepository
{
    public function selectAll()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('f')
           ->from('CommersonBundle:File','f')
        ;
        return $qb->getQuery()->getResult();
    }
}
