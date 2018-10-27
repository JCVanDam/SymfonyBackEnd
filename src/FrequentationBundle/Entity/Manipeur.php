<?php

namespace FrequentationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Manipeur
 *
 * @ORM\Table(name="manipeur")
 * @ORM\Entity(repositoryClass="FrequentationBundle\Repository\ManipeurRepository")
 */
class Manipeur
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
   * @ORM\ManyToOne(targetEntity="Manipe",inversedBy="manipeurs")
   * @ORM\JoinColumn(nullable=false)
   */
    private $manipe;



    /**
   * @ORM\ManyToOne(targetEntity="User" )
   * @ORM\JoinColumn(nullable=false)
   */
    private $users;





    /**
     * @var bool
     *
     * @ORM\Column(name="statut", type="boolean")
     */
    private $statut;


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
     * Set statut.
     *
     * @param bool $statut
     *
     * @return Manipeur
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut.
     *
     * @return bool
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set manipe.
     *
     * @param \FrequentationBundle\Entity\Manipe|null $manipe
     *
     * @return Manipeur
     */
    public function setManipe(\FrequentationBundle\Entity\Manipe $manipe = null)
    {
        $this->manipe = $manipe;

        return $this;
    }

    /**
     * Get manipe.
     *
     * @return \FrequentationBundle\Entity\Manipe|null
     */
    public function getManipe()
    {
        return $this->manipe;
    }



    /**
     * Set users.
     *
     * @param \FrequentationBundle\Entity\User $users
     *
     * @return Manipeur
     */
    public function setUsers(\FrequentationBundle\Entity\User $users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users.
     *
     * @return \FrequentationBundle\Entity\User
     */
    public function getUsers()
    {
        return $this->users;
    }
}
