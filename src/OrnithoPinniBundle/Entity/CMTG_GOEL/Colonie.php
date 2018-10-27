<?php

namespace OrnithoPinniBundle\Entity\CMTG_GOEL;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Colonie
 *
 * @ORM\Table(name="cmtg_goel_colonie")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_GOEL\ColonieRepository")
 */
class Colonie
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
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\General\Position_GPS", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="general_position_gps_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $releve;

    /**
     * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\General\Espece")
     * @Assert\Valid
     */
    private $espece;

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
     * @return Colonie
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
     * Set releve.
     *
     * @param \OrnithoPinniBundle\Entity\General\Position_GPS $releve
     *
     * @return Colonie
     */
    public function setReleve(\OrnithoPinniBundle\Entity\General\Position_GPS $releve)
    {
        $this->releve = $releve;

        return $this;
    }

    /**
     * Get releve.
     *
     * @return \OrnithoPinniBundle\Entity\General\Position_GPS
     */
    public function getReleve()
    {
        return $this->releve;
    }

    /**
     * Set espece.
     *
     * @param \OrnithoPinniBundle\Entity\General\Espece|null $espece
     *
     * @return Colonie
     */
    public function setEspece(\OrnithoPinniBundle\Entity\General\Espece $espece = null)
    {
        $this->espece = $espece;

        return $this;
    }

    /**
     * Get espece.
     *
     * @return \OrnithoPinniBundle\Entity\General\Espece|null
     */
    public function getEspece()
    {
        return $this->espece;
    }

    public function __toString(){
        return "Colonie (".$this->id.") - ".$this->nom;
    }
}
