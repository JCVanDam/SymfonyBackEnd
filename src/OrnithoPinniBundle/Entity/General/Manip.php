<?php

namespace OrnithoPinniBundle\Entity\General;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Manip
 *
 * @ORM\Table(name="general_manip")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\General\ManipRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Manip
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
    private $site_de;

    /**
     * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\Localisation\Site")
     * @Assert\Valid
     */
    private $site_ar;

    /**
     * @ORM\ManyToMany(targetEntity="Personne", cascade={"persist"})
     */
    private $observateurs;

    /**
     * @ORM\OneToMany(targetEntity="Protocole", mappedBy="manip", cascade={"all"}, orphanRemoval=true)
     * @Assert\Valid
     */
    private $protocoles;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->observateurs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Manip
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
     * @return Manip
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
     * @return Manip
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
     * @return Manip
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
     * Set meteo.
     *
     * @param \OrnithoPinniBundle\Entity\General\Meteo|null $meteo
     *
     * @return Manip
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
     * Set siteDe.
     *
     * @param \OrnithoPinniBundle\Entity\Localisation\Site $siteDe
     *
     * @return Manip
     */
    public function setSiteDe(\OrnithoPinniBundle\Entity\Localisation\Site $siteDe)
    {
        $this->site_de = $siteDe;

        return $this;
    }

    /**
     * Get siteDe.
     *
     * @return \OrnithoPinniBundle\Entity\Localisation\Site
     */
    public function getSiteDe()
    {
        return $this->site_de;
    }

    /**
     * Set siteAr.
     *
     * @param \OrnithoPinniBundle\Entity\Localisation\Site|null $siteAr
     *
     * @return Manip
     */
    public function setSiteAr(\OrnithoPinniBundle\Entity\Localisation\Site $siteAr = null)
    {
        $this->site_ar = $siteAr;

        return $this;
    }

    /**
     * Get siteAr.
     *
     * @return \OrnithoPinniBundle\Entity\Localisation\Site|null
     */
    public function getSiteAr()
    {
        return $this->site_ar;
    }

    /**
     * Add observateur.
     *
     * @param \OrnithoPinniBundle\Entity\General\Personne $observateur
     *
     * @return Manip
     */
    public function addObservateur(\OrnithoPinniBundle\Entity\General\Personne $observateur)
    {
        $this->observateurs[] = $observateur;

        return $this;
    }

    /**
     * Remove observateur.
     *
     * @param \OrnithoPinniBundle\Entity\General\Personne $observateur
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeObservateur(\OrnithoPinniBundle\Entity\General\Personne $observateur)
    {
        return $this->observateurs->removeElement($observateur);
    }

    /**
     * Get observateurs.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObservateurs()
    {
        return $this->observateurs;
    }

    /**
     * Add protocole.
     *
     * @param \OrnithoPinniBundle\Entity\General\Protocole $protocole
     *
     * @return Manip
     */
     public function addProtocole(\OrnithoPinniBundle\Entity\General\Protocole $protocole)
     {
         $protocole->setManip($this);
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
     * @param \OrnithoPinniBundle\Entity\General\Protocole $protocole
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeProtocole(\OrnithoPinniBundle\Entity\General\Protocole $protocole)
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

    public function __toString(){
        return "Manip n°".$this->id;
    }

}
