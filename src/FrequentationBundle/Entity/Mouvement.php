<?php

namespace FrequentationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FrequentationBundle\Entity\Manipe;

/**
 * Mouvement
 *
 * @ORM\Table(name="mouvement")
 * @ORM\Entity(repositoryClass="FrequentationBundle\Repository\MouvementRepository")
 */
class Mouvement
{
    /**
   * @ORM\ManyToOne(targetEntity="Manipe",inversedBy="mouvements")
   * @ORM\JoinColumn(name="manipe_id", referencedColumnName="id")
   */
    public $manipe;

    public function setManipe(Manipe $manipe)
    {
        $this->manipe = $manipe;
        return $this;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="ZoneSite")
     */
    private $zoneDepart;



    /**
     * @ORM\ManyToOne(targetEntity="ZoneSite")
     */
    private $zoneArrivee;


    /**
     * @ORM\ManyToOne(targetEntity="ZoneSite")
     */
    private $itineraire;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_depart", type="datetime")
     */
    private $dateDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_arrivee", type="datetime")
     */
    private $dateArrivee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="jour_transit", type="integer")
     */
    private $jourTransit;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="mouvements" )
     */
    private $users;




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Set zoneArrivee
     *
     * @param string $zoneArrivee
     *
     * @return mouvement
     */
    public function setZoneArrivee($zoneArrivee)
    {
        $this->zoneArrivee = $zoneArrivee;

        return $this;
    }

    /**
     * Get zoneArrivee
     *
     * @return string
     */
    public function getZoneArrivee()
    {
        return $this->zoneArrivee;
    }

    /**
     * Set itineraire
     *
     * @param string $itineraire
     *
     * @return mouvement
     */
    public function setItineraire($itineraire)
    {
        $this->itineraire = $itineraire;

        return $this;
    }

    /**
     * Get itineraire
     *
     * @return string
     */
    public function getItineraire()
    {
        return $this->itineraire;
    }

    /**
     * Set dateArrivee
     *
     * @param \DateTime $dateArrivee
     *
     * @return mouvement
     */
    public function setDateArrivee($dateArrivee)
    {
        $this->dateArrivee = $dateArrivee;

        return $this;
    }

    /**
     * Get dateArrivee
     *
     * @return \DateTime
     */
    public function getDateArrivee()
    {
        return $this->dateArrivee;
    }


    /**
     * Get manipe
     *
     * @return \FrequentationBundle\Entity\Manipe
     */
    public function getManipe()
    {
        return $this->manipe;
    }



    /**
     * Set zoneDepart.
     *
     * @param \FrequentationBundle\Entity\ZoneSite|null $zoneDepart
     *
     * @return Mouvement
     */
    public function setZoneDepart(\FrequentationBundle\Entity\ZoneSite $zoneDepart = null)
    {
        $this->zoneDepart = $zoneDepart;

        return $this;
    }

    /**
     * Get zoneDepart.
     *
     * @return \FrequentationBundle\Entity\ZoneSite|null
     */
    public function getZoneDepart()
    {
        return $this->zoneDepart;
    }

    /**
     * Set manipeurMouvement.
     *
     * @param \FrequentationBundle\Entity\User|null $manipeurMouvement
     *
     * @return Mouvement
     */
    public function setManipeurMouvement(\FrequentationBundle\Entity\User $manipeurMouvement = null)
    {
        $this->manipeurMouvement = $manipeurMouvement;

        return $this;
    }

    /**
     * Get manipeurMouvement.
     *
     * @return \FrequentationBundle\Entity\User|null
     */
    public function getManipeurMouvement()
    {
        return $this->manipeurMouvement;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->manipeursMouvement = new \Doctrine\Common\Collections\ArrayCollection();
    }





    /**
     * Add user.
     *
     * @param \FrequentationBundle\Entity\User $user
     *
     * @return Mouvement
     */
    public function addUser(\FrequentationBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user.
     *
     * @param \FrequentationBundle\Entity\User $user
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeUser(\FrequentationBundle\Entity\User $user)
    {
        return $this->users->removeElement($user);
    }

    /**
     * Get users.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set dateDepart.
     *
     * @param \DateTime $dateDepart
     *
     * @return Mouvement
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart.
     *
     * @return \DateTime
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }



    /**
     * Set jourTransit.
     *
     * @param int $jourTransit
     *
     * @return Mouvement
     */
    public function setJourTransit($jourTransit)
    {
        $this->jourTransit = $jourTransit;

        return $this;
    }

    /**
     * Get jourTransit.
     *
     * @return int
     */
    public function getJourTransit()
    {
        return $this->jourTransit;
    }
}
