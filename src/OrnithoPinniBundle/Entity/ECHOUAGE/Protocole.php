<?php

namespace OrnithoPinniBundle\Entity\ECHOUAGE;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Protocole
 *
 * @ORM\Table(name="echouage_protocole")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\ECHOUAGE\ProtocoleRepository")
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
     * @ORM\Column(name="child_type", type="string", length=255, nullable=false)
     */
    private $childType;

    /**
     * @ORM\OneToOne(targetEntity="ProtocoleEnTournee", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="ECHOUAGE_protocole_en_tournee_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $ECHOUAGE_protocole_en_tournee = null;

    /**
     * @ORM\OneToOne(targetEntity="ProtocoleOpportuniste", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="ECHOUAGE_protocole_opportuniste_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $ECHOUAGE_protocole_opportuniste = null;

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
        if($this->childType == 'C1'){
            return "ECHOUAGE(".$this->id."), ".$this->getECHOUAGEProtocoleOpportuniste();
        }
        else if($this->childType == 'C2'){
            return "ECHOUAGE(".$this->id."), ".$this->getECHOUAGEProtocoleEnTournee();
        }else{
            return "ECHOUAGE(".$this->id.")";
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

    /**
     * Set eCHOUAGEProtocoleEnTournee.
     *
     * @param \OrnithoPinniBundle\Entity\ECHOUAGE\ProtocoleEnTournee|null $eCHOUAGEProtocoleEnTournee
     *
     * @return Protocole
     */
    public function setECHOUAGEProtocoleEnTournee(\OrnithoPinniBundle\Entity\ECHOUAGE\ProtocoleEnTournee $eCHOUAGEProtocoleEnTournee = null)
    {
        $this->ECHOUAGE_protocole_en_tournee = $eCHOUAGEProtocoleEnTournee;

        return $this;
    }

    /**
     * Get eCHOUAGEProtocoleEnTournee.
     *
     * @return \OrnithoPinniBundle\Entity\ECHOUAGE\ProtocoleEnTournee|null
     */
    public function getECHOUAGEProtocoleEnTournee()
    {
        return $this->ECHOUAGE_protocole_en_tournee;
    }

    /**
     * Set eCHOUAGEProtocoleOpportuniste.
     *
     * @param \OrnithoPinniBundle\Entity\ECHOUAGE\ProtocoleOpportuniste|null $eCHOUAGEProtocoleOpportuniste
     *
     * @return Protocole
     */
    public function setECHOUAGEProtocoleOpportuniste(\OrnithoPinniBundle\Entity\ECHOUAGE\ProtocoleOpportuniste $eCHOUAGEProtocoleOpportuniste = null)
    {
        $this->ECHOUAGE_protocole_opportuniste = $eCHOUAGEProtocoleOpportuniste;

        return $this;
    }

    /**
     * Get eCHOUAGEProtocoleOpportuniste.
     *
     * @return \OrnithoPinniBundle\Entity\ECHOUAGE\ProtocoleOpportuniste|null
     */
    public function getECHOUAGEProtocoleOpportuniste()
    {
        return $this->ECHOUAGE_protocole_opportuniste;
    }
}
