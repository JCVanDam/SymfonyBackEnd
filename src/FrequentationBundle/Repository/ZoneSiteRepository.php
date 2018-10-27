<?php

namespace FrequentationBundle\Repository;

/**
 * ZoneSiteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ZoneSiteRepository extends \Doctrine\ORM\EntityRepository
{
    public function getTransitDistrict($district){
        $qb = $this->createQueryBuilder('t')
           ->where('t.district = :district')
           ->setParameter('district',$district)
           ->andWhere('t.nature = :nature')
           ->setParameter('nature','Transit')
          ;
        return $qb;
    }

    public function getZoneDistrict($district){
        $qb = $this->createQueryBuilder('t')
           ->where('t.district = :district')
           ->setParameter('district',$district)
           ->andWhere('t.nature != :nature')
           ->setParameter('nature','Transit')
           ;
        return $qb;
    }
}
