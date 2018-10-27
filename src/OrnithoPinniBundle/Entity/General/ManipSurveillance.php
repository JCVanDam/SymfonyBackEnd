<?php

namespace OrnithoPinniBundle\Entity\General;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ManipSurveillance
 *
 * @ORM\Table(name="general_manip_surveillance")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\General\ManipSurveillanceRepository")
 */
class ManipSurveillance
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
   * @ORM\Column(name="date", type="date")
   */
  private $date;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="heure", type="time", nullable=true)
   */
  private $heure;

  /**
   * @var string|null
   *
   * @ORM\Column(name="remarque", type="text", nullable=true)
   */
  private $remarque;

  /**
   * @var string
   *
   * @ORM\Column(name="code", type="string", length=255, unique=true, nullable=true)
   */
  private $code;

  /**
   * @ORM\OneToOne(targetEntity="Meteo", cascade={"persist", "remove"})
   * @ORM\JoinColumn(nullable=true)
   * @Assert\Valid
   */
  private $meteo;

  /**
   * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\Localisation\Site")
   * @Assert\Valid
   */
  private $site;

  /**
   * @ORM\ManyToOne(targetEntity="Personne")
   * @Assert\Valid
   */
  private $collecteur;

  /**
   * @var string
   *
   * @ORM\Column(name="decouvreur", type="string", length=255, unique=true, nullable=false)
   */
  private $decouvreur;

  /**
   * @var string
   *
   * @ORM\Column(name="organisme", type="string", length=255, unique=true, nullable=false)
   */
  private $organisme;

  /**
   * @var string
   *
   * @ORM\Column(name="precisionOrganisme", type="string", length=255, unique=true, nullable=true)
   */
  private $precisionOrganisme;

  /**
   * @ORM\OneToMany(targetEntity="ProtocoleSurveillance", mappedBy="manip", cascade={"all"}, orphanRemoval=true)
   * @Assert\Valid
   */
  private $protocoles;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->protocoles = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return ManipSurveillance
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set heure.
     *
     * @param \DateTime|null $heure
     *
     * @return ManipSurveillance
     */
    public function setHeure($heure = null)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure.
     *
     * @return \DateTime|null
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set remarque.
     *
     * @param string|null $remarque
     *
     * @return ManipSurveillance
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
     * Set code.
     *
     * @param string|null $code
     *
     * @return ManipSurveillance
     */
    public function setCode($code = null)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set decouvreur.
     *
     * @param string $decouvreur
     *
     * @return ManipSurveillance
     */
    public function setDecouvreur($decouvreur)
    {
        $this->decouvreur = $decouvreur;

        return $this;
    }

    /**
     * Get decouvreur.
     *
     * @return string
     */
    public function getDecouvreur()
    {
        return $this->decouvreur;
    }

    /**
     * Set organisme.
     *
     * @param string $organisme
     *
     * @return ManipSurveillance
     */
    public function setOrganisme($organisme)
    {
        $this->organisme = $organisme;

        return $this;
    }

    /**
     * Get organisme.
     *
     * @return string
     */
    public function getOrganisme()
    {
        return $this->organisme;
    }

    /**
     * Set precisionOrganisme.
     *
     * @param string|null $precisionOrganisme
     *
     * @return ManipSurveillance
     */
    public function setPrecisionOrganisme($precisionOrganisme = null)
    {
        $this->precisionOrganisme = $precisionOrganisme;

        return $this;
    }

    /**
     * Get precisionOrganisme.
     *
     * @return string|null
     */
    public function getPrecisionOrganisme()
    {
        return $this->precisionOrganisme;
    }

    /**
     * Set meteo.
     *
     * @param \OrnithoPinniBundle\Entity\General\Meteo|null $meteo
     *
     * @return ManipSurveillance
     */
    public function setMeteo(\OrnithoPinniBundle\Entity\General\Meteo $meteo = null)
    {
        $this->meteo = $meteo;

        return $this;
    }

    /**
     * Get meteo.
     *
     * @return \OrnithoPinniBundle\Entity\General\Meteo|null
     */
    public function getMeteo()
    {
        return $this->meteo;
    }

    /**
     * Set site.
     *
     * @param \OrnithoPinniBundle\Entity\Localisation\Site|null $site
     *
     * @return ManipSurveillance
     */
    public function setSite(\OrnithoPinniBundle\Entity\Localisation\Site $site = null)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site.
     *
     * @return \OrnithoPinniBundle\Entity\Localisation\Site|null
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Add protocole.
     *
     * @param \OrnithoPinniBundle\Entity\General\ProtocoleSurveillance $protocole
     *
     * @return ManipSurveillance
     */
    public function addProtocole(\OrnithoPinniBundle\Entity\General\ProtocoleSurveillance $protocole)
    {
        $this->protocoles[] = $protocole;

        return $this;
    }

    public function setProtocoles($protocoles)
    {
        $itemsToAdd = [];
        $existingIds = [];

        foreach ($protocoles as $protocole) {
            // New item's ID is null
            if (null === ($id = $protocole->getId())) {
                $itemsToAdd[] = $protocole;
            } else {
                $existingIds[$id] = true;
            }
        }

        foreach ($this->protocoles as $idx => $protocole) {
            if (!$protocole->getId()) {
                continue;
            }

            // Remove item from the collection if it isn't in the supplied
            // $protocoles.
            if (!isset($existingIds[$protocole->getId()])) {
                $protocole->setOwner(null);
                unset($this->protocoles[$idx]);
            }
        }

        // Add new items
        foreach ($itemsToAdd as $protocole) {
            $this->protocoles[] = $protocole;
        }
    }


    /**
     * Remove protocole.
     *
     * @param \OrnithoPinniBundle\Entity\General\ProtocoleSurveillance $protocole
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeProtocole(\OrnithoPinniBundle\Entity\General\ProtocoleSurveillance $protocole)
    {
        return $this->protocoles->removeElement($protocole);
    }

    /**
     * Get protocoles.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProtocoles()
    {
        return $this->protocoles;
    }

    /**
     * Set collecteur.
     *
     * @param \OrnithoPinniBundle\Entity\General\Personne|null $collecteur
     *
     * @return ManipSurveillance
     */
    public function setCollecteur(\OrnithoPinniBundle\Entity\General\Personne $collecteur = null)
    {
        $this->collecteur = $collecteur;

        return $this;
    }

    /**
     * Get collecteur.
     *
     * @return \OrnithoPinniBundle\Entity\General\Personne|null
     */
    public function getCollecteur()
    {
        return $this->collecteur;
    }

    public function __toString(){
        return "Manip n°".$this->id;
    }
}
