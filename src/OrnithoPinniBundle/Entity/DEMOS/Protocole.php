<?php

namespace OrnithoPinniBundle\Entity\DEMOS;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Protocole
 *
 * @ORM\Table(name="demos_protocole")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\DEMOS\ProtocoleRepository")
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
     * @ORM\OneToMany(targetEntity="PassageSurTerrier", mappedBy="protocole", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="demos_passage_sur_terrier_id", referencedColumnName="id", nullable=false)
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
     * @var string
     *
     * @ORM\Column(name="choix_saison_espece", type="string", length=255, nullable=false)
     */
    private $choixSaisonEspece;

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
     * Set choixSaisonEspece.
     *
     * @param string $choixSaisonEspece
     *
     * @return Protocole
     */
    public function setChoixSaisonEspece($choixSaisonEspece)
    {
        $this->choixSaisonEspece = $choixSaisonEspece;

        return $this;
    }

    /**
     * Get choixSaisonEspece.
     *
     * @return string
     */
    public function getChoixSaisonEspece()
    {
        return $this->choixSaisonEspece;
    }


    public function __toString(){
        return "DEMOS (".$this->id.")";
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
     * @param \OrnithoPinniBundle\Entity\DEMOS\PassageSurTerrier $saisy
     *
     * @return Protocole
     */
    public function addSaisy(\OrnithoPinniBundle\Entity\DEMOS\PassageSurTerrier $saisy)
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
     * @param \OrnithoPinniBundle\Entity\DEMOS\PassageSurTerrier $saisy
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSaisy(\OrnithoPinniBundle\Entity\DEMOS\PassageSurTerrier $saisy)
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
