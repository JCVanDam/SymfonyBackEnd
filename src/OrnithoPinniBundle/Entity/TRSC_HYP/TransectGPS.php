<?php

namespace OrnithoPinniBundle\Entity\TRSC_HYP;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TransectGPS
 *
 * @ORM\Table(name="trsc_hyp_transect_gps")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\TRSC_HYP\TransectGPSRepository")
 */
 class TransectGPS
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
      * @ORM\Column(name="numero", type="integer")
      */
     private $numero;

     /**
      * @var string
      *
      * @ORM\Column(name="nom", type="string", length=255)
      */
     private $nom;

     /**
      * @var string
      *
      * @ORM\Column(name="typeEspece", type="string", length=255)
      */
     private $typeEspece;

     public function __toString(){
         return "Transect (".$this->nom."), N°".$this->numero;
     }

     /**
     * Constructor
     */
    public function __construct()
    {
        $this->points = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set numero.
     *
     * @param int $numero
     *
     * @return TransectGPS
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero.
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set nom.
     *
     * @param string $nom
     *
     * @return TransectGPS
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set typeEspece.
     *
     * @param string $typeEspece
     *
     * @return TransectGPS
     */
    public function setTypeEspece($typeEspece)
    {
        $this->typeEspece = $typeEspece;

        return $this;
    }

    /**
     * Get typeEspece.
     *
     * @return string
     */
    public function getTypeEspece()
    {
        return $this->typeEspece;
    }
}
