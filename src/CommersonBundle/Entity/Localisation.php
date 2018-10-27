<?php

namespace CommersonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Localisation
 *
 * @ORM\Table(name="localisation")
 * @ORM\Entity(repositoryClass="CommersonBundle\Repository\LocalisationRepository")
 */
class Localisation
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
     * @ORM\Column(name="waypoint_debut", type="string", length=8, nullable=true)
     */
    private $waypoint_debut;

    /**
     * @var string
     *
     * @ORM\Column(name="waypoint_fin", type="string", length=8, nullable=true)
     */
    private $waypoint_fin;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude_debut", type="decimal", precision=11, scale=8)
     * @Assert\Range(
     *      min = -50,
     *      max = -48.4,
     *      minMessage = "La latitude doit être supérieure à {{ limit }}°",
     *      maxMessage = "La latitude doit être inférieure à {{ limit }}°"
     * )
     */
    private $latitude_debut;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude_fin", type="decimal", precision=11, scale=8)
     * @Assert\Range(
     *      min = -50,
     *      max = -48.4,
     *      minMessage = "La latitude doit être supérieure à {{ limit }}°",
     *      maxMessage = "La latitude doit être inférieure à {{ limit }}°"
     * )
     */
    private $latitude_fin;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude_debut", type="decimal", precision=11, scale=8)
     * @Assert\Range(
     *      min = 68,
     *      max = 71,
     *      minMessage = "La longitude doit être supérieure à {{ limit }}°",
     *      maxMessage = "La longitude doit être inférieure à {{ limit }}°"
     * )
     */
    private $longitude_debut;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude_fin", type="decimal", precision=11, scale=8)
     * @Assert\Range(
     *      min = 68,
     *      max = 71,
     *      minMessage = "La longitude doit être supérieure à {{ limit }}°",
     *      maxMessage = "La longitude doit être inférieure à {{ limit }}°"
     * )
     */
    private $longitude_fin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime")
     */
    private $date_debut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime")
     */
    private $date_fin;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString(){
        //MAJ nécessaire
        return "Début : (Lat. ".$this->latitude_debut.", Loc. ".$this->longitude_debut.") | Fin : (Lat. ".$this->latitude_fin.", Loc. ".$this->longitude_fin.")";
    }

    public function updateLocalisation($date){
        //à confirmer ?
        $this->setDateDebut(new \DateTime($date->format('Y')."-".$date->format('m')."-".$date->format('d')." ".$this->date_debut->format('H').":".$this->date_debut->format('i')));
        $this->setDateFin(new \DateTime($date->format('Y')."-".$date->format('m')."-".$date->format('d')." ".$this->date_fin->format('H').":".$this->date_fin->format('i')));
    }

    /**
     * Set waypointDebut.
     *
     * @param string|null $waypointDebut
     *
     * @return Localisation
     */
    public function setWaypointDebut($waypointDebut = null)
    {
        $this->waypoint_debut = $waypointDebut;

        return $this;
    }

    /**
     * Get waypointDebut.
     *
     * @return string|null
     */
    public function getWaypointDebut()
    {
        return $this->waypoint_debut;
    }

    /**
     * Set waypointFin.
     *
     * @param string|null $waypointFin
     *
     * @return Localisation
     */
    public function setWaypointFin($waypointFin = null)
    {
        $this->waypoint_fin = $waypointFin;

        return $this;
    }

    /**
     * Get waypointFin.
     *
     * @return string|null
     */
    public function getWaypointFin()
    {
        return $this->waypoint_fin;
    }

    /**
     * Set latitudeDebut.
     *
     * @param string $latitudeDebut
     *
     * @return Localisation
     */
    public function setLatitudeDebut($latitudeDebut)
    {
        $this->latitude_debut = $latitudeDebut;

        return $this;
    }

    /**
     * Get latitudeDebut.
     *
     * @return string
     */
    public function getLatitudeDebut()
    {
        return $this->latitude_debut;
    }

    /**
     * Set latitudeFin.
     *
     * @param string $latitudeFin
     *
     * @return Localisation
     */
    public function setLatitudeFin($latitudeFin)
    {
        $this->latitude_fin = $latitudeFin;

        return $this;
    }

    /**
     * Get latitudeFin.
     *
     * @return string
     */
    public function getLatitudeFin()
    {
        return $this->latitude_fin;
    }

    /**
     * Set longitudeDebut.
     *
     * @param string $longitudeDebut
     *
     * @return Localisation
     */
    public function setLongitudeDebut($longitudeDebut)
    {
        $this->longitude_debut = $longitudeDebut;

        return $this;
    }

    /**
     * Get longitudeDebut.
     *
     * @return string
     */
    public function getLongitudeDebut()
    {
        return $this->longitude_debut;
    }

    /**
     * Set longitudeFin.
     *
     * @param string $longitudeFin
     *
     * @return Localisation
     */
    public function setLongitudeFin($longitudeFin)
    {
        $this->longitude_fin = $longitudeFin;

        return $this;
    }

    /**
     * Get longitudeFin.
     *
     * @return string
     */
    public function getLongitudeFin()
    {
        return $this->longitude_fin;
    }

    /**
     * Set dateDebut.
     *
     * @param \DateTime $dateDebut
     *
     * @return Localisation
     */
    public function setDateDebut($dateDebut)
    {
        $this->date_debut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut.
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * Set dateFin.
     *
     * @param \DateTime $dateFin
     *
     * @return Localisation
     */
    public function setDateFin($dateFin)
    {
        $this->date_fin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin.
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }
}
