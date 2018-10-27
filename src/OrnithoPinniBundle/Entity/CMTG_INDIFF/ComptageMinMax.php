<?php

namespace OrnithoPinniBundle\Entity\CMTG_INDIFF;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComptageMinMax
 *
 * @ORM\Table(name="cmtg_indiff_comptage_min_max")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_INDIFF\ComptageMinMaxRepository")
 */
class ComptageMinMax
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
     * @var int
     *
     * @ORM\Column(name="minimum", type="smallint")
     */
    private $minimum;

    /**
     * @var int
     *
     * @ORM\Column(name="maximum", type="smallint")
     */
    private $maximum;

    /**
     * @var string
     *
     * @ORM\Column(name="type_effectif", type="string", length=255)
     */
    private $typeEffectif;

    /**
     * @ORM\ManyToOne(targetEntity="ProtocoleMinMax", inversedBy="comptages")
     */
    private $protocole;

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
     * Set minimum.
     *
     * @param int $minimum
     *
     * @return ComptageMinMax
     */
    public function setMinimum($minimum)
    {
        $this->minimum = $minimum;

        return $this;
    }

    /**
     * Get minimum.
     *
     * @return int
     */
    public function getMinimum()
    {
        return $this->minimum;
    }

    /**
     * Set maximum.
     *
     * @param int $maximum
     *
     * @return ComptageMinMax
     */
    public function setMaximum($maximum)
    {
        $this->maximum = $maximum;

        return $this;
    }

    /**
     * Get maximum.
     *
     * @return int
     */
    public function getMaximum()
    {
        return $this->maximum;
    }

    /**
     * Set typeEffectif.
     *
     * @param string $typeEffectif
     *
     * @return ComptageMinMax
     */
    public function setTypeEffectif($typeEffectif)
    {
        $this->typeEffectif = $typeEffectif;

        return $this;
    }

    /**
     * Get typeEffectif.
     *
     * @return string
     */
    public function getTypeEffectif()
    {
        return $this->typeEffectif;
    }

    /**
     * Set protocole.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocoleMinMax|null $protocole
     *
     * @return ComptageMinMax
     */
    public function setProtocole(\OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocoleMinMax $protocole = null)
    {
        $this->protocole = $protocole;

        return $this;
    }

    /**
     * Get protocole.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocoleMinMax|null
     */
    public function getProtocole()
    {
        return $this->protocole;
    }

    public function __toString(){
        return "ComptageMinMax n°".$this->id;
    }
}
