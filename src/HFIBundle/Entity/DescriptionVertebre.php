<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DescriptionVertebre.
 *
 * @ORM\Table(name="description_vertebre")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\DescriptionVertebreRepository")
 */
class DescriptionVertebre
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
    * @ORM\ManyToOne(targetEntity="Observation", inversedBy="descriptionVertebres")
    */
    private $observation;

    /**
    * @var string
    *
    * @ORM\ManyToOne(targetEntity="SystematiqueVertebre", inversedBy="descriptionVertebres")
    */
    private $nomVernaculaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abondance", type="string", length=100, nullable=true)
     */
    private $abondance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_impact", type="simple_array", nullable=true)
     */
    private $typeImpact;

    /**
     * @var int|null
     *
     * @ORM\Column(name="intensite_impact", type="string", length=100, nullable=true)
     */
    private $intensiteImpact;

    /**
     * @var int|null
     *
     * @ORM\Column(name="occupation", type="integer", nullable=true)
     */
    private $occupation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="integer", nullable=true)
     */
    private $nombre;

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
     * Set nomVernaculaire.
     *
     * @param string|null $nomVernaculaire
     *
     * @return DescriptionVertebre
     */
    public function setNomVernaculaire($nomVernaculaire = null)
    {
        $this->nomVernaculaire = $nomVernaculaire;

        return $this;
    }

    /**
     * Get nomVernaculaire.
     *
     * @return string|null
     */
    public function getNomVernaculaire()
    {
        return $this->nomVernaculaire;
    }

    /**
     * Set abondance.
     *
     * @param int|null $abondance
     *
     * @return DescriptionVertebre
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
     * Set typeImpact.
     *
     * @param string|null $typeImpact
     *
     * @return DescriptionVertebre
     */
    public function setTypeImpact($typeImpact = null)
    {
        $this->typeImpact = $typeImpact;

        return $this;
    }

    /**
     * Get typeImpact.
     *
     * @return string|null
     */
    public function getTypeImpact()
    {
        return $this->typeImpact;
    }

    /**
     * Set intensiteImpact.
     *
     * @param int|null $intensiteImpact
     *
     * @return DescriptionVertebre
     */
    public function setIntensiteImpact($intensiteImpact = null)
    {
        $this->intensiteImpact = $intensiteImpact;

        return $this;
    }

    /**
     * Get intensiteImpact.
     *
     * @return int|null
     */
    public function getIntensiteImpact()
    {
        return $this->intensiteImpact;
    }

    /**
     * Set occupation.
     *
     * @param int|null $occupation
     *
     * @return DescriptionVertebre
     */
    public function setOccupation($occupation = null)
    {
        $this->occupation = $occupation;

        return $this;
    }

    /**
     * Get occupation.
     *
     * @return int|null
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * Set nombre.
     *
     * @param string|null $nombre
     *
     * @return DescriptionVertebre
     */
    public function setNombre($nombre = null)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre.
     *
     * @return string|null
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set commentaire.
     *
     * @param string|null $commentaire
     *
     * @return DescriptionVertebre
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
     * @return DescriptionVertebre
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
}
