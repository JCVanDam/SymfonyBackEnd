<?php

namespace CommersonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Observation
 *
 * @ORM\Table(name="observation")
 * @ORM\Entity(repositoryClass="CommersonBundle\Repository\ObservationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Observation
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
     * @ORM\Column(name="code_observation", type="string", length=255, unique=true)
     */
    private $codeObservation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarque_comportement", type="text", nullable=true)
     */
    private $remarqueComportement;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_min", type="integer")
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Merci de saisir un nombre supérieur à {{ limit }}"
     * )
     */
    private $nombreMin;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_max", type="integer")
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Merci de saisir un nombre supérieur à {{ limit }}"
     * )
     */
    private $nombreMax;

    /**
     * @var bool
     *
     * @ORM\Column(name="photo_oui_non", type="boolean")
     */
    private $photoOuiNon;

    /**
     * @var string
     *
     * @ORM\Column(name="comportement_approche", type="string", length=255)
     */
    private $comportementApproche;

    /**
     * @ORM\OneToOne(targetEntity="CommersonBundle\Entity\Localisation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $localisation;

    /**
     * @ORM\OneToMany(targetEntity="Biopsie", mappedBy="observation", cascade={"persist", "remove"})
     */
    private $biopsies;

    /**
     * @ORM\ManyToOne(targetEntity="Sortie", inversedBy="observations")
     */
    private $sortie;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="observation", cascade={"persist", "remove"})
     */
    private $images;

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
     * Set codeObservation.
     *
     * @param string $codeObservation
     *
     * @return Observation
     */
    public function setCodeObservation($codeObservation)
    {
        $this->codeObservation = $codeObservation;

        return $this;
    }

    /**
     * Get codeObservation.
     *
     * @return string
     */
    public function getCodeObservation()
    {
        return $this->codeObservation;
    }

    /**
     * Set remarqueComportement.
     *
     * @param string|null $remarqueComportement
     *
     * @return Observation
     */
    public function setRemarqueComportement($remarqueComportement = null)
    {
        $this->remarqueComportement = $remarqueComportement;

        return $this;
    }

    /**
     * Get remarqueComportement.
     *
     * @return string|null
     */
    public function getRemarqueComportement()
    {
        return $this->remarqueComportement;
    }

    /**
     * Set nombreMin.
     *
     * @param int $nombreMin
     *
     * @return Observation
     */
    public function setNombreMin($nombreMin)
    {
        $this->nombreMin = $nombreMin;

        return $this;
    }

    /**
     * Get nombreMin.
     *
     * @return int
     */
    public function getNombreMin()
    {
        return $this->nombreMin;
    }

    /**
     * Set nombreMax.
     *
     * @param int $nombreMax
     *
     * @return Observation
     */
    public function setNombreMax($nombreMax)
    {
        $this->nombreMax = $nombreMax;

        return $this;
    }

    /**
     * Get nombreMax.
     *
     * @return int
     */
    public function getNombreMax()
    {
        return $this->nombreMax;
    }

    /**
     * Set photoOuiNon.
     *
     * @param bool $photoOuiNon
     *
     * @return Observation
     */
    public function setPhotoOuiNon($photoOuiNon)
    {
        $this->photoOuiNon = $photoOuiNon;

        return $this;
    }

    /**
     * Get photoOuiNon.
     *
     * @return bool
     */
    public function getPhotoOuiNon()
    {
        return $this->photoOuiNon;
    }

    /**
     * Set comportementApproche.
     *
     * @param string $comportementApproche
     *
     * @return Observation
     */
    public function setComportementApproche($comportementApproche)
    {
        $this->comportementApproche = $comportementApproche;

        return $this;
    }

    /**
     * Get comportementApproche.
     *
     * @return string
     */
    public function getComportementApproche()
    {
        return $this->comportementApproche;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->biopsies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add biopsy.
     *
     * @param \CommersonBundle\Entity\Biopsie $biopsy
     *
     * @return Observation
     */
    public function addBiopsy(\CommersonBundle\Entity\Biopsie $biopsy)
    {
        $this->biopsies[] = $biopsy;

        $biopsy->setObservation($this);

        return $this;
    }

    /**
     * Remove biopsy.
     *
     * @param \CommersonBundle\Entity\Biopsie $biopsy
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeBiopsy(\CommersonBundle\Entity\Biopsie $biopsy)
    {
        return $this->biopsies->removeElement($biopsy);
    }

    /**
     * Get biopsies.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBiopsies()
    {
        return $this->biopsies;
    }

    /**
     * Set sortie.
     *
     * @param \CommersonBundle\Entity\Sortie|null $sortie
     *
     * @return Observation
     */
    public function setSortie(\CommersonBundle\Entity\Sortie $sortie = null)
    {
        $this->sortie = $sortie;

        return $this;
    }

    /**
     * Get sortie.
     *
     * @return \CommersonBundle\Entity\Sortie|null
     */
    public function getSortie()
    {
        return $this->sortie;
    }

    public function __toString() {
        if($this->codeObservation==null){
            return "Sor. ". $this->id;
        }
        return $this->codeObservation;
    }

    /**
     * Add image.
     *
     * @param \CommersonBundle\Entity\Image $image
     *
     * @return Observation
     */
    public function addImage(\CommersonBundle\Entity\Image $image)
    {
        $this->images[] = $image;
        return $this;
    }

    /**
     * Remove image.
     *
     * @param \CommersonBundle\Entity\Image $image
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeImage(\CommersonBundle\Entity\Image $image)
    {
        return $this->images->removeElement($image);
    }

    /**
     * Get images.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    public function updateObservation(){
        if($this->codeObservation != ($this->sortie->getCodeSortie().substr($this->codeObservation, -6))){
            $lastCode = $this->codeObservation;
            $this->setCodeObservation($this->sortie->getCodeSortie().substr($lastCode, -6));
            $fs = new Filesystem();
            $fs->rename(__DIR__."/../../../web/uploads/".$lastCode, __DIR__."/../../../web/uploads/".$this->codeObservation);
            foreach($this->getImages() as $img){
                $img->updateImage();
            }
        }
    }

    /**
     * @ORM\PostPersist()
     */
    public function createFolder(){
        $fs = new Filesystem();
        $fs->mkdir(__DIR__."/../../../web/uploads/".$this->codeObservation, 0700);
    }

    /**
     * @ORM\PostRemove()
     */
    public function deleteFolder(){
        $fs = new Filesystem();
        $fs->remove(__DIR__."/../../../web/uploads/".$this->codeObservation);
    }

    /**
     * Set localisation.
     *
     * @param \CommersonBundle\Entity\Localisation $localisation
     *
     * @return Observation
     */
    public function setLocalisation(\CommersonBundle\Entity\Localisation $localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation.
     *
     * @return \CommersonBundle\Entity\Localisation
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }
}
