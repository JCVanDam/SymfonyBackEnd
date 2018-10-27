<?php

namespace OrnithoPinniBundle\Entity\CMTG_INDIFF;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProtocoleClasse
 *
 * @ORM\Table(name="cmtg_indiff_protocole_classe")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_INDIFF\ProtocoleClasseRepository")
 */
class ProtocoleClasse
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
     * @ORM\Column(name="classe", type="string", length=255)
     */
    private $classe;

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
     * Set classe.
     *
     * @param string $classe
     *
     * @return ProtocoleClasse
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe.
     *
     * @return string
     */
    public function getClasse()
    {
        return $this->classe;
    }

    public function __toString(){
        return "Classe(".$this->id.")";
    }
}
