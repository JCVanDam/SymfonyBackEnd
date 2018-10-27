<?php

namespace FrequentationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ZoneSite
 *
 * @ORM\Table(name="zone_site")
 * @ORM\Entity(repositoryClass="FrequentationBundle\Repository\ZoneSiteRepository")
 */
class ZoneSite
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
     * @ORM\Column(name="nomZoneSite", type="string", length=100)
     */
    private $nomZoneSite;

    /**
     * @var string
     *
     * @ORM\Column(name="district", type="string", length=3)
     */
    private $district;

    /**
     * @var string
     *
     * @ORM\Column(name="nature", type="string", length=80)
     */
    private $nature;

    /**
     * @var string
     *
     * @ORM\Column(name="statutProtection", type="string", length=40)
     */
    private $statutProtection;

    /**
     * @var string
     *
     * @ORM\Column(name="secteur", type="string", length=80)
     */
    private $secteur;






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
     * Set nomZoneSite.
     *
     * @param string $nomZoneSite
     *
     * @return zoneSite
     */
    public function setNomZoneSite($nomZoneSite)
    {
        $this->nomZoneSite = $nomZoneSite;

        return $this;
    }

    /**
     * Get nomZoneSite.
     *
     * @return string
     */
    public function getNomZoneSite()
    {
        return $this->nomZoneSite;
    }

    /**
     * Set district.
     *
     * @param string $district
     *
     * @return zoneSite
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
     * Set nature.
     *
     * @param string $nature
     *
     * @return zoneSite
     */
    public function setNature($nature)
    {
        $this->nature = $nature;

        return $this;
    }

    /**
     * Get nature.
     *
     * @return string
     */
    public function getNature()
    {
        return $this->nature;
    }

    /**
     * Set statutProtection.
     *
     * @param string $statutProtection
     *
     * @return zoneSite
     */
    public function setStatutProtection($statutProtection)
    {
        $this->statutProtection = $statutProtection;

        return $this;
    }

    /**
     * Get statutProtection.
     *
     * @return string
     */
    public function getStatutProtection()
    {
        return $this->statutProtection;
    }

    /**
     * Set secteur.
     *
     * @param string $secteur
     *
     * @return zoneSite
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

    public function __toString() {
    return $this->nomZoneSite;
  }
}
