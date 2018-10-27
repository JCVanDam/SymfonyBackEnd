<?php

namespace OrnithoPinniBundle\Entity\PC;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Piquet
 *
 * @ORM\Table(name="pc_piquet")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\PC\PiquetRepository")
 */
class Piquet
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
     * @ORM\Column(name="codePiquet", type="string", length=255, unique=true)
     */
    private $codePiquet;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datePremierReleve", type="date", nullable=true)
     */
    private $datePremierReleve;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateDernierReleve", type="date", nullable=true)
     */
    private $dateDernierReleve;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pente", type="string", length=255, nullable=true)
     */
    private $pente;

    /**
     * @var string|null
     *
     * @ORM\Column(name="orientationPente", type="string", length=255, nullable=true)
     */
    private $orientationPente;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\General\Position_GPS", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="general_position_gps_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $releve;

    /**
     * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\Localisation\Site")
     * @Assert\Valid
     */
    private $site;

    /**
     * @var string
     *
     * @ORM\Column(name="lastVeg", type="string", length=255, nullable=true)
     */
    private $lastVeg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastVegDate", type="date", nullable=true)
     */
    private $lastVegDate;

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
     * Set codePiquet.
     *
     * @param string $codePiquet
     *
     * @return Piquet
     */
    public function setCodePiquet($codePiquet)
    {
        $this->codePiquet = $codePiquet;

        return $this;
    }

    /**
     * Get codePiquet.
     *
     * @return string
     */
    public function getCodePiquet()
    {
        return $this->codePiquet;
    }

    /**
     * Set datePremierReleve.
     *
     * @param \DateTime|null $datePremierReleve
     *
     * @return Piquet
     */
    public function setDatePremierReleve($datePremierReleve = null)
    {
        $this->datePremierReleve = $datePremierReleve;

        return $this;
    }

    /**
     * Get datePremierReleve.
     *
     * @return \DateTime|null
     */
    public function getDatePremierReleve()
    {
        return $this->datePremierReleve;
    }

    /**
     * Set dateDernierReleve.
     *
     * @param \DateTime|null $dateDernierReleve
     *
     * @return Piquet
     */
    public function setDateDernierReleve($dateDernierReleve = null)
    {
        $this->dateDernierReleve = $dateDernierReleve;

        return $this;
    }

    /**
     * Get dateDernierReleve.
     *
     * @return \DateTime|null
     */
    public function getDateDernierReleve()
    {
        return $this->dateDernierReleve;
    }

    /**
     * Set pente.
     *
     * @param string|null $pente
     *
     * @return Piquet
     */
    public function setPente($pente = null)
    {
        $this->pente = $pente;

        return $this;
    }

    /**
     * Get pente.
     *
     * @return string|null
     */
    public function getPente()
    {
        return $this->pente;
    }

    /**
     * Set orientationPente.
     *
     * @param string|null $orientationPente
     *
     * @return Piquet
     */
    public function setOrientationPente($orientationPente = null)
    {
        $this->orientationPente = $orientationPente;

        return $this;
    }

    /**
     * Get orientationPente.
     *
     * @return string|null
     */
    public function getOrientationPente()
    {
        return $this->orientationPente;
    }

    /**
     * Set releve.
     *
     * @param \OrnithoPinniBundle\Entity\General\Position_GPS $releve
     *
     * @return Piquet
     */
    public function setReleve(\OrnithoPinniBundle\Entity\General\Position_GPS $releve)
    {
        $this->releve = $releve;

        return $this;
    }

    /**
     * Get releve.
     *
     * @return \OrnithoPinniBundle\Entity\General\Position_GPS
     */
    public function getReleve()
    {
        return $this->releve;
    }

    /**
     * Set site.
     *
     * @param \OrnithoPinniBundle\Entity\Localisation\Site|null $site
     *
     * @return Piquet
     */
    public function setSite(\OrnithoPinniBundle\Entity\Localisation\Site $site = null)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site.
     *
     * @return \OrnithoPinniBundle\Entity\Localisation\Site|null
     */
    public function getSite()
    {
        return $this->site;
    }

    public function __toString(){
        return "Terrier n°".$this->id;
    }

    /**
     * Set lastVeg.
     *
     * @param string $lastVeg
     *
     * @return Piquet
     */
    public function setLastVeg($lastVeg)
    {
        $this->lastVeg = $lastVeg;

        return $this;
    }

    /**
     * Get lastVeg.
     *
     * @return string
     */
    public function getLastVeg()
    {
        return $this->lastVeg;
    }

    /**
     * Set lastVegDate.
     *
     * @param \DateTime|null $lastVegDate
     *
     * @return Piquet
     */
    public function setLastVegDate($lastVegDate = null)
    {
        $this->lastVegDate = $lastVegDate;

        return $this;
    }

    /**
     * Get lastVegDate.
     *
     * @return \DateTime|null
     */
    public function getLastVegDate()
    {
        return $this->lastVegDate;
    }
}
