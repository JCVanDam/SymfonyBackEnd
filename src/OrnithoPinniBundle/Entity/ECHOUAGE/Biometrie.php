<?php

namespace OrnithoPinniBundle\Entity\ECHOUAGE;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Biometrie
 *
 * @ORM\Table(name="echouage_biometrie")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\ECHOUAGE\BiometrieRepository")
 */
class Biometrie
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
     * @ORM\Column(name="ailePliee", type="integer")
     */
    private $ailePliee;

    /**
     * @var int
     *
     * @ORM\Column(name="longueurCulmen", type="integer")
     */
    private $longueurCulmen;

    /**
     * @var int
     *
     * @ORM\Column(name="poids", type="integer")
     */
    private $poids;


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
     * Set ailePliee.
     *
     * @param int $ailePliee
     *
     * @return Biometrie
     */
    public function setAilePliee($ailePliee)
    {
        $this->ailePliee = $ailePliee;

        return $this;
    }

    /**
     * Get ailePliee.
     *
     * @return int
     */
    public function getAilePliee()
    {
        return $this->ailePliee;
    }

    /**
     * Set longueurCulmen.
     *
     * @param int $longueurCulmen
     *
     * @return Biometrie
     */
    public function setLongueurCulmen($longueurCulmen)
    {
        $this->longueurCulmen = $longueurCulmen;

        return $this;
    }

    /**
     * Get longueurCulmen.
     *
     * @return int
     */
    public function getLongueurCulmen()
    {
        return $this->longueurCulmen;
    }

    /**
     * Set poids.
     *
     * @param int $poids
     *
     * @return Biometrie
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids.
     *
     * @return int
     */
    public function getPoids()
    {
        return $this->poids;
    }

    public function __toString(){
        return "Biometrie n°".$this->id;
    }
}
