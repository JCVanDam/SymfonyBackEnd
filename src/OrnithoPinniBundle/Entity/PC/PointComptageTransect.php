<?php

namespace OrnithoPinniBundle\Entity\PC;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PointComptageTransect
 *
 * @ORM\Table(name="pc_point_comptage_transect")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\PC\PointComptageTransectRepository")
 */
class PointComptageTransect
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
     * @var string
     *
     * @ORM\Column(name="vegetation", type="string", length=255)
     */
    private $vegetation;

    /**
     * @var string
     *
     * @ORM\Column(name="pente", type="string", length=255)
     */
    private $pente;

    /**
     * @var string
     *
     * @ORM\Column(name="orientationPente", type="string", length=255)
     */
    private $orientationPente;

    /**
     * @var string|null
     *
     * @ORM\Column(name="idPtComptage", type="string", length=255, nullable=true)
     */
    private $idPtComptage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numeroTransect", type="string", length=255, nullable=true)
     */
    private $numeroTransect;

    /**
     * @var int|null
     *
     * @ORM\Column(name="distance", type="integer", nullable=true)
     */
    private $distance;

    /**
     * @ORM\ManyToOne(targetEntity="ProtocoleTransect", inversedBy="comptages")
     */
    private $protocole;

    /**
     * @ORM\OneToMany(targetEntity="DonneesTerrier", mappedBy="pointComptageTransect", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="pc_terrier_terrier_id", referencedColumnName="id")
     * @Assert\Valid
     */
    private $terriers;

    /**
     * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\General\Personne")
     * @Assert\Valid
     */
    private $observateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarque", type="text", nullable=true)
     */
    private $remarque;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\General\Position_GPS", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="pc_point_comptage_transect_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $releve;

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
     * Set vegetation.
     *
     * @param string $vegetation
     *
     * @return PointComptageTransect
     */
    public function setVegetation($vegetation)
    {
        $this->vegetation = $vegetation;

        return $this;
    }

    /**
     * Get vegetation.
     *
     * @return string
     */
    public function getVegetation()
    {
        return $this->vegetation;
    }

    /**
     * Set pente.
     *
     * @param string $pente
     *
     * @return PointComptageTransect
     */
    public function setPente($pente)
    {
        $this->pente = $pente;

        return $this;
    }

    /**
     * Get pente.
     *
     * @return string
     */
    public function getPente()
    {
        return $this->pente;
    }

    /**
     * Set orientationPente.
     *
     * @param string $orientationPente
     *
     * @return PointComptageTransect
     */
    public function setOrientationPente($orientationPente)
    {
        $this->orientationPente = $orientationPente;

        return $this;
    }

    /**
     * Get orientationPente.
     *
     * @return string
     */
    public function getOrientationPente()
    {
        return $this->orientationPente;
    }

    /**
     * Set idPtComptage.
     *
     * @param string|null $idPtComptage
     *
     * @return PointComptageTransect
     */
    public function setIdPtComptage($idPtComptage = null)
    {
        $this->idPtComptage = $idPtComptage;

        return $this;
    }

    /**
     * Get idPtComptage.
     *
     * @return string|null
     */
    public function getIdPtComptage()
    {
        return $this->idPtComptage;
    }

    /**
     * Set numeroTransect.
     *
     * @param string|null $numeroTransect
     *
     * @return PointComptageTransect
     */
    public function setNumeroTransect($numeroTransect = null)
    {
        $this->numeroTransect = $numeroTransect;

        return $this;
    }

    /**
     * Get numeroTransect.
     *
     * @return string|null
     */
    public function getNumeroTransect()
    {
        return $this->numeroTransect;
    }

    /**
     * Set distance.
     *
     * @param int|null $distance
     *
     * @return PointComptageTransect
     */
    public function setDistance($distance = null)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance.
     *
     * @return int|null
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set protocole.
     *
     * @param \OrnithoPinniBundle\Entity\PC\ProtocoleTransect|null $protocole
     *
     * @return PointComptageTransect
     */
    public function setProtocole(\OrnithoPinniBundle\Entity\PC\ProtocoleTransect $protocole = null)
    {
        $this->protocole = $protocole;

        return $this;
    }

    /**
     * Get protocole.
     *
     * @return \OrnithoPinniBundle\Entity\PC\ProtocoleTransect|null
     */
    public function getProtocole()
    {
        return $this->protocole;
    }

    /**
     * Add terrier.
     *
     * @param \OrnithoPinniBundle\Entity\PC\DonneesTerrier $terrier
     *
     * @return PointComptageTransect
     */
    public function addTerrier(\OrnithoPinniBundle\Entity\PC\DonneesTerrier $terrier)
    {
        $terrier->setPointComptageTransect($this);
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

    public function __toString(){
        return "PointComptageTransect n°".$this->id;
    }

    /**
     * Set observateur.
     *
     * @param \OrnithoPinniBundle\Entity\General\Personne|null $observateur
     *
     * @return PointComptageTransect
     */
    public function setObservateur(\OrnithoPinniBundle\Entity\General\Personne $observateur = null)
    {
        $this->observateur = $observateur;

        return $this;
    }

    /**
     * Get observateur.
     *
     * @return \OrnithoPinniBundle\Entity\General\Personne|null
     */
    public function getObservateur()
    {
        return $this->observateur;
    }

    /**
     * Set remarque.
     *
     * @param string|null $remarque
     *
     * @return PointComptageTransect
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
        $this->terriers = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set releve.
     *
     * @param \OrnithoPinniBundle\Entity\General\Position_GPS $releve
     *
     * @return PointComptageTransect
     */
    public function setReleve(\OrnithoPinniBundle\Entity\General\Position_GPS $releve)
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
}
