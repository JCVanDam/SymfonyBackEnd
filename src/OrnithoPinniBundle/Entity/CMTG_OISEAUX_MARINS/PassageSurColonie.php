<?php

namespace OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PassageSurColonie
 *
 * @ORM\Table(name="cmtg_oiseaux_marins_passage_sur_colonie")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_OISEAUX_MARINS\PassageSurColonieRepository")
 */
class PassageSurColonie
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
     * @var bool|null
     *
     * @ORM\Column(name="rienVu", type="boolean", nullable=true)
     */
    private $rienVu;

    /**
     * @ORM\ManyToOne(targetEntity="Protocole", inversedBy="saisies")
     */
    private $protocole;

    /**
     * @ORM\ManyToOne(targetEntity="Colonie")
     * @Assert\Valid
     */
    private $colonie;

    /**
     * @ORM\OneToOne(targetEntity="Comptage", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="cmtg_oiseaux_marins_comptage_envol_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $comptageEnvol;

    /**
     * @ORM\OneToOne(targetEntity="Comptage", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="cmtg_oiseaux_marins_comptage_distance_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $comptageDistance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarque", type="text", nullable=true)
     */
    private $remarque;

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
     * Set rienVu.
     *
     * @param bool|null $rienVu
     *
     * @return PassageSurColonie
     */
    public function setRienVu($rienVu = null)
    {
        $this->rienVu = $rienVu;

        return $this;
    }

    /**
     * Get rienVu.
     *
     * @return bool|null
     */
    public function getRienVu()
    {
        return $this->rienVu;
    }

    /**
     * Set protocole.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Protocole|null $protocole
     *
     * @return PassageSurColonie
     */
    public function setProtocole(\OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Protocole $protocole = null)
    {
        $this->protocole = $protocole;

        return $this;
    }

    /**
     * Get protocole.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Protocole|null
     */
    public function getProtocole()
    {
        return $this->protocole;
    }

    /**
     * Set colonie.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Colonie|null $colonie
     *
     * @return PassageSurColonie
     */
    public function setColonie(\OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Colonie $colonie = null)
    {
        $this->colonie = $colonie;

        return $this;
    }

    /**
     * Get colonie.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Colonie|null
     */
    public function getColonie()
    {
        return $this->colonie;
    }

    /**
     * Set comptageEnvol.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Comptage $comptageEnvol
     *
     * @return PassageSurColonie
     */
    public function setComptageEnvol(\OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Comptage $comptageEnvol)
    {
        $this->comptageEnvol = $comptageEnvol;

        return $this;
    }

    /**
     * Get comptageEnvol.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Comptage
     */
    public function getComptageEnvol()
    {
        return $this->comptageEnvol;
    }

    /**
     * Set comptageDistance.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Comptage $comptageDistance
     *
     * @return PassageSurColonie
     */
    public function setComptageDistance(\OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Comptage $comptageDistance)
    {
        $this->comptageDistance = $comptageDistance;

        return $this;
    }

    /**
     * Get comptageDistance.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Comptage
     */
    public function getComptageDistance()
    {
        return $this->comptageDistance;
    }

    public function __toString(){
        return "Passage sur colonie n°".$this->id;
    }

    /**
     * Set remarque.
     *
     * @param string|null $remarque
     *
     * @return PassageSurColonie
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
}
