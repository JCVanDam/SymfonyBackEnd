<?php

namespace OrnithoPinniBundle\Entity\General;

use Doctrine\ORM\Mapping as ORM;

/**
 * Position_GPS
 *
 * @ORM\Table(name="general_position_gps")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\General\Position_GPSRepository")
 */
class Position_GPS
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
     * @var float
     *
     * @ORM\Column(name="altitude", type="integer", nullable=true)
     */
    private $altitude;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_altitude_sig", type="boolean", nullable=true)
     */
    private $isAltitudeSIG;

    /**
     * @var geometry
     *
     * @ORM\Column(name="point", type="geometry", nullable=true)
     */
    private $point;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure", type="time", nullable=true)
     */
    private $heure;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="remarque", type="text", nullable=true)
     */
    private $remarque;

    /**
     * @var string
     *
     * @ORM\Column(name="id_pt_gps", type="string", length=255, nullable=true)
     */
    private $idPtGps;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_gps", type="string", length=255, nullable=true)
     */
    private $numeroGps;

    /**
     * @var string
     *
     * @ORM\Column(name="origine", type="string", length=255, nullable=true)
     */
    private $origine;

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
     * Set longitude.
     *
     * @param float $longitude
     *
     * @return Position_GPS
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
     * @return Position_GPS
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
     * Set altitude.
     *
     * @param float|null $altitude
     *
     * @return Position_GPS
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
     * Set point.
     *
     * @param geometry $point
     *
     * @return Position_GPS
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get point.
     *
     * @return geometry
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Set heure.
     *
     * @param \DateTime|null $heure
     *
     * @return Position_GPS
     */
    public function setHeure($heure = null)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure.
     *
     * @return \DateTime|null
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set remarque.
     *
     * @param string|null $remarque
     *
     * @return Position_GPS
     */
    public function setRemarque($remarque = null)
    {
        $this->remarque = $remarque;

        return $this;
    }

    /**
     * Get remarque.
     *
     * @return string|null
     */
    public function getRemarque()
    {
        return $this->remarque;
    }

    /**
     * Set idPtGps.
     *
     * @param string $idPtGps
     *
     * @return Position_GPS
     */
    public function setIdPtGps($idPtGps)
    {
        $this->idPtGps = $idPtGps;

        return $this;
    }

    /**
     * Get idPtGps.
     *
     * @return string
     */
    public function getIdPtGps()
    {
        return $this->idPtGps;
    }

    /**
     * Set numeroGps.
     *
     * @param string $numeroGps
     *
     * @return Position_GPS
     */
    public function setNumeroGps($numeroGps)
    {
        $this->numeroGps = $numeroGps;

        return $this;
    }

    /**
     * Get numeroGps.
     *
     * @return string
     */
    public function getNumeroGps()
    {
        return $this->numeroGps;
    }

    /**
     * Set origine.
     *
     * @param string $origine
     *
     * @return Position_GPS
     */
    public function setOrigine($origine)
    {
        $this->origine = $origine;

        return $this;
    }

    /**
     * Get origine.
     *
     * @return string
     */
    public function getOrigine()
    {
        return $this->origine;
    }

    /**
     * Set isAltitudeSIG.
     *
     * @param bool $isAltitudeSIG
     *
     * @return Position_GPS
     */
    public function setIsAltitudeSIG($isAltitudeSIG)
    {
        $this->isAltitudeSIG = $isAltitudeSIG;

        return $this;
    }

    /**
     * Get isAltitudeSIG.
     *
     * @return bool
     */
    public function getIsAltitudeSIG()
    {
        return $this->isAltitudeSIG;
    }

    public function __toString(){
        return $this->getLatitude().", ".$this->getLongitude();
    }

    /**
     * Set date.
     *
     * @param \DateTime|null $date
     *
     * @return Position_GPS
     */
    public function setDate($date = null)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime|null
     */
    public function getDate()
    {
        return $this->date;
    }

    public function init($releve){
        $this->setLongitude($releve->getLongitude());
        $this->setLatitude($releve->getLatitude());
        $this->setAltitude($releve->getAltitude());
        $this->setIsAltitudeSIG($releve->getIsAltitudeSIG());
        $this->setPoint($releve->getPoint());
        $this->setHeure($releve->getHeure());
        $this->setDate($releve->getDate());
        $this->setRemarque($releve->getRemarque());
        $this->setIdPtGps($releve->getIdPtGps());
        $this->setNumeroGps($releve->getNumeroGps());
        $this->setOrigine($releve->getOrigine());
    }
}
