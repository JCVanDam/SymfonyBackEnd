<?php

namespace OrnithoPinniBundle\Entity\ECHOUAGE;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProtocoleEnTournee
 *
 * @ORM\Table(name="echouage_protocole_en_tournee")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\ECHOUAGE\ProtocoleEnTourneeRepository")
 */
class ProtocoleEnTournee
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
     * @var \DateTime
     *
     * @ORM\Column(name="heureDeb", type="time")
     */
    private $heureDeb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureFin", type="time")
     */
    private $heureFin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Decouverte", mappedBy="protocoleEnTournee", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="echouage_decouverte_en_tournee_id", referencedColumnName="id", nullable=true)
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
     * Set heureDeb.
     *
     * @param \DateTime $heureDeb
     *
     * @return ProtocoleEnTournee
     */
    public function setHeureDeb($heureDeb)
    {
        $this->heureDeb = $heureDeb;

        return $this;
    }

    /**
     * Get heureDeb.
     *
     * @return \DateTime
     */
    public function getHeureDeb()
    {
        return $this->heureDeb;
    }

    /**
     * Set heureFin.
     *
     * @param \DateTime $heureFin
     *
     * @return ProtocoleEnTournee
     */
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * Get heureFin.
     *
     * @return \DateTime
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return ProtocoleEnTournee
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
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
     * @return ProtocoleEnTournee
     */
    public function addDecouverte(\OrnithoPinniBundle\Entity\ECHOUAGE\Decouverte $decouverte)
    {
        $decouverte->setProtocoleEnTournee($this);
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
        return "EnTournée(".$this->id.")";
    }
}
