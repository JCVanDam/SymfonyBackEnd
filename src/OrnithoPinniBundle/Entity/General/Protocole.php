<?php

namespace OrnithoPinniBundle\Entity\General;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Protocole
 *
 * @ORM\Table(name="general_protocole")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\General\ProtocoleRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Protocole
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
     * @ORM\Column(name="code", type="string", length=255, unique=true, nullable=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="child_type", type="string", length=255, nullable=false)
     */
    private $childType;

    /**
     * @ORM\ManyToMany(targetEntity="Personne", cascade={"persist"})
     */
    private $observateurs;

    /**
     * @ORM\ManyToOne(targetEntity="Manip", inversedBy="protocoles")
     * @Assert\Valid
     */
    private $manip;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\CMTG_INDIFF\Protocole", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="CMTG_INDIFF_protocole_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $CMTG_INDIFF_protocole = null;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\CMTG_PINNI\Protocole", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="CMTG_PINNI_protocole_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $CMTG_PINNI_protocole = null;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Protocole", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="CMTG_OISEAUX_MARINS_protocole_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $CMTG_OISEAUX_MARINS_protocole = null;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\SREP\Protocole", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="SREP_protocole_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $SREP_protocole = null;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\DEMOS\Protocole", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="DEMOS_protocole_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $DEMOS_protocole = null;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\PC\Protocole", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="PC_protocole_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $PC_protocole = null;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\TRSC_HYP\Protocole", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="TRSC_HYP_protocole_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $TRSC_HYP_protocole = null;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\TRSC_EPI\Protocole", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="TRSC_EPI_protocole_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $TRSC_EPI_protocole = null;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\CMTG_GOEL\Protocole", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="CMTG_GOEL_protocole_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $CMTG_GOEL_protocole = null;

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
     * Set code.
     *
     * @param string $code
     *
     * @return Protocole
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set manip.
     *
     * @param \OrnithoPinniBundle\Entity\General\Manip|null $manip
     *
     * @return Protocole
     */
    public function setManip(\OrnithoPinniBundle\Entity\General\Manip $manip = null)
    {
        $this->manip = $manip;

        return $this;
    }

    /**
     * Get manip.
     *
     * @return \OrnithoPinniBundle\Entity\General\Manip|null
     */
    public function getManip()
    {
        return $this->manip;
    }

    /**
     * Set cMTGINDIFFProtocole.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\Protocole|null $cMTGINDIFFProtocole
     *
     * @return Protocole
     */
    public function setCMTGINDIFFProtocole(\OrnithoPinniBundle\Entity\CMTG_INDIFF\Protocole $cMTGINDIFFProtocole = null)
    {
        $this->CMTG_INDIFF_protocole = $cMTGINDIFFProtocole;

        return $this;
    }

    /**
     * Get cMTGINDIFFProtocole.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_INDIFF\Protocole|null
     */
    public function getCMTGINDIFFProtocole()
    {
        return $this->CMTG_INDIFF_protocole;
    }

    /**
     * @ORM\PrePersist()
     */
    public function prePersist(){
      if($this->childType != 'C1'){
          $this->CMTG_INDIFF_protocole = null;
      }
      if($this->childType != 'C2'){
          $this->CMTG_PINNI_protocole = null;
      }
      if($this->childType != 'C3'){
          $this->CMTG_OISEAUX_MARINS_protocole = null;
      }
      if($this->childType != 'C4'){
          $this->SREP_protocole = null;
      }
      if($this->childType != 'C5'){
          $this->DEMOS_protocole = null;
      }
      if($this->childType != 'C6'){
          $this->PC_protocole = null;
      }
      if($this->childType != 'C7'){
          $this->TRSC_HYP_protocole = null;
      }
      if($this->childType != 'C8'){
          $this->TRSC_EPI_protocole = null;
      }
      if($this->childType != 'C9'){
          $this->CMTG_GOEL_protocole = null;
      }
    }


    /**
     * Set childType.
     *
     * @param string $childType
     *
     * @return Protocole
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

    public function __toString(){
        if($this->childType == 'C1'){
            return "Protocole(".$this->id."), ".$this->getCMTGINDIFFProtocole();
        }
        else if($this->childType == 'C2'){
            return "Protocole(".$this->id."), ".$this->getCMTGPINNIProtocole();
        }
        else if($this->childType == 'C3'){
            return "Protocole(".$this->id."), ".$this->getCMTGOISEAUXMARINSProtocole();
        }
        else if($this->childType == 'C4'){
            return "Protocole(".$this->id."), ".$this->getSREPProtocole();
        }
        else if($this->childType == 'C5'){
            return "Protocole(".$this->id."), ".$this->getDEMOSProtocole();
        }
        else if($this->childType == 'C6'){
            return "Protocole(".$this->id."), ".$this->getPCProtocole();
        }
        else if($this->childType == 'C7'){
            return "Protocole(".$this->id."), ".$this->getTRSCHYPProtocole();
        }
        else if($this->childType == 'C8'){
            return "Protocole(".$this->id."), ".$this->getTRSCEPIProtocole();
        }
        else if($this->childType == 'C9'){
            return "Protocole(".$this->id."), ".$this->getCMTGGOELProtocole();
        }
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->observateurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add observateur.
     *
     * @param \OrnithoPinniBundle\Entity\General\Personne $observateur
     *
     * @return Protocole
     */
    public function addObservateur(\OrnithoPinniBundle\Entity\General\Personne $observateur)
    {
        $this->observateurs[] = $observateur;

        return $this;
    }

    /**
     * Remove observateur.
     *
     * @param \OrnithoPinniBundle\Entity\General\Personne $observateur
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeObservateur(\OrnithoPinniBundle\Entity\General\Personne $observateur)
    {
        return $this->observateurs->removeElement($observateur);
    }

    /**
     * Get observateurs.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObservateurs()
    {
        return $this->observateurs;
    }

    /**
     * Set cMTGPINNIProtocole.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_PINNI\Protocole|null $cMTGPINNIProtocole
     *
     * @return Protocole
     */
    public function setCMTGPINNIProtocole(\OrnithoPinniBundle\Entity\CMTG_PINNI\Protocole $cMTGPINNIProtocole = null)
    {
        $this->CMTG_PINNI_protocole = $cMTGPINNIProtocole;

        return $this;
    }

    /**
     * Get cMTGPINNIProtocole.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_PINNI\Protocole|null
     */
    public function getCMTGPINNIProtocole()
    {
        return $this->CMTG_PINNI_protocole;
    }

    /**
     * Set cMTGOISEAUXMARINSProtocole.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Protocole|null $cMTGOISEAUXMARINSProtocole
     *
     * @return Protocole
     */
    public function setCMTGOISEAUXMARINSProtocole(\OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Protocole $cMTGOISEAUXMARINSProtocole = null)
    {
        $this->CMTG_OISEAUX_MARINS_protocole = $cMTGOISEAUXMARINSProtocole;

        return $this;
    }

    /**
     * Get cMTGOISEAUXMARINSProtocole.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Protocole|null
     */
    public function getCMTGOISEAUXMARINSProtocole()
    {
        return $this->CMTG_OISEAUX_MARINS_protocole;
    }

    /**
     * Set sREPProtocole.
     *
     * @param \OrnithoPinniBundle\Entity\SREP\Protocole|null $sREPProtocole
     *
     * @return Protocole
     */
    public function setSREPProtocole(\OrnithoPinniBundle\Entity\SREP\Protocole $sREPProtocole = null)
    {
        $this->SREP_protocole = $sREPProtocole;

        return $this;
    }

    /**
     * Get sREPProtocole.
     *
     * @return \OrnithoPinniBundle\Entity\SREP\Protocole|null
     */
    public function getSREPProtocole()
    {
        return $this->SREP_protocole;
    }

    /**
     * Set dEMOSProtocole.
     *
     * @param \OrnithoPinniBundle\Entity\DEMOS\Protocole|null $dEMOSProtocole
     *
     * @return Protocole
     */
    public function setDEMOSProtocole(\OrnithoPinniBundle\Entity\DEMOS\Protocole $dEMOSProtocole = null)
    {
        $this->DEMOS_protocole = $dEMOSProtocole;

        return $this;
    }

    /**
     * Get dEMOSProtocole.
     *
     * @return \OrnithoPinniBundle\Entity\DEMOS\Protocole|null
     */
    public function getDEMOSProtocole()
    {
        return $this->DEMOS_protocole;
    }

    /**
     * Set pCProtocole.
     *
     * @param \OrnithoPinniBundle\Entity\PC\Protocole|null $pCProtocole
     *
     * @return Protocole
     */
    public function setPCProtocole(\OrnithoPinniBundle\Entity\PC\Protocole $pCProtocole = null)
    {
        $this->PC_protocole = $pCProtocole;

        return $this;
    }

    /**
     * Get pCProtocole.
     *
     * @return \OrnithoPinniBundle\Entity\PC\Protocole|null
     */
    public function getPCProtocole()
    {
        return $this->PC_protocole;
    }

    /**
     * Set tRSCHYPProtocole.
     *
     * @param \OrnithoPinniBundle\Entity\TRSC_HYP\Protocole|null $tRSCHYPProtocole
     *
     * @return Protocole
     */
    public function setTRSCHYPProtocole(\OrnithoPinniBundle\Entity\TRSC_HYP\Protocole $tRSCHYPProtocole = null)
    {
        $this->TRSC_HYP_protocole = $tRSCHYPProtocole;

        return $this;
    }

    /**
     * Get tRSCHYPProtocole.
     *
     * @return \OrnithoPinniBundle\Entity\TRSC_HYP\Protocole|null
     */
    public function getTRSCHYPProtocole()
    {
        return $this->TRSC_HYP_protocole;
    }

    /**
     * Set tRSCEPIProtocole.
     *
     * @param \OrnithoPinniBundle\Entity\TRSC_EPI\Protocole|null $tRSCEPIProtocole
     *
     * @return Protocole
     */
    public function setTRSCEPIProtocole(\OrnithoPinniBundle\Entity\TRSC_EPI\Protocole $tRSCEPIProtocole = null)
    {
        $this->TRSC_EPI_protocole = $tRSCEPIProtocole;

        return $this;
    }

    /**
     * Get tRSCEPIProtocole.
     *
     * @return \OrnithoPinniBundle\Entity\TRSC_EPI\Protocole|null
     */
    public function getTRSCEPIProtocole()
    {
        return $this->TRSC_EPI_protocole;
    }

    /**
     * Set cMTGGOELProtocole.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_GOEL\Protocole|null $cMTGGOELProtocole
     *
     * @return Protocole
     */
    public function setCMTGGOELProtocole(\OrnithoPinniBundle\Entity\CMTG_GOEL\Protocole $cMTGGOELProtocole = null)
    {
        $this->CMTG_GOEL_protocole = $cMTGGOELProtocole;

        return $this;
    }

    /**
     * Get cMTGGOELProtocole.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_GOEL\Protocole|null
     */
    public function getCMTGGOELProtocole()
    {
        return $this->CMTG_GOEL_protocole;
    }
}
