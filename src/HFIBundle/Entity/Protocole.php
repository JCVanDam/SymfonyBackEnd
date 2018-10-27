<?php

namespace HFIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Protocole
 *
 * @ORM\Table(name="protocole")
 * @ORM\Entity(repositoryClass="HFIBundle\Repository\ProtocoleRepository")
 */
class Protocole
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
     * @ORM\Column(name="protocole", type="string", length=100, nullable=true)
     */
    private $protocole;

    /**
     * @var string|null
     *
     * @ORM\Column(name="activite", type="string", length=100, nullable=true)
     */
    private $activite;


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
     * Set protocole.
     *
     * @param string|null $protocole
     *
     * @return Protocole
     */
    public function setProtocole($protocole = null)
    {
        $this->protocole = $protocole;

        return $this;
    }

    /**
     * Get protocole.
     *
     * @return string|null
     */
    public function getProtocole()
    {
        return $this->protocole;
    }

    /**
     * Set activite.
     *
     * @param string|null $activite
     *
     * @return Protocole
     */
    public function setActivite($activite = null)
    {
        $this->activite = $activite;

        return $this;
    }

    /**
     * Get activite.
     *
     * @return string|null
     */
    public function getActivite()
    {
        return $this->activite;
    }
}
