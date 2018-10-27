<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DescriptionVegetation
 *
 * Archivé:
 * -surface
 * @ORM\Table(name="description_vegetation")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\DescriptionVegetationRepository")
 */
class DescriptionVegetation
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
    *
    * @ORM\ManyToOne(targetEntity="SystematiqueFlore")
    */
    private $nomScientifique;

    /**
    * @var string
    *
    * @ORM\ManyToOne(targetEntity="Observation", inversedBy="descriptionVegetations")
    */
    private $observation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rec", type="string", length=100, nullable=true)
     */
    private $rec;

    /**
     * @var int|null
     *
     * @ORM\Column(name="soc", type="string", length=100, nullable=true)
     */
    private $soc;

    /**
     * @var int|null
     *
     * @ORM\Column(name="vig", type="string", length=100, nullable=true)
     */
    private $vig;

    /**
     * @var int|null
     *
     * @ORM\Column(name="hauteur_moy", type="string", length=100, nullable=true)
     */
    private $hauteurMoy;

    /**
     * @var boolean|null
     *
     * @ORM\Column(name="mise_en_pot", type="boolean", nullable=true)
     */
    private $miseEnPot;

    /**
     * @var boolean|null
     *
     * @ORM\Column(name="mise_en_herbier", type="boolean", nullable=true)
     */
    private $miseEnHerbier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phenologie", type="string", length=100, nullable=true)
     */
    private $phenologie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire", type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @var bool
     *
     * @ORM\Column(name="plante_hote", type="boolean", nullable=true)
     */
    private $planteHote;

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
     * Set rec.
     *
     * @param int|null $rec
     *
     * @return DescriptionVegetation
     */
    public function setRec($rec = null)
    {
        $this->rec = $rec;

        return $this;
    }

    /**
     * Get rec.
     *
     * @return int|null
     */
    public function getRec()
    {
        return $this->rec;
    }

    /**
     * Set soc.
     *
     * @param int|null $soc
     *
     * @return DescriptionVegetation
     */
    public function setSoc($soc = null)
    {
        $this->soc = $soc;

        return $this;
    }

    /**
     * Get soc.
     *
     * @return int|null
     */
    public function getSoc()
    {
        return $this->soc;
    }

    /**
     * Set vig.
     *
     * @param int|null $vig
     *
     * @return DescriptionVegetation
     */
    public function setVig($vig = null)
    {
        $this->vig = $vig;

        return $this;
    }

    /**
     * Get vig.
     *
     * @return int|null
     */
    public function getVig()
    {
        return $this->vig;
    }

    /**
     * Set commentaire.
     *
     * @param string|null $commentaire
     *
     * @return DescriptionVegetation
     */
    public function setCommentaire($commentaire = null)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire.
     *
     * @return string|null
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set planteHote.
     *
     * @param bool|null $planteHote
     *
     * @return DescriptionVegetation
     */
    public function setPlanteHote($planteHote = null)
    {
        $this->planteHote = $planteHote;

        return $this;
    }

    /**
     * Get planteHote.
     *
     * @return bool|null
     */
    public function getPlanteHote()
    {
        return $this->planteHote;
    }

    /**
     * Set nomScientifique.
     *
     * @param \HFIBundle\Entity\SystematiqueFlore|null $nomScientifique
     *
     * @return DescriptionVegetation
     */
    public function setNomScientifique(\HFIBundle\Entity\SystematiqueFlore $nomScientifique = null)
    {
        $this->nomScientifique = $nomScientifique;

        return $this;
    }

    /**
     * Get nomScientifique.
     *
     * @return \HFIBundle\Entity\SystematiqueFlore|null
     */
    public function getNomScientifique()
    {
        return $this->nomScientifique;
    }

    /**
     * Set observation.
     *
     * @param \HFIBundle\Entity\Observation|null $observation
     *
     * @return DescriptionVegetation
     */
    public function setObservation(\HFIBundle\Entity\Observation $observation = null)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation.
     *
     * @return \HFIBundle\Entity\Observation|null
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set hauteurMoy.
     *
     * @param int|null $hauteurMoy
     *
     * @return DescriptionVegetation
     */
    public function setHauteurMoy($hauteurMoy = null)
    {
        $this->hauteurMoy = $hauteurMoy;

        return $this;
    }

    /**
     * Get hauteurMoy.
     *
     * @return int|null
     */
    public function getHauteurMoy()
    {
        return $this->hauteurMoy;
    }

    /**
     * Set miseEnPot.
     *
     * @param bool|null $miseEnPot
     *
     * @return DescriptionVegetation
     */
    public function setMiseEnPot($miseEnPot = null)
    {
        $this->miseEnPot = $miseEnPot;

        return $this;
    }

    /**
     * Get miseEnPot.
     *
     * @return bool|null
     */
    public function getMiseEnPot()
    {
        return $this->miseEnPot;
    }

    /**
     * Set miseEnHerbier.
     *
     * @param bool|null $miseEnHerbier
     *
     * @return DescriptionVegetation
     */
    public function setMiseEnHerbier($miseEnHerbier = null)
    {
        $this->miseEnHerbier = $miseEnHerbier;

        return $this;
    }

    /**
     * Get miseEnHerbier.
     *
     * @return bool|null
     */
    public function getMiseEnHerbier()
    {
        return $this->miseEnHerbier;
    }

    /**
     * Set phenologie.
     *
     * @param string|null $phenologie
     *
     * @return DescriptionVegetation
     */
    public function setPhenologie($phenologie = null)
    {
        $this->phenologie = $phenologie;

        return $this;
    }

    /**
     * Get phenologie.
     *
     * @return string|null
     */
    public function getPhenologie()
    {
        return $this->phenologie;
    }
}
