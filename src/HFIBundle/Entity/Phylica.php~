<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phylica
 *
 * @ORM\Table(name="phylica")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\PhylicaRepository")
 */
class Phylica
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
    * @ORM\ManyToOne(targetEntity="Observation", inversedBy="phylicas")
    */
    public $observation;

    /**
    * @ORM\OneToMany(targetEntity="Suivi", mappedBy="phylica", orphanRemoval=true, cascade={"persist", "remove"})
    */
    private $suivis;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero_plant", type="string", length=50, nullable=true)
     */
    private $numeroPlant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero_plantation", type="string", length=50, nullable=true)
     */
    private $numeroPlantation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="age_plant", type="integer", nullable=true)
     */
    private $agePlant;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_plantation", type="date", nullable=true)
     */
    private $datePlantation;

    /**
     * @var string
     *
     * @ORM\Column(name="suivi_biannuelle", type="boolean", nullable=true)
     */
    private $suiviBiannuelle;

    /**
     * @var float|null
     *
     * @ORM\Column(name="latitude", type="float", nullable=true)
     */
    private $latitude;

    /**
    * @var float|null
    *
    * @ORM\Column(name="longitude", type="float", nullable=true)
    */
    private $longitude;

    /**
    * @var float|null
    *
    * @ORM\Column(name="altitude", type="float", nullable=true)
    */
    private $altitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire", type="text", nullable=true)
     */
    private $commentaire;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->suivis = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set numeroPlant.
     *
     * @param string|null $numeroPlant
     *
     * @return Phylica
     */
    public function setNumeroPlant($numeroPlant = null)
    {
        $this->numeroPlant = $numeroPlant;

        return $this;
    }

    /**
     * Get numeroPlant.
     *
     * @return string|null
     */
    public function getNumeroPlant()
    {
        return $this->numeroPlant;
    }

    /**
     * Set agePlant.
     *
     * @param int|null $agePlant
     *
     * @return Phylica
     */
    public function setAgePlant($agePlant = null)
    {
        $this->agePlant = $agePlant;

        return $this;
    }

    /**
     * Get agePlant.
     *
     * @return int|null
     */
    public function getAgePlant()
    {
        return $this->agePlant;
    }

    /**
     * Set suiviBiannuelle.
     *
     * @param string $suiviBiannuelle
     *
     * @return Phylica
     */
    public function setSuiviBiannuelle($suiviBiannuelle)
    {
        $this->suiviBiannuelle = $suiviBiannuelle;

        return $this;
    }

    /**
     * Get suiviBiannuelle.
     *
     * @return string
     */
    public function getSuiviBiannuelle()
    {
        return $this->suiviBiannuelle;
    }

    /**
     * Set commentaire.
     *
     * @param string|null $commentaire
     *
     * @return Phylica
     */
    public function setCommentaire($commentaire = null)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire.
     *
     * @return string|null
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Get observation.
     *
     * @return \HFIBundle\Entity\Observation|null
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set numeroPlantation.
     *
     * @param string|null $numeroPlantation
     *
     * @return Phylica
     */
    public function setNumeroPlantation($numeroPlantation = null)
    {
        $this->numeroPlantation = $numeroPlantation;

        return $this;
    }

    /**
     * Get numeroPlantation.
     *
     * @return string|null
     */
    public function getNumeroPlantation()
    {
        return $this->numeroPlantation;
    }

    /**
     * Set observation.
     *
     * @param \HFIBundle\Entity\Observation|null $observation
     *
     * @return Phylica
     */
    public function setObservation(\HFIBundle\Entity\Observation $observation = null)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Add suivi.
     *
     * @param \HFIBundle\Entity\Suivi $suivi
     *
     * @return Observation
     */
    public function addSuivi(\HFIBundle\Entity\Suivi $suivi)
    {
        $suivi->getPhylica($this);
        $this->suivis[] = $suivi;

      return $this;
    }

    /**
     * Remove suivi.
     *
     * @param \HFIBundle\Entity\Suivi $suivi
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSuivi(\HFIBundle\Entity\Suivi $suivi)
    {
      return $this->suivis->removeElement($suivi);
    }

    /**
     * Get suivis.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSuivis()
    {
      return $this->suivis;
    }


    /**
     * Set latitude.
     *
     * @param float|null $latitude
     *
     * @return Phylica
     */
    public function setLatitude($latitude = null)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude.
     *
     * @return float|null
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude.
     *
     * @param float|null $longitude
     *
     * @return Phylica
     */
    public function setLongitude($longitude = null)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude.
     *
     * @return float|null
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set altitude.
     *
     * @param float|null $altitude
     *
     * @return Phylica
     */
    public function setAltitude($altitude = null)
    {
        $this->altitude = $altitude;

        return $this;
    }

    /**
     * Get altitude.
     *
     * @return float|null
     */
    public function getAltitude()
    {
        return $this->altitude;
    }

    /**
     * Set datePlantation.
     *
     * @param \DateTime|null $datePlantation
     *
     * @return Phylica
     */
    public function setDatePlantation($datePlantation = null)
    {
        $this->datePlantation = $datePlantation;

        return $this;
    }

    /**
     * Get datePlantation.
     *
     * @return \DateTime|null
     */
    public function getDatePlantation()
    {
        return $this->datePlantation;
    }
}
