<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eradication
 *
 * Archivé:
 * -eradicationNonEfficace
 * @ORM\Table(name="eradication")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\EradicationRepository")
 */
class Eradication
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
    *
    * @ORM\OneToOne(targetEntity="Observation", mappedBy="eradication"))
    */
    private $observation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="presence_graine", type="boolean", nullable=true)
     */
    private $presenceGraine;

    /**
     * @var int|null
     *
     * @ORM\Column(name="statut_fiche_terrain", type="string", length=50, nullable=true)
     */
    private $statutFicheTerrain;

    /**
     * @var int|null
     *
     * @ORM\Column(name="type_colonisation", type="text", nullable=true)
     */
    private $typeColonisation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="calcule_surface", type="string", nullable=true)
     */
    private $calculeSurface;

    /**
     * @var int|null
     *
     * @ORM\Column(name="largeur_reelle_traite", type="float", nullable=true)
     */
    private $largeurReelleTraite;

    /**
     * @var int|null
     *
     * @ORM\Column(name="longueur_reelle_traite", type="float", nullable=true)
     */
    private $longueurReelleTraite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="surface_estimee", type="string", length=50, nullable=true)
     */
    private $surfaceEstimee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="surface_archive", type="string", nullable=true)
     */
    private $surfaceArchive;

    /**
     * @var string|null
     *
     * @ORM\Column(name="surface_archive_traitee", type="string", nullable=true)
     */
    private $surfaceArchiveTraitee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre_pied_approximatif", type="boolean", nullable=true)
     */
    private $nombrePiedApproximatif;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre_pied_exact", type="integer", nullable=true)
     */
    private $nombrePiedExact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_observation", type="string", length=50, nullable=true)
     */
    private $typeObservation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nbr_patch", type="string", length=50, nullable=true)
     */
    private $nbrPatch;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="eradication_non_efficace", type="boolean", nullable=true)
     */
    private $eradicationNonEfficace;

    /**
     * @var string|null
     *
     * @ORM\Column(name="arrachage", type="boolean", nullable=true)
     */
    private $arrachage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="etatBachage", type="string", length=10, nullable=true)
     */
    private $etatBachage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="coupe", type="boolean", nullable=true)
     */
    private $coupe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="traitementThermique", type="boolean", nullable=true)
     */
    private $traitementThermique;

    /**
     * @var string|null
     *
     * @ORM\Column(name="epandageSel", type="boolean", nullable=true)
     */
    private $epandageSel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="produitUtilise", type="string", length=50, nullable=true)
     */
    private $produitUtilise;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dilution", type="string", length=100, nullable=true)
     */
    private $dilution;

    /**
     * @var int|null
     *
     * @ORM\Column(name="longueur_traite", type="float", nullable=true)
     */
    private $longueurTraite;

    /**
     * @var int|null
     *
     * @ORM\Column(name="largeur_traite", type="float", nullable=true)
     */
    private $largeurTraite;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="mise_en_pot", type="string", length=10, nullable=true)
     */
    private $miseEnPot;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="mise_en_herbier", type="boolean", nullable=true)
     */
    private $miseEnHerbier;

    /**
     * @var int|null
     *
     * @ORM\Column(name="haut_moy", type="integer", nullable=true)
     */
    private $hautMoy;

    /**
     * @var int|null
     *
     * @ORM\Column(name="haut_max", type="integer", nullable=true)
     */
    private $hautMax;

    /**
     * @var int|null
     *
     * @ORM\Column(name="surface_traitement", type="string", length=10, nullable=true)
     */
    private $surfaceTraitement;

    /**
     * @var int|null
     *
     * @ORM\Column(name="phenologie", type="string", nullable=true)
     */
    private $phenologie;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nbr_pied_arrache", type="integer", nullable=true)
     */
    private $nbrPiedArrache;

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
     * Set typeObservation.
     *
     * @param string|null $typeObservation
     *
     * @return Eradication
     */
    public function setTypeObservation($typeObservation = null)
    {
        $this->typeObservation = $typeObservation;

        return $this;
    }

    /**
     * Get typeObservation.
     *
     * @return string|null
     */
    public function getTypeObservation()
    {
        return $this->typeObservation;
    }

    /**
     * Set eradicationNonEfficace.
     *
     * @param bool|null $eradicationNonEfficace
     *
     * @return Eradication
     */
    public function setEradicationNonEfficace($eradicationNonEfficace = null)
    {
        $this->eradicationNonEfficace = $eradicationNonEfficace;

        return $this;
    }

    /**
     * Get eradicationNonEfficace.
     *
     * @return bool|null
     */
    public function getEradicationNonEfficace()
    {
        return $this->eradicationNonEfficace;
    }

    /**
     * Set etatBachage.
     *
     * @param string|null $etatBachage
     *
     * @return Eradication
     */
    public function setEtatBachage($etatBachage = null)
    {
        $this->etatBachage = $etatBachage;

        return $this;
    }

    /**
     * Get etatBachage.
     *
     * @return string|null
     */
    public function getEtatBachage()
    {
        return $this->etatBachage;
    }

    /**
     * Set observation.
     *
     * @param \HFIBundle\Entity\Observation|null $observation
     *
     * @return Eradication
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
     * Set typeColonisation.
     *
     * @param string|null $typeColonisation
     *
     * @return Eradication
     */
    public function setTypeColonisation($typeColonisation = null)
    {
        $this->typeColonisation = $typeColonisation;

        return $this;
    }

    /**
     * Get typeColonisation.
     *
     * @return string|null
     */
    public function getTypeColonisation()
    {
        return $this->typeColonisation;
    }

    /**
     * Set nbrPatch.
     *
     * @param int|null $nbrPatch
     *
     * @return Eradication
     */
    public function setNbrPatch($nbrPatch = null)
    {
        $this->nbrPatch = $nbrPatch;

        return $this;
    }

    /**
     * Get nbrPatch.
     *
     * @return int|null
     */
    public function getNbrPatch()
    {
        return $this->nbrPatch;
    }

    /**
     * Set nomScientifique.
     *
     * @param \HFIBundle\Entity\SystematiqueFlore|null $nomScientifique
     *
     * @return Eradication
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
     * Set miseEnPot.
     *
     * @param bool|null $miseEnPot
     *
     * @return Eradication
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
     * @return Eradication
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
     * @return Eradication
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

    /**
     * Set calculeSurface.
     *
     * @param string|null $calculeSurface
     *
     * @return Eradication
     */
    public function setCalculeSurface($calculeSurface = null)
    {
        $this->calculeSurface = $calculeSurface;

        return $this;
    }

    /**
     * Get calculeSurface.
     *
     * @return string|null
     */
    public function getCalculeSurface()
    {
        return $this->calculeSurface;
    }

    /**
     * Set nombrePiedApproximatif.
     *
     * @param string|null $nombrePiedApproximatif
     *
     * @return Eradication
     */
    public function setNombrePiedApproximatif($nombrePiedApproximatif = null)
    {
        $this->nombrePiedApproximatif = $nombrePiedApproximatif;

        return $this;
    }

    /**
     * Get nombrePiedApproximatif.
     *
     * @return string|null
     */
    public function getNombrePiedApproximatif()
    {
        return $this->nombrePiedApproximatif;
    }

    /**
     * Set nombrePiedExact.
     *
     * @param int|null $nombrePiedExact
     *
     * @return Eradication
     */
    public function setNombrePiedExact($nombrePiedExact = null)
    {
        $this->nombrePiedExact = $nombrePiedExact;

        return $this;
    }

    /**
     * Get nombrePiedExact.
     *
     * @return int|null
     */
    public function getNombrePiedExact()
    {
        return $this->nombrePiedExact;
    }

    /**
     * Set hautMoy.
     *
     * @param int|null $hautMoy
     *
     * @return Eradication
     */
    public function setHautMoy($hautMoy = null)
    {
        $this->hautMoy = $hautMoy;

        return $this;
    }

    /**
     * Get hautMoy.
     *
     * @return int|null
     */
    public function getHautMoy()
    {
        return $this->hautMoy;
    }

    /**
     * Set hautMax.
     *
     * @param int|null $hautMax
     *
     * @return Eradication
     */
    public function setHautMax($hautMax = null)
    {
        $this->hautMax = $hautMax;

        return $this;
    }

    /**
     * Get hautMax.
     *
     * @return int|null
     */
    public function getHautMax()
    {
        return $this->hautMax;
    }

    /**
     * Set arrachage.
     *
     * @param string|null $arrachage
     *
     * @return Eradication
     */
    public function setArrachage($arrachage = null)
    {
        $this->arrachage = $arrachage;

        return $this;
    }

    /**
     * Get arrachage.
     *
     * @return string|null
     */
    public function getArrachage()
    {
        return $this->arrachage;
    }

    /**
     * Set coupe.
     *
     * @param string|null $coupe
     *
     * @return Eradication
     */
    public function setCoupe($coupe = null)
    {
        $this->coupe = $coupe;

        return $this;
    }

    /**
     * Get coupe.
     *
     * @return string|null
     */
    public function getCoupe()
    {
        return $this->coupe;
    }

    /**
     * Set traitementThermique.
     *
     * @param string|null $traitementThermique
     *
     * @return Eradication
     */
    public function setTraitementThermique($traitementThermique = null)
    {
        $this->traitementThermique = $traitementThermique;

        return $this;
    }

    /**
     * Get traitementThermique.
     *
     * @return string|null
     */
    public function getTraitementThermique()
    {
        return $this->traitementThermique;
    }

    /**
     * Set epandageSel.
     *
     * @param string|null $epandageSel
     *
     * @return Eradication
     */
    public function setEpandageSel($epandageSel = null)
    {
        $this->epandageSel = $epandageSel;

        return $this;
    }

    /**
     * Get epandageSel.
     *
     * @return string|null
     */
    public function getEpandageSel()
    {
        return $this->epandageSel;
    }

    /**
     * Set produitUtilise.
     *
     * @param string|null $produitUtilise
     *
     * @return Eradication
     */
    public function setProduitUtilise($produitUtilise = null)
    {
        $this->produitUtilise = $produitUtilise;

        return $this;
    }

    /**
     * Get produitUtilise.
     *
     * @return string|null
     */
    public function getProduitUtilise()
    {
        return $this->produitUtilise;
    }

    /**
     * Set dilution.
     *
     * @param string|null $dilution
     *
     * @return Eradication
     */
    public function setDilution($dilution = null)
    {
        $this->dilution = $dilution;

        return $this;
    }

    /**
     * Get dilution.
     *
     * @return string|null
     */
    public function getDilution()
    {
        return $this->dilution;
    }

    /**
     * Set longueurTraite.
     *
     * @param int|null $longueurTraite
     *
     * @return Eradication
     */
    public function setLongueurTraite($longueurTraite = null)
    {
        $this->longueurTraite = $longueurTraite;

        return $this;
    }

    /**
     * Get longueurTraite.
     *
     * @return int|null
     */
    public function getLongueurTraite()
    {
        return $this->longueurTraite;
    }

    /**
     * Set largeurTraite.
     *
     * @param int|null $largeurTraite
     *
     * @return Eradication
     */
    public function setLargeurTraite($largeurTraite = null)
    {
        $this->largeurTraite = $largeurTraite;

        return $this;
    }

    /**
     * Get largeurTraite.
     *
     * @return int|null
     */
    public function getLargeurTraite()
    {
        return $this->largeurTraite;
    }


    /**
     * Set statutFicheTerrain.
     *
     * @param string|null $statutFicheTerrain
     *
     * @return Eradication
     */
    public function setStatutFicheTerrain($statutFicheTerrain = null)
    {
        $this->statutFicheTerrain = $statutFicheTerrain;

        return $this;
    }

    /**
     * Get statutFicheTerrain.
     *
     * @return string|null
     */
    public function getStatutFicheTerrain()
    {
        return $this->statutFicheTerrain;
    }

    /**
     * Set presenceGraine.
     *
     * @param string|null $presenceGraine
     *
     * @return Eradication
     */
    public function setPresenceGraine($presenceGraine = null)
    {
        $this->presenceGraine = $presenceGraine;

        return $this;
    }

    /**
     * Get presenceGraine.
     *
     * @return string|null
     */
    public function getPresenceGraine()
    {
        return $this->presenceGraine;
    }

    /**
     * Set surfaceTraitement.
     *
     * @param string|null $surfaceTraitement
     *
     * @return Eradication
     */
    public function setSurfaceTraitement($surfaceTraitement = null)
    {
        $this->surfaceTraitement = $surfaceTraitement;

        return $this;
    }

    /**
     * Get surfaceTraitement.
     *
     * @return string|null
     */
    public function getSurfaceTraitement()
    {
        return $this->surfaceTraitement;
    }

    /**
     * Set largeurReelleTraite.
     *
     * @param string|null $largeurReelleTraite
     *
     * @return Eradication
     */
    public function setLargeurReelleTraite($largeurReelleTraite = null)
    {
        $this->largeurReelleTraite = $largeurReelleTraite;

        return $this;
    }

    /**
     * Get largeurReelleTraite.
     *
     * @return string|null
     */
    public function getLargeurReelleTraite()
    {
        return $this->largeurReelleTraite;
    }

    /**
     * Set longueurReelleTraite.
     *
     * @param string|null $longueurReelleTraite
     *
     * @return Eradication
     */
    public function setLongueurReelleTraite($longueurReelleTraite = null)
    {
        $this->longueurReelleTraite = $longueurReelleTraite;

        return $this;
    }

    /**
     * Get longueurReelleTraite.
     *
     * @return string|null
     */
    public function getLongueurReelleTraite()
    {
        return $this->longueurReelleTraite;
    }

    /**
     * Set surfaceEstimee.
     *
     * @param string|null $surfaceEstimee
     *
     * @return Eradication
     */
    public function setSurfaceEstimee($surfaceEstimee = null)
    {
        $this->surfaceEstimee = $surfaceEstimee;

        return $this;
    }

    /**
     * Get surfaceEstimee.
     *
     * @return string|null
     */
    public function getSurfaceEstimee()
    {
        return $this->surfaceEstimee;
    }

    /**
     * Set surfaceArchive.
     *
     * @param string|null $surfaceArchive
     *
     * @return Eradication
     */
    public function setSurfaceArchive($surfaceArchive = null)
    {
        $this->surfaceArchive = $surfaceArchive;

        return $this;
    }

    /**
     * Get surfaceArchive.
     *
     * @return string|null
     */
    public function getSurfaceArchive()
    {
        return $this->surfaceArchive;
    }

    /**
     * Set surfaceArchiveTraitee.
     *
     * @param string|null $surfaceArchiveTraitee
     *
     * @return Eradication
     */
    public function setSurfaceArchiveTraitee($surfaceArchiveTraitee = null)
    {
        $this->surfaceArchiveTraitee = $surfaceArchiveTraitee;

        return $this;
    }

    /**
     * Get surfaceArchiveTraitee.
     *
     * @return string|null
     */
    public function getSurfaceArchiveTraitee()
    {
        return $this->surfaceArchiveTraitee;
    }

    /**
     * Set nbrPiedArrache.
     *
     * @param int|null $nbrPiedArrache
     *
     * @return Eradication
     */
    public function setNbrPiedArrache($nbrPiedArrache = null)
    {
        $this->nbrPiedArrache = $nbrPiedArrache;

        return $this;
    }

    /**
     * Get nbrPiedArrache.
     *
     * @return int|null
     */
    public function getNbrPiedArrache()
    {
        return $this->nbrPiedArrache;
    }
}
