<?php

namespace OrnithoPinniBundle\Entity\General;

use Doctrine\ORM\Mapping as ORM;

/**
 * Espece
 *
 * @ORM\Table(name="general_espece")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\General\EspeceRepository")
 */
class Espece
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
     * @ORM\Column(name="nom_latin", type="string", length=255, nullable=true)
     */
    private $nomLatin;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_courant", type="string", length=255, nullable=true)
     */
    private $nomCourant;

    /**
     * @var string
     *
     * @ORM\Column(name="groupe", type="string", length=255, nullable=true)
     */
    private $groupe;

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
     * Set nomLatin.
     *
     * @param string $nomLatin
     *
     * @return Espece
     */
    public function setNomLatin($nomLatin)
    {
        $this->nomLatin = $nomLatin;

        return $this;
    }

    /**
     * Get nomLatin.
     *
     * @return string
     */
    public function getNomLatin()
    {
        return $this->nomLatin;
    }

    /**
     * Set groupe.
     *
     * @param string $groupe
     *
     * @return Espece
     */
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * Get groupe.
     *
     * @return string
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * Set nomCourant.
     *
     * @param string $nomCourant
     *
     * @return Espece
     */
    public function setNomCourant($nomCourant)
    {
        $this->nomCourant = $nomCourant;

        return $this;
    }

    /**
     * Get nomCourant.
     *
     * @return string
     */
    public function getNomCourant()
    {
        return $this->nomCourant;
    }

    public function __toString(){
        return $this->getNomCourant();
    }
}
