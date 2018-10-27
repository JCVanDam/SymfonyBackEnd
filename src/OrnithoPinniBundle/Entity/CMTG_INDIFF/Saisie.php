<?php

namespace OrnithoPinniBundle\Entity\CMTG_INDIFF;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Saisie
 *
 * @ORM\Table(name="cmtg_indiff_saisie")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_INDIFF\SaisieRepository")
 */
class Saisie
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
     * @var bool|null
     *
     * @ORM\Column(name="comptage_jumelle", type="boolean", nullable=true)
     */
    private $comptageJumelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comportement", type="string", length=255, nullable=true)
     */
    private $comportement;

    /**
     * @var string
     *
     * @ORM\Column(name="contacts_avec_espece", type="string", length=255, nullable=true)
     */
    private $contactsAvecEspece;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_comptage", type="string", length=255, nullable=true)
     */
    private $lieuComptage;

    /**
     * @var string
     *
     * @ORM\Column(name="precision_coordonnee", type="string", length=255, nullable=true)
     */
    private $precisionCoordonnee;

    /**
     * @var string
     *
     * @ORM\Column(name="child_type", type="string", length=255, nullable=false)
     */
    private $childType;

    /**
     * @ORM\OneToOne(targetEntity="ProtocoleClasse", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="CMTG_INDIFF_protocole_classe_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $CMTG_INDIFF_protocole_classe = null;

    /**
     * @ORM\OneToOne(targetEntity="ProtocolePrecis", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="CMTG_INDIFF_protocole_precis_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $CMTG_INDIFF_protocole_precis = null;

    /**
     * @ORM\OneToOne(targetEntity="ProtocoleTerritoire", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="CMTG_INDIFF_protocole_territoire_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $CMTG_INDIFF_protocole_territoire = null;

    /**
     * @ORM\OneToOne(targetEntity="ProtocoleMinMax", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="CMTG_INDIFF_protocole_min_max_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $CMTG_INDIFF_protocole_min_max = null;

    /**
     * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\General\Espece")
     * @Assert\Valid
     */
    private $espece;

    /**
     * @ORM\ManyToOne(targetEntity="Protocole", inversedBy="comptages")
     */
    private $protocole;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarque", type="text", nullable=true)
     */
    private $remarque;

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
     * Set comptageJumelle.
     *
     * @param bool|null $comptageJumelle
     *
     * @return Saisie
     */
    public function setComptageJumelle($comptageJumelle = null)
    {
        $this->comptageJumelle = $comptageJumelle;

        return $this;
    }

    /**
     * Get comptageJumelle.
     *
     * @return bool|null
     */
    public function getComptageJumelle()
    {
        return $this->comptageJumelle;
    }

    /**
     * Set comportement.
     *
     * @param string|null $comportement
     *
     * @return Saisie
     */
    public function setComportement($comportement = null)
    {
        $this->comportement = $comportement;

        return $this;
    }

    /**
     * Get comportement.
     *
     * @return string|null
     */
    public function getComportement()
    {
        return $this->comportement;
    }

    /**
     * Set contactsAvecEspece.
     *
     * @param string|null $contactsAvecEspece
     *
     * @return Saisie
     */
    public function setContactsAvecEspece($contactsAvecEspece = null)
    {
        $this->contactsAvecEspece = $contactsAvecEspece;

        return $this;
    }

    /**
     * Get contactsAvecEspece.
     *
     * @return string|null
     */
    public function getContactsAvecEspece()
    {
        return $this->contactsAvecEspece;
    }

    /**
     * Set lieuComptage.
     *
     * @param string|null $lieuComptage
     *
     * @return Saisie
     */
    public function setLieuComptage($lieuComptage = null)
    {
        $this->lieuComptage = $lieuComptage;

        return $this;
    }

    /**
     * Get lieuComptage.
     *
     * @return string|null
     */
    public function getLieuComptage()
    {
        return $this->lieuComptage;
    }

    /**
     * Set precisionCoordonnee.
     *
     * @param int|null $precisionCoordonnee
     *
     * @return Saisie
     */
    public function setPrecisionCoordonnee($precisionCoordonnee = null)
    {
        $this->precisionCoordonnee = $precisionCoordonnee;

        return $this;
    }

    /**
     * Get precisionCoordonnee.
     *
     * @return int|null
     */
    public function getPrecisionCoordonnee()
    {
        return $this->precisionCoordonnee;
    }

    /**
     * Set cMTGINDIFFProtocoleClasse.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocoleClasse|null $cMTGINDIFFProtocoleClasse
     *
     * @return Saisie
     */
    public function setCMTGINDIFFProtocoleClasse(\OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocoleClasse $cMTGINDIFFProtocoleClasse = null)
    {
        $this->CMTG_INDIFF_protocole_classe = $cMTGINDIFFProtocoleClasse;

        return $this;
    }

    /**
     * Get cMTGINDIFFProtocoleClasse.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocoleClasse|null
     */
    public function getCMTGINDIFFProtocoleClasse()
    {
        return $this->CMTG_INDIFF_protocole_classe;
    }

    /**
     * Set cMTGINDIFFProtocolePrecis.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocolePrecis|null $cMTGINDIFFProtocolePrecis
     *
     * @return Saisie
     */
    public function setCMTGINDIFFProtocolePrecis(\OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocolePrecis $cMTGINDIFFProtocolePrecis = null)
    {
        $this->CMTG_INDIFF_protocole_precis = $cMTGINDIFFProtocolePrecis;

        return $this;
    }

    /**
     * Get cMTGINDIFFProtocolePrecis.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocolePrecis|null
     */
    public function getCMTGINDIFFProtocolePrecis()
    {
        return $this->CMTG_INDIFF_protocole_precis;
    }

    /**
     * Set cMTGINDIFFProtocoleTerritoire.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocoleTerritoire|null $cMTGINDIFFProtocoleTerritoire
     *
     * @return Saisie
     */
    public function setCMTGINDIFFProtocoleTerritoire(\OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocoleTerritoire $cMTGINDIFFProtocoleTerritoire = null)
    {
        $this->CMTG_INDIFF_protocole_territoire = $cMTGINDIFFProtocoleTerritoire;

        return $this;
    }

    /**
     * Get cMTGINDIFFProtocoleTerritoire.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocoleTerritoire|null
     */
    public function getCMTGINDIFFProtocoleTerritoire()
    {
        return $this->CMTG_INDIFF_protocole_territoire;
    }

    /**
     * Set cMTGINDIFFProtocoleMinMax.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocoleMinMax|null $cMTGINDIFFProtocoleMinMax
     *
     * @return Saisie
     */
    public function setCMTGINDIFFProtocoleMinMax(\OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocoleMinMax $cMTGINDIFFProtocoleMinMax = null)
    {
        $this->CMTG_INDIFF_protocole_min_max = $cMTGINDIFFProtocoleMinMax;

        return $this;
    }

    /**
     * Get cMTGINDIFFProtocoleMinMax.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocoleMinMax|null
     */
    public function getCMTGINDIFFProtocoleMinMax()
    {
        return $this->CMTG_INDIFF_protocole_min_max;
    }

    public function __toString(){
        if($this->childType == 'C1'){
            return "Saisie(".$this->id."), ".$this->getCMTGINDIFFProtocoleClasse();
        }
        else if($this->childType == 'C2'){
            return "Saisie(".$this->id."), ".$this->getCMTGINDIFFProtocoleMinMax();
        }
        else if($this->childType == 'C3'){
            return "Saisie(".$this->id."), ".$this->getCMTGINDIFFProtocoleTerritoire();
        }
        else if($this->childType == 'C4'){
            return "Saisie(".$this->id."), ".$this->getCMTGINDIFFProtocolePrecis();
        }else{
            return "Saisie(".$this->id.")";
        }
    }

    /**
     * Set childType.
     *
     * @param string $childType
     *
     * @return Saisie
     */
    public function setChildType($childType)
    {
        $this->childType = $childType;

        return $this;
    }

    /**
     * Get childType.
     *
     * @return string
     */
    public function getChildType()
    {
        return $this->childType;
    }

    /**
     * Set espece.
     *
     * @param \OrnithoPinniBundle\Entity\General\Espece|null $espece
     *
     * @return Saisie
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
     * Set protocole.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\Protocole|null $protocole
     *
     * @return Saisie
     */
    public function setProtocole(\OrnithoPinniBundle\Entity\CMTG_INDIFF\Protocole $protocole = null)
    {
        $this->protocole = $protocole;

        return $this;
    }

    /**
     * Get protocole.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_INDIFF\Protocole|null
     */
    public function getProtocole()
    {
        return $this->protocole;
    }

    /**
     * Set remarque.
     *
     * @param string|null $remarque
     *
     * @return Saisie
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
}
