<?php

namespace OrnithoPinniBundle\Entity\PC;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vegetation
 *
 * @ORM\Table(name="pc_vegetation")
 * @ORM\Entity(repositoryClass="OrnithoPinniBundle\Repository\PC\VegetationRepository")
 */
class Vegetation
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarque", type="text", nullable=true)
     */
    private $remarque;

    /**
     * @ORM\ManyToOne(targetEntity="Piquet", inversedBy="vegetations")
     */
    private $piquet;

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
     * @param \DateTime $date
     *
     * @return Vegetation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set remarque.
     *
     * @param string|null $remarque
     *
     * @return Vegetation
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
     * Set piquet.
     *
     * @param \OrnithoPinniBundle\Entity\PC\Piquet|null $piquet
     *
     * @return Vegetation
     */
    public function setPiquet(\OrnithoPinniBundle\Entity\PC\Piquet $piquet = null)
    {
        $this->piquet = $piquet;

        return $this;
    }

    /**
     * Get piquet.
     *
     * @return \OrnithoPinniBundle\Entity\PC\Piquet|null
     */
    public function getPiquet()
    {
        return $this->piquet;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Vegetation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
