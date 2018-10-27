<?php

namespace OrnithoPinniBundle\Entity\SREP;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Colonie
 *
 * @ORM\Table(name="srep_colonie")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\SREP\ColonieRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @var string|null
     *
     * @ORM\Column(name="code_colonie", type="string", length=255, nullable=true)
     */
    private $codeColonie;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numero_colonie", type="integer", nullable=false)
     */
    private $numeroColonie;

    /**
     * @ORM\OneToOne(targetEntity="OrnithoPinniBundle\Entity\General\Position_GPS", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="general_position_gps_id", referencedColumnName="id", nullable=false)
     * @Assert\Valid
     */
    private $releve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_premier_releve", type="date", nullable=false)
     */
    private $datePremierReleve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_dernier_releve", type="date", nullable=true)
     */
    private $dateDernierReleve;

    public function __toString(){
        return "".$this->getCodeColonie();
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist(){
        $this->setCodeColonie($this->numeroColonie."_".$this->site."_".$this->espece."_".$this->releve->getIdPtGps()."_".$this->releve->getDate()->format('Y'));
        $this->setDatePremierReleve($this->getReleve()->getDate());
        $this->setDateDernierReleve($this->getReleve()->getDate());
    }

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
     * Set codeColonie.
     *
     * @param string|null $codeColonie
     *
     * @return Colonie
     */
    public function setCodeColonie($codeColonie = null)
    {
        $this->codeColonie = $codeColonie;

        return $this;
    }

    /**
     * Get codeColonie.
     *
     * @return string|null
     */
    public function getCodeColonie()
    {
        return $this->codeColonie;
    }

    /**
     * Set datePremierReleve.
     *
     * @param \DateTime $datePremierReleve
     *
     * @return Colonie
     */
    public function setDatePremierReleve($datePremierReleve)
    {
        $this->datePremierReleve = $datePremierReleve;

        return $this;
    }

    /**
     * Get datePremierReleve.
     *
     * @return \DateTime
     */
    public function getDatePremierReleve()
    {
        return $this->datePremierReleve;
    }

    /**
     * Set dateDernierReleve.
     *
     * @param \DateTime|null $dateDernierReleve
     *
     * @return Colonie
     */
    public function setDateDernierReleve($dateDernierReleve = null)
    {
        $this->dateDernierReleve = $dateDernierReleve;

        return $this;
    }

    /**
     * Get dateDernierReleve.
     *
     * @return \DateTime|null
     */
    public function getDateDernierReleve()
    {
        return $this->dateDernierReleve;
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

    /**
     * Set releve.
     *
     * @param \OrnithoPinniBundle\Entity\General\Position_GPS $releve
     *
     * @return Colonie
     */
    public function setReleve(\OrnithoPinniBundle\Entity\General\Position_GPS $releve)
    {
        if($this->releve==null){
            $this->releve = $releve;
        }else{
            $this->releve->init($releve);
        }
        $this->setDateDernierReleve($releve->getDate());
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
     * Set numeroColonie.
     *
     * @param int $numeroColonie
     *
     * @return Colonie
     */
    public function setNumeroColonie($numeroColonie)
    {
        $this->numeroColonie = $numeroColonie;

        return $this;
    }

    /**
     * Get numeroColonie.
     *
     * @return int
     */
    public function getNumeroColonie()
    {
        return $this->numeroColonie;
    }
}
