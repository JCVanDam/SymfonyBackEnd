<?php

namespace OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comptage
 *
 * @ORM\Table(name="cmtg_oiseaux_marins_comptage")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_OISEAUX_MARINS\ComptageRepository")
 */
class Comptage
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
     * @ORM\OneToMany(targetEntity="Saisie", mappedBy="comptage", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="cmtg_oiseaux_marins_saisie_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $saisies;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isEmpty", type="boolean", nullable=true)
     */
    private $isEmpty;

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

    /**
     * Add saisy.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Saisie $saisy
     *
     * @return Comptage
     */
    public function addSaisy(\OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Saisie $saisy)
    {
        $saisy->setComptage($this);
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
     * @param \OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Saisie $saisy
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSaisy(\OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Saisie $saisy)
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

    /**
     * Set isEmpty.
     *
     * @param bool|null $isEmpty
     *
     * @return Comptage
     */
    public function setIsEmpty($isEmpty = null)
    {
        $this->isEmpty = $isEmpty;

        return $this;
    }

    /**
     * Get isEmpty.
     *
     * @return bool|null
     */
    public function getIsEmpty()
    {
        return $this->isEmpty;
    }

    public function __toString(){
        return "Comptage n°".$this->id;
    }
}
