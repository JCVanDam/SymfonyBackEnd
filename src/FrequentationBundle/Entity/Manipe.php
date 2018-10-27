<?php

namespace FrequentationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;



/**
 * Manipe
 * @ORM\Table(name="manipe")
 * @ORM\Entity(repositoryClass="FrequentationBundle\Repository\ManipeRepository")
 */
class Manipe
{
    public function __construct()
    {
     $this->mouvements =  new ArrayCollection();


    }

   /**
   * @ORM\OneToMany(targetEntity="Mouvement", mappedBy="manipe" , orphanRemoval=true, cascade={"all"})
   * @ORM\JoinColumn(name="id", referencedColumnName="manipe_id" )
   */
    public $mouvements;


    public function addMouvement(Mouvement $mouvement)
    {
       $this->mouvements[] = $mouvement;
       $mouvement->setManipe($this);
    }

    public function removeMouvement(Mouvement $mouvement)
    {
        $this->mouvements->removeElement($mouvement);
    }

    public function getMouvements()
    {

        return $this->mouvements;
    }

   /**
   * @ORM\ManyToMany(targetEntity="User")
   */
    public $users;





    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=120, unique=true)
     */
    private $nomManipe;

    /**
     * @ORM\ManyToOne(targetEntity="User" )
     */
    private $chefManipe;


    /**
     * @ORM\ManyToMany(targetEntity="Programme")
     */
    private $programme;



    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255, )
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire_resnat", type="text", nullable=true)
     */
    private $commentaireResnat;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Manipe
     */
    public function setNomManipe($nomManipe)
    {
        $this->nomManipe =$nomManipe;
        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNomManipe()
    {
        return $this->nomManipe;
    }



    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Manipe
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Manipe
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set commentaireResnat
     *
     * @param string $commentaireResnat
     *
     * @return Manipe
     */
    public function setCommentaireResnat($commentaireResnat)
    {
        $this->commentaireResnat = $commentaireResnat;

        return $this;
    }

    /**
     * Get commentaireResnat
     *
     * @return string
     */
    public function getCommentaireResnat()
    {
        return $this->commentaireResnat;
    }



    /**
     * Add user.
     *
     * @param \FrequentationBundle\Entity\User $user
     *
     * @return Manipe
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
     * Set chefManipe.
     *
     * @param \FrequentationBundle\Entity\User|null $chefManipe
     *
     * @return Manipe
     */
    public function setChefManipe(\FrequentationBundle\Entity\User $chefManipe = null)
    {
        $this->chefManipe = $chefManipe;

        return $this;
    }

    /**
     * Get chefManipe.
     *
     * @return \FrequentationBundle\Entity\User|null
     */
    public function getChefManipe()
    {
        return $this->chefManipe;
    }





    /**
     * Set programme.
     *
     * @param \FrequentationBundle\Entity\Programme|null $programme
     *
     * @return Manipe
     */
    public function setProgramme(\FrequentationBundle\Entity\Programme $programme = null)
    {
        $this->programme = $programme;

        return $this;
    }

    /**
     * Get programme.
     *
     * @return \FrequentationBundle\Entity\Programme|null
     */
    public function getProgramme()
    {
        return $this->programme;
    }

    /**
     * Add programme.
     *
     * @param \FrequentationBundle\Entity\Programme $programme
     *
     * @return Manipe
     */
    public function addProgramme(\FrequentationBundle\Entity\Programme $programme)
    {
        $this->programme[] = $programme;

        return $this;
    }

    /**
     * Remove programme.
     *
     * @param \FrequentationBundle\Entity\Programme $programme
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeProgramme(\FrequentationBundle\Entity\Programme $programme)
    {
        return $this->programme->removeElement($programme);
    }

}
