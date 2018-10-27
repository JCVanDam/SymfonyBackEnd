<?php

namespace FrequentationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Programme
 *
 * @ORM\Table(name="programme")
 * @ORM\Entity(repositoryClass="FrequentationBundle\Repository\ProgrammeRepository")
 */
class Programme
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
     * @ORM\Column(name="codeProgramme", type="string", length=30, unique=true)
     */
    private $codeProgramme;

    /**
     * @var string
     *
     * @ORM\Column(name="nomProgramme", type="string", length=100, unique=true)
     */
    private $nomProgramme;

    // /**
    //  * @ORM\OneToMany(targetEntity="Autorisation", mappedBy="programme" )
    //  */
    //  private $autorisations;

      /**
     * @ORM\ManyToMany(targetEntity="User")
     */
     private $users;

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
     * Set codeProgramme.
     *
     * @param string $codeProgramme
     *
     * @return Programme
     */
    public function setCodeProgramme($codeProgramme)
    {
        $this->codeProgramme = $codeProgramme;

        return $this;
    }

    /**
     * Get codeProgramme.
     *
     * @return string
     */
    public function getCodeProgramme()
    {
        return $this->codeProgramme;
    }

    /**
     * Set nomProgramme.
     *
     * @param string $nomProgramme
     *
     * @return Programme
     */
    public function setNomProgramme($nomProgramme)
    {
        $this->nomProgramme = $nomProgramme;

        return $this;
    }

    /**
     * Get nomProgramme.
     *
     * @return string
     */
    public function getNomProgramme()
    {
        return $this->nomProgramme;
    }

    public function __toString() {
         return $this->getNomProgramme();
   }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->autorisations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    // /**
    //  * Add autorisation.
    //  *
    //  * @param \FrequentationBundle\Entity\autorisation $autorisation
    //  *
    //  * @return Programme
    //  */
    // public function addAutorisation(\FrequentationBundle\Entity\autorisation $autorisation)
    // {
    //     $this->autorisations[] = $autorisation;
    //
    //     return $this;
    // }
    //
    // /**
    //  * Remove autorisation.
    //  *
    //  * @param \FrequentationBundle\Entity\autorisation $autorisation
    //  *
    //  * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
    //  */
    // public function removeAutorisation(\FrequentationBundle\Entity\autorisation $autorisation)
    // {
    //     return $this->autorisations->removeElement($autorisation);
    // }

    /**
     * Get autorisations.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAutorisations()
    {
        return $this->autorisations;
    }

    /**
     * Add user.
     *
     * @param \FrequentationBundle\Entity\User $user
     *
     * @return Programme
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
}
