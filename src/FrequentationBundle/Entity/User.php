<?php

namespace FrequentationBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="FrequentationBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
      /**
     * @ORM\ManyToMany(targetEntity="FrequentationBundle\Entity\Groupe")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
    * @var string
    *
    * @ORM\Column(name="name", type="string", length=255, nullable=true)
    */
   private $name;

      /**
       * @var string
       *
       * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
       */
      private $first_name;


    /**
     * @ORM\OneToOne(targetEntity="Programme" )
     */
      private $programme;

     /**
     * @ORM\ManyToMany(targetEntity="Mouvement" , mappedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
      private $mouvements;




    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Set name.
     *
     * @param string|null $name
     *
     * @return User
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set programme.
     *
     * @param string|null $programme
     *
     * @return User
     */
    public function setProgramme($programme = null)
    {
        $this->programme = $programme;

        return $this;
    }

    /**
     * Get programme.
     *
     * @return string|null
     */
    public function getProgramme()
    {
        return $this->programme;
    }



    /**
     * Add manipe.
     *
     * @param \FrequentationBundle\Entity\Manipe $manipe
     *
     * @return User
     */
    public function addManipe(\FrequentationBundle\Entity\Manipe $manipe)
    {
        $this->manipe[] = $manipe;

        return $this;
    }

    /**
     * Remove manipe.
     *
     * @param \FrequentationBundle\Entity\Manipe $manipe
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeManipe(\FrequentationBundle\Entity\Manipe $manipe)
    {
        return $this->manipe->removeElement($manipe);
    }

    /**
     * Get manipe.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getManipe()
    {
        return $this->manipe;
    }


    /* Remplir le Username avec Email*/
   public function setEmail($email)
    {
        parent::setEmail($email);
        $this->setUsername($email);
    }




    /**
     * Set mouvement.
     *
     * @param \FrequentationBundle\Entity\Mouvement $mouvement
     *
     * @return User
     */
    public function setMouvement(\FrequentationBundle\Entity\Mouvement $mouvement)
    {
        $this->mouvement = $mouvement;

        return $this;
    }

    /**
     * Get mouvement.
     *
     * @return \FrequentationBundle\Entity\Mouvement
     */
    public function getMouvement()
    {
        return $this->mouvement;
    }

    /**
     * Add mouvement.
     *
     * @param \FrequentationBundle\Entity\Mouvement $mouvement
     *
     * @return User
     */
    public function addMouvement(\FrequentationBundle\Entity\Mouvement $mouvement)
    {
        $this->mouvements[] = $mouvement;

        return $this;
    }

    /**
     * Remove mouvement.
     *
     * @param \FrequentationBundle\Entity\Mouvement $mouvement
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMouvement(\FrequentationBundle\Entity\Mouvement $mouvement)
    {
        return $this->mouvements->removeElement($mouvement);
    }

    /**
     * Get mouvements.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMouvements()
    {
        return $this->mouvements;
    }
}
