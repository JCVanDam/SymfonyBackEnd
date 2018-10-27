<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SystematiqueFlore
 *
 * @ORM\Table(name="systematique_flore")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\SystematiqueFloreRepository")
 */
class SystematiqueFlore
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
    * @ORM\ManyToMany(targetEntity="ZoneBioGeographique")
    */
    private $zoneBioGeographique;

    /**
     * @var string|null
     *
     * @ORM\Column(name="embranchement", type="string", length=255, nullable=true)
     */
    private $embranchement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cotyledon", type="string", length=50, nullable=true)
     */
    private $cotyledon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ordre", type="string", length=255, nullable=true)
     */
    private $ordre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="famille", type="string", length=50, nullable=true)
     */
    private $famille;

    /**
     * @var string|null
     *
     * @ORM\Column(name="genre", type="string", length=200, nullable=true)
     */
    private $genre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="espece", type="string", length=200, nullable=true)
     */
    private $espece;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_scientifique", type="string", length=200, nullable=true)
     */
    private $nomScientifique;

    /**
     * @var string|null
     *
     * @ORM\Column(name="repartition_biogeo", type="string", length=100, nullable=true)
     */
    private $repartitionBiogeo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="origine", type="string", length=50, nullable=true)
     */
    private $origine;

    /**
     * @var string|null
     *
     * @ORM\Column(name="auteur", type="string", length=50, nullable=true)
     */
    private $auteur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_vernaculaire", type="string", length=200, nullable=true)
     */
    private $nomVernaculaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="distribution", type="string", length=50, nullable=true)
     */
    private $distribution;

    /**
     * @var bool
     *
     * @ORM\Column(name="synonyme", type="boolean")
     */
    private $synonyme;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_vrai", type="string", length=255, nullable=true)
     */
    private $nomVrai;

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
     * Set embranchement.
     *
     * @param string|null $embranchement
     *
     * @return SystematiqueFlore
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
     * Set cotyledon.
     *
     * @param string|null $cotyledon
     *
     * @return SystematiqueFlore
     */
    public function setCotyledon($cotyledon = null)
    {
        $this->cotyledon = $cotyledon;

        return $this;
    }

    /**
     * Get cotyledon.
     *
     * @return string|null
     */
    public function getCotyledon()
    {
        return $this->cotyledon;
    }

    /**
     * Set ordre.
     *
     * @param string|null $ordre
     *
     * @return SystematiqueFlore
     */
    public function setOrdre($ordre = null)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre.
     *
     * @return string|null
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Set famille.
     *
     * @param string|null $famille
     *
     * @return SystematiqueFlore
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
     * Set genre.
     *
     * @param string|null $genre
     *
     * @return SystematiqueFlore
     */
    public function setGenre($genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre.
     *
     * @return string|null
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set espece.
     *
     * @param string|null $espece
     *
     * @return SystematiqueFlore
     */
    public function setEspece($espece = null)
    {
        $this->espece = $espece;

        return $this;
    }

    /**
     * Get espece.
     *
     * @return string|null
     */
    public function getEspece()
    {
        return $this->espece;
    }

    /**
     * Set nomScientifique.
     *
     * @param string|null $nomScientifique
     *
     * @return SystematiqueFlore
     */
    public function setNomScientifique($nomScientifique = null)
    {
        $this->nomScientifique = $nomScientifique;

        return $this;
    }

    /**
     * Get nomScientifique.
     *
     * @return string|null
     */
    public function getNomScientifique()
    {
        return $this->nomScientifique;
    }

    /**
     * Set repartitionBiogeo.
     *
     * @param string|null $repartitionBiogeo
     *
     * @return SystematiqueFlore
     */
    public function setRepartitionBiogeo($repartitionBiogeo = null)
    {
        $this->repartitionBiogeo = $repartitionBiogeo;

        return $this;
    }

    /**
     * Get repartitionBiogeo.
     *
     * @return string|null
     */
    public function getRepartitionBiogeo()
    {
        return $this->repartitionBiogeo;
    }

    /**
     * Set origine.
     *
     * @param string|null $origine
     *
     * @return SystematiqueFlore
     */
    public function setOrigine($origine = null)
    {
        $this->origine = $origine;

        return $this;
    }

    /**
     * Get origine.
     *
     * @return string|null
     */
    public function getOrigine()
    {
        return $this->origine;
    }

    /**
     * Set auteur.
     *
     * @param string|null $auteur
     *
     * @return SystematiqueFlore
     */
    public function setAuteur($auteur = null)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur.
     *
     * @return string|null
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set nomVernaculaire.
     *
     * @param string|null $nomVernaculaire
     *
     * @return SystematiqueFlore
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
     * Set distribution.
     *
     * @param string|null $distribution
     *
     * @return SystematiqueFlore
     */
    public function setDistribution($distribution = null)
    {
        $this->distribution = $distribution;

        return $this;
    }

    /**
     * Get distribution.
     *
     * @return string|null
     */
    public function getDistribution()
    {
        return $this->distribution;
    }

    /**
     * Set synonyme.
     *
     * @param bool $synonyme
     *
     * @return SystematiqueFlore
     */
    public function setSynonyme($synonyme)
    {
        $this->synonyme = $synonyme;

        return $this;
    }

    /**
     * Get synonyme.
     *
     * @return bool
     */
    public function getSynonyme()
    {
        return $this->synonyme;
    }

    /**
     * Set nomVrai.
     *
     * @param string $nomVrai
     *
     * @return SystematiqueFlore
     */
    public function setNomVrai($nomVrai)
    {
        $this->nomVrai = $nomVrai;

        return $this;
    }

    /**
     * Get nomVrai.
     *
     * @return string
     */
    public function getNomVrai()
    {
        return $this->nomVrai;
    }

    /**
     * Set commentaire.
     *
     * @param string|null $commentaire
     *
     * @return SystematiqueFlore
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
     * Constructor
     */
    public function __construct()
    {
        $this->zoneBioGeographique = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add zoneBioGeographique.
     *
     * @param \HFIBundle\Entity\ZoneBioGeographique $zoneBioGeographique
     *
     * @return SystematiqueFlore
     */
    public function addZoneBioGeographique(\HFIBundle\Entity\ZoneBioGeographique $zoneBioGeographique)
    {
        $this->zoneBioGeographique[] = $zoneBioGeographique;

        return $this;
    }

    /**
     * Remove zoneBioGeographique.
     *
     * @param \HFIBundle\Entity\ZoneBioGeographique $zoneBioGeographique
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeZoneBioGeographique(\HFIBundle\Entity\ZoneBioGeographique $zoneBioGeographique)
    {
        return $this->zoneBioGeographique->removeElement($zoneBioGeographique);
    }

    /**
     * Get zoneBioGeographique.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getZoneBioGeographique()
    {
        return $this->zoneBioGeographique;
    }

    public function concate()
    {
        return $this->getGenre() . ' ' . $this->getEspece();
    }
}
