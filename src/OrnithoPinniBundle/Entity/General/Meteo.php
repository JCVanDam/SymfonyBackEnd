<?php

namespace OrnithoPinniBundle\Entity\General;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meteo
 *
 * @ORM\Table(name="general_meteo")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\General\MeteoRepository")
 */
class Meteo
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
     * @ORM\Column(name="visibilite", type="string", length=255, nullable=true)
     */
    private $visibilite;

    /**
     * @var string
     *
     * @ORM\Column(name="vent", type="string", length=255, nullable=true)
     */
    private $vent;

    /**
     * @var string
     *
     * @ORM\Column(name="couverture_nuageuse", type="string", length=255, nullable=true)
     */
    private $couvertureNuageuse;

    /**
     * @var string
     *
     * @ORM\Column(name="precipitations", type="string", length=255, nullable=true)
     */
    private $precipitations;

    /**
     * @var string
     *
     * @ORM\Column(name="couverture_neigeuse_au_sol", type="string", length=255, nullable=true)
     */
    private $couvertureNeigeuseAuSol;

    /**
     * @var string
     *
     * @ORM\Column(name="lune", type="string", length=255, nullable=true)
     */
    private $lune;


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
     * Set visibilite.
     *
     * @param string $visibilite
     *
     * @return Meteo
     */
    public function setVisibilite($visibilite)
    {
        $this->visibilite = $visibilite;

        return $this;
    }

    /**
     * Get visibilite.
     *
     * @return string
     */
    public function getVisibilite()
    {
        return $this->visibilite;
    }

    /**
     * Set vent.
     *
     * @param string $vent
     *
     * @return Meteo
     */
    public function setVent($vent)
    {
        $this->vent = $vent;

        return $this;
    }

    /**
     * Get vent.
     *
     * @return string
     */
    public function getVent()
    {
        return $this->vent;
    }

    /**
     * Set couvertureNuageuse.
     *
     * @param string $couvertureNuageuse
     *
     * @return Meteo
     */
    public function setCouvertureNuageuse($couvertureNuageuse)
    {
        $this->couvertureNuageuse = $couvertureNuageuse;

        return $this;
    }

    /**
     * Get couvertureNuageuse.
     *
     * @return string
     */
    public function getCouvertureNuageuse()
    {
        return $this->couvertureNuageuse;
    }

    /**
     * Set precipitations.
     *
     * @param string $precipitations
     *
     * @return Meteo
     */
    public function setPrecipitations($precipitations)
    {
        $this->precipitations = $precipitations;

        return $this;
    }

    /**
     * Get precipitations.
     *
     * @return string
     */
    public function getPrecipitations()
    {
        return $this->precipitations;
    }

    /**
     * Set couvertureNeigeuseAuSol.
     *
     * @param string $couvertureNeigeuseAuSol
     *
     * @return Meteo
     */
    public function setCouvertureNeigeuseAuSol($couvertureNeigeuseAuSol)
    {
        $this->couvertureNeigeuseAuSol = $couvertureNeigeuseAuSol;

        return $this;
    }

    /**
     * Get couvertureNeigeuseAuSol.
     *
     * @return string
     */
    public function getCouvertureNeigeuseAuSol()
    {
        return $this->couvertureNeigeuseAuSol;
    }

    /**
     * Set lune.
     *
     * @param string $lune
     *
     * @return Meteo
     */
    public function setLune($lune)
    {
        $this->lune = $lune;

        return $this;
    }

    /**
     * Get lune.
     *
     * @return string
     */
    public function getLune()
    {
        return $this->lune;
    }

    public function __toString(){
        return "Visibilité(".$this->getVisibilite()."), vent(".$this->getVent()."), couverture nuageuse(".$this->getCouvertureNuageuse()."), précipitations(".$this->getPrecipitations()."), couverture neigeuse au sol(".$this->getCouvertureNeigeuseAuSol().") et lune(".$this->getLune().")";
    }
}
