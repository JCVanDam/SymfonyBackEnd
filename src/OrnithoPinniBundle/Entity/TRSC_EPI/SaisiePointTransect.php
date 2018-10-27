<?php

namespace OrnithoPinniBundle\Entity\TRSC_EPI;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SaisiePointTransect
 *
 * @ORM\Table(name="trsc_epi_saisie_point_transect")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\TRSC_EPI\SaisiePointTransectRepository")
 */
class SaisiePointTransect
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
    * @ORM\ManyToOne(targetEntity="Protocole", inversedBy="saisies")
    */
   private $protocole;

   /**
    * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\General\Position_GPS", cascade={"persist", "remove"})
    * @ORM\JoinColumn(name="general_position_gps_id", referencedColumnName="id", nullable=true)
    * @Assert\Valid
    */
   private $releve;

   /**
    * @ORM\OneToMany(targetEntity="Observation", mappedBy="saisie", cascade={"all"}, orphanRemoval=true)
    * @ORM\JoinColumn(name="TRSC_EPI_observations_id", referencedColumnName="id", nullable=false)
    * @Assert\Valid
    */
   private $observations;

   public function __toString(){
       return "SaisiePointTransect(".$this->id.")";
   }
   /**
    * Constructor
    */
   public function __construct()
   {
       $this->observations = new \Doctrine\Common\Collections\ArrayCollection();
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
    * Set protocole.
    *
    * @param \OrnithoPinniBundle\Entity\TRSC_EPI\Protocole|null $protocole
    *
    * @return SaisiePointTransect
    */
   public function setProtocole(\OrnithoPinniBundle\Entity\TRSC_EPI\Protocole $protocole = null)
   {
       $this->protocole = $protocole;

       return $this;
   }

   /**
    * Get protocole.
    *
    * @return \OrnithoPinniBundle\Entity\TRSC_EPI\Protocole|null
    */
   public function getProtocole()
   {
       return $this->protocole;
   }

   /**
    * Add observation.
    *
    * @param \OrnithoPinniBundle\Entity\TRSC_EPI\Observation $observation
    *
    * @return SaisiePointTransect
    */
   public function addObservation(\OrnithoPinniBundle\Entity\TRSC_EPI\Observation $observation)
   {
       $observation->setSaisie($this);
       $this->observations[] = $observation;

       return $this;
   }

    public function setObservations($observations)
    {
        $itemsToAdd = [];
        $existingIds = [];

        foreach ($observations as $observation) {
            // New item's ID is null
            if (null === ($id = $observation->getId())) {
                $itemsToAdd[] = $observation;
            } else {
                $existingIds[$id] = true;
            }
        }

        foreach ($this->observations as $idx => $observation) {
            if (!$observation->getId()) {
                continue;
            }

            // Remove item from the collection if it isn't in the supplied
            // $observations.
            if (!isset($existingIds[$observation->getId()])) {
                $observation->setOwner(null);
                unset($this->observations[$idx]);
            }
        }

        // Add new items
        foreach ($itemsToAdd as $observation) {
            $this->observations[] = $observation;
        }
    }

   /**
    * Remove observation.
    *
    * @param \OrnithoPinniBundle\Entity\TRSC_EPI\Observation $observation
    *
    * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
    */
   public function removeObservation(\OrnithoPinniBundle\Entity\TRSC_EPI\Observation $observation)
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

    /**
     * Set releve.
     *
     * @param \OrnithoPinniBundle\Entity\General\Position_GPS|null $releve
     *
     * @return SaisiePointTransect
     */
    public function setReleve(\OrnithoPinniBundle\Entity\General\Position_GPS $releve = null)
    {
        $this->releve = $releve;

        return $this;
    }

    /**
     * Get releve.
     *
     * @return \OrnithoPinniBundle\Entity\General\Position_GPS|null
     */
    public function getReleve()
    {
        return $this->releve;
    }
}
