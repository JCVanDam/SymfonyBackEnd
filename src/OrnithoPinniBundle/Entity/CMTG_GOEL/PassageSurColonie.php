<?php

namespace OrnithoPinniBundle\Entity\CMTG_GOEL;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PassageSurColonie
 *
 * @ORM\Table(name="cmtg_goel_passage_sur_colonie")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_GOEL\PassageSurColonieRepository")
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
     * @var int
     *
     * @ORM\Column(name="nbJeunesMobiles", type="integer")
     */
    private $nbJeunesMobiles;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarque", type="text", nullable=true)
     */
    private $remarque;

    /**
     * @ORM\ManyToOne(targetEntity="Colonie")
     * @Assert\Valid
     */
    private $colonie;

    /**
     * @ORM\OneToMany(targetEntity="Nid", mappedBy="passage", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="CMTG_GOEL_nid_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $nids;

    /**
     * @ORM\ManyToOne(targetEntity="Protocole", inversedBy="saisies")
     */
    private $protocole;

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
     * Set nbJeunesMobiles.
     *
     * @param int $nbJeunesMobiles
     *
     * @return PassageSurColonie
     */
    public function setNbJeunesMobiles($nbJeunesMobiles)
    {
        $this->nbJeunesMobiles = $nbJeunesMobiles;

        return $this;
    }

    /**
     * Get nbJeunesMobiles.
     *
     * @return int
     */
    public function getNbJeunesMobiles()
    {
        return $this->nbJeunesMobiles;
    }

    /**
     * Set remarque.
     *
     * @param string|null $remarque
     *
     * @return PassageSurColonie
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
     * Constructor
     */
    public function __construct()
    {
        $this->nids = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set colonie.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_GOEL\Colonie|null $colonie
     *
     * @return PassageSurColonie
     */
    public function setColonie(\OrnithoPinniBundle\Entity\CMTG_GOEL\Colonie $colonie = null)
    {
        $this->colonie = $colonie;

        return $this;
    }

    /**
     * Get colonie.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_GOEL\Colonie|null
     */
    public function getColonie()
    {
        return $this->colonie;
    }

    /**
     * Add nid.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_GOEL\Nid $nid
     *
     * @return PassageSurColonie
     */
    public function addNid(\OrnithoPinniBundle\Entity\CMTG_GOEL\Nid $nid)
    {
        $nid->setPassage($this);
        $this->nids[] = $nid;

        return $this;
    }

    public function setNids($nids)
    {
        $itemsToAdd = [];
        $existingIds = [];

        foreach ($nids as $nid) {
            // New item's ID is null
            if (null === ($id = $nid->getId())) {
                $itemsToAdd[] = $nid;
            } else {
                $existingIds[$id] = true;
            }
        }

        foreach ($this->nids as $idx => $nid) {
            if (!$nid->getId()) {
                continue;
            }

            // Remove item from the collection if it isn't in the supplied
            // $nids.
            if (!isset($existingIds[$nid->getId()])) {
                $nid->setOwner(null);
                unset($this->nids[$idx]);
            }
        }

        // Add new items
        foreach ($itemsToAdd as $nid) {
            $this->nids[] = $nid;
        }
    }

    /**
     * Remove nid.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_GOEL\Nid $nid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeNid(\OrnithoPinniBundle\Entity\CMTG_GOEL\Nid $nid)
    {
        return $this->nids->removeElement($nid);
    }

    /**
     * Get nids.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNids()
    {
        return $this->nids;
    }

    /**
     * Set protocole.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_GOEL\Protocole|null $protocole
     *
     * @return PassageSurColonie
     */
    public function setProtocole(\OrnithoPinniBundle\Entity\CMTG_GOEL\Protocole $protocole = null)
    {
        $this->protocole = $protocole;

        return $this;
    }

    /**
     * Get protocole.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_GOEL\Protocole|null
     */
    public function getProtocole()
    {
        return $this->protocole;
    }


    public function __toString(){
        return "Passage sur colonie n°".$this->id;
    }
}
