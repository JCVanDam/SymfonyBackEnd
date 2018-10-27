<?php

namespace OrnithoPinniBundle\Entity\DEMOS;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Terrier
 *
 * @ORM\Table(name="demos_terrier")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\DEMOS\TerrierRepository")
 */
class Terrier
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
     * @var int
     *
     * @ORM\Column(name="numero_piquet", type="integer")
     */
    private $numeroPiquet;

    /**
     * @var string
     *
     * @ORM\Column(name="code_piquet", type="string", length=255)
     */
    private $codePiquet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_dernier_passage", type="date", nullable=true)
     */
    private $dateDernierPassage;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\General\Position_GPS", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="general_position_gps_releve_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $releve;

    /**
     * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\General\Espece")
     * @Assert\Valid
     */
    private $espece;

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
     * Set numeroPiquet.
     *
     * @param int $numeroPiquet
     *
     * @return Terrier
     */
    public function setNumeroPiquet($numeroPiquet)
    {
        $this->numeroPiquet = $numeroPiquet;

        return $this;
    }

    /**
     * Get numeroPiquet.
     *
     * @return int
     */
    public function getNumeroPiquet()
    {
        return $this->numeroPiquet;
    }

    /**
     * Set dateDernierPassage.
     *
     * @param \DateTime $dateDernierPassage
     *
     * @return Terrier
     */
    public function setDateDernierPassage($dateDernierPassage)
    {
        $this->dateDernierPassage = $dateDernierPassage;

        return $this;
    }

    /**
     * Get dateDernierPassage.
     *
     * @return \DateTime
     */
    public function getDateDernierPassage()
    {
        return $this->dateDernierPassage;
    }

    /**
     * Set releve.
     *
     * @param \OrnithoPinniBundle\Entity\General\Position_GPS $releve
     *
     * @return Terrier
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
     * Set espece.
     *
     * @param \OrnithoPinniBundle\Entity\General\Espece|null $espece
     *
     * @return Terrier
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
     * Set codePiquet.
     *
     * @param string $codePiquet
     *
     * @return Terrier
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

    public function __toString(){
        return "".$this->codePiquet;
    }
}
