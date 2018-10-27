<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DescriptionInvertebre
 *
 * @ORM\Table(name="description_invertebre")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\DescriptionInvertebreRepository")
 */
class DescriptionInvertebre
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
    * @ORM\ManyToOne(targetEntity="Observation", inversedBy="descriptionInvertebres")
    */
    private $observation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_invertebre", type="string", length=10, nullable=true)
     */
    private $codeInvertebre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="abondance", type="string", length=50, nullable=true)
     */
    private $abondance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="morphe", type="string", length=10, nullable=true)
     */
    private $morphe;

    /**
     * @var int|null
     *
     * @ORM\Column(name="effectif_reel", type="integer", nullable=true)
     */
    private $effectifReel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nb_tube", type="integer", nullable=true)
     */
    private $nbTube;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire", type="text", nullable=true)
     */
    private $commentaire;


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
     * Set abondance.
     *
     * @param int|null $abondance
     *
     * @return DescriptionInvertebre
     */
    public function setAbondance($abondance = null)
    {
        $this->abondance = $abondance;

        return $this;
    }

    /**
     * Get abondance.
     *
     * @return int|null
     */
    public function getAbondance()
    {
        return $this->abondance;
    }

    /**
     * Set morphe.
     *
     * @param string|null $morphe
     *
     * @return DescriptionInvertebre
     */
    public function setMorphe($morphe = null)
    {
        $this->morphe = $morphe;

        return $this;
    }

    /**
     * Get morphe.
     *
     * @return string|null
     */
    public function getMorphe()
    {
        return $this->morphe;
    }

    /**
     * Set effectifReel.
     *
     * @param int|null $effectifReel
     *
     * @return DescriptionInvertebre
     */
    public function setEffectifReel($effectifReel = null)
    {
        $this->effectifReel = $effectifReel;

        return $this;
    }

    /**
     * Get effectifReel.
     *
     * @return int|null
     */
    public function getEffectifReel()
    {
        return $this->effectifReel;
    }

    /**
     * Set commentaire.
     *
     * @param string|null $commentaire
     *
     * @return DescriptionInvertebre
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
     * Set observation.
     *
     * @param \HFIBundle\Entity\Observation|null $observation
     *
     * @return DescriptionInvertebre
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
     * Set codeInvertebre.
     *
     * @param string|null $codeInvertebre
     *
     * @return DescriptionInvertebre
     */
    public function setCodeInvertebre($codeInvertebre = null)
    {
        $this->codeInvertebre = $codeInvertebre;

        return $this;
    }

    /**
     * Get codeInvertebre.
     *
     * @return string|null
     */
    public function getCodeInvertebre()
    {
        return $this->codeInvertebre;
    }

    /**
     * Set nbTube.
     *
     * @param int|null $nbTube
     *
     * @return DescriptionInvertebre
     */
    public function setNbTube($nbTube = null)
    {
        $this->nbTube = $nbTube;

        return $this;
    }

    /**
     * Get nbTube.
     *
     * @return int|null
     */
    public function getNbTube()
    {
        return $this->nbTube;
    }
}
