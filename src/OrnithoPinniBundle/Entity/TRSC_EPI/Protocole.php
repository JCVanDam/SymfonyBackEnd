<?php

namespace OrnithoPinniBundle\Entity\TRSC_EPI;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Protocole
 *
 * @ORM\Table(name="trsc_epi_protocole")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\TRSC_EPI\ProtocoleRepository")
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
  * @var string
  *
  * @ORM\Column(name="directionSuivie", type="string", length=255)
  */
 private $directionSuivie;

 /**
  * @var float
  *
  * @ORM\Column(name="longueur", type="float", nullable=true)
  */
 private $longueur;

 /**
  * @var bool|null
  *
  * @ORM\Column(name="problemeTerrain", type="boolean", nullable=true)
  */
 private $problemeTerrain;

 /**
  * @var bool|null
  *
  * @ORM\Column(name="pasDeSaisie", type="boolean", nullable=true)
  */
 private $pasDeSaisie;

 /**
  * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\General\Personne")
  * @Assert\Valid
  */
 private $observateur;

 /**
  * @ORM\ManyToOne(targetEntity="TransectGPS")
  * @Assert\Valid
  */
 private $transect;

 /**
  * @ORM\OneToMany(targetEntity="SaisiePointTransect", mappedBy="protocole", cascade={"all"}, orphanRemoval=true)
  * @ORM\JoinColumn(name="TRSC_EPI_saisie_id", referencedColumnName="id", nullable=false)
  * @Assert\Valid
  */
 private $saisies;

 public function __toString(){
     return "id n°".$this->id;
 }
   /**
    * Constructor
    */
   public function __construct()
   {
       $this->saisies = new \Doctrine\Common\Collections\ArrayCollection();
   }

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
    * Set directionSuivie.
    *
    * @param string $directionSuivie
    *
    * @return Protocole
    */
   public function setDirectionSuivie($directionSuivie)
   {
       $this->directionSuivie = $directionSuivie;

       return $this;
   }

   /**
    * Get directionSuivie.
    *
    * @return string
    */
   public function getDirectionSuivie()
   {
       return $this->directionSuivie;
   }

   /**
    * Set longueur.
    *
    * @param float|null $longueur
    *
    * @return Protocole
    */
   public function setLongueur($longueur = null)
   {
       $this->longueur = $longueur;

       return $this;
   }

   /**
    * Get longueur.
    *
    * @return float|null
    */
   public function getLongueur()
   {
       return $this->longueur;
   }

   /**
    * Set problemeTerrain.
    *
    * @param bool|null $problemeTerrain
    *
    * @return Protocole
    */
   public function setProblemeTerrain($problemeTerrain = null)
   {
       $this->problemeTerrain = $problemeTerrain;

       return $this;
   }

   /**
    * Get problemeTerrain.
    *
    * @return bool|null
    */
   public function getProblemeTerrain()
   {
       return $this->problemeTerrain;
   }

   /**
    * Set pasDeSaisie.
    *
    * @param bool|null $pasDeSaisie
    *
    * @return Protocole
    */
   public function setPasDeSaisie($pasDeSaisie = null)
   {
       $this->pasDeSaisie = $pasDeSaisie;

       return $this;
   }

   /**
    * Get pasDeSaisie.
    *
    * @return bool|null
    */
   public function getPasDeSaisie()
   {
       return $this->pasDeSaisie;
   }

   /**
    * Set observateur.
    *
    * @param \OrnithoPinniBundle\Entity\General\Personne|null $observateur
    *
    * @return Protocole
    */
   public function setObservateur(\OrnithoPinniBundle\Entity\General\Personne $observateur = null)
   {
       $this->observateur = $observateur;

       return $this;
   }

   /**
    * Get observateur.
    *
    * @return \OrnithoPinniBundle\Entity\General\Personne|null
    */
   public function getObservateur()
   {
       return $this->observateur;
   }

   /**
    * Set transect.
    *
    * @param \OrnithoPinniBundle\Entity\TRSC_EPI\TransectGPS|null $transect
    *
    * @return Protocole
    */
   public function setTransect(\OrnithoPinniBundle\Entity\TRSC_EPI\TransectGPS $transect = null)
   {
       $this->transect = $transect;

       return $this;
   }

   /**
    * Get transect.
    *
    * @return \OrnithoPinniBundle\Entity\TRSC_EPI\TransectGPS|null
    */
   public function getTransect()
   {
       return $this->transect;
   }

   /**
    * Add saisy.
    *
    * @param \OrnithoPinniBundle\Entity\TRSC_EPI\SaisiePointTransect $saisy
    *
    * @return Protocole
    */
   public function addSaisy(\OrnithoPinniBundle\Entity\TRSC_EPI\SaisiePointTransect $saisy)
   {
       $saisy->setProtocole($this);
       $this->saisies[] = $saisy;

       return $this;
   }

    public function setSaisies($saisies)
    {
        $itemsToAdd = [];
        $existingIds = [];

        foreach ($saisies as $saisie) {
            // New item's ID is null
            if (null === ($id = $saisie->getId())) {
                $itemsToAdd[] = $saisie;
            } else {
                $existingIds[$id] = true;
            }
        }

        foreach ($this->saisies as $idx => $saisie) {
            if (!$saisie->getId()) {
                continue;
            }

            // Remove item from the collection if it isn't in the supplied
            // $saisies.
            if (!isset($existingIds[$saisie->getId()])) {
                $saisie->setOwner(null);
                unset($this->saisies[$idx]);
            }
        }

        // Add new items
        foreach ($itemsToAdd as $saisie) {
            $this->saisies[] = $saisie;
        }
    }

   /**
    * Remove saisy.
    *
    * @param \OrnithoPinniBundle\Entity\TRSC_EPI\SaisiePointTransect $saisy
    *
    * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
    */
   public function removeSaisy(\OrnithoPinniBundle\Entity\TRSC_EPI\SaisiePointTransect $saisy)
   {
       return $this->saisies->removeElement($saisy);
   }

   /**
    * Get saisies.
    *
    * @return \Doctrine\Common\Collections\Collection
    */
   public function getSaisies()
   {
       return $this->saisies;
   }
}
