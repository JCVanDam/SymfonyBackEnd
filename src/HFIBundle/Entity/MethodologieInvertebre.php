<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MethodologieInvertebre
 *
 * @ORM\Table(name="methodologie_invertebre")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\MethodologieInvertebreRepository")
 */
class MethodologieInvertebre
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
    private $planteHote;

    /**
    * @var string
    *
    * @ORM\OneToOne(targetEntity="Observation", mappedBy="methodologieInvertebre")
    */
    private $observation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mode_prelevement", type="string", length=50, nullable=true)
     */
    private $modePrelevement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="milieu_prelevement", type="string", length=50, nullable=true)
     */
    private $milieuPrelevement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="milieu_autre", type="string", length=50, nullable=true)
     */
    private $milieuAutre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="habitat_invertebre", type="string", length=255, nullable=true)
     */
    private $habitatInvertebre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nbre_personne", type="integer", nullable=true)
     */
    private $nbrePersonne;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tps_par_pers", type="integer", nullable=true)
     */
    private $tpsParPers;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nbre_piege", type="integer", nullable=true)
     */
    private $nbrePiege;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tps_ouverture", type="integer", nullable=true)
     */
    private $tpsOuverture;

    /**
     * @var int|null
     *
     * @ORM\Column(name="vol_longueur", type="integer", nullable=true)
     */
    private $volLongueur;

    /**
     * @var int|null
     *
     * @ORM\Column(name="vol_largeur", type="integer", nullable=true)
     */
    private $volLargeur;

    /**
     * @var int|null
     *
     * @ORM\Column(name="vol_hauteur", type="integer", nullable=true)
     */
    private $volHauteur;

    /**
     * @var int|null
     *
     * @ORM\Column(name="volumeTerre", type="string", length=50, nullable=true)
     */
    private $volumeTerre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="largeur", type="integer", nullable=true)
     */
    private $largeur;

    /**
     * @var int|null
     *
     * @ORM\Column(name="hauteur", type="integer", nullable=true)
     */
    private $hauteur;

    /**
     * @var int|null
     *
     * @ORM\Column(name="poids_echantillon", type="integer", nullable=true)
     */
    private $poidsEchantillon;


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
     * Set milieuPrelevement.
     *
     * @param string|null $milieuPrelevement
     *
     * @return MethodologieInvertebre
     */
    public function setMilieuPrelevement($milieuPrelevement = null)
    {
        $this->milieuPrelevement = $milieuPrelevement;

        return $this;
    }

    /**
     * Get milieuPrelevement.
     *
     * @return string|null
     */
    public function getMilieuPrelevement()
    {
        return $this->milieuPrelevement;
    }

    /**
     * Set milieuAutre.
     *
     * @param string|null $milieuAutre
     *
     * @return MethodologieInvertebre
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
     * Set habitatInvertebre.
     *
     * @param string|null $habitatInvertebre
     *
     * @return MethodologieInvertebre
     */
    public function setHabitatInvertebre($habitatInvertebre = null)
    {
        $this->habitatInvertebre = $habitatInvertebre;

        return $this;
    }

    /**
     * Get habitatInvertebre.
     *
     * @return string|null
     */
    public function getHabitatInvertebre()
    {
        return $this->habitatInvertebre;
    }

    /**
     * Set nbrePersonne.
     *
     * @param int|null $nbrePersonne
     *
     * @return MethodologieInvertebre
     */
    public function setNbrePersonne($nbrePersonne = null)
    {
        $this->nbrePersonne = $nbrePersonne;

        return $this;
    }

    /**
     * Get nbrePersonne.
     *
     * @return int|null
     */
    public function getNbrePersonne()
    {
        return $this->nbrePersonne;
    }

    /**
     * Set tpsParPers.
     *
     * @param int|null $tpsParPers
     *
     * @return MethodologieInvertebre
     */
    public function setTpsParPers($tpsParPers = null)
    {
        $this->tpsParPers = $tpsParPers;

        return $this;
    }

    /**
     * Get tpsParPers.
     *
     * @return int|null
     */
    public function getTpsParPers()
    {
        return $this->tpsParPers;
    }

    /**
     * Set nbrePiege.
     *
     * @param int|null $nbrePiege
     *
     * @return MethodologieInvertebre
     */
    public function setNbrePiege($nbrePiege = null)
    {
        $this->nbrePiege = $nbrePiege;

        return $this;
    }

    /**
     * Get nbrePiege.
     *
     * @return int|null
     */
    public function getNbrePiege()
    {
        return $this->nbrePiege;
    }

    /**
     * Set tpsOuverture.
     *
     * @param int|null $tpsOuverture
     *
     * @return MethodologieInvertebre
     */
    public function setTpsOuverture($tpsOuverture = null)
    {
        $this->tpsOuverture = $tpsOuverture;

        return $this;
    }

    /**
     * Get tpsOuverture.
     *
     * @return int|null
     */
    public function getTpsOuverture()
    {
        return $this->tpsOuverture;
    }

    /**
     * Set poidsEchantillon.
     *
     * @param int|null $poidsEchantillon
     *
     * @return MethodologieInvertebre
     */
    public function setPoidsEchantillon($poidsEchantillon = null)
    {
        $this->poidsEchantillon = $poidsEchantillon;

        return $this;
    }

    /**
     * Get poidsEchantillon.
     *
     * @return int|null
     */
    public function getPoidsEchantillon()
    {
        return $this->poidsEchantillon;
    }

    /**
     * Set modePrelevement.
     *
     * @param string|null $modePrelevement
     *
     * @return MethodologieInvertebre
     */
    public function setModePrelevement($modePrelevement = null)
    {
        $this->modePrelevement = $modePrelevement;

        return $this;
    }

    /**
     * Get modePrelevement.
     *
     * @return string|null
     */
    public function getModePrelevement()
    {
        return $this->modePrelevement;
    }

    /**
     * Set observation.
     *
     * @param \HFIBundle\Entity\Observation|null $observation
     *
     * @return MethodologieInvertebre
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
     * Set volumeTerre.
     *
     * @param string|null $volumeTerre
     *
     * @return MethodologieInvertebre
     */
    public function setVolumeTerre($volumeTerre = null)
    {
        $this->volumeTerre = $volumeTerre;

        return $this;
    }

    /**
     * Get volumeTerre.
     *
     * @return string|null
     */
    public function getVolumeTerre()
    {
        return $this->volumeTerre;
    }

    /**
     * Set largeur.
     *
     * @param int|null $largeur
     *
     * @return MethodologieInvertebre
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
     * Set hauteur.
     *
     * @param int|null $hauteur
     *
     * @return MethodologieInvertebre
     */
    public function setHauteur($hauteur = null)
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    /**
     * Get hauteur.
     *
     * @return int|null
     */
    public function getHauteur()
    {
        return $this->hauteur;
    }

    /**
     * Set volLongueur.
     *
     * @param \integrer|null $volLongueur
     *
     * @return MethodologieInvertebre
     */
    public function setVolLongueur($volLongueur = null)
    {
        $this->volLongueur = $volLongueur;

        return $this;
    }

    /**
     * Get volLongueur.
     *
     * @return \integrer|null
     */
    public function getVolLongueur()
    {
        return $this->volLongueur;
    }

    /**
     * Set volLargeur.
     *
     * @param \integrer|null $volLargeur
     *
     * @return MethodologieInvertebre
     */
    public function setVolLargeur($volLargeur = null)
    {
        $this->volLargeur = $volLargeur;

        return $this;
    }

    /**
     * Get volLargeur.
     *
     * @return \integrer|null
     */
    public function getVolLargeur()
    {
        return $this->volLargeur;
    }

    /**
     * Set volHauteur.
     *
     * @param \integrer|null $volHauteur
     *
     * @return MethodologieInvertebre
     */
    public function setVolHauteur($volHauteur = null)
    {
        $this->volHauteur = $volHauteur;

        return $this;
    }

    /**
     * Get volHauteur.
     *
     * @return \integrer|null
     */
    public function getVolHauteur()
    {
        return $this->volHauteur;
    }

    /**
     * Set planteHote.
     *
     * @param \HFIBundle\Entity\SystematiqueFlore|null $planteHote
     *
     * @return MethodologieInvertebre
     */
    public function setPlanteHote(\HFIBundle\Entity\SystematiqueFlore $planteHote = null)
    {
        $this->planteHote = $planteHote;

        return $this;
    }

    /**
     * Get planteHote.
     *
     * @return \HFIBundle\Entity\SystematiqueFlore|null
     */
    public function getPlanteHote()
    {
        return $this->planteHote;
    }
}
