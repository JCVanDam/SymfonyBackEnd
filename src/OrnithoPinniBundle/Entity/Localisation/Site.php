<?php

namespace OrnithoPinniBundle\Entity\Localisation;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site
 *
 * @ORM\Table(name="localisation_site")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\Localisation\SiteRepository")
 */
class Site
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
     * @ORM\Column(name="nom_toponymique", type="string", length=255)
     */
    private $nomToponymique;

    /**
     * @var string
     *
     * @ORM\Column(name="toponyme_site", type="string", length=255)
     */
    private $toponymeSite;

    /**
     * @var string
     *
     * @ORM\Column(name="toponyme_type", type="string", length=255)
     */
    private $toponymeType;

    /**
     * @var string
     *
     * @ORM\Column(name="zone", type="string", length=255)
     */
    private $zone;

    /**
     * @var string
     *
     * @ORM\Column(name="district", type="string", length=255)
     */
    private $district;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", nullable=false)
     */
    private $longitude;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", nullable=false)
     */
    private $latitude;



    /**
     * @var geometry|null
     *
     * @ORM\Column(name="geom", type="geometry", nullable=true)
     */
    private $geom;


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
     * Set nomToponymique.
     *
     * @param string $nomToponymique
     *
     * @return Site
     */
    public function setNomToponymique($nomToponymique)
    {
        $this->nomToponymique = $nomToponymique;

        return $this;
    }

    /**
     * Get nomToponymique.
     *
     * @return string
     */
    public function getNomToponymique()
    {
        return $this->nomToponymique;
    }

    /**
     * Set toponymeSite.
     *
     * @param string $toponymeSite
     *
     * @return Site
     */
    public function setToponymeSite($toponymeSite)
    {
        $this->toponymeSite = $toponymeSite;

        return $this;
    }

    /**
     * Get toponymeSite.
     *
     * @return string
     */
    public function getToponymeSite()
    {
        return $this->toponymeSite;
    }

    /**
     * Set toponymeType.
     *
     * @param string $toponymeType
     *
     * @return Site
     */
    public function setToponymeType($toponymeType)
    {
        $this->toponymeType = $toponymeType;

        return $this;
    }

    /**
     * Get toponymeType.
     *
     * @return string
     */
    public function getToponymeType()
    {
        return $this->toponymeType;
    }

    /**
     * Set zone.
     *
     * @param string $zone
     *
     * @return Site
     */
    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone.
     *
     * @return string
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set district.
     *
     * @param string $district
     *
     * @return Site
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
     * Set longitude.
     *
     * @param float $longitude
     *
     * @return Site
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude.
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude.
     *
     * @param float $latitude
     *
     * @return Site
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude.
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set geom.
     *
     * @param geometry|null $geom
     *
     * @return Site
     */
    public function setGeom($geom = null)
    {
        $this->geom = $geom;

        return $this;
    }

    /**
     * Get geom.
     *
     * @return geometry|null
     */
    public function getGeom()
    {
        return $this->geom;
    }

    public function __toString(){
        return $this->district.", ".$this->zone.", ".$this->nomToponymique;
    }
}
