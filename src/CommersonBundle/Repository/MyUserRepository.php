<?php

namespace CommersonBundle\Repository;

/**
 * MyUserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MyUserRepository extends \Doctrine\ORM\EntityRepository
{
    public function countAllMyUsersPerCode($code)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('count(user.id)')
           ->from('CommersonBundle:MyUser','user')
           ->where('user.code = ?1')
           ->setParameter(1, $code);
        return $qb->getQuery()->getSingleScalarResult();
    }
}
