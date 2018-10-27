<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Systematique_vertebre
 *
 * @ORM\Table(name="systematique_vertebre")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\SystematiqueVertebreRepository")
 */
class SystematiqueVertebre
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
    * @ORM\OneToMany(targetEntity="DescriptionVertebre", mappedBy="nomVernaculaire", cascade={"persist"})
    */
    private $descriptionVertebres;

    /**
     * @var string|null
     *
     * @ORM\Column(name="genre_faune", type="string", length=255, nullable=true)
     */
    private $genreFaune;

    /**
     * @var string|null
     *
     * @ORM\Column(name="espece_faune", type="string", length=255, nullable=true)
     */
    private $especeFaune;

    /**
     * @var string|null
     *
     * @ORM\Column(name="scient_faune", type="string", length=255, nullable=true)
     */
    private $scientFaune;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vern_faune", type="string", length=255, nullable=true)
     */
    private $vernFaune;

    /**
     * @var string|null
     *
     * @ORM\Column(name="embranchement", type="string", length=255, nullable=true)
     */
    private $embranchement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="famille", type="string", length=255, nullable=true)
     */
    private $famille;


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
     * Set genreFaune.
     *
     * @param string|null $genreFaune
     *
     * @return systematique_vertebre
     */
    public function setGenreFaune($genreFaune = null)
    {
        $this->genreFaune = $genreFaune;

        return $this;
    }

    /**
     * Get genreFaune.
     *
     * @return string|null
     */
    public function getGenreFaune()
    {
        return $this->genreFaune;
    }

    /**
     * Set especeFaune.
     *
     * @param string|null $especeFaune
     *
     * @return systematique_vertebre
     */
    public function setEspeceFaune($especeFaune = null)
    {
        $this->especeFaune = $especeFaune;

        return $this;
    }

    /**
     * Get especeFaune.
     *
     * @return string|null
     */
    public function getEspeceFaune()
    {
        return $this->especeFaune;
    }

    /**
     * Set scientFaune.
     *
     * @param string|null $scientFaune
     *
     * @return systematique_vertebre
     */
    public function setScientFaune($scientFaune = null)
    {
        $this->scientFaune = $scientFaune;

        return $this;
    }

    /**
     * Get scientFaune.
     *
     * @return string|null
     */
    public function getScientFaune()
    {
        return $this->scientFaune;
    }

    /**
     * Set embranchement.
     *
     * @param string|null $embranchement
     *
     * @return systematique_vertebre
     */
    public function setEmbranchement($embranchement = null)
    {
        $this->embranchement = $embranchement;

        return $this;
    }

    /**
     * Get embranchement.
     *
     * @return string|null
     */
    public function getEmbranchement()
    {
        return $this->embranchement;
    }

    /**
     * Set famille.
     *
     * @param string|null $famille
     *
     * @return systematique_vertebre
     */
    public function setFamille($famille = null)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille.
     *
     * @return string|null
     */
    public function getFamille()
    {
        return $this->famille;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->descriptionVertebre = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set vernFaune.
     *
     * @param string|null $vernFaune
     *
     * @return SystematiqueVertebre
     */
    public function setVernFaune($vernFaune = null)
    {
        $this->vernFaune = $vernFaune;

        return $this;
    }

    /**
     * Get vernFaune.
     *
     * @return string|null
     */
    public function getVernFaune()
    {
        return $this->vernFaune;
    }

    /**
     * Add descriptionVertebre.
     *
     * @param \HFIBundle\Entity\DescriptionVertebre $descriptionVertebre
     *
     * @return SystematiqueVertebre
     */
    public function addDescriptionVertebre(\HFIBundle\Entity\DescriptionVertebre $descriptionVertebre)
    {
        $this->descriptionVertebres[] = $descriptionVertebre;

        return $this;
    }

    /**
     * Remove descriptionVertebre.
     *
     * @param \HFIBundle\Entity\DescriptionVertebre $descriptionVertebre
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDescriptionVertebre(\HFIBundle\Entity\DescriptionVertebre $descriptionVertebre)
    {
        return $this->descriptionVertebres->removeElement($descriptionVertebre);
    }

    /**
     * Get descriptionVertebres.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDescriptionVertebres()
    {
        return $this->descriptionVertebres;
    }
}
