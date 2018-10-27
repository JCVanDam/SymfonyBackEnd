<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FicheTerrain
 *
 * @ORM\Table(name="fiche_terrain")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\FicheTerrainRepository")
 */
class FicheTerrain
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
    * @ORM\OneToOne(targetEntity="Observation", mappedBy="ficheTerrain")
    */
    private $observation;

    /**
     * @var integer
     *
     * @ORM\Column(name="longueur", type="integer", nullable=true)
     */
    private $longueur;

    /**
     * @var integer
     *
     * @ORM\Column(name="largeur", type="integer", nullable=true)
     */
    private $largeur;

    /**
     * @var string
     *
     * @ORM\Column(name="type_milieu", type="string", length=200, nullable=true)
     */
    private $typeMilieu;

    /**
     * @var string
     *
     * @ORM\Column(name="statut_fiche_terrain", type="string", length=50, nullable=true)
     */
    private $statutFicheTerrain;

    /**
     * @var string|null
     *
     * @ORM\Column(name="surface_zone", type="string", length=50, nullable=true)
     */
    private $surfaceZone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="milieu_autre", type="string", length=255, nullable=true)
     */
    private $milieuAutre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="topographie", type="string", length=255, nullable=true)
     */
    private $topographie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="topo_autre", type="string", length=50, nullable=true)
     */
    private $topoAutre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pente", type="string", length=20, nullable=true)
     */
    private $pente;

    /**
     * @var string|null
     *
     * @ORM\Column(name="orientation", type="string", length=50, nullable=true)
     */
    private $orientation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="condition_exposition", type="string", length=50, nullable=true)
     */
    private $conditionExposition;

    /**
     * @var string|null
     *
     * @ORM\Column(name="erosion", type="simple_array", length=50, nullable=true)
     */
    private $erosion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="erosion_autre", type="string", length=50, nullable=true)
     */
    private $erosionAutre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rec_blocs", type="integer", nullable=true)
     */
    private $recBlocs;

    /**
     * @var int
     *
     * @ORM\Column(name="rec_cailloux", type="integer", nullable=true)
     */
    private $recCailloux;

    /**
     * @var int
     *
     * @ORM\Column(name="rec_sols", type="integer", nullable=true)
     */
    private $recSols;

    /**
     * @var int
     *
     * @ORM\Column(name="rec_graviers", type="integer", nullable=true)
     */
    private $recGraviers;

    /**
     * @var int
     *
     * @ORM\Column(name="rec_strate_bryo_lichenique", type="integer", nullable=true)
     */
    private $recStrateBryoLichenique;

    /**
     * @var int
     *
     * @ORM\Column(name="rec_strate_herbacee", type="integer", nullable=true)
     */
    private $recStrateHerbacee;

    /**
     * @var int
     *
     * @ORM\Column(name="rec_strate_arbustive", type="integer", nullable=true)
     */
    private $recStrateArbustive;

    /**
     * @var int
     *
     * @ORM\Column(name="hauteur_vegetation", type="integer", nullable=true)
     */
    private $hauteurVegetation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="habitat", type="string", length=255, nullable=true)
     */
    private $habitat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire_habitat", type="text", nullable=true)
     */
    private $commentaireHabitat;

    /**
     * @var string
     *
     * @ORM\Column(name="substrat", type="string", length=50, nullable=true)
     */
    private $substrat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="epaisseur_substrat", type="integer", nullable=true)
     */
    private $epaisseurSubstrat;

    /**
     * @var int|null
     *
     * @ORM\Column(name="micro_relief", type="integer", nullable=true)
     */
    private $microRelief;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pente_micro_topo", type="integer", nullable=true)
     */
    private $penteMicroTopo;

    /**
     * @var string
     *
     * @ORM\Column(name="humidite", type="string", length=50, nullable=true)
     */
    private $humidite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="particularite_geologique", type="string", length=50, nullable=true)
     */
    private $particulariteGeologique;

    /**
     * @var string|null
     *
     * @ORM\Column(name="categorie_meteo", type="simple_array", length=255, nullable=true)
     */
    private $categorieMeteo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire", type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_gps", type="string", length=10, nullable=true)
     */
    private $codeGps;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_observation", type="string", length=50, nullable=true)
     */
    private $typeObservation;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_initial", type="string", length=20, nullable=true)
     */
    private $nomInitial;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255, nullable=true)
     */
    private $categorie;

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
     * Set surfaceZone.
     *
     * @param string|null $surfaceZone
     *
     * @return Observation
     */
    public function setSurfaceZone($surfaceZone = null)
    {
        $this->surfaceZone = $surfaceZone;

        return $this;
    }

    /**
     * Get surfaceZone.
     *
     * @return string|null
     */
    public function getSurfaceZone()
    {
        return $this->surfaceZone;
    }

    /**
     * Set milieuAutre.
     *
     * @param string|null $milieuAutre
     *
     * @return Observation
     */
    public function setMilieuAutre($milieuAutre = null)
    {
        $this->milieuAutre = $milieuAutre;

        return $this;
    }

    /**
     * Get milieuAutre.
     *
     * @return string|null
     */
    public function getMilieuAutre()
    {
        return $this->milieuAutre;
    }

    /**
     * Set topographie.
     *
     * @param string|null $topographie
     *
     * @return Observation
     */
    public function setTopographie($topographie = null)
    {
        $this->topographie = $topographie;

        return $this;
    }

    /**
     * Get topographie.
     *
     * @return string|null
     */
    public function getTopographie()
    {
        return $this->topographie;
    }

    /**
     * Set topoAutre.
     *
     * @param string|null $topoAutre
     *
     * @return Observation
     */
    public function setTopoAutre($topoAutre = null)
    {
        $this->topoAutre = $topoAutre;

        return $this;
    }

    /**
     * Get topoAutre.
     *
     * @return string|null
     */
    public function getTopoAutre()
    {
        return $this->topoAutre;
    }

    /**
     * Set pente.
     *
     * @param float|null $pente
     *
     * @return Observation
     */
    public function setPente($pente = null)
    {
        $this->pente = $pente;

        return $this;
    }

    /**
     * Get pente.
     *
     * @return float|null
     */
    public function getPente()
    {
        return $this->pente;
    }

    /**
     * Set conditionExposition.
     *
     * @param string|null $conditionExposition
     *
     * @return Observation
     */
    public function setConditionExposition($conditionExposition = null)
    {
        $this->conditionExposition = $conditionExposition;

        return $this;
    }

    /**
     * Get conditionExposition.
     *
     * @return string|null
     */
    public function getConditionExposition()
    {
        return $this->conditionExposition;
    }

    /**
     * Set erosion.
     *
     * @param string|null $erosion
     *
     * @return Observation
     */
    public function setErosion($erosion = null)
    {
        $this->erosion = $erosion;

        return $this;
    }

    /**
     * Get erosion.
     *
     * @return string|null
     */
    public function getErosion()
    {
        return $this->erosion;
    }

    /**
     * Set erosionAutre.
     *
     * @param string|null $erosionAutre
     *
     * @return Observation
     */
    public function setErosionAutre($erosionAutre = null)
    {
        $this->erosionAutre = $erosionAutre;

        return $this;
    }

    /**
     * Get erosionAutre.
     *
     * @return string|null
     */
    public function getErosionAutre()
    {
        return $this->erosionAutre;
    }

    /**
     * Set recBlocs.
     *
     * @param int|null $recBlocs
     *
     * @return Observation
     */
    public function setRecBlocs($recBlocs = null)
    {
        $this->recBlocs = $recBlocs;

        return $this;
    }

    /**
     * Get recBlocs.
     *
     * @return int|null
     */
    public function getRecBlocs()
    {
        return $this->recBlocs;
    }

    /**
     * Set recCailloux.
     *
     * @param int|null $recCailloux
     *
     * @return Observation
     */
    public function setRecCailloux($recCailloux = null)
    {
        $this->recCailloux = $recCailloux;

        return $this;
    }

    /**
     * Get recCailloux.
     *
     * @return int|null
     */
    public function getRecCailloux()
    {
        return $this->recCailloux;
    }

    /**
     * Set recSols.
     *
     * @param int|null $recSols
     *
     * @return Observation
     */
    public function setRecSols($recSols = null)
    {
        $this->recSols = $recSols;

        return $this;
    }

    /**
     * Get recSols.
     *
     * @return int|null
     */
    public function getRecSols()
    {
        return $this->recSols;
    }

    /**
     * Set recGraviers.
     *
     * @param int|null $recGraviers
     *
     * @return Observation
     */
    public function setRecGraviers($recGraviers = null)
    {
        $this->recGraviers = $recGraviers;

        return $this;
    }

    /**
     * Get recGraviers.
     *
     * @return int|null
     */
    public function getRecGraviers()
    {
        return $this->recGraviers;
    }

    /**
     * Set recStrateBryoLichenique.
     *
     * @param int|null $recStrateBryoLichenique
     *
     * @return Observation
     */
    public function setRecStrateBryoLichenique($recStrateBryoLichenique = null)
    {
        $this->recStrateBryoLichenique = $recStrateBryoLichenique;

        return $this;
    }

    /**
     * Get recStrateBryoLichenique.
     *
     * @return int|null
     */
    public function getRecStrateBryoLichenique()
    {
        return $this->recStrateBryoLichenique;
    }

    /**
     * Set recStrateHerbacee.
     *
     * @param int|null $recStrateHerbacee
     *
     * @return Observation
     */
    public function setRecStrateHerbacee($recStrateHerbacee = null)
    {
        $this->recStrateHerbacee = $recStrateHerbacee;

        return $this;
    }

    /**
     * Get recStrateHerbacee.
     *
     * @return int|null
     */
    public function getRecStrateHerbacee()
    {
        return $this->recStrateHerbacee;
    }

    /**
     * Set hauteurVegetation.
     *
     * @param int|null $hauteurVegetation
     *
     * @return Observation
     */
    public function setHauteurVegetation($hauteurVegetation = null)
    {
        $this->hauteurVegetation = $hauteurVegetation;

        return $this;
    }

    /**
     * Get hauteurVegetation.
     *
     * @return int|null
     */
    public function getHauteurVegetation()
    {
        return $this->hauteurVegetation;
    }

    /**
     * Set habitat.
     *
     * @param string|null $habitat
     *
     * @return Observation
     */
    public function setHabitat($habitat = null)
    {
        $this->habitat = $habitat;

        return $this;
    }

    /**
     * Get habitat.
     *
     * @return string|null
     */
    public function getHabitat()
    {
        return $this->habitat;
    }

    /**
     * Set commentaireHabitat.
     *
     * @param string|null $commentaireHabitat
     *
     * @return Observation
     */
    public function setCommentaireHabitat($commentaireHabitat = null)
    {
        $this->commentaireHabitat = $commentaireHabitat;

        return $this;
    }

    /**
     * Get commentaireHabitat.
     *
     * @return string|null
     */
    public function getCommentaireHabitat()
    {
        return $this->commentaireHabitat;
    }

    /**
     * Set substrat.
     *
     * @param string|null $substrat
     *
     * @return Observation
     */
    public function setSubstrat($substrat = null)
    {
        $this->substrat = $substrat;

        return $this;
    }

    /**
     * Get substrat.
     *
     * @return string|null
     */
    public function getSubstrat()
    {
        return $this->substrat;
    }

    /**
     * Set epaisseurSubstrat.
     *
     * @param int|null $epaisseurSubstrat
     *
     * @return Observation
     */
    public function setEpaisseurSubstrat($epaisseurSubstrat = null)
    {
        $this->epaisseurSubstrat = $epaisseurSubstrat;

        return $this;
    }

    /**
     * Get epaisseurSubstrat.
     *
     * @return int|null
     */
    public function getEpaisseurSubstrat()
    {
        return $this->epaisseurSubstrat;
    }

    /**
     * Set microRelief.
     *
     * @param int|null $microRelief
     *
     * @return Observation
     */
    public function setMicroRelief($microRelief = null)
    {
        $this->microRelief = $microRelief;

        return $this;
    }

    /**
     * Get microRelief.
     *
     * @return int|null
     */
    public function getMicroRelief()
    {
        return $this->microRelief;
    }

    /**
     * Set penteMicroTopo.
     *
     * @param int|null $penteMicroTopo
     *
     * @return Observation
     */
    public function setPenteMicroTopo($penteMicroTopo = null)
    {
        $this->penteMicroTopo = $penteMicroTopo;

        return $this;
    }

    /**
     * Get penteMicroTopo.
     *
     * @return int|null
     */
    public function getPenteMicroTopo()
    {
        return $this->penteMicroTopo;
    }

    /**
     * Set humidite.
     *
     * @param string|null $humidite
     *
     * @return Observation
     */
    public function setHumidite($humidite = null)
    {
        $this->humidite = $humidite;

        return $this;
    }

    /**
     * Get humidite.
     *
     * @return string|null
     */
    public function getHumidite()
    {
        return $this->humidite;
    }

    /**
     * Set particulariteGeologique.
     *
     * @param string|null $particulariteGeologique
     *
     * @return Observation
     */
    public function setParticulariteGeologique($particulariteGeologique = null)
    {
        $this->particulariteGeologique = $particulariteGeologique;

        return $this;
    }

    /**
     * Get particulariteGeologique.
     *
     * @return string|null
     */
    public function getParticulariteGeologique()
    {
        return $this->particulariteGeologique;
    }

    /**
     * Set categorieMeteo.
     *
     * @param string|null $categorieMeteo
     *
     * @return Observation
     */
    public function setCategorieMeteo($categorieMeteo = null)
    {
        $this->categorieMeteo = $categorieMeteo;

        return $this;
    }

    /**
     * Get categorieMeteo.
     *
     * @return string|null
     */
    public function getCategorieMeteo()
    {
        return $this->categorieMeteo;
    }

    /**
     * Set commentaire.
     *
     * @param string|null $commentaire
     *
     * @return Observation
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
     * Set codeGps.
     *
     * @param string|null $codeGps
     *
     * @return Observation
     */
    public function setCodeGps($codeGps = null)
    {
        $this->codeGps = $codeGps;

        return $this;
    }

    /**
     * Get codeGps.
     *
     * @return string|null
     */
    public function getCodeGps()
    {
        return $this->codeGps;
    }

    /**
     * Set typeObservation.
     *
     * @param string|null $typeObservation
     *
     * @return Observation
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
     * Set nomInitial.
     *
     * @param string|null $nomInitial
     *
     * @return Observation
     */
    public function setNomInitial($nomInitial = null)
    {
        $this->nomInitial = $nomInitial;

        return $this;
    }

    /**
     * Get nomInitial.
     *
     * @return string|null
     */
    public function getNomInitial()
    {
        return $this->nomInitial;
    }

    /**
     * Set categorie.
     *
     * @param string|null $categorie
     *
     * @return Observation
     */
    public function setCategorie($categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie.
     *
     * @return string|null
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set observations.
     *
     * @return Observation
     */
    public function setObservations($observations)
    {
        foreach($observations as $observation){
          $observation->addObservation($observation);
        }
        return $this;
    }

    /**
     * Set Observation.
     *
     * @param \HFIBundle\Entity\Observation|null $observation
     *
     * @return FicheTerrain
     */
    public function setObservation(\HFIBundle\Entity\Observation $observation = null)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation.
     *
     * @return \HFIBundle\Entity\observation|null
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Get typeMilieu.
     *
     * @return string|null
     */
    public function getTypeMilieu()
    {
        return $this->typeMilieu;
    }

    /**
     * Set recStrateArbustive.
     *
     * @param int|null $recStrateArbustive
     *
     * @return FicheTerrain
     */
    public function setRecStrateArbustive($recStrateArbustive = null)
    {
        $this->recStrateArbustive = $recStrateArbustive;

        return $this;
    }

    /**
     * Get recStrateArbustive.
     *
     * @return int|null
     */
    public function getRecStrateArbustive()
    {
        return $this->recStrateArbustive;
    }

    /**
     * Set longueur.
     *
     * @param int|null $longueur
     *
     * @return FicheTerrain
     */
    public function setLongueur($longueur = null)
    {
        $this->longueur = $longueur;

        return $this;
    }

    /**
     * Get longueur.
     *
     * @return int|null
     */
    public function getLongueur()
    {
        return $this->longueur;
    }

    /**
     * Set largeur.
     *
     * @param int|null $largeur
     *
     * @return FicheTerrain
     */
    public function setLargeur($largeur = null)
    {
        $this->largeur = $largeur;

        return $this;
    }

    /**
     * Get largeur.
     *
     * @return int|null
     */
    public function getLargeur()
    {
        return $this->largeur;
    }

    /**
     * Set statutFicheTerrain.
     *
     * @param string|null $statutFicheTerrain
     *
     * @return FicheTerrain
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
     * Set typeMilieu.
     *
     * @param string|null $typeMilieu
     *
     * @return FicheTerrain
     */
    public function setTypeMilieu($typeMilieu = null)
    {
        $this->typeMilieu = $typeMilieu;

        return $this;
    }

    /**
     * Set orientation.
     *
     * @param string|null $orientation
     *
     * @return FicheTerrain
     */
    public function setOrientation($orientation = null)
    {
        $this->orientation = $orientation;

        return $this;
    }

    /**
     * Get orientation.
     *
     * @return string|null
     */
    public function getOrientation()
    {
        return $this->orientation;
    }
}
