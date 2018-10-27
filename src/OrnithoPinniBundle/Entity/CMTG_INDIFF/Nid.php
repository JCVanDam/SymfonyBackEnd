<?php

namespace OrnithoPinniBundle\Entity\CMTG_INDIFF;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nid
 *
 * @ORM\Table(name="cmtg_indiff_nid")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\CMTG_INDIFF\NidRepository")
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
     * @var int|null
     *
     * @ORM\Column(name="nb_oeufs", type="smallint", nullable=true)
     */
    private $nbOeufs;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nb_poussins", type="smallint", nullable=true)
     */
    private $nbPoussins;

    /**
     * @ORM\ManyToOne(targetEntity="ProtocolePrecis", inversedBy="nids")
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
     * Set nbOeufs.
     *
     * @param int|null $nbOeufs
     *
     * @return Nid
     */
    public function setNbOeufs($nbOeufs = null)
    {
        $this->nbOeufs = $nbOeufs;

        return $this;
    }

    /**
     * Get nbOeufs.
     *
     * @return int|null
     */
    public function getNbOeufs()
    {
        return $this->nbOeufs;
    }

    /**
     * Set nbPoussins.
     *
     * @param int|null $nbPoussins
     *
     * @return Nid
     */
    public function setNbPoussins($nbPoussins = null)
    {
        $this->nbPoussins = $nbPoussins;

        return $this;
    }

    /**
     * Get nbPoussins.
     *
     * @return int|null
     */
    public function getNbPoussins()
    {
        return $this->nbPoussins;
    }

    /**
     * Set protocole.
     *
     * @param \OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocolePrecis|null $protocole
     *
     * @return Nid
     */
    public function setProtocole(\OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocolePrecis $protocole = null)
    {
        $this->protocole = $protocole;

        return $this;
    }

    /**
     * Get protocole.
     *
     * @return \OrnithoPinniBundle\Entity\CMTG_INDIFF\ProtocolePrecis|null
     */
    public function getProtocole()
    {
        return $this->protocole;
    }


    public function __toString(){
        return "Nid n°".$this->id;
    }
}
