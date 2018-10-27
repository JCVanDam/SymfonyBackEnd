<?php

namespace OrnithoPinniBundle\Entity\CMTG_INDIFF;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProtocolePrecis
 *
 * @ORM\Table(name="cmtg_indiff_protocole_precis")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_INDIFF\ProtocolePrecisRepository")
 */
class ProtocolePrecis
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
     * @ORM\OneToMany(targetEntity="ComptagePrecis", mappedBy="protocole", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="cmtg_indiff_comptage_precis_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $comptages;

    /**
     * @ORM\OneToMany(targetEntity="Nid", mappedBy="protocole", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="CMTG_INDIFF_nid_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $nids;

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
     * Add comptage.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\ComptagePrecis $comptage
     *
     * @return ProtocolePrecis
     */
    public function addComptage(\OrnithoPinniBundle\Entity\CMTG_INDIFF\ComptagePrecis $comptage)
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
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\ComptagePrecis $comptage
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeComptage(\OrnithoPinniBundle\Entity\CMTG_INDIFF\ComptagePrecis $comptage)
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
        return "Precis(".$this->id.")";
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comptages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->nids = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add nid.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\Nid $nid
     *
     * @return ProtocolePrecis
     */
    public function addNid(\OrnithoPinniBundle\Entity\CMTG_INDIFF\Nid $nid)
    {
        $nid->setProtocole($this);
        $this->nids[] = $nid;

        return $this;
    }

    public function setNids($nids)
    {
        $itemsToAdd = [];
        $existingIds = [];

        foreach ($nids as $nid) {
            // New item's ID is null
            if (null === ($id = $nid->getId())) {
                $itemsToAdd[] = $nid;
            } else {
                $existingIds[$id] = true;
            }
        }

        foreach ($this->nids as $idx => $nid) {
            if (!$nid->getId()) {
                continue;
            }

            // Remove item from the collection if it isn't in the supplied
            // $nids.
            if (!isset($existingIds[$nid->getId()])) {
                $nid->setOwner(null);
                unset($this->nids[$idx]);
            }
        }

        // Add new items
        foreach ($itemsToAdd as $nid) {
            $this->nids[] = $nid;
        }
    }

    /**
     * Remove nid.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\Nid $nid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeNid(\OrnithoPinniBundle\Entity\CMTG_INDIFF\Nid $nid)
    {
        return $this->nids->removeElement($nid);
    }

    /**
     * Get nids.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNids()
    {
        return $this->nids;
    }
}
