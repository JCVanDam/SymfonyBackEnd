<?php

namespace OrnithoPinniBundle\Entity\General;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProtocoleSurveillance
 *
 * @ORM\Table(name="general_protocole_surveillance")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\General\ProtocoleSurveillanceRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ProtocoleSurveillance
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
     * @ORM\Column(name="childType", type="string", length=255, nullable=false)
     */
    private $childType;

    /**
     * @ORM\ManyToOne(targetEntity="ManipSurveillance", inversedBy="protocoles")
     * @Assert\Valid
     */
    private $manip;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\ECHOUAGE\Protocole", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="ECHOUAGE_protocole_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $ECHOUAGE_protocole = null;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\SAGIR\Protocole", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="SAGIR_protocole_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $SAGIR_protocole = null;

    /**
     * @ORM\PrePersist()
     */
    public function prePersist(){
      if($this->childType != 'C1'){
          $this->ECHOUAGE_protocole = null;
      }
      if($this->childType != 'C2'){
          $this->SAGIR_protocole = null;
      }
    }

    public function __toString(){
        if($this->childType == 'C1'){
            return "Protocole(".$this->id."), ".$this->getECHOUAGEProtocole();
        }
        else if($this->childType == 'C2'){
            return "Protocole(".$this->id."), ".$this->getSAGIRProtocole();
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
     * @param string|null $code
     *
     * @return ProtocoleSurveillance
     */
    public function setCode($code = null)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set childType.
     *
     * @param string $childType
     *
     * @return ProtocoleSurveillance
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
     * Set manip.
     *
     * @param \OrnithoPinniBundle\Entity\General\ManipSurveillance|null $manip
     *
     * @return ProtocoleSurveillance
     */
    public function setManip(\OrnithoPinniBundle\Entity\General\ManipSurveillance $manip = null)
    {
        $this->manip = $manip;

        return $this;
    }

    /**
     * Get manip.
     *
     * @return \OrnithoPinniBundle\Entity\General\ManipSurveillance|null
     */
    public function getManip()
    {
        return $this->manip;
    }

    /**
     * Set eCHOUAGEProtocole.
     *
     * @param \OrnithoPinniBundle\Entity\ECHOUAGE\Protocole|null $eCHOUAGEProtocole
     *
     * @return ProtocoleSurveillance
     */
    public function setECHOUAGEProtocole(\OrnithoPinniBundle\Entity\ECHOUAGE\Protocole $eCHOUAGEProtocole = null)
    {
        $this->ECHOUAGE_protocole = $eCHOUAGEProtocole;

        return $this;
    }

    /**
     * Get eCHOUAGEProtocole.
     *
     * @return \OrnithoPinniBundle\Entity\ECHOUAGE\Protocole|null
     */
    public function getECHOUAGEProtocole()
    {
        return $this->ECHOUAGE_protocole;
    }

    /**
     * Set sAGIRProtocole.
     *
     * @param \OrnithoPinniBundle\Entity\SAGIR\Protocole|null $sAGIRProtocole
     *
     * @return ProtocoleSurveillance
     */
    public function setSAGIRProtocole(\OrnithoPinniBundle\Entity\SAGIR\Protocole $sAGIRProtocole = null)
    {
        $this->SAGIR_protocole = $sAGIRProtocole;

        return $this;
    }

    /**
     * Get sAGIRProtocole.
     *
     * @return \OrnithoPinniBundle\Entity\SAGIR\Protocole|null
     */
    public function getSAGIRProtocole()
    {
        return $this->SAGIR_protocole;
    }
}
