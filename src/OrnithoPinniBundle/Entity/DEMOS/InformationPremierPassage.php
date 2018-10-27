<?php

namespace OrnithoPinniBundle\Entity\DEMOS;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * InformationPremierPassage
 *
 * @ORM\Table(name="demos_information_premier_passage")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\DEMOS\InformationPremierPassageRepository")
 */
class InformationPremierPassage
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
     * @ORM\Column(name="indiceOccupation01", type="string", length=255)
     */
    private $indiceOccupation01;

    /**
     * @var string|null
     *
     * @ORM\Column(name="indiceOccupation02", type="string", length=255, nullable=true)
     */
    private $indiceOccupation02;

    /**
     * @var string|null
     *
     * @ORM\Column(name="indiceOccupation03", type="string", length=255, nullable=true)
     */
    private $indiceOccupation03;

    /**
     * @var string
     *
     * @ORM\Column(name="reponseRepasse", type="string", length=255)
     */
    private $reponseRepasse;


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
     * Set indiceOccupation01.
     *
     * @param string $indiceOccupation01
     *
     * @return InformationPremierPassage
     */
    public function setIndiceOccupation01($indiceOccupation01)
    {
        $this->indiceOccupation01 = $indiceOccupation01;

        return $this;
    }

    /**
     * Get indiceOccupation01.
     *
     * @return string
     */
    public function getIndiceOccupation01()
    {
        return $this->indiceOccupation01;
    }

    /**
     * Set indiceOccupation02.
     *
     * @param string|null $indiceOccupation02
     *
     * @return InformationPremierPassage
     */
    public function setIndiceOccupation02($indiceOccupation02 = null)
    {
        $this->indiceOccupation02 = $indiceOccupation02;

        return $this;
    }

    /**
     * Get indiceOccupation02.
     *
     * @return string|null
     */
    public function getIndiceOccupation02()
    {
        return $this->indiceOccupation02;
    }

    /**
     * Set indiceOccupation03.
     *
     * @param string|null $indiceOccupation03
     *
     * @return InformationPremierPassage
     */
    public function setIndiceOccupation03($indiceOccupation03 = null)
    {
        $this->indiceOccupation03 = $indiceOccupation03;

        return $this;
    }

    /**
     * Get indiceOccupation03.
     *
     * @return string|null
     */
    public function getIndiceOccupation03()
    {
        return $this->indiceOccupation03;
    }

    /**
     * Set reponseRepasse.
     *
     * @param string $reponseRepasse
     *
     * @return InformationPremierPassage
     */
    public function setReponseRepasse($reponseRepasse)
    {
        $this->reponseRepasse = $reponseRepasse;

        return $this;
    }

    /**
     * Get reponseRepasse.
     *
     * @return string
     */
    public function getReponseRepasse()
    {
        return $this->reponseRepasse;
    }

    public function __toString(){
        return "InformationPremierPassage n°".$this->id;
    }
}
