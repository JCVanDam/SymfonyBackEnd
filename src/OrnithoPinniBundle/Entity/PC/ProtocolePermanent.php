<?php

namespace OrnithoPinniBundle\Entity\PC;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProtocolePermanent
 *
 * @ORM\Table(name="pc_protocole_permanent")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\PC\ProtocolePermanentRepository")
 */
class ProtocolePermanent
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
     * @ORM\OneToMany(targetEntity="PointComptagePermanent", mappedBy="protocole", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="pc_point_comptage_permanent_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $comptages;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString(){
      return "Permanent(".$this->id.")";
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comptages = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add comptage.
     *
     * @param \OrnithoPinniBundle\Entity\PC\PointComptagePermanent $comptage
     *
     * @return ProtocolePermanent
     */
    public function addComptage(\OrnithoPinniBundle\Entity\PC\PointComptagePermanent $comptage)
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
     * @param \OrnithoPinniBundle\Entity\PC\PointComptagePermanent $comptage
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeComptage(\OrnithoPinniBundle\Entity\PC\PointComptagePermanent $comptage)
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
}
