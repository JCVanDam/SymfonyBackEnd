<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Toponyme
 *
 * @ORM\Table(name="toponyme")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\ToponymeRepository")
 */
class Toponyme
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
    *
    * @ORM\OneToMany(targetEntity="Observation", mappedBy="toponymes", cascade={"persist"})
    */
    private $observations;

    /**
     * @var string
     *
     * @ORM\Column(name="district", type="string", length=20, nullable=true)
     */
    private $district;

    /**
     * @var string
     *
     * @ORM\Column(name="secteur", type="string", length=150, nullable=true)
     */
    private $secteur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_site", type="string", length=100, nullable=true)
     */
    private $nomSite;

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
     * Set district.
     *
     * @param string $district
     *
     * @return Toponyme
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district.
     *
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set secteur.
     *
     * @param string $secteur
     *
     * @return Toponyme
     */
    public function setSecteur($secteur)
    {
        $this->secteur = $secteur;

        return $this;
    }

    /**
     * Get secteur.
     *
     * @return string
     */
    public function getSecteur()
    {
        return $this->secteur;
    }

    /**
     * Set nomSite.
     *
     * @param string $nomSite
     *
     * @return Toponyme
     */
    public function setNomSite($nomSite)
    {
        $this->nomSite = $nomSite;

        return $this;
    }

    /**
     * Get nomSite.
     *
     * @return string
     */
    public function getNomSite()
    {
        return $this->nomSite;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->observations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add observation.
     *
     * @param \HFIBundle\Entity\Observation $observation
     *
     * @return Toponyme
     */
    public function addObservation($observation)
    {
        $observation->getToponyme($this);
        $this->observations[] = $observation;

        return $this;
    }

    /**
     * Remove observation.
     *
     * @param \HFIBundle\Entity\Observation $observation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeObservation(\HFIBundle\Entity\Observation $observation)
    {
        return $this->observations->removeElement($observation);
    }

    /**
     * Get observations.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObservations()
    {
        return $this->observations;
    }
}
