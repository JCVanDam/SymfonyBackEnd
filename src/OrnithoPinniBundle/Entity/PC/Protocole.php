<?php

namespace OrnithoPinniBundle\Entity\PC;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Protocole
 *
 * @ORM\Table(name="pc_protocole")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\PC\ProtocoleRepository")
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
     * @ORM\OneToOne(targetEntity="ProtocolePermanent", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="PC_protocole_permanent_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $PC_protocole_permanent = null;

    /**
     * @ORM\OneToOne(targetEntity="ProtocoleTransect", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="PC_protocole_transect_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $PC_protocole_transect = null;

    /**
     * @var string
     *
     * @ORM\Column(name="child_type", type="string", length=255, nullable=false)
     */
    private $childType;

    public function __toString(){
        if($this->childType == 'C1'){
            return "PC(".$this->id."), ".$this->getPCProtocolePermanent();
        }
        else if($this->childType == 'C2'){
            return "PC(".$this->id."), ".$this->getPCProtocoleTransect();
        }else{
            return "PC(".$this->id.")";
        }
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
     * Set pCProtocolePermanent.
     *
     * @param \OrnithoPinniBundle\Entity\PC\ProtocolePermanent|null $pCProtocolePermanent
     *
     * @return Protocole
     */
    public function setPCProtocolePermanent(\OrnithoPinniBundle\Entity\PC\ProtocolePermanent $pCProtocolePermanent = null)
    {
        $this->PC_protocole_permanent = $pCProtocolePermanent;

        return $this;
    }

    /**
     * Get pCProtocolePermanent.
     *
     * @return \OrnithoPinniBundle\Entity\PC\ProtocolePermanent|null
     */
    public function getPCProtocolePermanent()
    {
        return $this->PC_protocole_permanent;
    }

    /**
     * Set pCProtocoleTransect.
     *
     * @param \OrnithoPinniBundle\Entity\PC\ProtocoleTransect|null $pCProtocoleTransect
     *
     * @return Protocole
     */
    public function setPCProtocoleTransect(\OrnithoPinniBundle\Entity\PC\ProtocoleTransect $pCProtocoleTransect = null)
    {
        $this->PC_protocole_transect = $pCProtocoleTransect;

        return $this;
    }

    /**
     * Get pCProtocoleTransect.
     *
     * @return \OrnithoPinniBundle\Entity\PC\ProtocoleTransect|null
     */
    public function getPCProtocoleTransect()
    {
        return $this->PC_protocole_transect;
    }
}
