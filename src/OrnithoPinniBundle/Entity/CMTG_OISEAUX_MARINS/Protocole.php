<?php

namespace OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Protocole
 *
 * @ORM\Table(name="cmtg_oiseaux_marins_protocole")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_OISEAUX_MARINS\ProtocoleRepository")
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
     * @ORM\JoinColumn(name="cmtg_oiseaux_marins_passage_id", referencedColumnName="id", nullable=false)
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

    public function __toString(){
        return "CMTG_OISEAUX_MARINS (".$this->id.")";
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
     * Constructor
     */
    public function __construct()
    {
        $this->saisies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add saisy.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\PassageSurColonie $saisy
     *
     * @return Protocole
     */
    public function addSaisy(\OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\PassageSurColonie $saisy)
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
     * @param \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\PassageSurColonie $saisy
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSaisy(\OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\PassageSurColonie $saisy)
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
