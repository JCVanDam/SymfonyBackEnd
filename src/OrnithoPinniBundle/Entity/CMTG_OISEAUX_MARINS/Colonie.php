<?php

namespace OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Colonie
 *
 * @ORM\Table(name="cmtg_oiseaux_marins_colonie")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_OISEAUX_MARINS\ColonieRepository")
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\General\Position_GPS", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="general_position_gps_releve_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $releve;

    /**
     * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\General\Espece")
     * @Assert\Valid
     */
    private $espece;

    /**
     * @ORM\ManyToOne(targetEntity="OrnithoPinniBundle\Entity\Localisation\Site")
     * @Assert\Valid
     */
    private $site;

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
     * Set date.
     *
     * @param \DateTime|null $date
     *
     * @return Colonie
     */
    public function setDate($date = null)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime|null
     */
    public function getDate()
    {
        return $this->date;
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

    /**
     * Set site.
     *
     * @param \OrnithoPinniBundle\Entity\Localisation\Site|null $site
     *
     * @return Colonie
     */
    public function setSite(\OrnithoPinniBundle\Entity\Localisation\Site $site = null)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site.
     *
     * @return \OrnithoPinniBundle\Entity\Localisation\Site|null
     */
    public function getSite()
    {
        return $this->site;
    }

    public function __toString(){
        if($this->date!=null && $this->releve!=null){
            return $this->id."_".$this->site."_".$this->espece."_".$this->releve->getIdPtGps()."_".$this->date->format('Y');
        }else{
            return "Colonie n°".$this->id;
        }
    }
}
