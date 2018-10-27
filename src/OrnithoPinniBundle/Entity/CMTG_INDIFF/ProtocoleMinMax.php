<?php

namespace OrnithoPinniBundle\Entity\CMTG_INDIFF;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProtocoleMinMax
 *
 * @ORM\Table(name="cmtg_indiff_protocole_min_max")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_INDIFF\ProtocoleMinMaxRepository")
 */
class ProtocoleMinMax
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
     * @ORM\OneToMany(targetEntity="ComptageMinMax", mappedBy="protocole", cascade={"all"}, orphanRemoval=true)
     * @Assert\Valid
     */
    private $comptages;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comptages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add comptage.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\ComptageMinMax $comptage
     *
     * @return ProtocoleMinMax
     */
    public function addComptage(\OrnithoPinniBundle\Entity\CMTG_INDIFF\ComptageMinMax $comptage)
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
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\ComptageMinMax $comptage
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeComptage(\OrnithoPinniBundle\Entity\CMTG_INDIFF\ComptageMinMax $comptage)
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
        return "MinMax(".$this->id.")";
    }
}
