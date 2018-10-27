<?php

namespace CommersonBundle\Repository;

/**
 * ImageRepository
 */
class ImageRepository extends \Doctrine\ORM\EntityRepository
{
    public function selectAll()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('i')
           ->from('CommersonBundle:Image','i')
        ;
        return $qb->getQuery()->getResult();
    }
}
