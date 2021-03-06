<?php

namespace OrnithoPinniBundle\Entity\SREP;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comptage
 *
 * @ORM\Table(name="srep_comptage")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\SREP\ComptageRepository")
 */
class Comptage
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
     * @ORM\ManyToOne(targetEntity="PassageSurColonie", inversedBy="comptages")
     */
    private $passage;

    /**
     * @var int|null
     *
     * @ORM\Column(name="comptage01", type="smallint", nullable=false)
     */
    private $comptage01;

    /**
     * @var int|null
     *
     * @ORM\Column(name="comptage02", type="smallint", nullable=true)
     */
    private $comptage02;

    /**
     * @var int|null
     *
     * @ORM\Column(name="comptage03", type="smallint", nullable=true)
     */
    private $comptage03;

    /**
     * @var int|null
     *
     * @ORM\Column(name="comptage04", type="smallint", nullable=true)
     */
    private $comptage04;

    /**
     * @var float|null
     *
     * @ORM\Column(name="moyenne", type="float", nullable=true)
     */
    private $moyenne;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typeEffectif", type="string", length=255, nullable=true)
     */
    private $typeEffectif;

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
     * Constructor
     */
    public function __construct()
    {
        $this->saisies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set passage.
     *
     * @param \OrnithoPinniBundle\Entity\SREP\PassageSurColonie|null $passage
     *
     * @return Comptage
     */
    public function setPassage(\OrnithoPinniBundle\Entity\SREP\PassageSurColonie $passage = null)
    {
        $this->passage = $passage;

        return $this;
    }

    /**
     * Get passage.
     *
     * @return \OrnithoPinniBundle\Entity\SREP\PassageSurColonie|null
     */
    public function getPassage()
    {
        return $this->passage;
    }

    /**
     * Set comptage01.
     *
     * @param int $comptage01
     *
     * @return Comptage
     */
    public function setComptage01($comptage01)
    {
        $this->comptage01 = $comptage01;

        return $this;
    }

    /**
     * Get comptage01.
     *
     * @return int
     */
    public function getComptage01()
    {
        return $this->comptage01;
    }

    /**
     * Set comptage02.
     *
     * @param int|null $comptage02
     *
     * @return Comptage
     */
    public function setComptage02($comptage02 = null)
    {
        $this->comptage02 = $comptage02;

        return $this;
    }

    /**
     * Get comptage02.
     *
     * @return int|null
     */
    public function getComptage02()
    {
        return $this->comptage02;
    }

    /**
     * Set comptage03.
     *
     * @param int|null $comptage03
     *
     * @return Comptage
     */
    public function setComptage03($comptage03 = null)
    {
        $this->comptage03 = $comptage03;

        return $this;
    }

    /**
     * Get comptage03.
     *
     * @return int|null
     */
    public function getComptage03()
    {
        return $this->comptage03;
    }

    /**
     * Set comptage04.
     *
     * @param int|null $comptage04
     *
     * @return Comptage
     */
    public function setComptage04($comptage04 = null)
    {
        $this->comptage04 = $comptage04;

        return $this;
    }

    /**
     * Get comptage04.
     *
     * @return int|null
     */
    public function getComptage04()
    {
        return $this->comptage04;
    }

    /**
     * Set moyenne.
     *
     * @param float|null $moyenne
     *
     * @return Comptage
     */
    public function setMoyenne($moyenne = null)
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    /**
     * Get moyenne.
     *
     * @return float|null
     */
    public function getMoyenne()
    {
        return $this->moyenne;
    }

    /**
     * Set typeEffectif.
     *
     * @param string|null $typeEffectif
     *
     * @return Comptage
     */
    public function setTypeEffectif($typeEffectif = null)
    {
        $this->typeEffectif = $typeEffectif;

        return $this;
    }

    /**
     * Get typeEffectif.
     *
     * @return string|null
     */
    public function getTypeEffectif()
    {
        return $this->typeEffectif;
    }

    public function __toString(){
        return "Comptage n°".$this->id;
    }
}
