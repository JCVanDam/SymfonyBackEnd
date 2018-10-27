<?php

namespace OrnithoPinniBundle\Entity\ECHOUAGE;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Decouverte
 *
 * @ORM\Table(name="echouage_decouverte")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\ECHOUAGE\DecouverteRepository")
 */
class Decouverte
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
     * @ORM\Column(name="age", type="string", length=255)
     */
    private $age;

    /**
     * @var string|null
     *
     * @ORM\Column(name="precisionGeo", type="string", length=255, nullable=true)
     */
    private $precisionGeo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="circonstanceEchouage", type="text", nullable=true)
     */
    private $circonstanceEchouage;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="etatGeneral", type="string", length=255, nullable=true)
     */
    private $etatGeneral;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isRelache", type="boolean", nullable=true)
     */
    private $isRelache;

    /**
     * @var string|null
     *
     * @ORM\Column(name="conditionRelache", type="text", nullable=true)
     */
    private $conditionRelache;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isPhotos", type="boolean", nullable=true)
     */
    private $isPhotos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photos", type="text", nullable=true)
     */
    private $photos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarque", type="text", nullable=true)
     */
    private $remarque;

    /**
     * @var string|null
     *
     * @ORM\Column(name="isBiometrie", type="text", nullable=true)
     */
    private $isBiometrie;

    /**
     * @ORM\OneToOne(targetEntity="Biometrie", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     * @Assert\Valid
     */
    private $biometrie;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\General\Position_GPS", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="general_position_gps_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $releve;

    /**
     * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\General\Espece")
     * @Assert\Valid
     */
    private $espece;

    /**
     * @ORM\ManyToOne(targetEntity="ProtocoleEnTournee", inversedBy="decouvertes")
     */
    private $protocoleEnTournee;

    /**
     * @ORM\ManyToOne(targetEntity="ProtocoleOpportuniste", inversedBy="decouvertes")
     */
    private $protocoleOpportuniste;

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
     * Set age.
     *
     * @param string $age
     *
     * @return Decouverte
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age.
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set precisionGeo.
     *
     * @param string|null $precisionGeo
     *
     * @return Decouverte
     */
    public function setPrecisionGeo($precisionGeo = null)
    {
        $this->precisionGeo = $precisionGeo;

        return $this;
    }

    /**
     * Get precisionGeo.
     *
     * @return string|null
     */
    public function getPrecisionGeo()
    {
        return $this->precisionGeo;
    }

    /**
     * Set circonstanceEchouage.
     *
     * @param string|null $circonstanceEchouage
     *
     * @return Decouverte
     */
    public function setCirconstanceEchouage($circonstanceEchouage = null)
    {
        $this->circonstanceEchouage = $circonstanceEchouage;

        return $this;
    }

    /**
     * Get circonstanceEchouage.
     *
     * @return string|null
     */
    public function getCirconstanceEchouage()
    {
        return $this->circonstanceEchouage;
    }

    /**
     * Set statut.
     *
     * @param string $statut
     *
     * @return Decouverte
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut.
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set etatGeneral.
     *
     * @param string $etatGeneral
     *
     * @return Decouverte
     */
    public function setEtatGeneral($etatGeneral)
    {
        $this->etatGeneral = $etatGeneral;

        return $this;
    }

    /**
     * Get etatGeneral.
     *
     * @return string
     */
    public function getEtatGeneral()
    {
        return $this->etatGeneral;
    }

    /**
     * Set isRelache.
     *
     * @param bool|null $isRelache
     *
     * @return Decouverte
     */
    public function setIsRelache($isRelache = null)
    {
        $this->isRelache = $isRelache;

        return $this;
    }

    /**
     * Get isRelache.
     *
     * @return bool|null
     */
    public function getIsRelache()
    {
        return $this->isRelache;
    }

    /**
     * Set conditionRelache.
     *
     * @param string|null $conditionRelache
     *
     * @return Decouverte
     */
    public function setConditionRelache($conditionRelache = null)
    {
        $this->conditionRelache = $conditionRelache;

        return $this;
    }

    /**
     * Get conditionRelache.
     *
     * @return string|null
     */
    public function getConditionRelache()
    {
        return $this->conditionRelache;
    }

    /**
     * Set isPhotos.
     *
     * @param bool|null $isPhotos
     *
     * @return Decouverte
     */
    public function setIsPhotos($isPhotos = null)
    {
        $this->isPhotos = $isPhotos;

        return $this;
    }

    /**
     * Get isPhotos.
     *
     * @return bool|null
     */
    public function getIsPhotos()
    {
        return $this->isPhotos;
    }

    /**
     * Set photos.
     *
     * @param string|null $photos
     *
     * @return Decouverte
     */
    public function setPhotos($photos = null)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * Get photos.
     *
     * @return string|null
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Set remarque.
     *
     * @param string|null $remarque
     *
     * @return Decouverte
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
     * Set biometrie.
     *
     * @param \OrnithoPinniBundle\Entity\ECHOUAGE\Biometrie|null $biometrie
     *
     * @return Decouverte
     */
    public function setBiometrie(\OrnithoPinniBundle\Entity\ECHOUAGE\Biometrie $biometrie = null)
    {
        $this->biometrie = $biometrie;

        return $this;
    }

    /**
     * Get biometrie.
     *
     * @return \OrnithoPinniBundle\Entity\ECHOUAGE\Biometrie|null
     */
    public function getBiometrie()
    {
        return $this->biometrie;
    }

    /**
     * Set releve.
     *
     * @param \OrnithoPinniBundle\Entity\General\Position_GPS|null $releve
     *
     * @return Decouverte
     */
    public function setReleve(\OrnithoPinniBundle\Entity\General\Position_GPS $releve = null)
    {
        $this->releve = $releve;

        return $this;
    }

    /**
     * Get releve.
     *
     * @return \OrnithoPinniBundle\Entity\General\Position_GPS|null
     */
    public function getReleve()
    {
        return $this->releve;
    }

    /**
     * Set espece.
     *
     * @param \OrnithoPinniBundle\Entity\General\Espece|null $espece
     *
     * @return Decouverte
     */
    public function setEspece(\OrnithoPinniBundle\Entity\General\Espece $espece = null)
    {
        $this->espece = $espece;

        return $this;
    }

    /**
     * Get espece.
     *
     * @return \OrnithoPinniBundle\Entity\General\Espece|null
     */
    public function getEspece()
    {
        return $this->espece;
    }

    /**
     * Set protocoleEnTournee.
     *
     * @param \OrnithoPinniBundle\Entity\ECHOUAGE\ProtocoleEnTournee|null $protocoleEnTournee
     *
     * @return Decouverte
     */
    public function setProtocoleEnTournee(\OrnithoPinniBundle\Entity\ECHOUAGE\ProtocoleEnTournee $protocoleEnTournee = null)
    {
        $this->protocoleEnTournee = $protocoleEnTournee;

        return $this;
    }

    /**
     * Get protocoleEnTournee.
     *
     * @return \OrnithoPinniBundle\Entity\ECHOUAGE\ProtocoleEnTournee|null
     */
    public function getProtocoleEnTournee()
    {
        return $this->protocoleEnTournee;
    }

    /**
     * Set protocoleOpportuniste.
     *
     * @param \OrnithoPinniBundle\Entity\ECHOUAGE\protocoleOpportuniste|null $protocoleOpportuniste
     *
     * @return Decouverte
     */
    public function setProtocoleOpportuniste(\OrnithoPinniBundle\Entity\ECHOUAGE\protocoleOpportuniste $protocoleOpportuniste = null)
    {
        $this->protocoleOpportuniste = $protocoleOpportuniste;

        return $this;
    }

    /**
     * Get protocoleOpportuniste.
     *
     * @return \OrnithoPinniBundle\Entity\ECHOUAGE\protocoleOpportuniste|null
     */
    public function getProtocoleOpportuniste()
    {
        return $this->protocoleOpportuniste;
    }

    /**
     * Set isBiometrie.
     *
     * @param string|null $isBiometrie
     *
     * @return Decouverte
     */
    public function setIsBiometrie($isBiometrie = null)
    {
        $this->isBiometrie = $isBiometrie;

        return $this;
    }

    /**
     * Get isBiometrie.
     *
     * @return string|null
     */
    public function getIsBiometrie()
    {
        return $this->isBiometrie;
    }

    public function __toString(){
        return "Decouverte n°".$this->id;
    }
}
