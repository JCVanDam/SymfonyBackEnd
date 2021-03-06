<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Observation
 *
 * Archivé:
 * -longD
 * -longM
 * -longS
 * -latD
 * -latM
 * -latS
 * -categorie
 * -typeObservation
 * -nomInitial
 * -codeGPS
 * -nomIdentiteSite
 * @ORM\Table(name="observation")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\ObservationRepository")
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
    *
    * @ORM\OneToOne(targetEntity="Eradication", inversedBy="observation", orphanRemoval=true, cascade={"persist", "remove"})
    * @ORM\JoinColumn(name="eradication_id", referencedColumnName="id", nullable=true)
    */
    private $eradication;

    /**
    *
    * @ORM\OneToOne(targetEntity="FicheTerrain", inversedBy="observation", orphanRemoval=true, cascade={"persist", "remove"})
    * @ORM\JoinColumn(name="ficheterrain_id", referencedColumnName="id", nullable=true)
    */
    private $ficheTerrain;

    /**
    *
    * @ORM\OneToMany(targetEntity="Phylica", mappedBy="observation", cascade={"remove"})
    */
    private $phylicas;

    /**
    *
    * @ORM\OneToOne(targetEntity="MethodologieInvertebre", inversedBy="observation", orphanRemoval=true, cascade={"persist", "remove"})
    * @ORM\JoinColumn(name="methodologieInvertebre_id", referencedColumnName="id", nullable=true)
    */
    private $methodologieInvertebre;

    /**
    *
    * @ORM\OneToMany(targetEntity="DescriptionInvertebre", mappedBy="observation", orphanRemoval=true, cascade={"persist", "remove"})
    */
    private $descriptionInvertebres;

    /**
    *
    * @ORM\OneToMany(targetEntity="DescriptionVegetation", mappedBy="observation", orphanRemoval=true, cascade={"persist", "remove"})
    */
    private $descriptionVegetations;

    /**
    *
    * @ORM\OneToMany(targetEntity="DescriptionVertebre", mappedBy="observation", orphanRemoval=true, cascade={"persist", "remove"})
    */
    private $descriptionVertebres;

    /**
    *
    * @ORM\ManyToOne(targetEntity="Toponyme", inversedBy="observations")
    */
    private $toponyme;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_espece_eradication", type="string", length=255, nullable=true)
     */
    private $nomEspeceEradication;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_espece_invertebre", type="string", length=255, nullable=true)
     */
    private $nomEspeceInvertebre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifiant_manip", type="string", length=255, nullable=true)
     */
    private $identifiantManip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero_plantation", type="string", length=255, nullable=true)
     */
    private $numeroPlantation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nb_phylica", type="integer", nullable=true)
     */
    private $nbPhylica;

    /**
     * @var string
     *
     * @ORM\Column(name="n_activite", type="string", length=50, nullable=true)
     */
    private $nActivite;

    /**
    * @var string
    *
    * @ORM\Column(name="protocole", type="string", length=255, nullable=true)
    */
    private $protocole;

    /**
     * @var string|null
     *
     * @ORM\Column(name="n_protocole_autre", type="string", length=255, nullable=true)
     */
    private $nProtocoleAutre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire", type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero_observation", type="string", length=50, nullable=true, unique=true)
     */
    private $numeroObservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_observation", type="datetime", nullable=true)
     */
    private $dateObservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_saisie", type="datetime", nullable=true)
     */
    private $dateSaisie;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255, nullable=true)
     */
    private $source;

    /**
    *
    * @ORM\Column(name="observation_user", type="simple_array", length=255, nullable=true)
    */
    private $observationUser;

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
     * @var bool
     *
     * @ORM\Column(name="n_releve_vegetation", type="boolean", nullable=true)
     */
    private $nReleveVegetation;

    /**
     * @var bool
     *
     * @ORM\Column(name="n_releve_invertebre", type="boolean", nullable=true)
     */
    private $nReleveInvertebre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lieu_prelevement", type="text", nullable=true)
     */
    private $lieuPrelevement;

    /**
     * @var bool
     *
     * @ORM\Column(name="echantillon", type="boolean", nullable=true)
     */
    private $echantillon;

    /**
     * @var string
     *
     * @ORM\Column(name="reference_echantillon", type="string", length=200, nullable=true)
     */
    private $referenceEchantillon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_echantillon", type="string", length=150, nullable=true)
     */
    private $typeEchantillon;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nombre_echantillon", type="integer", nullable=true)
     */
    private $nombreEchantillon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="statut_description_vegetations", type="string", length=150, nullable=true)
     */
    private $statutDescriptionVegetations;

    /**
     * @var bool
     *
     * @ORM\Column(name="photo", type="string", length=100, nullable=true)
     */
    private $photo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference_photo", type="string", length=255, nullable=true)
     */
    private $referencePhoto;

// Archive

    /**
     * @var float|null
     *
     * @ORM\Column(name="lat_d", type="float", nullable=true)
     */
    private $latD;

    /**
     * @var float|null
     *
     * @ORM\Column(name="lat_m", type="float", nullable=true)
     */
    private $latM;

    /**
     * @var float|null
     *
     * @ORM\Column(name="lat_s", type="float", nullable=true)
     */
    private $latS;


    /**
     * @var float|null
     *
     * @ORM\Column(name="long_d", type="float", nullable=true)
     */
    private $longD;

    /**
     * @var float|null
     *
     * @ORM\Column(name="long_m", type="float", nullable=true)
     */
    private $longM;

    /**
     * @var float|null
     *
     * @ORM\Column(name="long_s", type="float", nullable=true)
     */
    private $longS;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->phylicas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->descriptionInvertebres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->descriptionVegetations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->descriptionVertebres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ficheTerrains = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set numeroObservation.
     *
     * @param string|null $numeroObservation
     *
     * @return Observation
     */
    public function setNumeroObservation($numeroObservation = null)
    {
        $this->numeroObservation = $numeroObservation;

        return $this;
    }

    /**
     * Get numeroObservation.
     *
     * @return string|null
     */
    public function getNumeroObservation()
    {
        return $this->numeroObservation;
    }

    /**
     * Set dateObservation.
     *
     * @param \DateTime|null $dateObservation
     *
     * @return Observation
     */
    public function setDateObservation($dateObservation = null)
    {
        $this->dateObservation = $dateObservation;

        return $this;
    }

    /**
     * Get dateObservation.
     *
     * @return \DateTime|null
     */
    public function getDateObservation()
    {
        return $this->dateObservation;
    }

    /**
     * Set dateSaisie.
     *
     * @param \DateTime|null $dateSaisie
     *
     * @return Observation
     */
    public function setDateSaisie($dateSaisie = null)
    {
        $this->dateSaisie = $dateSaisie;

        return $this;
    }

    /**
     * Get dateSaisie.
     *
     * @return \DateTime|null
     */
    public function getDateSaisie()
    {
        return $this->dateSaisie;
    }

    /**
     * Set source.
     *
     * @param string|null $source
     *
     * @return Observation
     */
    public function setSource($source = null)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source.
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set ObservationUser.
     *
     * @param array|null $observationUser
     *
     * @return Observation
     */
    public function setObservationUser($observationUser = null)
    {
        $this->observationUser = $observationUser;

        return $this;
    }

    /**
     * Get observationUser.
     *
     * @return array|null
     */
    public function getObservationUser()
    {
        return $this->observationUser;
    }

    /**
     * Set latitude.
     *
     * @param float|null $latitude
     *
     * @return Observation
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
     * @return Observation
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
     * @return Observation
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
     * Set nReleveVegetation.
     *
     * @param bool|null $nReleveVegetation
     *
     * @return Observation
     */
    public function setNReleveVegetation($nReleveVegetation = null)
    {
        $this->nReleveVegetation = $nReleveVegetation;

        return $this;
    }

    /**
     * Get nReleveVegetation.
     *
     * @return bool|null
     */
    public function getNReleveVegetation()
    {
        return $this->nReleveVegetation;
    }

    /**
     * Set nReleveInvertebre.
     *
     * @param bool|null $nReleveInvertebre
     *
     * @return Observation
     */
    public function setNReleveInvertebre($nReleveInvertebre = null)
    {
        $this->nReleveInvertebre = $nReleveInvertebre;

        return $this;
    }

    /**
     * Get nReleveInvertebre.
     *
     * @return bool|null
     */
    public function getNReleveInvertebre()
    {
        return $this->nReleveInvertebre;
    }

    /**
     * Set lieuPrelevement.
     *
     * @param string|null $lieuPrelevement
     *
     * @return Observation
     */
    public function setLieuPrelevement($lieuPrelevement = null)
    {
        $this->lieuPrelevement = $lieuPrelevement;

        return $this;
    }

    /**
     * Get lieuPrelevement.
     *
     * @return string|null
     */
    public function getLieuPrelevement()
    {
        return $this->lieuPrelevement;
    }

    /**
     * Set echantillon.
     *
     * @param string|null $echantillon
     *
     * @return Observation
     */
    public function setEchantillon($echantillon = null)
    {
        $this->echantillon = $echantillon;

        return $this;
    }

    /**
     * Get echantillon.
     *
     * @return string|null
     */
    public function getEchantillon()
    {
        return $this->echantillon;
    }

    /**
     * Set referenceEchantillon.
     *
     * @param string|null $referenceEchantillon
     *
     * @return Observation
     */
    public function setReferenceEchantillon($referenceEchantillon = null)
    {
        $this->referenceEchantillon = $referenceEchantillon;

        return $this;
    }

    /**
     * Get referenceEchantillon.
     *
     * @return string|null
     */
    public function getReferenceEchantillon()
    {
        return $this->referenceEchantillon;
    }

    /**
     * Set typeEchantillon.
     *
     * @param string|null $typeEchantillon
     *
     * @return Observation
     */
    public function setTypeEchantillon($typeEchantillon = null)
    {
        $this->typeEchantillon = $typeEchantillon;

        return $this;
    }

    /**
     * Get typeEchantillon.
     *
     * @return string|null
     */
    public function getTypeEchantillon()
    {
        return $this->typeEchantillon;
    }

    /**
     * Set nombreEchantillon.
     *
     * @param int|null $nombreEchantillon
     *
     * @return Observation
     */
    public function setNombreEchantillon($nombreEchantillon = null)
    {
        $this->nombreEchantillon = $nombreEchantillon;

        return $this;
    }

    /**
     * Get nombreEchantillon.
     *
     * @return int|null
     */
    public function getNombreEchantillon()
    {
        return $this->nombreEchantillon;
    }

    /**
     * Set photo.
     *
     * @param bool|null $photo
     *
     * @return Observation
     */
    public function setPhoto($photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo.
     *
     * @return bool|null
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set referencePhoto.
     *
     * @param string|null $referencePhoto
     *
     * @return Observation
     */
    public function setReferencePhoto($referencePhoto = null)
    {
        $this->referencePhoto = $referencePhoto;

        return $this;
    }

    /**
     * Get referencePhoto.
     *
     * @return string|null
     */
    public function getReferencePhoto()
    {
        return $this->referencePhoto;
    }

    /**
     * Set latD.
     *
     * @param float|null $latD
     *
     * @return Observation
     */
    public function setLatD($latD = null)
    {
        $this->latD = $latD;

        return $this;
    }

    /**
     * Get latD.
     *
     * @return float|null
     */
    public function getLatD()
    {
        return $this->latD;
    }

    /**
     * Set latM.
     *
     * @param float|null $latM
     *
     * @return Observation
     */
    public function setLatM($latM = null)
    {
        $this->latM = $latM;

        return $this;
    }

    /**
     * Get latM.
     *
     * @return float|null
     */
    public function getLatM()
    {
        return $this->latM;
    }

    /**
     * Set latS.
     *
     * @param float|null $latS
     *
     * @return Observation
     */
    public function setLatS($latS = null)
    {
        $this->latS = $latS;

        return $this;
    }

    /**
     * Get latS.
     *
     * @return float|null
     */
    public function getLatS()
    {
        return $this->latS;
    }

    /**
     * Set longD.
     *
     * @param float|null $longD
     *
     * @return Observation
     */
    public function setLongD($longD = null)
    {
        $this->longD = $longD;

        return $this;
    }

    /**
     * Get longD.
     *
     * @return float|null
     */
    public function getLongD()
    {
        return $this->longD;
    }

    /**
     * Set longM.
     *
     * @param float|null $longM
     *
     * @return Observation
     */
    public function setLongM($longM = null)
    {
        $this->longM = $longM;

        return $this;
    }

    /**
     * Get longM.
     *
     * @return float|null
     */
    public function getLongM()
    {
        return $this->longM;
    }

    /**
     * Set longS.
     *
     * @param float|null $longS
     *
     * @return Observation
     */
    public function setLongS($longS = null)
    {
        $this->longS = $longS;

        return $this;
    }

    /**
     * Get longS.
     *
     * @return float|null
     */
    public function getLongS()
    {
        return $this->longS;
    }

    /**
     * Set eradication.
     *
     * @param \HFIBundle\Entity\Eradication|null $eradication
     *
     * @return Observation
     */
    public function setEradication(\HFIBundle\Entity\Eradication $eradication = null)
    {
        $this->eradication = $eradication;

        return $this;
    }

    /**
     * Get eradication.
     *
     * @return \HFIBundle\Entity\Eradication|null
     */
    public function getEradication()
    {
        return $this->eradication;
    }

    /**
     * Add descriptionVegetation.
     *
     * @param \HFIBundle\Entity\DescriptionVegetation $descriptionVegetation
     *
     * @return Observation
     */
    public function addDescriptionVegetation(\HFIBundle\Entity\DescriptionVegetation $descriptionVegetation)
    {
        $descriptionVegetation->setObservation($this);
        $this->descriptionVegetations[] = $descriptionVegetation;

        return $this;
    }

    /**
     * Remove descriptionVegetation.
     *
     * @param \HFIBundle\Entity\DescriptionVegetation $descriptionVegetation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDescriptionVegetation(\HFIBundle\Entity\DescriptionVegetation $descriptionVegetation)
    {
        return $this->descriptionVegetations->removeElement($descriptionVegetation);
    }

    /**
     * Get descriptionVegetations.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDescriptionVegetations()
    {
        return $this->descriptionVegetations;
    }

    /**
     * Set descriptionVegetations.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function setDescriptionVegetations($descriptionVegetations)
    {
      foreach($descriptionVegetations as $descriptionVegetation){
        $this->addDescriptionVegetation($descriptionVegetation);
      }
      return $this->descriptionVegetations;
    }

    /**
     * Add descriptionVertebre.
     *
     * @param \HFIBundle\Entity\DescriptionVertebre $descriptionVertebre
     *
     * @return Observation
     */
    public function addDescriptionVertebre(\HFIBundle\Entity\DescriptionVertebre $descriptionVertebre)
    {
        $descriptionVertebre->setObservation($this);
        $this->descriptionVertebres[] = $descriptionVertebre;

        return $this;
    }

    /**
     * Remove descriptionVertebre.
     *
     * @param \HFIBundle\Entity\DescriptionVertebre $descriptionVertebre
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDescriptionVertebre(\HFIBundle\Entity\DescriptionVertebre $descriptionVertebre)
    {
        return $this->descriptionVertebres->removeElement($descriptionVertebre);
    }

    /**
     * Get descriptionVertebres.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDescriptionVertebres()
    {
        return $this->descriptionVertebres;
    }

    /**
     * Set descriptionVertebres.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function setDescriptionVertebres($descriptionVertebres)
    {
      foreach($descriptionVertebres as $descriptionVertebre){
        $this->addDescriptionVertebre($descriptionVertebre);
      }
      return $this->descriptionVertebres;
    }

    /**
     * Set ficheTerrain.
     *
     * @param \HFIBundle\Entity\FicheTerrain|null $ficheTerrain
     *
     * @return Observation
     */
    public function setFicheTerrain(\HFIBundle\Entity\FicheTerrain $ficheTerrain = null)
    {
        $this->ficheTerrain = $ficheTerrain;

        return $this;
    }

    /**
     * Get ficheTerrain.
     *
     * @return \HFIBundle\Entity\FicheTerrain|null
     */
    public function getFicheTerrain()
    {
        return $this->ficheTerrain;
    }


    /**
     * Set identifiantManip.
     *
     * @param string|null $identifiantManip
     *
     * @return Observation
     */
    public function setIdentifiantManip($identifiantManip = null)
    {
        $this->identifiantManip = $identifiantManip;

        return $this;
    }

    /**
     * Get identifiantManip.
     *
     * @return string|null
     */
    public function getIdentifiantManip()
    {
        return $this->identifiantManip;
    }

    /**
     * Set commentaire.
     *
     * @param string|null $commentaire
     *
     * @return Observation
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
     * Set nActivite.
     *
     * @param array|null $nActivite
     *
     * @return Observation
     */
    public function setNActivite($nActivite = null)
    {
        $this->nActivite = $nActivite;

        return $this;
    }

    /**
     * Get nActivite.
     *
     * @return array|null
     */
    public function getNActivite()
    {
        return $this->nActivite;
    }

    /**
     * Set protocole.
     *
     * @param array|null $protocole
     *
     * @return Observation
     */
    public function setProtocole($protocole = null)
    {
        $this->protocole = $protocole;

        return $this;
    }

    /**
     * Get protocole.
     *
     * @return array|null
     */
    public function getProtocole()
    {
        return $this->protocole;
    }

    /**
     * Set nProtocoleAutre.
     *
     * @param string|null $nProtocoleAutre
     *
     * @return Observation
     */
    public function setNProtocoleAutre($nProtocoleAutre = null)
    {
        $this->nProtocoleAutre = $nProtocoleAutre;

        return $this;
    }

    /**
     * Get nProtocoleAutre.
     *
     * @return string|null
     */
    public function getNProtocoleAutre()
    {
        return $this->nProtocoleAutre;
    }

    /**
     * Set methodologieInvertebre.
     *
     * @param \HFIBundle\Entity\MethodologieInvertebre|null $methodologieInvertebre
     *
     * @return Observation
     */
    public function setMethodologieInvertebre(\HFIBundle\Entity\MethodologieInvertebre $methodologieInvertebre = null)
    {
        $this->methodologieInvertebre = $methodologieInvertebre;

        return $this;
    }

    /**
     * Get methodologieInvertebre.
     *
     * @return \HFIBundle\Entity\MethodologieInvertebre|null
     */
    public function getMethodologieInvertebre()
    {
        return $this->methodologieInvertebre;
    }

    /**
     * Add descriptionInvertebre.
     *
     * @param \HFIBundle\Entity\DescriptionInvertebre $descriptionInvertebre
     *
     * @return Observation
     */
    public function addDescriptionInvertebre(\HFIBundle\Entity\DescriptionInvertebre $descriptionInvertebre)
    {
        $descriptionInvertebre->setObservation($this);
        $this->descriptionInvertebres[] = $descriptionInvertebre;

        return $this;
    }

    /**
     * Remove descriptionInvertebre.
     *
     * @param \HFIBundle\Entity\DescriptionInvertebre $descriptionInvertebre
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDescriptionInvertebre(\HFIBundle\Entity\DescriptionInvertebre $descriptionInvertebre)
    {
        return $this->descriptionInvertebres->removeElement($descriptionInvertebre);
    }

    /**
     * Get descriptionInvertebres.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDescriptionInvertebres()
    {
        return $this->descriptionInvertebres;
    }

    /**
     * Set descriptionInvertebres.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function setDescriptionInvertebres($descriptionInvertebres)
    {
      foreach($descriptionInvertebres as $descriptionInvertebre){
        $this->addDescriptionInvertebre($descriptionInvertebre);
      }
      return $this->descriptionInvertebres;
    }


    /**
     * Set nomEspeceEradication.
     *
     * @param string|null $nomEspeceEradication
     *
     * @return Observation
     */
    public function setNomEspeceEradication($nomEspeceEradication = null)
    {
        $this->nomEspeceEradication = $nomEspeceEradication;

        return $this;
    }

    /**
     * Get nomEspeceEradication.
     *
     * @return string|null
     */
    public function getNomEspeceEradication()
    {
        return $this->nomEspeceEradication;
    }

    /**
     * Set nomEspeceInvertebre.
     *
     * @param string|null $nomEspeceInvertebre
     *
     * @return Observation
     */
    public function setNomEspeceInvertebre($nomEspeceInvertebre = null)
    {
        $this->nomEspeceInvertebre = $nomEspeceInvertebre;

        return $this;
    }

    /**
     * Get nomEspeceInvertebre.
     *
     * @return string|null
     */
    public function getNomEspeceInvertebre()
    {
        return $this->nomEspeceInvertebre;
    }

    /**
     * Set statutDescriptionVegetations.
     *
     * @param string|null $statutDescriptionVegetations
     *
     * @return Observation
     */
    public function setStatutDescriptionVegetations($statutDescriptionVegetations = null)
    {
        $this->statutDescriptionVegetations = $statutDescriptionVegetations;

        return $this;
    }

    /**
     * Get statutDescriptionVegetations.
     *
     * @return string|null
     */
    public function getStatutDescriptionVegetations()
    {
        return $this->statutDescriptionVegetations;
    }

    /**
     * Set toponyme.
     *
     * @param \HFIBundle\Entity\Toponyme|null $toponyme
     *
     * @return Observation
     */
    public function setToponyme(\HFIBundle\Entity\Toponyme $toponyme = null)
    {
        $this->toponyme = $toponyme;

        return $this;
    }

    /**
     * Get toponyme.
     *
     * @return \HFIBundle\Entity\Toponyme|null
     */
    public function getToponyme()
    {
        return $this->toponyme;
    }

    /**
     * Set numeroPlantation.
     *
     * @param string|null $numeroPlantation
     *
     * @return Observation
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
     * Add phylica.
     *
     * @param \HFIBundle\Entity\Phylica $phylica
     *
     * @return Observation
     */
    public function addPhylica(\HFIBundle\Entity\Phylica $phylica)
    {
        // $phylica->setObservation($this);
        $this->phylicas[] = $phylica;

        return $this;
    }

    /**
     * Remove phylica.
     *
     * @param \HFIBundle\Entity\Phylica $phylica
     */
    public function removePhylica(\HFIBundle\Entity\Phylica $phylica)
    {
        $this->phylicas->removeElement($phylica);
    }

    /**
     * Get phylicas.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhylicas()
    {
        return $this->phylicas;
    }

    // public function __toString()
    // {
    //     return $this->numeroPlantation ? $this->numeroPlantation : "observation";
    // }

    /**
     * Set nbPhylica.
     *
     * @param int|null $nbPhylica
     *
     * @return Observation
     */
    public function setNbPhylica($nbPhylica = null)
    {
        $this->nbPhylica = $nbPhylica;

        return $this;
    }

    /**
     * Get nbPhylica.
     *
     * @return int|null
     */
    public function getNbPhylica()
    {
        return $this->nbPhylica;
    }
}
