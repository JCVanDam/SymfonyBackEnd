<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ZoneBioGeographique
 *
 * @ORM\Table(name="zone_bio_geographique")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\ZoneBioGeographiqueRepository")
 */
class ZoneBioGeographique
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="abreviation", type="string", length=10, unique=true)
     */
    private $abreviation;

    /**
     * @var string
     *
     * @ORM\Column(name="statut_geographique", type="string", length=100)
     */
    private $statutGeographique;


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
     * Set nom.
     *
     * @param string $nom
     *
     * @return ZoneBioGeographique
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
     * Set abreviation.
     *
     * @param string $abreviation
     *
     * @return ZoneBioGeographique
     */
    public function setAbreviation($abreviation)
    {
        $this->abreviation = $abreviation;

        return $this;
    }

    /**
     * Get abreviation.
     *
     * @return string
     */
    public function getAbreviation()
    {
        return $this->abreviation;
    }

    /**
     * Set statutGeographique.
     *
     * @param string $statutGeographique
     *
     * @return ZoneBioGeographique
     */
    public function setStatutGeographique($statutGeographique)
    {
        $this->statutGeographique = $statutGeographique;

        return $this;
    }

    /**
     * Get statutGeographique.
     *
     * @return string
     */
    public function getStatutGeographique()
    {
        return $this->statutGeographique;
    }
}
