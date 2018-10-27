<?php

namespace OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Saisie
 *
 * @ORM\Table(name="cmtg_oiseaux_marins_saisie")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_OISEAUX_MARINS\SaisieRepository")
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
     * @var string|null
     *
     * @ORM\Column(name="typeEffectif", type="string", length=255, nullable=true)
     */
    private $typeEffectif;

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
     * @ORM\ManyToOne(targetEntity="Comptage", inversedBy="saisies")
     */
    private $comptage;

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
     * Set typeEffectif.
     *
     * @param string|null $typeEffectif
     *
     * @return Saisie
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


    /**
     * Set comptage.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Comptage|null $comptage
     *
     * @return Saisie
     */
    public function setComptage(\OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Comptage $comptage = null)
    {
        $this->comptage = $comptage;

        return $this;
    }

    /**
     * Get comptage.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Comptage|null
     */
    public function getComptage()
    {
        return $this->comptage;
    }

    /**
     * Set comptage01.
     *
     * @param int $comptage01
     *
     * @return Saisie
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
     * @return Saisie
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
     * @return Saisie
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
     * @return Saisie
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
     * @return Saisie
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

    public function __toString(){
        return "Saisie n°".$this->id;
    }
}
