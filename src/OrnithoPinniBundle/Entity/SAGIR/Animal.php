<?php

namespace OrnithoPinniBundle\Entity\SAGIR;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Animal
 *
 * @ORM\Table(name="sagir_animal")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\SAGIR\AnimalRepository")
 */
class Animal
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
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="age", type="string", length=255)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=255)
     */
    private $sexe;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="echantillonCollecte", type="boolean", nullable=true)
     */
    private $echantillonCollecte;

    /**
     * @var string|null
     *
     * @ORM\Column(name="precision", type="text", nullable=true)
     */
    private $precision;

    /**
     * @ORM\ManyToOne(targetEntity="Decouverte", inversedBy="animaux")
     */
    private $decouverte;


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
     * @param string $statut
     *
     * @return Animal
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut.
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set age.
     *
     * @param string $age
     *
     * @return Animal
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age.
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set sexe.
     *
     * @param string $sexe
     *
     * @return Animal
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe.
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set echantillonCollecte.
     *
     * @param bool|null $echantillonCollecte
     *
     * @return Animal
     */
    public function setEchantillonCollecte($echantillonCollecte = null)
    {
        $this->echantillonCollecte = $echantillonCollecte;

        return $this;
    }

    /**
     * Get echantillonCollecte.
     *
     * @return bool|null
     */
    public function getEchantillonCollecte()
    {
        return $this->echantillonCollecte;
    }

    /**
     * Set precision.
     *
     * @param string|null $precision
     *
     * @return Animal
     */
    public function setPrecision($precision = null)
    {
        $this->precision = $precision;

        return $this;
    }

    /**
     * Get precision.
     *
     * @return string|null
     */
    public function getPrecision()
    {
        return $this->precision;
    }


    /**
     * Set decouverte.
     *
     * @param \OrnithoPinniBundle\Entity\SAGIR\Decouverte|null $decouverte
     *
     * @return Animal
     */
    public function setDecouverte(\OrnithoPinniBundle\Entity\SAGIR\Decouverte $decouverte = null)
    {
        $this->decouverte = $decouverte;

        return $this;
    }

    /**
     * Get decouverte.
     *
     * @return \OrnithoPinniBundle\Entity\SAGIR\Decouverte|null
     */
    public function getDecouverte()
    {
        return $this->decouverte;
    }

    public function __toString(){
        return "Animal n°".$this->id;
    }
}
