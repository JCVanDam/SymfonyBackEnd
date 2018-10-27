<?php

namespace OrnithoPinniBundle\Entity\Bague;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * ControleRepriseBague
 *
 * @ORM\Table(name="bague_controle_reprise_bague")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\Bague\ControleRepriseBagueRepository")
 */
class ControleRepriseBague
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
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero_bague_metal", type="string", length=255, nullable=true)
     */
    private $numeroBagueMetal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero_bague_darvic", type="string", length=255, nullable=true)
     */
    private $numeroBagueDarvic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pays_origine", type="string", length=255, nullable=true)
     */
    private $paysOrigine;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarques", type="text", nullable=true)
     */
    private $remarques;

    /**
     * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\General\Espece")
     * @ORM\JoinColumn(onDelete="CASCADE")
     * @Assert\Valid
     */
    private $espece;

    /**
     * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\CMTG_INDIFF\Saisie")
     * @ORM\JoinColumn(onDelete="CASCADE")
     * @Assert\Valid
     */
    private $CMTG_INDIFF_saisie;

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
     * Set statut.
     *
     * @param string $statut
     *
     * @return ControleRepriseBague
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut.
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set numeroBagueMetal.
     *
     * @param string|null $numeroBagueMetal
     *
     * @return ControleRepriseBague
     */
    public function setNumeroBagueMetal($numeroBagueMetal = null)
    {
        $this->numeroBagueMetal = $numeroBagueMetal;

        return $this;
    }

    /**
     * Get numeroBagueMetal.
     *
     * @return string|null
     */
    public function getNumeroBagueMetal()
    {
        return $this->numeroBagueMetal;
    }

    /**
     * Set numeroBagueDarvic.
     *
     * @param string|null $numeroBagueDarvic
     *
     * @return ControleRepriseBague
     */
    public function setNumeroBagueDarvic($numeroBagueDarvic = null)
    {
        $this->numeroBagueDarvic = $numeroBagueDarvic;

        return $this;
    }

    /**
     * Get numeroBagueDarvic.
     *
     * @return string|null
     */
    public function getNumeroBagueDarvic()
    {
        return $this->numeroBagueDarvic;
    }

    /**
     * Set paysOrigine.
     *
     * @param string|null $paysOrigine
     *
     * @return ControleRepriseBague
     */
    public function setPaysOrigine($paysOrigine = null)
    {
        $this->paysOrigine = $paysOrigine;

        return $this;
    }

    /**
     * Get paysOrigine.
     *
     * @return string|null
     */
    public function getPaysOrigine()
    {
        return $this->paysOrigine;
    }

    /**
     * Set espece.
     *
     * @param \OrnithoPinniBundle\Entity\General\Espece|null $espece
     *
     * @return ControleRepriseBague
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
     * Set remarques.
     *
     * @param string|null $remarques
     *
     * @return ControleRepriseBague
     */
    public function setRemarques($remarques = null)
    {
        $this->remarques = $remarques;

        return $this;
    }

    /**
     * Get remarques.
     *
     * @return string|null
     */
    public function getRemarques()
    {
        return $this->remarques;
    }


    public function __toString(){
        return "Contrôle ou reprise de bague n°".$this->id;
    }

    /**
     * Set cMTGINDIFFSaisie.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\Saisie|null $cMTGINDIFFSaisie
     *
     * @return ControleRepriseBague
     */
    public function setCMTGINDIFFSaisie(\OrnithoPinniBundle\Entity\CMTG_INDIFF\Saisie $cMTGINDIFFSaisie = null)
    {
        $this->CMTG_INDIFF_saisie = $cMTGINDIFFSaisie;

        return $this;
    }

    /**
     * Get cMTGINDIFFSaisie.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_INDIFF\Saisie|null
     */
    public function getCMTGINDIFFSaisie()
    {
        return $this->CMTG_INDIFF_saisie;
    }
}
