<?php

namespace CommersonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MyUser
 *
 * @ORM\Table(name="my_user")
 * @ORM\Entity(repositoryClass="CommersonBundle\Repository\MyUserRepository")
 */
class MyUser
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code", type="string", length=4, unique=true)
     */
    private $code;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="programme", type="string", length=255, nullable=true)
     */
    private $programme;


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
     * Set nom.
     *
     * @param string $nom
     *
     * @return MyUser
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom.
     *
     * @param string $prenom
     *
     * @return MyUser
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom.
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set code.
     *
     * @param string|null $code
     *
     * @return MyUser
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
     * Set email.
     *
     * @param string|null $email
     *
     * @return MyUser
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set programme.
     *
     * @param string|null $programme
     *
     * @return MyUser
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

    public function __toString() {
        if($this->nom==null || $this->prenom==null){
            return "User. ". $this->id;
        }
        return $this->nom." ".$this->prenom;
    }
}
