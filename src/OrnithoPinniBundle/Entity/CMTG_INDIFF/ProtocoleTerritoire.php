<?php

namespace OrnithoPinniBundle\Entity\CMTG_INDIFF;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProtocoleTerritoire
 *
 * @ORM\Table(name="cmtg_indiff_protocole_territoire")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_INDIFF\ProtocoleTerritoireRepository")
 */
class ProtocoleTerritoire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_territoires", type="smallint")
     */
    private $nbTerritoires;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nbTerritoires.
     *
     * @param int|null $nbTerritoires
     *
     * @return ProtocoleTerritoire
     */
    public function setNbTerritoires($nbTerritoires)
    {
        $this->nbTerritoires = $nbTerritoires;

        return $this;
    }

    /**
     * Get nbTerritoires.
     *
     * @return int|null
     */
    public function getNbTerritoires()
    {
        return $this->nbTerritoires;
    }

    public function __toString(){
        return "Territoire(".$this->id.")";
    }
}
