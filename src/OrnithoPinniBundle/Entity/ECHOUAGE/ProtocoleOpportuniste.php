<?php

namespace OrnithoPinniBundle\Entity\ECHOUAGE;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProtocoleOpportuniste
 *
 * @ORM\Table(name="echouage_protocole_opportuniste")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\ECHOUAGE\ProtocoleOpportunisteRepository")
 */
class ProtocoleOpportuniste
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
     * @ORM\OneToMany(targetEntity="Decouverte", mappedBy="protocoleOpportuniste", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="echouage_decouverte_opportuniste_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $decouvertes;

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
     * Constructor
     */
    public function __construct()
    {
        $this->decouvertes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add decouverte.
     *
     * @param \OrnithoPinniBundle\Entity\ECHOUAGE\Decouverte $decouverte
     *
     * @return ProtocoleOpportuniste
     */
    public function addDecouverte(\OrnithoPinniBundle\Entity\ECHOUAGE\Decouverte $decouverte)
    {
        $decouverte->setProtocoleOpportuniste($this);
        $this->decouvertes[] = $decouverte;

        return $this;
    }

    public function setDecouvertes($decouvertes)
    {
        $itemsToAdd = [];
        $existingIds = [];

        foreach ($decouvertes as $decouverte) {
            // New item's ID is null
            if (null === ($id = $decouverte->getId())) {
                $itemsToAdd[] = $decouverte;
            } else {
                $existingIds[$id] = true;
            }
        }

        foreach ($this->decouvertes as $idx => $decouverte) {
            if (!$decouverte->getId()) {
                continue;
            }

            // Remove item from the collection if it isn't in the supplied
            // $decouvertes.
            if (!isset($existingIds[$decouverte->getId()])) {
                $decouverte->setOwner(null);
                unset($this->decouvertes[$idx]);
            }
        }

        // Add new items
        foreach ($itemsToAdd as $decouverte) {
            $this->decouvertes[] = $decouverte;
        }
    }

    /**
     * Remove decouverte.
     *
     * @param \OrnithoPinniBundle\Entity\ECHOUAGE\Decouverte $decouverte
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDecouverte(\OrnithoPinniBundle\Entity\ECHOUAGE\Decouverte $decouverte)
    {
        return $this->decouvertes->removeElement($decouverte);
    }

    /**
     * Get decouvertes.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDecouvertes()
    {
        return $this->decouvertes;
    }

    public function __toString(){
        return "Opportuniste(".$this->id.")";
    }
}
