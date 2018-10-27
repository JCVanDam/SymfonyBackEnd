<?php

namespace OrnithoPinniBundle\Entity\CMTG_INDIFF;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Protocole
 *
 * @ORM\Table(name="cmtg_indiff_protocole")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_INDIFF\ProtocoleRepository")
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
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\General\Position_GPS", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="general_position_gps_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $releve;

    /**
     * @ORM\OneToMany(targetEntity="Saisie", mappedBy="protocole", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="cmtg_indiff_saisie_precis_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $saisies;

    /**
     * Set releve.
     *
     * @param \OrnithoPinniBundle\Entity\General\Position_GPS $releve
     *
     * @return Protocole
     */
    public function setReleve(\OrnithoPinniBundle\Entity\General\Position_GPS $releve)
    {
        $this->releve = $releve;

        return $this;
    }

    /**
     * Get releve.
     *
     * @return \OrnithoPinniBundle\Entity\General\Position_GPS
     */
    public function getReleve()
    {
        return $this->releve;
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
     * Add saisy.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\Saisie $saisy
     *
     * @return Protocole
     */
    public function addSaisy(\OrnithoPinniBundle\Entity\CMTG_INDIFF\Saisie $saisy)
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
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\Saisie $saisy
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSaisy(\OrnithoPinniBundle\Entity\CMTG_INDIFF\Saisie $saisy)
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

    public function __toString(){
        return "Protocole(".$this->id.")";
    }
}
