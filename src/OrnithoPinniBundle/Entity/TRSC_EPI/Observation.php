<?php

namespace OrnithoPinniBundle\Entity\TRSC_EPI;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Observation
 *
 * @ORM\Table(name="trsc_epi_observation")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\TRSC_EPI\ObservationRepository")
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
   * @var int|null
   *
   * @ORM\Column(name="distancePerpendiculaire", type="integer", nullable=true)
   */
  private $distancePerpendiculaire;

  /**
   * @var int|null
   *
   * @ORM\Column(name="distanceAngulaire", type="integer", nullable=true)
   */
  private $distanceAngulaire;

  /**
   * @var int|null
   *
   * @ORM\Column(name="angleMagnetique", type="integer", nullable=true)
   */
  private $angleMagnetique;

  /**
   * @var int|null
   *
   * @ORM\Column(name="angleTransect", type="integer", nullable=true)
   */
  private $angleTransect;

  /**
   * @var string
   *
   * @ORM\Column(name="activiteComportement", type="string", length=255, nullable=true)
   */
  private $activiteComportement;

  /**
   * @var string
   *
   * @ORM\Column(name="indiceReproduction", type="string", length=255, nullable=true)
   */
  private $indiceReproduction;

  /**
   * @var int|null
   *
   * @ORM\Column(name="effectifAdulteIndetermine", type="integer", nullable=true)
   */
  private $effectifAdulteIndetermine;

  /**
   * @var int|null
   *
   * @ORM\Column(name="effectifAdulteMale", type="integer", nullable=true)
   */
  private $effectifAdulteMale;

  /**
   * @var int|null
   *
   * @ORM\Column(name="effectifAdulteFemelle", type="integer", nullable=true)
   */
  private $effectifAdulteFemelle;

  /**
   * @var int|null
   *
   * @ORM\Column(name="sommeAdulteEffectif", type="integer", nullable=true)
   */
  private $sommeAdulteEffectif;

  /**
   * @var int|null
   *
   * @ORM\Column(name="nbOeufs", type="integer", nullable=true)
   */
  private $nbOeufs;

  /**
   * @var int|null
   *
   * @ORM\Column(name="nbPoussins", type="integer", nullable=true)
   */
  private $nbPoussins;

  /**
   * @var string|null
   *
   * @ORM\Column(name="remarques", type="text", nullable=true)
   */
  private $remarques;

  /**
   * @ORM\ManyToOne(targetEntity="SaisiePointTransect", inversedBy="observations")
   */
  private $saisie;

  /**
   * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\General\Espece")
   * @Assert\Valid
   */
  private $espece;

  /**
   * @var string
   *
   * @ORM\Column(name="vegetation", type="string", length=255, nullable=true)
   */
  private $vegetation;

  /**
   * @var string
   *
   * @ORM\Column(name="isComptageEffectif", type="string", length=255, nullable=false)
   */
  private $isComptageEffectif;

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
     * @param int|null $distancePerpendiculaire
     *
     * @return Observation
     */
    public function setDistancePerpendiculaire($distancePerpendiculaire = null)
    {
        $this->distancePerpendiculaire = $distancePerpendiculaire;

        return $this;
    }

    /**
     * Get distancePerpendiculaire.
     *
     * @return int|null
     */
    public function getDistancePerpendiculaire()
    {
        return $this->distancePerpendiculaire;
    }

    /**
     * Set distanceAngulaire.
     *
     * @param int|null $distanceAngulaire
     *
     * @return Observation
     */
    public function setDistanceAngulaire($distanceAngulaire = null)
    {
        $this->distanceAngulaire = $distanceAngulaire;

        return $this;
    }

    /**
     * Get distanceAngulaire.
     *
     * @return int|null
     */
    public function getDistanceAngulaire()
    {
        return $this->distanceAngulaire;
    }

    /**
     * Set angleMagnetique.
     *
     * @param int|null $angleMagnetique
     *
     * @return Observation
     */
    public function setAngleMagnetique($angleMagnetique = null)
    {
        $this->angleMagnetique = $angleMagnetique;

        return $this;
    }

    /**
     * Get angleMagnetique.
     *
     * @return int|null
     */
    public function getAngleMagnetique()
    {
        return $this->angleMagnetique;
    }

    /**
     * Set angleTransect.
     *
     * @param int|null $angleTransect
     *
     * @return Observation
     */
    public function setAngleTransect($angleTransect = null)
    {
        $this->angleTransect = $angleTransect;

        return $this;
    }

    /**
     * Get angleTransect.
     *
     * @return int|null
     */
    public function getAngleTransect()
    {
        return $this->angleTransect;
    }

    /**
     * Set activiteComportement.
     *
     * @param string $activiteComportement
     *
     * @return Observation
     */
    public function setActiviteComportement($activiteComportement)
    {
        $this->activiteComportement = $activiteComportement;

        return $this;
    }

    /**
     * Get activiteComportement.
     *
     * @return string
     */
    public function getActiviteComportement()
    {
        return $this->activiteComportement;
    }

    /**
     * Set indiceReproduction.
     *
     * @param string $indiceReproduction
     *
     * @return Observation
     */
    public function setIndiceReproduction($indiceReproduction)
    {
        $this->indiceReproduction = $indiceReproduction;

        return $this;
    }

    /**
     * Get indiceReproduction.
     *
     * @return string
     */
    public function getIndiceReproduction()
    {
        return $this->indiceReproduction;
    }

    /**
     * Set effectifAdulteIndetermine.
     *
     * @param int|null $effectifAdulteIndetermine
     *
     * @return Observation
     */
    public function setEffectifAdulteIndetermine($effectifAdulteIndetermine = null)
    {
        $this->effectifAdulteIndetermine = $effectifAdulteIndetermine;

        return $this;
    }

    /**
     * Get effectifAdulteIndetermine.
     *
     * @return int|null
     */
    public function getEffectifAdulteIndetermine()
    {
        return $this->effectifAdulteIndetermine;
    }

    /**
     * Set effectifAdulteMale.
     *
     * @param int|null $effectifAdulteMale
     *
     * @return Observation
     */
    public function setEffectifAdulteMale($effectifAdulteMale = null)
    {
        $this->effectifAdulteMale = $effectifAdulteMale;

        return $this;
    }

    /**
     * Get effectifAdulteMale.
     *
     * @return int|null
     */
    public function getEffectifAdulteMale()
    {
        return $this->effectifAdulteMale;
    }

    /**
     * Set effectifAdulteFemelle.
     *
     * @param int|null $effectifAdulteFemelle
     *
     * @return Observation
     */
    public function setEffectifAdulteFemelle($effectifAdulteFemelle = null)
    {
        $this->effectifAdulteFemelle = $effectifAdulteFemelle;

        return $this;
    }

    /**
     * Get effectifAdulteFemelle.
     *
     * @return int|null
     */
    public function getEffectifAdulteFemelle()
    {
        return $this->effectifAdulteFemelle;
    }

    /**
     * Set sommeAdulteEffectif.
     *
     * @param int|null $sommeAdulteEffectif
     *
     * @return Observation
     */
    public function setSommeAdulteEffectif($sommeAdulteEffectif = null)
    {
        $this->sommeAdulteEffectif = $sommeAdulteEffectif;

        return $this;
    }

    /**
     * Get sommeAdulteEffectif.
     *
     * @return int|null
     */
    public function getSommeAdulteEffectif()
    {
        return $this->sommeAdulteEffectif;
    }

    /**
     * Set nbOeufs.
     *
     * @param int|null $nbOeufs
     *
     * @return Observation
     */
    public function setNbOeufs($nbOeufs = null)
    {
        $this->nbOeufs = $nbOeufs;

        return $this;
    }

    /**
     * Get nbOeufs.
     *
     * @return int|null
     */
    public function getNbOeufs()
    {
        return $this->nbOeufs;
    }

    /**
     * Set nbPoussins.
     *
     * @param int|null $nbPoussins
     *
     * @return Observation
     */
    public function setNbPoussins($nbPoussins = null)
    {
        $this->nbPoussins = $nbPoussins;

        return $this;
    }

    /**
     * Get nbPoussins.
     *
     * @return int|null
     */
    public function getNbPoussins()
    {
        return $this->nbPoussins;
    }

    /**
     * Set remarques.
     *
     * @param string|null $remarques
     *
     * @return Observation
     */
    public function setRemarques($remarques = null)
    {
        $this->remarques = $remarques;

        return $this;
    }

    /**
     * Get remarques.
     *
     * @return string|null
     */
    public function getRemarques()
    {
        return $this->remarques;
    }

    /**
     * Set isComptageEffectif.
     *
     * @param string $isComptageEffectif
     *
     * @return Observation
     */
    public function setIsComptageEffectif($isComptageEffectif)
    {
        $this->isComptageEffectif = $isComptageEffectif;

        return $this;
    }

    /**
     * Get isComptageEffectif.
     *
     * @return string
     */
    public function getIsComptageEffectif()
    {
        return $this->isComptageEffectif;
    }

    /**
     * Set saisie.
     *
     * @param \OrnithoPinniBundle\Entity\TRSC_EPI\SaisiePointTransect|null $saisie
     *
     * @return Observation
     */
    public function setSaisie(\OrnithoPinniBundle\Entity\TRSC_EPI\SaisiePointTransect $saisie = null)
    {
        $this->saisie = $saisie;

        return $this;
    }

    /**
     * Get saisie.
     *
     * @return \OrnithoPinniBundle\Entity\TRSC_EPI\SaisiePointTransect|null
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
}
