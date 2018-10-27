<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Auteur
 *
 * @ORM\Table(name="auteur")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\AuteurRepository")
 */
class Auteur
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
     * @ORM\OneToMany(targetEntity="Observation", mappedBy="auteur")
     */
    private $observations;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var bool
     *
     * @ORM\Column(name="cache", type="boolean")
     */
    private $cache;


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
     * Set observations.
     *
     * @param $observations
     *
     * @return Auteur
     */
    public function setObservations($observations)
    {
        $this->observations = $observations;

        return $this;
    }

    /**
     * Get observations.
     *
     * @return string
     */
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * Set nom.
     *
     * @param string $nom
     *
     * @return Auteur
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
     * Set prenom.
     *
     * @param string $prenom
     *
     * @return Auteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom.
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set cache.
     *
     * @param bool $cache
     *
     * @return Auteur
     */
    public function setCache($cache)
    {
        $this->cache = $cache;

        return $this;
    }

    /**
     * Get cache.
     *
     * @return bool
     */
    public function getCache()
    {
        return $this->cache;
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
     * @return Auteur
     */
    public function addObservation(\HFIBundle\Entity\Observation $observation)
    {
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
}
