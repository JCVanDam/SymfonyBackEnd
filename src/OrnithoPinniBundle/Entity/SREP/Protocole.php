<?php

namespace OrnithoPinniBundle\Entity\SREP;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Protocole
 *
 * @ORM\Table(name="srep_protocole")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\SREP\ProtocoleRepository")
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
     * @ORM\OneToMany(targetEntity="PassageSurColonie", mappedBy="protocole", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="srep_passage_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $saisies;

    /**
     * @var string|null
     *
     * @ORM\Column(name="saison", type="string", length=255, nullable=true)
     */
    private $saison;

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
        $this->saisies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString(){
        return "SREP (".$this->id.")";
    }

    /**
     * Set saison.
     *
     * @param string|null $saison
     *
     * @return Protocole
     */
    public function setSaison($saison = null)
    {
        $this->saison = $saison;

        return $this;
    }

    /**
     * Get saison.
     *
     * @return string|null
     */
    public function getSaison()
    {
        return $this->saison;
    }

    /**
     * Add saisy.
     *
     * @param \OrnithoPinniBundle\Entity\SREP\PassageSurColonie $saisy
     *
     * @return Protocole
     */
    public function addSaisy(\OrnithoPinniBundle\Entity\SREP\PassageSurColonie $saisy)
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
     * @param \OrnithoPinniBundle\Entity\SREP\PassageSurColonie $saisy
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSaisy(\OrnithoPinniBundle\Entity\SREP\PassageSurColonie $saisy)
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
