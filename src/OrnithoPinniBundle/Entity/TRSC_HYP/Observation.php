<?php

namespace OrnithoPinniBundle\Entity\TRSC_HYP;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Observation
 *
 * @ORM\Table(name="trsc_hyp_observation")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\TRSC_HYP\ObservationRepository")
 */
 class Observation
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
    * @ORM\Column(name="distancePerpendiculaire", type="integer")
    */
   private $distancePerpendiculaire;

   /**
    * @var string|null
    *
    * @ORM\Column(name="indiceOccupation01", type="string", length=255, nullable=true)
    */
   private $indiceOccupation01;

   /**
    * @var string|null
    *
    * @ORM\Column(name="indiceOccupation02", type="string", length=255, nullable=true)
    */
   private $indiceOccupation02;

   /**
    * @var string|null
    *
    * @ORM\Column(name="indiceOccupation03", type="string", length=255, nullable=true)
    */
   private $indiceOccupation03;

   /**
    * @var string
    *
    * @ORM\Column(name="reponseRepasse", type="string", length=255)
    */
   private $reponseRepasse;

   /**
    * @var string
    *
    * @ORM\Column(name="occupationTerrier", type="string", length=255)
    */
   private $occupationTerrier;

   /**
    * @var string
    *
    * @ORM\Column(name="verifOeuf", type="string", length=255)
    */
   private $verifOeuf;

   /**
    * @var string
    *
    * @ORM\Column(name="vegetation", type="string", length=255, nullable=true)
    */
   private $vegetation;

   /**
    * @ORM\ManyToOne(targetEntity="SaisiePointTransect", inversedBy="observations")
    */
   private $saisie;

   /**
    * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\General\Espece")
    * @Assert\Valid
    */
   private $espece;

   public function __toString(){
       return "id n°".$this->id;
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
     * Set distancePerpendiculaire.
     *
     * @param int $distancePerpendiculaire
     *
     * @return Observation
     */
    public function setDistancePerpendiculaire($distancePerpendiculaire)
    {
        $this->distancePerpendiculaire = $distancePerpendiculaire;

        return $this;
    }

    /**
     * Get distancePerpendiculaire.
     *
     * @return int
     */
    public function getDistancePerpendiculaire()
    {
        return $this->distancePerpendiculaire;
    }

    /**
     * Set indiceOccupation01.
     *
     * @param string|null $indiceOccupation01
     *
     * @return Observation
     */
    public function setIndiceOccupation01($indiceOccupation01 = null)
    {
        $this->indiceOccupation01 = $indiceOccupation01;

        return $this;
    }

    /**
     * Get indiceOccupation01.
     *
     * @return string|null
     */
    public function getIndiceOccupation01()
    {
        return $this->indiceOccupation01;
    }

    /**
     * Set indiceOccupation02.
     *
     * @param string|null $indiceOccupation02
     *
     * @return Observation
     */
    public function setIndiceOccupation02($indiceOccupation02 = null)
    {
        $this->indiceOccupation02 = $indiceOccupation02;

        return $this;
    }

    /**
     * Get indiceOccupation02.
     *
     * @return string|null
     */
    public function getIndiceOccupation02()
    {
        return $this->indiceOccupation02;
    }

    /**
     * Set indiceOccupation03.
     *
     * @param string|null $indiceOccupation03
     *
     * @return Observation
     */
    public function setIndiceOccupation03($indiceOccupation03 = null)
    {
        $this->indiceOccupation03 = $indiceOccupation03;

        return $this;
    }

    /**
     * Get indiceOccupation03.
     *
     * @return string|null
     */
    public function getIndiceOccupation03()
    {
        return $this->indiceOccupation03;
    }

    /**
     * Set reponseRepasse.
     *
     * @param string $reponseRepasse
     *
     * @return Observation
     */
    public function setReponseRepasse($reponseRepasse)
    {
        $this->reponseRepasse = $reponseRepasse;

        return $this;
    }

    /**
     * Get reponseRepasse.
     *
     * @return string
     */
    public function getReponseRepasse()
    {
        return $this->reponseRepasse;
    }

    /**
     * Set occupationTerrier.
     *
     * @param string $occupationTerrier
     *
     * @return Observation
     */
    public function setOccupationTerrier($occupationTerrier)
    {
        $this->occupationTerrier = $occupationTerrier;

        return $this;
    }

    /**
     * Get occupationTerrier.
     *
     * @return string
     */
    public function getOccupationTerrier()
    {
        return $this->occupationTerrier;
    }

    /**
     * Set verifOeuf.
     *
     * @param string $verifOeuf
     *
     * @return Observation
     */
    public function setVerifOeuf($verifOeuf)
    {
        $this->verifOeuf = $verifOeuf;

        return $this;
    }

    /**
     * Get verifOeuf.
     *
     * @return string
     */
    public function getVerifOeuf()
    {
        return $this->verifOeuf;
    }

    /**
     * Set vegetation.
     *
     * @param string|null $vegetation
     *
     * @return Observation
     */
    public function setVegetation($vegetation = null)
    {
        $this->vegetation = $vegetation;

        return $this;
    }

    /**
     * Get vegetation.
     *
     * @return string|null
     */
    public function getVegetation()
    {
        return $this->vegetation;
    }

    /**
     * Set saisie.
     *
     * @param \OrnithoPinniBundle\Entity\TRSC_HYP\SaisiePointTransect|null $saisie
     *
     * @return Observation
     */
    public function setSaisie(\OrnithoPinniBundle\Entity\TRSC_HYP\SaisiePointTransect $saisie = null)
    {
        $this->saisie = $saisie;

        return $this;
    }

    /**
     * Get saisie.
     *
     * @return \OrnithoPinniBundle\Entity\TRSC_HYP\SaisiePointTransect|null
     */
    public function getSaisie()
    {
        return $this->saisie;
    }

    /**
     * Set espece.
     *
     * @param \OrnithoPinniBundle\Entity\General\Espece|null $espece
     *
     * @return Observation
     */
    public function setEspece(\OrnithoPinniBundle\Entity\General\Espece $espece = null)
    {
        $this->espece = $espece;

        return $this;
    }

    /**
     * Get espece.
     *
     * @return \OrnithoPinniBundle\Entity\General\Espece|null
     */
    public function getEspece()
    {
        return $this->espece;
    }
}
