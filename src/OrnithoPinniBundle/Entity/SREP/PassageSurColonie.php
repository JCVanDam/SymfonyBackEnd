<?php

namespace OrnithoPinniBundle\Entity\SREP;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use DateTime;

/**
 * PassageSurColonie
 *
 * @ORM\Table(name="srep_passage_sur_colonie")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\SREP\PassageSurColonieRepository")
 */
class PassageSurColonie
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
     * @ORM\ManyToOne(targetEntity="Protocole", inversedBy="saisies")
     */
    private $protocole;

    /**
     * @ORM\ManyToOne(targetEntity="Colonie")
     * @Assert\Valid
     */
    private $colonie;

    /**
     * @ORM\OneToMany(targetEntity="Comptage", mappedBy="passage", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="srep_comptage_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $comptages;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\General\Position_GPS", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="general_position_gps_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $releve;

    /**
     * @var string
     *
     * @ORM\Column(name="is_updated", type="string", length=255, nullable=false)
     */
    private $isUpdated;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarque", type="text", nullable=true)
     */
    private $remarque;

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
        $this->comptages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set protocole.
     *
     * @param \OrnithoPinniBundle\Entity\SREP\Protocole|null $protocole
     *
     * @return PassageSurColonie
     */
    public function setProtocole(\OrnithoPinniBundle\Entity\SREP\Protocole $protocole = null)
    {
        $this->protocole = $protocole;

        return $this;
    }

    /**
     * Get protocole.
     *
     * @return \OrnithoPinniBundle\Entity\SREP\Protocole|null
     */
    public function getProtocole()
    {
        return $this->protocole;
    }

    /**
     * Set colonie.
     *
     * @param \OrnithoPinniBundle\Entity\SREP\Colonie|null $colonie
     *
     * @return PassageSurColonie
     */
    public function setColonie(\OrnithoPinniBundle\Entity\SREP\Colonie $colonie = null)
    {
        $this->colonie = $colonie;

        return $this;
    }

    /**
     * Get colonie.
     *
     * @return \OrnithoPinniBundle\Entity\SREP\Colonie|null
     */
    public function getColonie()
    {
        return $this->colonie;
    }

    /**
     * Add comptage.
     *
     * @param \OrnithoPinniBundle\Entity\SREP\Comptage $comptage
     *
     * @return PassageSurColonie
     */
    public function addComptage(\OrnithoPinniBundle\Entity\SREP\Comptage $comptage)
    {
        $comptage->setPassage($this);
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
     * @param \OrnithoPinniBundle\Entity\SREP\Comptage $comptage
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeComptage(\OrnithoPinniBundle\Entity\SREP\Comptage $comptage)
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

    /**
     * Set releve.
     *
     * @param \OrnithoPinniBundle\Entity\General\Position_GPS $releve
     *
     * @return PassageSurColonie
     */
    public function setReleve(\OrnithoPinniBundle\Entity\General\Position_GPS $releve = null)
    {
        $this->releve = $releve;

        return $this;
    }

    /**
     * Get releve.
     *
     * @return \OrnithoPinniBundle\Entity\General\Position_GPS
     */
    public function getReleve()
    {
        return $this->releve;
    }

    /**
     * Set isUpdated.
     *
     * @param string $isUpdated
     *
     * @return PassageSurColonie
     */
    public function setIsUpdated($isUpdated)
    {
        $this->isUpdated = $isUpdated;

        return $this;
    }

    /**
     * Get isUpdated.
     *
     * @return string
     */
    public function getIsUpdated()
    {
        return $this->isUpdated;
    }

    /**
     * Set remarque.
     *
     * @param string|null $remarque
     *
     * @return Comptage
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

    public function __toString(){
        return "PassageSurColonie n°".$this->id;
    }
}
