<?php

namespace OrnithoPinniBundle\Entity\CMTG_GOEL;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Nid
 *
 * @ORM\Table(name="cmtg_goel_nid")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_GOEL\NidRepository")
 */
class Nid
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
     * @var bool|null
     *
     * @ORM\Column(name="nidVide", type="boolean", nullable=true)
     */
    private $nidVide;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPoussins", type="integer")
     */
    private $nbPoussins;

    /**
     * @var int
     *
     * @ORM\Column(name="nbOeufs", type="integer")
     */
    private $nbOeufs;

    /**
     * @ORM\ManyToOne(targetEntity="PassageSurColonie", inversedBy="nids")
     */
    private $passage;

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
     * Set nidVide.
     *
     * @param bool|null $nidVide
     *
     * @return Nid
     */
    public function setNidVide($nidVide = null)
    {
        $this->nidVide = $nidVide;

        return $this;
    }

    /**
     * Get nidVide.
     *
     * @return bool|null
     */
    public function getNidVide()
    {
        return $this->nidVide;
    }

    /**
     * Set nbPoussins.
     *
     * @param int $nbPoussins
     *
     * @return Nid
     */
    public function setNbPoussins($nbPoussins)
    {
        $this->nbPoussins = $nbPoussins;

        return $this;
    }

    /**
     * Get nbPoussins.
     *
     * @return int
     */
    public function getNbPoussins()
    {
        return $this->nbPoussins;
    }

    /**
     * Set nbOeufs.
     *
     * @param int $nbOeufs
     *
     * @return Nid
     */
    public function setNbOeufs($nbOeufs)
    {
        $this->nbOeufs = $nbOeufs;

        return $this;
    }

    /**
     * Get nbOeufs.
     *
     * @return int
     */
    public function getNbOeufs()
    {
        return $this->nbOeufs;
    }

    /**
     * Set passage.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_GOEL\PassageSurColonie|null $passage
     *
     * @return Nid
     */
    public function setPassage(\OrnithoPinniBundle\Entity\CMTG_GOEL\PassageSurColonie $passage = null)
    {
        $this->passage = $passage;

        return $this;
    }

    /**
     * Get passage.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_GOEL\PassageSurColonie|null
     */
    public function getPassage()
    {
        return $this->passage;
    }

    public function __toString(){
        return "Nid n°".$this->id;
    }
}
