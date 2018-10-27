<?php

namespace OrnithoPinniBundle\Entity\SAGIR;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Decouverte
 *
 * @ORM\Table(name="sagir_decouverte")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\SAGIR\DecouverteRepository")
 */
class Decouverte
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
     * @var bool|null
     *
     * @ORM\Column(name="ficheSagirCompletee", type="boolean", nullable=true)
     */
    private $ficheSagirCompletee;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="envoiEchantillons", type="boolean", nullable=true)
     */
    private $envoiEchantillons;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numeroFicheSagir", type="string", length=255, nullable=true, unique=true)
     */
    private $numeroFicheSagir;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateEnvoiFiche", type="date", nullable=true)
     */
    private $dateEnvoiFiche;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateEnvoiEchantillons", type="date", nullable=true)
     */
    private $dateEnvoiEchantillons;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreIndividus", type="integer")
     */
    private $nombreIndividus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="causeMortSuspectee", type="text", nullable=true)
     */
    private $causeMortSuspectee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaires", type="text", nullable=true)
     */
    private $commentaires;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\General\Position_GPS", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="general_position_gps_id", referencedColumnName="id", nullable=true)
     * @Assert\Valid
     */
    private $releve;

    /**
     * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\General\Espece")
     * @Assert\Valid
     */
    private $espece;

    /**
     * @ORM\ManyToOne(targetEntity="Protocole", inversedBy="decouvertes")
     */
    private $protocole;

    /**
     * @ORM\OneToMany(targetEntity="Animal", mappedBy="decouverte", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="sagir_animal_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $animaux;

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
     * Set ficheSagirCompletee.
     *
     * @param bool|null $ficheSagirCompletee
     *
     * @return Decouverte
     */
    public function setFicheSagirCompletee($ficheSagirCompletee = null)
    {
        $this->ficheSagirCompletee = $ficheSagirCompletee;

        return $this;
    }

    /**
     * Get ficheSagirCompletee.
     *
     * @return bool|null
     */
    public function getFicheSagirCompletee()
    {
        return $this->ficheSagirCompletee;
    }

    /**
     * Set numeroFicheSagir.
     *
     * @param string|null $numeroFicheSagir
     *
     * @return Decouverte
     */
    public function setNumeroFicheSagir($numeroFicheSagir = null)
    {
        $this->numeroFicheSagir = $numeroFicheSagir;

        return $this;
    }

    /**
     * Get numeroFicheSagir.
     *
     * @return string|null
     */
    public function getNumeroFicheSagir()
    {
        return $this->numeroFicheSagir;
    }

    /**
     * Set dateEnvoiFiche.
     *
     * @param \DateTime|null $dateEnvoiFiche
     *
     * @return Decouverte
     */
    public function setDateEnvoiFiche($dateEnvoiFiche = null)
    {
        $this->dateEnvoiFiche = $dateEnvoiFiche;

        return $this;
    }

    /**
     * Get dateEnvoiFiche.
     *
     * @return \DateTime|null
     */
    public function getDateEnvoiFiche()
    {
        return $this->dateEnvoiFiche;
    }

    /**
     * Set dateEnvoiEchantillons.
     *
     * @param \DateTime|null $dateEnvoiEchantillons
     *
     * @return Decouverte
     */
    public function setDateEnvoiEchantillons($dateEnvoiEchantillons = null)
    {
        $this->dateEnvoiEchantillons = $dateEnvoiEchantillons;

        return $this;
    }

    /**
     * Get dateEnvoiEchantillons.
     *
     * @return \DateTime|null
     */
    public function getDateEnvoiEchantillons()
    {
        return $this->dateEnvoiEchantillons;
    }

    /**
     * Set nombreIndividus.
     *
     * @param int $nombreIndividus
     *
     * @return Decouverte
     */
    public function setNombreIndividus($nombreIndividus)
    {
        $this->nombreIndividus = $nombreIndividus;

        return $this;
    }

    /**
     * Get nombreIndividus.
     *
     * @return int
     */
    public function getNombreIndividus()
    {
        return $this->nombreIndividus;
    }

    /**
     * Set causeMortSuspectee.
     *
     * @param string|null $causeMortSuspectee
     *
     * @return Decouverte
     */
    public function setCauseMortSuspectee($causeMortSuspectee = null)
    {
        $this->causeMortSuspectee = $causeMortSuspectee;

        return $this;
    }

    /**
     * Get causeMortSuspectee.
     *
     * @return string|null
     */
    public function getCauseMortSuspectee()
    {
        return $this->causeMortSuspectee;
    }

    /**
     * Set commentaires.
     *
     * @param string|null $commentaires
     *
     * @return Decouverte
     */
    public function setCommentaires($commentaires = null)
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    /**
     * Get commentaires.
     *
     * @return string|null
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->animaux = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set releve.
     *
     * @param \OrnithoPinniBundle\Entity\General\Position_GPS|null $releve
     *
     * @return Decouverte
     */
    public function setReleve(\OrnithoPinniBundle\Entity\General\Position_GPS $releve = null)
    {
        $this->releve = $releve;

        return $this;
    }

    /**
     * Get releve.
     *
     * @return \OrnithoPinniBundle\Entity\General\Position_GPS|null
     */
    public function getReleve()
    {
        return $this->releve;
    }

    /**
     * Set espece.
     *
     * @param \OrnithoPinniBundle\Entity\General\Espece|null $espece
     *
     * @return Decouverte
     */
    public function setEspece(\OrnithoPinniBundle\Entity\General\Espece $espece = null)
    {
        $this->espece = $espece;

        return $this;
    }

    /**
     * Get espece.
     *
     * @return \OrnithoPinniBundle\Entity\General\Espece|null
     */
    public function getEspece()
    {
        return $this->espece;
    }

    /**
     * Set protocole.
     *
     * @param \OrnithoPinniBundle\Entity\SAGIR\Protocole|null $protocole
     *
     * @return Decouverte
     */
    public function setProtocole(\OrnithoPinniBundle\Entity\SAGIR\Protocole $protocole = null)
    {
        $this->protocole = $protocole;

        return $this;
    }

    /**
     * Get protocole.
     *
     * @return \OrnithoPinniBundle\Entity\SAGIR\Protocole|null
     */
    public function getProtocole()
    {
        return $this->protocole;
    }

    /**
     * Add animaux.
     *
     * @param \OrnithoPinniBundle\Entity\SAGIR\Animal $animaux
     *
     * @return Decouverte
     */
    public function addAnimaux(\OrnithoPinniBundle\Entity\SAGIR\Animal $animaux)
    {
        $animaux->setDecouverte($this);
        $this->animaux[] = $animaux;

        return $this;
    }

    public function setAnimaux($animaux)
    {
        $itemsToAdd = [];
        $existingIds = [];

        foreach ($animaux as $animal) {
            // New item's ID is null
            if (null === ($id = $animal->getId())) {
                $itemsToAdd[] = $animal;
            } else {
                $existingIds[$id] = true;
            }
        }

        foreach ($this->animaux as $idx => $animal) {
            if (!$animal->getId()) {
                continue;
            }

            // Remove item from the collection if it isn't in the supplied
            // $animaux.
            if (!isset($existingIds[$animal->getId()])) {
                $animal->setOwner(null);
                unset($this->animaux[$idx]);
            }
        }

        // Add new items
        foreach ($itemsToAdd as $animal) {
            $this->animaux[] = $animal;
        }
    }

    /**
     * Remove animaux.
     *
     * @param \OrnithoPinniBundle\Entity\SAGIR\Animal $animaux
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAnimaux(\OrnithoPinniBundle\Entity\SAGIR\Animal $animaux)
    {
        return $this->animaux->removeElement($animaux);
    }

    /**
     * Get animaux.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnimaux()
    {
        return $this->animaux;
    }

    /**
     * Set envoiEchantillons.
     *
     * @param bool|null $envoiEchantillons
     *
     * @return Decouverte
     */
    public function setEnvoiEchantillons($envoiEchantillons = null)
    {
        $this->envoiEchantillons = $envoiEchantillons;

        return $this;
    }

    /**
     * Get envoiEchantillons.
     *
     * @return bool|null
     */
    public function getEnvoiEchantillons()
    {
        return $this->envoiEchantillons;
    }

    public function __toString(){
        return "Découverte n°".$this->id;
    }
}
