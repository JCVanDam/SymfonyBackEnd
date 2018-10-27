<?php

namespace OrnithoPinniBundle\Entity\DEMOS;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PassageSurTerrier
 *
 * @ORM\Table(name="demos_passage_sur_terrier")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\DEMOS\PassageSurTerrierRepository")
 */
class PassageSurTerrier
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
     * @ORM\Column(name="presence", type="string", length=255)
     */
    private $presence;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarque", type="text", nullable=true)
     */
    private $remarque;

    /**
     * @var string
     *
     * @ORM\Column(name="premier_passage", type="string", length=3)
     */
    private $premierPassage;

    /**
     * @ORM\ManyToOne(targetEntity="Protocole", inversedBy="saisies")
     */
    private $protocole;

    /**
     * @ORM\ManyToOne(targetEntity="Terrier")
     * @Assert\Valid
     */
    private $terrier;

    /**
     * @ORM\OneToOne(targetEntity="InformationPremierPassage", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     * @Assert\Valid
     */
    private $informations;

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
     * Set presence.
     *
     * @param string $presence
     *
     * @return PassageSurTerrier
     */
    public function setPresence($presence)
    {
        $this->presence = $presence;

        return $this;
    }

    /**
     * Get presence.
     *
     * @return string
     */
    public function getPresence()
    {
        return $this->presence;
    }

    /**
     * Set premierPassage.
     *
     * @param string $premierPassage
     *
     * @return PassageSurTerrier
     */
    public function setPremierPassage($premierPassage)
    {
        $this->premierPassage = $premierPassage;

        return $this;
    }

    /**
     * Get premierPassage.
     *
     * @return string
     */
    public function getPremierPassage()
    {
        return $this->premierPassage;
    }

    /**
     * Set terrier.
     *
     * @param \OrnithoPinniBundle\Entity\DEMOS\Terrier|null $terrier
     *
     * @return PassageSurTerrier
     */
    public function setTerrier(\OrnithoPinniBundle\Entity\DEMOS\Terrier $terrier = null)
    {
        $this->terrier = $terrier;

        return $this;
    }

    /**
     * Get terrier.
     *
     * @return \OrnithoPinniBundle\Entity\DEMOS\Terrier|null
     */
    public function getTerrier()
    {
        return $this->terrier;
    }

    /**
     * Set informations.
     *
     * @param \OrnithoPinniBundle\Entity\DEMOS\InformationPremierPassage|null $informations
     *
     * @return PassageSurTerrier
     */
    public function setInformations(\OrnithoPinniBundle\Entity\DEMOS\InformationPremierPassage $informations = null)
    {
        $this->informations = $informations;

        return $this;
    }

    /**
     * Get informations.
     *
     * @return \OrnithoPinniBundle\Entity\DEMOS\InformationPremierPassage|null
     */
    public function getInformations()
    {
        return $this->informations;
    }

    /**
     * Set protocole.
     *
     * @param \OrnithoPinniBundle\Entity\DEMOS\Protocole|null $protocole
     *
     * @return PassageSurTerrier
     */
    public function setProtocole(\OrnithoPinniBundle\Entity\DEMOS\Protocole $protocole = null)
    {
        $this->protocole = $protocole;

        return $this;
    }

    /**
     * Get protocole.
     *
     * @return \OrnithoPinniBundle\Entity\DEMOS\Protocole|null
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
     * @return PassageSurTerrier
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

    public function __toString(){
        return "PassageSurTerrier n°".$this->id;
    }
}
