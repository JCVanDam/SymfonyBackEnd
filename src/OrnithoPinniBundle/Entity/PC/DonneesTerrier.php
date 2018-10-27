<?php

namespace OrnithoPinniBundle\Entity\PC;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Observation
 *
 * @ORM\Table(name="pc_donnees_terrier")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\PC\DonneesTerrierRepository")
 */
class DonneesTerrier
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
     * @var string|null
     *
     * @ORM\Column(name="indiceOccupation01", type="string", length=255, nullable=true)
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
     * @var string
     *
     * @ORM\Column(name="occupationTerrier", type="string", length=255)
     */
    private $occupationTerrier;

    /**
     * @var string
     *
     * @ORM\Column(name="verifOeuf", type="string", length=255)
     */
    private $verifOeuf;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarque", type="text", nullable=true)
     */
    private $remarque;

    /**
     * @ORM\ManyToOne(targetEntity="PointComptageTransect", inversedBy="observations")
     */
    private $pointComptageTransect;

    /**
     * @ORM\ManyToOne(targetEntity="PointComptagePermanent", inversedBy="observations")
     */
    private $pointComptagePermanent;

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
     * Set indiceOccupation01.
     *
     * @param string|null $indiceOccupation01
     *
     * @return DonneesTerrier
     */
    public function setIndiceOccupation01($indiceOccupation01 = null)
    {
        $this->indiceOccupation01 = $indiceOccupation01;

        return $this;
    }

    /**
     * Get indiceOccupation01.
     *
     * @return string|null
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
     * @return DonneesTerrier
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
     * @return DonneesTerrier
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
     * @return DonneesTerrier
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

    /**
     * Set occupationTerrier.
     *
     * @param string $occupationTerrier
     *
     * @return DonneesTerrier
     */
    public function setOccupationTerrier($occupationTerrier)
    {
        $this->occupationTerrier = $occupationTerrier;

        return $this;
    }

    /**
     * Get occupationTerrier.
     *
     * @return string
     */
    public function getOccupationTerrier()
    {
        return $this->occupationTerrier;
    }

    /**
     * Set verifOeuf.
     *
     * @param string $verifOeuf
     *
     * @return DonneesTerrier
     */
    public function setVerifOeuf($verifOeuf)
    {
        $this->verifOeuf = $verifOeuf;

        return $this;
    }

    /**
     * Get verifOeuf.
     *
     * @return string
     */
    public function getVerifOeuf()
    {
        return $this->verifOeuf;
    }

    /**
     * Set remarque.
     *
     * @param string|null $remarque
     *
     * @return DonneesTerrier
     */
    public function setRemarque($remarque = null)
    {
        $this->remarque = $remarque;

        return $this;
    }

    /**
     * Get remarque.
     *
     * @return string|null
     */
    public function getRemarque()
    {
        return $this->remarque;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->observateurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set pointComptageTransect.
     *
     * @param \OrnithoPinniBundle\Entity\PC\PointComptageTransect|null $pointComptageTransect
     *
     * @return DonneesTerrier
     */
    public function setPointComptageTransect(\OrnithoPinniBundle\Entity\PC\PointComptageTransect $pointComptageTransect = null)
    {
        $this->pointComptageTransect = $pointComptageTransect;

        return $this;
    }

    /**
     * Get pointComptageTransect.
     *
     * @return \OrnithoPinniBundle\Entity\PC\PointComptageTransect|null
     */
    public function getPointComptageTransect()
    {
        return $this->pointComptageTransect;
    }

    /**
     * Set pointComptagePermanent.
     *
     * @param \OrnithoPinniBundle\Entity\PC\PointComptagePermanent|null $pointComptagePermanent
     *
     * @return DonneesTerrier
     */
    public function setPointComptagePermanent(\OrnithoPinniBundle\Entity\PC\PointComptagePermanent $pointComptagePermanent = null)
    {
        $this->pointComptagePermanent = $pointComptagePermanent;

        return $this;
    }

    /**
     * Get pointComptagePermanent.
     *
     * @return \OrnithoPinniBundle\Entity\PC\PointComptagePermanent|null
     */
    public function getPointComptagePermanent()
    {
        return $this->pointComptagePermanent;
    }

    /**
     * Set espece.
     *
     * @param \OrnithoPinniBundle\Entity\General\Espece|null $espece
     *
     * @return DonneesTerrier
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
        return "Observation n°".$this->id;
    }
}
