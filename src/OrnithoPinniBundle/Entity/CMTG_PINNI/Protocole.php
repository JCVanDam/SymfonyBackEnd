<?php

namespace OrnithoPinniBundle\Entity\CMTG_PINNI;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Protocole
 *
 * @ORM\Table(name="cmtg_pinni_protocole")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_PINNI\ProtocoleRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Protocole
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
     * @var string|null
     *
     * @ORM\Column(name="mode_de_saisie", type="string", length=255, nullable=true)
     */
    private $modeDeSaisie;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="mode_trace_enregistre", type="boolean", nullable=true)
     */
    private $modeTraceEnregistre;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\General\Position_GPS", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="general_position_gps_debut_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $debut;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\General\Position_GPS", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="general_position_gps_fin_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $fin;

    /**
     * @ORM\OneToMany(targetEntity="Comptage", mappedBy="protocole", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="cmtg_pinni_comptage_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $comptages;

    /**
     * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\General\Espece")
     * @Assert\Valid
     */
    private $espece;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarque", type="text", nullable=true)
     */
    private $remarque;

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
     * Set modeDeSaisie.
     *
     * @param string|null $modeDeSaisie
     *
     * @return Protocole
     */
    public function setModeDeSaisie($modeDeSaisie = null)
    {
        $this->modeDeSaisie = $modeDeSaisie;

        return $this;
    }

    /**
     * Get modeDeSaisie.
     *
     * @return string|null
     */
    public function getModeDeSaisie()
    {
        return $this->modeDeSaisie;
    }

    /**
     * Set modeTraceEnregistre.
     *
     * @param bool|null $modeTraceEnregistre
     *
     * @return Protocole
     */
    public function setModeTraceEnregistre($modeTraceEnregistre = null)
    {
        $this->modeTraceEnregistre = $modeTraceEnregistre;

        return $this;
    }

    /**
     * Get modeTraceEnregistre.
     *
     * @return bool|null
     */
    public function getModeTraceEnregistre()
    {
        return $this->modeTraceEnregistre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comptages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set debut.
     *
     * @param \OrnithoPinniBundle\Entity\General\Position_GPS $debut
     *
     * @return Protocole
     */
    public function setDebut(\OrnithoPinniBundle\Entity\General\Position_GPS $debut)
    {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut.
     *
     * @return \OrnithoPinniBundle\Entity\General\Position_GPS
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * Set fin.
     *
     * @param \OrnithoPinniBundle\Entity\General\Position_GPS $fin
     *
     * @return Protocole
     */
    public function setFin(\OrnithoPinniBundle\Entity\General\Position_GPS $fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin.
     *
     * @return \OrnithoPinniBundle\Entity\General\Position_GPS
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Add comptage.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_PINNI\Comptage $comptage
     *
     * @return Protocole
     */
    public function addComptage(\OrnithoPinniBundle\Entity\CMTG_PINNI\Comptage $comptage)
    {
        $comptage->setProtocole($this);
        $this->comptages[] = $comptage;
        return $this;
    }

    public function setComptages($comptages)
    {
        $itemsToAdd = [];
        $existingIds = [];

        foreach ($comptages as $comptage) {
            // New item's ID is null
            if (null === ($id = $comptage->getId())) {
                $itemsToAdd[] = $comptage;
            } else {
                $existingIds[$id] = true;
            }
        }

        foreach ($this->comptages as $idx => $comptage) {
            if (!$comptage->getId()) {
                continue;
            }

            // Remove item from the collection if it isn't in the supplied
            // $comptages.
            if (!isset($existingIds[$comptage->getId()])) {
                $comptage->setOwner(null);
                unset($this->comptages[$idx]);
            }
        }

        // Add new items
        foreach ($itemsToAdd as $comptage) {
            $this->comptages[] = $comptage;
        }
    }


    /**
     * Remove comptage.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_PINNI\Comptage $comptage
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeComptage(\OrnithoPinniBundle\Entity\CMTG_PINNI\Comptage $comptage)
    {
        return $this->comptages->removeElement($comptage);
    }

    /**
     * Get comptages.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComptages()
    {
        return $this->comptages;
    }

    public function __toString(){
        return "CMTG_PINNI (".$this->id.")";
    }

    /**
     * Set espece.
     *
     * @param \OrnithoPinniBundle\Entity\General\Espece|null $espece
     *
     * @return Protocole
     */
    public function setEspece(\OrnithoPinniBundle\Entity\General\Espece $espece = null)
    {
        $this->espece = $espece;

        return $this;
    }

    /**
     * Get espece.
     *
     * @return \OrnithoPinniBundle\Entity\General\Espece|null
     */
    public function getEspece()
    {
        return $this->espece;
    }

    /**
     * Set remarque.
     *
     * @param string|null $remarque
     *
     * @return Protocole
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
}
