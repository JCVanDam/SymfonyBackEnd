<?php

namespace HFIBundle\Repository;

/**
 * DescriptionVegetationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DescriptionVegetationRepository extends \Doctrine\ORM\EntityRepository
{
  public function getLastId()
  {
    $id = $this->createQueryBuilder('q')
      ->select('q.id')
      ->setMaxResults( 1 )
      ->orderBy('q.id', 'DESC')
      ->getQuery()
      ->getOneOrNullResult();
    return $id ? $id['id'] : $id;
  }

  public function checkVegetation($foreignKey)
  {
    $sql = "SELECT CAST(CASE WHEN COUNT(*) > 0 THEN true ELSE false END AS bool)
      FROM description_vegetation WHERE observation_id=" . $foreignKey;
    $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
    $stmt->execute();
    return $stmt->fetch()["bool"];
  }

  public function getDescriptionVegetation($id)
  {
      $descriptionVegetation = $this->createQueryBuilder('q')
        ->select('q.miseEnPot, q.miseEnHerbier')
        ->where('q.id = :id')
        ->setParameter('id', $id)
        ->getQuery();
      return !empty($descriptionVegetation->getResult()) ? $descriptionVegetation->getResult()[0] : null;
  }

}
