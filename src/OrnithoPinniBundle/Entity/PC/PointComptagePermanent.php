<?php

namespace OrnithoPinniBundle\Entity\PC;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PointComptagePermanent
 *
 * @ORM\Table(name="pc_point_comptage_permanent")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\PC\PointComptagePermanentRepository")
 */
class PointComptagePermanent
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
     * @ORM\OneToMany(targetEntity="DonneesTerrier", mappedBy="pointComptagePermanent", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="pc_terriers_id", referencedColumnName="id")
     * @Assert\Valid
     */
    private $terriers;

    /**
     * @ORM\ManyToOne(targetEntity="ProtocolePermanent", inversedBy="comptages")
     */
    private $protocole;

    /**
     * @ORM\ManyToOne(targetEntity="Piquet")
     * @Assert\Valid
     */
    private $piquet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarque", type="text", nullable=true)
     */
    private $remarque;

    /**
     * @ORM\OneToOne(targetEntity="Vegetation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="pc_vegetation_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $vegetation;

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
     * Add terrier.
     *
     * @param \OrnithoPinniBundle\Entity\PC\DonneesTerrier $terrier
     *
     * @return PointComptagePermanent
     */
     public function addTerrier(\OrnithoPinniBundle\Entity\PC\DonneesTerrier $terrier)
     {
         $terrier->setPointComptagePermanent($this);
         $this->terriers[] = $terrier;

         return $this;
     }

    public function setTerriers($terriers)
    {
        $itemsToAdd = [];
        $existingIds = [];

        foreach ($terriers as $terrier) {
            // New item's ID is null
            if (null === ($id = $terrier->getId())) {
                $itemsToAdd[] = $terrier;
            } else {
                $existingIds[$id] = true;
            }
        }

        foreach ($this->terriers as $idx => $terrier) {
            if (!$terrier->getId()) {
                continue;
            }

            // Remove item from the collection if it isn't in the supplied
            // $terriers.
            if (!isset($existingIds[$terrier->getId()])) {
                $terrier->setOwner(null);
                unset($this->terriers[$idx]);
            }
        }

        // Add new items
        foreach ($itemsToAdd as $terrier) {
            $this->terriers[] = $terrier;
        }
    }

    /**
     * Remove terrier.
     *
     * @param \OrnithoPinniBundle\Entity\PC\DonneesTerrier $terrier
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTerrier(\OrnithoPinniBundle\Entity\PC\DonneesTerrier $terrier)
    {
        return $this->terriers->removeElement($terrier);
    }

    /**
     * Get terriers.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTerriers()
    {
        return $this->terriers;
    }

    /**
     * Set protocole.
     *
     * @param \OrnithoPinniBundle\Entity\PC\ProtocolePermanent|null $protocole
     *
     * @return PointComptagePermanent
     */
    public function setProtocole(\OrnithoPinniBundle\Entity\PC\ProtocolePermanent $protocole = null)
    {
        $this->protocole = $protocole;

        return $this;
    }

    /**
     * Get protocole.
     *
     * @return \OrnithoPinniBundle\Entity\PC\ProtocolePermanent|null
     */
    public function getProtocole()
    {
        return $this->protocole;
    }

    /**
     * Set piquet.
     *
     * @param \OrnithoPinniBundle\Entity\PC\Piquet|null $piquet
     *
     * @return PointComptagePermanent
     */
    public function setPiquet(\OrnithoPinniBundle\Entity\PC\Piquet $piquet = null)
    {
        $this->piquet = $piquet;

        return $this;
    }

    /**
     * Get piquet.
     *
     * @return \OrnithoPinniBundle\Entity\PC\Piquet|null
     */
    public function getTerrier()
    {
        return $this->piquet;
    }

    public function __toString(){
        return "PointComptagePermanent n°".$this->id;
    }

    /**
     * Set remarque.
     *
     * @param string|null $remarque
     *
     * @return PointComptagePermanent
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
     * Get piquet.
     *
     * @return \OrnithoPinniBundle\Entity\PC\Piquet|null
     */
    public function getPiquet()
    {
        return $this->piquet;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->terriers = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set vegetation.
     *
     * @param \OrnithoPinniBundle\Entity\PC\Vegetation $vegetation
     *
     * @return PointComptagePermanent
     */
    public function setVegetation(\OrnithoPinniBundle\Entity\PC\Vegetation $vegetation)
    {
        $this->vegetation = $vegetation;

        return $this;
    }

    /**
     * Get vegetation.
     *
     * @return \OrnithoPinniBundle\Entity\PC\Vegetation
     */
    public function getVegetation()
    {
        return $this->vegetation;
    }
}
