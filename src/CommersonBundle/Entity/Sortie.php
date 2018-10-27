<?php

namespace CommersonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Sortie
 *
 * @ORM\Table(name="sortie")
 * @ORM\Entity(repositoryClass="CommersonBundle\Repository\SortieRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Sortie
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
     * @ORM\Column(name="code_sortie", type="string", length=255, unique=true)
     */
    private $codeSortie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_depart", type="datetime")
     */
    private $dateDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_arrivee", type="datetime")
     */
    private $dateArrivee;

    /**
     * @var bool
     *
     * @ORM\Column(name="golfe_morbihan", type="boolean")
     */
    private $golfeMorbihan;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lieux", type="text", nullable=true)
     */
    private $lieux;

    /**
     * @var string
     *
     * @ORM\Column(name="bateau", type="string", length=255)
     */
    private $bateau;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_mer", type="string", length=255)
     */
    private $etatMer;

    /**
     * @var string
     *
     * @ORM\Column(name="visibilite", type="string", length=255)
     */
    private $visibilite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarque", type="text", nullable=true)
     */
    private $remarque;

    /**
     * @ORM\ManyToOne(targetEntity="MyUser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $observateur;

    /**
     * @ORM\ManyToOne(targetEntity="MyUser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $saisisseur;

    /**
     * @ORM\OneToMany(targetEntity="Observation", mappedBy="sortie", cascade={"persist", "remove"})
     */
    private $observations;

    /**
     * @ORM\OneToMany(targetEntity="File", mappedBy="sortie", cascade={"persist", "remove"})
     */
    private $gpx_files;

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
     * Set codeSortie.
     *
     * @param string $codeSortie
     *
     * @return Sortie
     */
    public function setCodeSortie($codeSortie)
    {
        $this->codeSortie = $codeSortie;
        return $this;
    }

    public function updateSortie($codeSortie){
        //à checker
        if($codeSortie != $this->codeSortie){
            $fs = new Filesystem();
            if($fs->exists(__DIR__."/../../../web/uploads/".$this->codeSortie."    TRACE")){
                $fs->rename(__DIR__."/../../../web/uploads/".$this->codeSortie."    TRACE", __DIR__."/../../../web/uploads/".$codeSortie."    TRACE");
                $this->codeSortie = $codeSortie;
                foreach($this->getObservations() as $obs){
                    $obs->updateObservation();
                }
            }
        }
    }

    /**
     * Get codeSortie.
     *
     * @return string
     */
    public function getCodeSortie()
    {
        return $this->codeSortie;
    }

    /**
     * Set dateDepart.
     *
     * @param \DateTime $dateDepart
     *
     * @return Sortie
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;
        $obs = $this->getObservations();
        //PAS DE PERSIST ?
        foreach($obs as $o){
            $o->getLocalisation()->updateLocalisation($this->dateDepart);
            $o->getLocalisation()->updateLocalisation($this->dateDepart);
        }
        return $this;
    }

    /**
     * Get dateDepart.
     *
     * @return \DateTime
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set dateArrivee.
     *
     * @param \DateTime $dateArrivee
     *
     * @return Sortie
     */
    public function setDateArrivee($dateArrivee)
    {
        $this->dateArrivee = $dateArrivee;

        return $this;
    }

    /**
     * Get dateArrivee.
     *
     * @return \DateTime
     */
    public function getDateArrivee()
    {
        return $this->dateArrivee;
    }

    /**
     * Set golfeMorbihan.
     *
     * @param bool $golfeMorbihan
     *
     * @return Sortie
     */
    public function setGolfeMorbihan($golfeMorbihan)
    {
        $this->golfeMorbihan = $golfeMorbihan;

        return $this;
    }

    /**
     * Get golfeMorbihan.
     *
     * @return bool
     */
    public function getGolfeMorbihan()
    {
        return $this->golfeMorbihan;
    }

    /**
     * Set lieux.
     *
     * @param string|null $lieux
     *
     * @return Sortie
     */
    public function setLieux($lieux = null)
    {
        $this->lieux = $lieux;

        return $this;
    }

    /**
     * Get lieux.
     *
     * @return string|null
     */
    public function getLieux()
    {
        return $this->lieux;
    }

    /**
     * Set bateau.
     *
     * @param string $bateau
     *
     * @return Sortie
     */
    public function setBateau($bateau)
    {
        $this->bateau = $bateau;

        return $this;
    }

    /**
     * Get bateau.
     *
     * @return string
     */
    public function getBateau()
    {
        return $this->bateau;
    }

    /**
     * Set etatMer.
     *
     * @param string $etatMer
     *
     * @return Sortie
     */
    public function setEtatMer($etatMer)
    {
        $this->etatMer = $etatMer;

        return $this;
    }

    /**
     * Get etatMer.
     *
     * @return string
     */
    public function getEtatMer()
    {
        return $this->etatMer;
    }

    /**
     * Set visibilite.
     *
     * @param string $visibilite
     *
     * @return Sortie
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
     * Constructor
     */
    public function __construct()
    {
        $this->observations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gpxFile = [null, null];
    }

    /**
     * Set observateur.
     *
     * @param \CommersonBundle\Entity\MyUser $observateur
     *
     * @return Sortie
     */
    public function setObservateur(\CommersonBundle\Entity\MyUser $observateur)
    {
        $this->observateur = $observateur;

        return $this;
    }

    /**
     * Get observateur.
     *
     * @return \CommersonBundle\Entity\MyUser
     */
    public function getObservateur()
    {
        return $this->observateur;
    }

    /**
     * Set saisisseur.
     *
     * @param \CommersonBundle\Entity\MyUser $saisisseur
     *
     * @return Sortie
     */
    public function setSaisisseur(\CommersonBundle\Entity\MyUser $saisisseur)
    {
        $this->saisisseur = $saisisseur;

        return $this;
    }

    /**
     * Get saisisseur.
     *
     * @return \CommersonBundle\Entity\MyUser
     */
    public function getSaisisseur()
    {
        return $this->saisisseur;
    }

    /**
     * Add observation.
     *
     * @param \CommersonBundle\Entity\Observation $observation
     *
     * @return Sortie
     */
    public function addObservation(\CommersonBundle\Entity\Observation $observation)
    {
        $this->observations[] = $observation;

        $observation->setSortie($this);

        return $this;
    }

    /**
     * Remove observation.
     *
     * @param \CommersonBundle\Entity\Observation $observation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeObservation(\CommersonBundle\Entity\Observation $observation)
    {
        return $this->observations->removeElement($observation);
    }

    /**
     * Get observations.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObservations()
    {
        return $this->observations;
    }

    public function __toString() {
        if($this->codeSortie==null){
            return "Obs. ". $this->id;
        }
        return $this->codeSortie;
    }

    /**
     * Set remarque.
     *
     * @param string|null $remarque
     *
     * @return Sortie
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

    /**
     * Get gpxFiles.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGpxFiles()
    {
        return $this->gpx_files;
    }

    public function getPiste()
    {
        if(count($this->gpx_files)>=1){
            return $this->gpx_files[0];
        }
        else{
            return null;
        }
    }

    public function setPiste($piste)
    {
        $this->gpx_files[0] = $piste;
    }

    public function getWaypoints()
    {
        if(count($this->gpx_files)==2){
            return $this->gpx_files[1];
        }
        else{
            return null;
        }
    }

    public function setWaypoints($wp)
    {
        $this->gpx_files[1] = $wp;
    }

    /**
     * @ORM\PostPersist()
     */
    public function createFolder(){
        $fs = new Filesystem();
        $fs->mkdir(__DIR__."/../../../web/uploads/".$this->codeSortie."    TRACE", 0700);
    }

    /**
     * @ORM\PostRemove()
     */
    public function deleteFolder(){
        $fs = new Filesystem();
        $fs->remove(__DIR__."/../../../web/uploads/".$this->codeSortie."    TRACE");
    }

}
