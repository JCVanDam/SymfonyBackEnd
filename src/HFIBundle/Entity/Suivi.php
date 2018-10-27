<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suivi
 *
 * @ORM\Table(name="suivi")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\SuiviRepository")
 */
class Suivi
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
    * @ORM\ManyToOne(targetEntity="Phylica", inversedBy="suivis")
    */
    private $phylica;

    /**
     * @var string
     *
     * @ORM\Column(name="phenologie", type="string", length=255, nullable=true)
     */
    private $phenologie;

    /**
     * @var string
     *
     * @ORM\Column(name="traitement", type="string", length=255, nullable=true)
     */
    private $traitement;

    /**
     * @var string
     *
     * @ORM\Column(name="competition", type="string", length=255, nullable=true)
     */
    private $competition;

    /**
     * @var string
     *
     * @ORM\Column(name="predation", type="string", length=255, nullable=true)
     */
    private $predation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_observation", type="date", nullable=true)
     */
    private $dateObservation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="saison", type="string", length=255, nullable=true)
     */
    private $saison;

    /**
     * @var int|null
     *
     * @ORM\Column(name="hauteur_phylica", type="integer", nullable=true)
     */
    private $hauteurPhylica;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dbh_b", type="integer", nullable=true)
     */
    private $dbhB;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dbh_h", type="integer", nullable=true)
     */
    private $dbhH;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mort", type="boolean", nullable=true)
     */
    private $mort;

    /**
     * @var string|null
     *
     * @ORM\Column(name="non_trouve", type="boolean", nullable=true)
     */
    private $nonTrouve;


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
     * Set phenologie.
     *
     * @param string $phenologie
     *
     * @return Suivi
     */
    public function setPhenologie($phenologie)
    {
        $this->phenologie = $phenologie;

        return $this;
    }

    /**
     * Get phenologie.
     *
     * @return string
     */
    public function getPhenologie()
    {
        return $this->phenologie;
    }

    /**
     * Set traitement.
     *
     * @param string $traitement
     *
     * @return Suivi
     */
    public function setTraitement($traitement)
    {
        $this->traitement = $traitement;

        return $this;
    }

    /**
     * Get traitement.
     *
     * @return string
     */
    public function getTraitement()
    {
        return $this->traitement;
    }

    /**
     * Set competition.
     *
     * @param string $competition
     *
     * @return Suivi
     */
    public function setCompetition($competition)
    {
        $this->competition = $competition;

        return $this;
    }

    /**
     * Get competition.
     *
     * @return string
     */
    public function getCompetition()
    {
        return $this->competition;
    }

    /**
     * Set predation.
     *
     * @param string $predation
     *
     * @return Suivi
     */
    public function setPredation($predation)
    {
        $this->predation = $predation;

        return $this;
    }

    /**
     * Get predation.
     *
     * @return string
     */
    public function getPredation()
    {
        return $this->predation;
    }

    /**
     * Set dateObservation.
     *
     * @param \DateTime|null $dateObservation
     *
     * @return Suivi
     */
    public function setDateObservation($dateObservation = null)
    {
        $this->dateObservation = $dateObservation;

        return $this;
    }

    /**
     * Get dateObservation.
     *
     * @return \DateTime|null
     */
    public function getDateObservation()
    {
        return $this->dateObservation;
    }

    /**
     * Set saison.
     *
     * @param string|null $saison
     *
     * @return Suivi
     */
    public function setSaison($saison = null)
    {
        $this->saison = $saison;

        return $this;
    }

    /**
     * Get saison.
     *
     * @return string|null
     */
    public function getSaison()
    {
        return $this->saison;
    }

    /**
     * Set hauteurPhylica.
     *
     * @param int|null $hauteurPhylica
     *
     * @return Suivi
     */
    public function setHauteurPhylica($hauteurPhylica = null)
    {
        $this->hauteurPhylica = $hauteurPhylica;

        return $this;
    }

    /**
     * Get hauteurPhylica.
     *
     * @return int|null
     */
    public function getHauteurPhylica()
    {
        return $this->hauteurPhylica;
    }

    /**
     * Set dbhB.
     *
     * @param int|null $dbhB
     *
     * @return Suivi
     */
    public function setDbhB($dbhB = null)
    {
        $this->dbhB = $dbhB;

        return $this;
    }

    /**
     * Get dbhB.
     *
     * @return int|null
     */
    public function getDbhB()
    {
        return $this->dbhB;
    }

    /**
     * Set dbhH.
     *
     * @param int|null $dbhH
     *
     * @return Suivi
     */
    public function setDbhH($dbhH = null)
    {
        $this->dbhH = $dbhH;

        return $this;
    }

    /**
     * Get dbhH.
     *
     * @return int|null
     */
    public function getDbhH()
    {
        return $this->dbhH;
    }

    /**
     * Set mort.
     *
     * @param string|null $mort
     *
     * @return Suivi
     */
    public function setMort($mort = null)
    {
        $this->mort = $mort;

        return $this;
    }

    /**
     * Get mort.
     *
     * @return string|null
     */
    public function getMort()
    {
        return $this->mort;
    }

    /**
     * Set nonTrouve.
     *
     * @param string|null $nonTrouve
     *
     * @return Suivi
     */
    public function setNonTrouve($nonTrouve = null)
    {
        $this->nonTrouve = $nonTrouve;

        return $this;
    }

    /**
     * Get nonTrouve.
     *
     * @return string|null
     */
    public function getNonTrouve()
    {
        return $this->nonTrouve;
    }

    /**
     * Set observation.
     *
     * @param \HFIBundle\Entity\Observation|null $observation
     *
     * @return Suivi
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
     * Set phylica.
     *
     * @param \HFIBundle\Entity\Phylica|null $phylica
     *
     * @return Suivi
     */
    public function setPhylica(\HFIBundle\Entity\Phylica $phylica = null)
    {
        $this->phylica = $phylica;

        return $this;
    }

    /**
     * Get phylica.
     *
     * @return \HFIBundle\Entity\Phylica|null
     */
    public function getPhylica()
    {
        return $this->phylica;
    }
}
