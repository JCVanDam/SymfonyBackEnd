<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SystematiqueInvertebre
 *
 * @ORM\Table(name="systematique_invertebre")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\SystematiqueInvertebreRepository")
 */
class SystematiqueInvertebre
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
     * @ORM\Column(name="code", type="string", length=10, unique=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="embranchement", type="string", length=100, nullable=true)
     */
    private $embranchement;

    /**
     * @var string
     *
     * @ORM\Column(name="sous_embranchement", type="string", length=255, nullable=true)
     */
    private $sousEmbranchement;

    /**
     * @var string
     *
     * @ORM\Column(name="ordre", type="string", length=255, nullable=true)
     */
    private $ordre;

    /**
     * @var string
     *
     * @ORM\Column(name="sous_ordre", type="string", length=100, nullable=true)
     */
    private $sousOrdre;

    /**
     * @var string
     *
     * @ORM\Column(name="classe", type="string", length=255, nullable=true)
     */
    private $classe;

    /**
     * @var string
     *
     * @ORM\Column(name="sous_classe", type="string", length=255, nullable=true)
     */
    private $sousClasse;

    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string", length=255, nullable=true)
     */
    private $famille;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=255, nullable=true)
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="espece", type="string", length=255, nullable=true)
     */
    private $espece;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_scientifique", type="string", length=255, unique=true)
     */
    private $nomScientifique;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire", type="text", nullable=true, nullable=true)
     */
    private $commentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="statut_invertebre", type="string", length=50, nullable=true)
     */
    private $statutInvertebre;

    /**
     * @var string
     *
     * @ORM\Column(name="repartition_biogeographique", type="string", length=255, nullable=true)
     */
    private $repartitionBiogeographique;


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
     * Set code.
     *
     * @param string $code
     *
     * @return CodeInvertebre
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set embranchement.
     *
     * @param string $embranchement
     *
     * @return SystematiqueInvertebre
     */
    public function setEmbranchement($embranchement)
    {
        $this->embranchement = $embranchement;

        return $this;
    }

    /**
     * Get embranchement.
     *
     * @return string
     */
    public function getEmbranchement()
    {
        return $this->embranchement;
    }

    /**
     * Set sousEmbranchement.
     *
     * @param string $sousEmbranchement
     *
     * @return SystematiqueInvertebre
     */
    public function setSousEmbranchement($sousEmbranchement)
    {
        $this->sousEmbranchement = $sousEmbranchement;

        return $this;
    }

    /**
     * Get sousEmbranchement.
     *
     * @return string
     */
    public function getSousEmbranchement()
    {
        return $this->sousEmbranchement;
    }

    /**
     * Set ordre.
     *
     * @param string $ordre
     *
     * @return SystematiqueInvertebre
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre.
     *
     * @return string
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Set class.
     *
     * @param string $class
     *
     * @return SystematiqueInvertebre
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class.
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set sousClasse.
     *
     * @param string $sousClasse
     *
     * @return SystematiqueInvertebre
     */
    public function setSousClasse($sousClasse)
    {
        $this->sousClasse = $sousClasse;

        return $this;
    }

    /**
     * Get sousClasse.
     *
     * @return string
     */
    public function getSousClasse()
    {
        return $this->sousClasse;
    }

    /**
     * Set famille.
     *
     * @param string $famille
     *
     * @return SystematiqueInvertebre
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille.
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set genre.
     *
     * @param string $genre
     *
     * @return SystematiqueInvertebre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre.
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set espece.
     *
     * @param string $espece
     *
     * @return SystematiqueInvertebre
     */
    public function setEspece($espece)
    {
        $this->espece = $espece;

        return $this;
    }

    /**
     * Get espece.
     *
     * @return string
     */
    public function getEspece()
    {
        return $this->espece;
    }

    /**
     * Set nomScientifique.
     *
     * @param string $nomScientifique
     *
     * @return SystematiqueInvertebre
     */
    public function setNomScientifique($nomScientifique)
    {
        $this->nomScientifique = $nomScientifique;

        return $this;
    }

    /**
     * Get nomScientifique.
     *
     * @return string
     */
    public function getNomScientifique()
    {
        return $this->nomScientifique;
    }

    /**
     * Set commentaire.
     *
     * @param string|null $commentaire
     *
     * @return SystematiqueInvertebre
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
     * Set repartitionBiogeographique.
     *
     * @param string $repartitionBiogeographique
     *
     * @return SystematiqueInvertebre
     */
    public function setRepartitionBiogeographique($repartitionBiogeographique)
    {
        $this->repartitionBiogeographique = $repartitionBiogeographique;

        return $this;
    }

    /**
     * Get repartitionBiogeographique.
     *
     * @return string
     */
    public function getRepartitionBiogeographique()
    {
        return $this->repartitionBiogeographique;
    }

    /**
     * Set classe.
     *
     * @param string $classe
     *
     * @return SystematiqueInvertebre
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe.
     *
     * @return string
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Set sousOrdre.
     *
     * @param string $sousOrdre
     *
     * @return SystematiqueInvertebre
     */
    public function setSousOrdre($sousOrdre)
    {
        $this->sousOrdre = $sousOrdre;

        return $this;
    }

    /**
     * Get sousOrdre.
     *
     * @return string
     */
    public function getSousOrdre()
    {
        return $this->sousOrdre;
    }

    /**
     * Set statutInvertebre.
     *
     * @param string $statutInvertebre
     *
     * @return SystematiqueInvertebre
     */
    public function setStatutInvertebre($statutInvertebre)
    {
        $this->statutInvertebre = $statutInvertebre;

        return $this;
    }

    /**
     * Get statutInvertebre.
     *
     * @return string
     */
    public function getStatutInvertebre()
    {
        return $this->statutInvertebre;
    }
}
