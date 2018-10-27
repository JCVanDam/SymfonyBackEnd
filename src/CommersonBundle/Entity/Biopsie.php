<?php

namespace CommersonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Biopsie
 *
 * @ORM\Table(name="biopsie")
 * @ORM\Entity(repositoryClass="CommersonBundle\Repository\BiopsieRepository")
 */
class Biopsie
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
     * @ORM\Column(name="numero_biopsie", type="integer")
     * @Assert\Range(
     *      min = 1,
     *      minMessage = "Merci de saisir un numéro de biopsie supérieur ou égal à {{ limit }}"
     * )
     */
    private $numeroBiopsie;

    /**
     * @var string
     *
     * @ORM\Column(name="position_biopsie", type="string", length=255)
     */
    private $positionBiopsie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="whale_ID", type="string", length=255, nullable=true)
     */
    private $whaleID;

    /**
     * @var string
     *
     * @ORM\Column(name="bateau", type="string", length=255)
     */
    private $bateau;

    /**
     * @var int|null
     *
     * @var string
     *
     * @ORM\Column(name="waypoint", type="string", length=8, nullable=true)
     */
    private $waypoint;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="decimal", precision=11, scale=8)
     * @Assert\Range(
     *      min = -50,
     *      max = -48.4,
     *      minMessage = "La latitude doit être supérieure à {{ limit }}°",
     *      maxMessage = "La latitude doit être inférieure à {{ limit }}°"
     * )
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="decimal", precision=11, scale=8)
     * @Assert\Range(
     *      min = 68,
     *      max = 71,
     *      minMessage = "La longitude doit être supérieure à {{ limit }}°",
     *      maxMessage = "La longitude doit être inférieure à {{ limit }}°"
     * )
     */
    private $longitude;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modele_arme", type="string", length=255, nullable=true)
     */
    private $modeleArme;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dimension_embout", type="string", length=255, nullable=true)
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Merci de saisir une dimension supérieure à {{ limit }} millimètre(s)"
     * )
     */
    private $dimensionEmbout;

    /**
     * @var int|null
     *
     * @ORM\Column(name="distance_tir", type="integer", nullable=true)
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Merci de saisir une distance supérieure à {{ limit }} mètre(s)"
     * )
     */
    private $distanceTir;

    /**
     * @var bool
     *
     * @ORM\Column(name="embout_touche", type="boolean")
     */
    private $emboutTouche;

    /**
     * @var bool
     *
     * @ORM\Column(name="embout_penetre", type="boolean")
     */
    private $emboutPenetre;

    /**
     * @var bool
     *
     * @ORM\Column(name="embout_recupere", type="boolean")
     */
    private $emboutRecupere;

    /**
     * @var bool
     *
     * @ORM\Column(name="echantillon_peau", type="boolean")
     */
    private $echantillonPeau;

    /**
     * @var bool
     *
     * @ORM\Column(name="echantillon_chair", type="boolean")
     */
    private $echantillonChair;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comportement_individu_select",  type="string", length=255, nullable=true)
     */
    private $comportementIndividuSelect;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comportement_groupe_select",  type="string", length=255, nullable=true)
     */
    private $comportementGroupeSelect;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comportement_groupe_avant", type="text", nullable=true)
     */
    private $comportementGroupeAvant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comportement_groupe_apres", type="text", nullable=true)
     */
    private $comportementGroupeApres;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarque", type="text", nullable=true)
     */
    private $remarque;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fichiers_videos", type="text", nullable=true)
     */
    private $fichiersVideos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fichiers_photos", type="text", nullable=true)
     */
    private $fichiersPhotos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reaction_individu", type="string", length=255, nullable=true)
     */
    private $reactionIndividu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reaction_groupe", type="string", length=255, nullable=true)
     */
    private $reactionGroupe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="arme", type="string", length=255, nullable=true)
     */
    private $arme;

    /**
     * @var bool
     *
     * @ORM\Column(name="photo_oui_non", type="boolean")
     */
    private $photoOuiNon;

    /**
     * @var bool
     *
     * @ORM\Column(name="video_oui_non", type="boolean")
     */
    private $videoOuiNon;

    /**
     * @ORM\ManyToOne(targetEntity="CommersonBundle\Entity\MyUser")
     */
    private $tireur;

    /**
     * @ORM\ManyToOne(targetEntity="Observation", inversedBy="biopsies")
     * @ORM\JoinColumn(nullable=true)
     */
    private $observation;

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
     * Set numeroBiopsie.
     *
     * @param int $numeroBiopsie
     *
     * @return Biopsie
     */
    public function setNumeroBiopsie($numeroBiopsie)
    {
        $this->numeroBiopsie = $numeroBiopsie;

        return $this;
    }

    /**
     * Get numeroBiopsie.
     *
     * @return int
     */
    public function getNumeroBiopsie()
    {
        return $this->numeroBiopsie;
    }

    /**
     * Set whaleID.
     *
     * @param string|null $whaleID
     *
     * @return Biopsie
     */
    public function setWhaleID($whaleID = null)
    {
        $this->whaleID = $whaleID;

        return $this;
    }

    /**
     * Get whaleID.
     *
     * @return string|null
     */
    public function getWhaleID()
    {
        return $this->whaleID;
    }

    /**
     * Set modeleArme.
     *
     * @param string|null $modeleArme
     *
     * @return Biopsie
     */
    public function setModeleArme($modeleArme = null)
    {
        $this->modeleArme = $modeleArme;

        return $this;
    }

    /**
     * Get modeleArme.
     *
     * @return string|null
     */
    public function getModeleArme()
    {
        return $this->modeleArme;
    }

    /**
     * Set dimensionEmbout.
     *
     * @param string|null $dimensionEmbout
     *
     * @return Biopsie
     */
    public function setDimensionEmbout($dimensionEmbout = null)
    {
        $this->dimensionEmbout = $dimensionEmbout;

        return $this;
    }

    /**
     * Get dimensionEmbout.
     *
     * @return string|null
     */
    public function getDimensionEmbout()
    {
        return $this->dimensionEmbout;
    }

    /**
     * Set distanceTir.
     *
     * @param int|null $distanceTir
     *
     * @return Biopsie
     */
    public function setDistanceTir($distanceTir = null)
    {
        $this->distanceTir = $distanceTir;

        return $this;
    }

    /**
     * Get distanceTir.
     *
     * @return int|null
     */
    public function getDistanceTir()
    {
        return $this->distanceTir;
    }

    /**
     * Set emboutTouche.
     *
     * @param bool $emboutTouche
     *
     * @return Biopsie
     */
    public function setEmboutTouche($emboutTouche)
    {
        $this->emboutTouche = $emboutTouche;

        return $this;
    }

    /**
     * Get emboutTouche.
     *
     * @return bool
     */
    public function getEmboutTouche()
    {
        return $this->emboutTouche;
    }

    /**
     * Set emboutPenetre.
     *
     * @param bool $emboutPenetre
     *
     * @return Biopsie
     */
    public function setEmboutPenetre($emboutPenetre)
    {
        $this->emboutPenetre = $emboutPenetre;

        return $this;
    }

    /**
     * Get emboutPenetre.
     *
     * @return bool
     */
    public function getEmboutPenetre()
    {
        return $this->emboutPenetre;
    }

    /**
     * Set emboutRecupere.
     *
     * @param bool $emboutRecupere
     *
     * @return Biopsie
     */
    public function setEmboutRecupere($emboutRecupere)
    {
        $this->emboutRecupere = $emboutRecupere;

        return $this;
    }

    /**
     * Get emboutRecupere.
     *
     * @return bool
     */
    public function getEmboutRecupere()
    {
        return $this->emboutRecupere;
    }

    /**
     * Set echantillonPeau.
     *
     * @param bool $echantillonPeau
     *
     * @return Biopsie
     */
    public function setEchantillonPeau($echantillonPeau)
    {
        $this->echantillonPeau = $echantillonPeau;

        return $this;
    }

    /**
     * Get echantillonPeau.
     *
     * @return bool
     */
    public function getEchantillonPeau()
    {
        return $this->echantillonPeau;
    }

    /**
     * Set echantillonChair.
     *
     * @param bool $echantillonChair
     *
     * @return Biopsie
     */
    public function setEchantillonChair($echantillonChair)
    {
        $this->echantillonChair = $echantillonChair;

        return $this;
    }

    /**
     * Get echantillonChair.
     *
     * @return bool
     */
    public function getEchantillonChair()
    {
        return $this->echantillonChair;
    }

    /**
     * Set comportementIndividu.
     *
     * @param string|null $comportementIndividu
     *
     * @return Biopsie
     */
    public function setComportementIndividu($comportementIndividu = null)
    {
        $this->comportementIndividu = $comportementIndividu;

        return $this;
    }

    /**
     * Get comportementIndividu.
     *
     * @return string|null
     */
    public function getComportementIndividu()
    {
        return $this->comportementIndividu;
    }

    /**
     * Set comportementGroupe.
     *
     * @param string|null $comportementGroupe
     *
     * @return Biopsie
     */
    public function setComportementGroupe($comportementGroupe = null)
    {
        $this->comportementGroupe = $comportementGroupe;

        return $this;
    }

    /**
     * Get comportementGroupe.
     *
     * @return string|null
     */
    public function getComportementGroupe()
    {
        return $this->comportementGroupe;
    }

    /**
     * Set comportementGroupeAvant.
     *
     * @param string|null $comportementGroupeAvant
     *
     * @return Biopsie
     */
    public function setComportementGroupeAvant($comportementGroupeAvant = null)
    {
        $this->comportementGroupeAvant = $comportementGroupeAvant;

        return $this;
    }

    /**
     * Get comportementGroupeAvant.
     *
     * @return string|null
     */
    public function getComportementGroupeAvant()
    {
        return $this->comportementGroupeAvant;
    }

    /**
     * Set comportementGroupeApres.
     *
     * @param string|null $comportementGroupeApres
     *
     * @return Biopsie
     */
    public function setComportementGroupeApres($comportementGroupeApres = null)
    {
        $this->comportementGroupeApres = $comportementGroupeApres;

        return $this;
    }

    /**
     * Get comportementGroupeApres.
     *
     * @return string|null
     */
    public function getComportementGroupeApres()
    {
        return $this->comportementGroupeApres;
    }

    /**
     * Set fichiersVideos.
     *
     * @param string|null $fichiersVideos
     *
     * @return Biopsie
     */
    public function setFichiersVideos($fichiersVideos = null)
    {
        $this->fichiersVideos = $fichiersVideos;

        return $this;
    }

    /**
     * Get fichiersVideos.
     *
     * @return string|null
     */
    public function getFichiersVideos()
    {
        return $this->fichiersVideos;
    }

    /**
     * Set fichiersPhotos.
     *
     * @param string|null $fichiersPhotos
     *
     * @return Biopsie
     */
    public function setFichiersPhotos($fichiersPhotos = null)
    {
        $this->fichiersPhotos = $fichiersPhotos;

        return $this;
    }

    /**
     * Get fichiersPhotos.
     *
     * @return string|null
     */
    public function getFichiersPhotos()
    {
        return $this->fichiersPhotos;
    }

    /**
     * Set reactionIndividu.
     *
     * @param string|null $reactionIndividu
     *
     * @return Biopsie
     */
    public function setReactionIndividu($reactionIndividu = null)
    {
        $this->reactionIndividu = $reactionIndividu;

        return $this;
    }

    /**
     * Get reactionIndividu.
     *
     * @return string|null
     */
    public function getReactionIndividu()
    {
        return $this->reactionIndividu;
    }

    /**
     * Set reactionGroupe.
     *
     * @param string|null $reactionGroupe
     *
     * @return Biopsie
     */
    public function setReactionGroupe($reactionGroupe = null)
    {
        $this->reactionGroupe = $reactionGroupe;

        return $this;
    }

    /**
     * Get reactionGroupe.
     *
     * @return string|null
     */
    public function getReactionGroupe()
    {
        return $this->reactionGroupe;
    }

    /**
     * Set arme.
     *
     * @param string|null $arme
     *
     * @return Biopsie
     */
    public function setArme($arme = null)
    {
        $this->arme = $arme;

        return $this;
    }

    /**
     * Get arme.
     *
     * @return string|null
     */
    public function getArme()
    {
        return $this->arme;
    }

    /**
     * Set localisation.
     *
     * @param \CommersonBundle\Entity\Localisation|null $localisation
     *
     * @return Biopsie
     */
    public function setLocalisation(\CommersonBundle\Entity\Localisation $localisation = null)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation.
     *
     * @return \CommersonBundle\Entity\Localisation|null
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * Set tireur.
     *
     * @param \CommersonBundle\Entity\MyUser|null $tireur
     *
     * @return Biopsie
     */
    public function setTireur(\CommersonBundle\Entity\MyUser $tireur = null)
    {
        $this->tireur = $tireur;

        return $this;
    }

    /**
     * Get tireur.
     *
     * @return \CommersonBundle\Entity\MyUser|null
     */
    public function getTireur()
    {
        return $this->tireur;
    }

    /**
     * Set observation.
     *
     * @param \CommersonBundle\Entity\Observation $observation
     *
     * @return Biopsie
     */
    public function setObservation(\CommersonBundle\Entity\Observation $observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation.
     *
     * @return \CommersonBundle\Entity\Observation
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set remarque.
     *
     * @param string|null $remarque
     *
     * @return Biopsie
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

    public function __toString() {
        return "Biopsie n° ".$this->numeroBiopsie;
    }

    /**
     * Set positionBiopsie.
     *
     * @param string $positionBiopsie
     *
     * @return Biopsie
     */
    public function setPositionBiopsie($positionBiopsie)
    {
        $this->positionBiopsie = $positionBiopsie;

        return $this;
    }

    /**
     * Get positionBiopsie.
     *
     * @return string
     */
    public function getPositionBiopsie()
    {
        return $this->positionBiopsie;
    }

    /**
     * Set comportementIndividuSelect.
     *
     * @param string|null $comportementIndividuSelect
     *
     * @return Biopsie
     */
    public function setComportementIndividuSelect($comportementIndividuSelect = null)
    {
        $this->comportementIndividuSelect = $comportementIndividuSelect;

        return $this;
    }

    /**
     * Get comportementIndividuSelect.
     *
     * @return string|null
     */
    public function getComportementIndividuSelect()
    {
        return $this->comportementIndividuSelect;
    }

    /**
     * Set comportementGroupeSelect.
     *
     * @param string|null $comportementGroupeSelect
     *
     * @return Biopsie
     */
    public function setComportementGroupeSelect($comportementGroupeSelect = null)
    {
        $this->comportementGroupeSelect = $comportementGroupeSelect;

        return $this;
    }

    /**
     * Get comportementGroupeSelect.
     *
     * @return string|null
     */
    public function getComportementGroupeSelect()
    {
        return $this->comportementGroupeSelect;
    }

    /**
     * Set photoOuiNon.
     *
     * @param bool $photoOuiNon
     *
     * @return Biopsie
     */
    public function setPhotoOuiNon($photoOuiNon)
    {
        $this->photoOuiNon = $photoOuiNon;

        return $this;
    }

    /**
     * Get photoOuiNon.
     *
     * @return bool
     */
    public function getPhotoOuiNon()
    {
        return $this->photoOuiNon;
    }

    /**
     * Set videoOuiNon.
     *
     * @param bool $videoOuiNon
     *
     * @return Biopsie
     */
    public function setVideoOuiNon($videoOuiNon)
    {
        $this->videoOuiNon = $videoOuiNon;

        return $this;
    }

    /**
     * Get videoOuiNon.
     *
     * @return bool
     */
    public function getVideoOuiNon()
    {
        return $this->videoOuiNon;
    }

    /**
     * Set bateau.
     *
     * @param string $bateau
     *
     * @return Biopsie
     */
    public function setBateau($bateau)
    {
        $this->bateau = $bateau;

        return $this;
    }

    /**
     * Get bateau.
     *
     * @return string
     */
    public function getBateau()
    {
        return $this->bateau;
    }

    /**
     * Set waypoint.
     *
     * @param string|null $waypoint
     *
     * @return Biopsie
     */
    public function setWaypoint($waypoint = null)
    {
        $this->waypoint = $waypoint;

        return $this;
    }

    /**
     * Get waypoint.
     *
     * @return string|null
     */
    public function getWaypoint()
    {
        return $this->waypoint;
    }

    /**
     * Set latitude.
     *
     * @param string $latitude
     *
     * @return Biopsie
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude.
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude.
     *
     * @param string $longitude
     *
     * @return Biopsie
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude.
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Biopsie
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
