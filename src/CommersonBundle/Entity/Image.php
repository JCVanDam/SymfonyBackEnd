<?php

namespace CommersonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CommersonBundle\Entity\Traits\myUploadedFile as ImageTrait;
use Symfony\Component\Filesystem\Filesystem;
use CommersonBundle\Resources\config\AllConstants;

/**
* Image
*
* @ORM\Table()
* @ORM\Entity(repositoryClass="CommersonBundle\Repository\ImageRepository")
* @ORM\HasLifecycleCallbacks()
*/
class Image
{

    use ImageTrait;

    /**
    * @var integer
    *
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Observation", inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $observation;

    /**
    * Get id
    *
    * @return integer
    */
    public function getId()
    {
        return $this->id;
    }

    /**
    * Get full path to image
    */
    public function getWebPath()
    {
        $webPath = "uploads/".$this->observation->getCodeObservation()."/".$this->filename;
        return $webPath;
    }


    /**
     * Set observation.
     *
     * @param \CommersonBundle\Entity\Observation $observation
     *
     * @return Image
     */
    public function setObservation(\CommersonBundle\Entity\Observation $observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation.
     *
     * @return \CommersonBundle\Entity\Observation
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * @ORM\PostRemove()
     */
    public function deleteImageOnServer(){
        $fs = new Filesystem();
        $fs->remove($this->getDeletePath());
    }

    public function __toString() {
        return "Image n° ".$this->id;
    }

    public function rename($file, $i){
      if($i!=0){
            return $this->observation->getCodeObservation().' CMD KER  '.'(copie '.$i.')'.$file->getClientOriginalName();
      }else{
            return $this->observation->getCodeObservation().' CMD KER  '.$file->getClientOriginalName();
      }
    }

    public function getUploadRootDir()
    {
        return __DIR__."/../../../web/uploads/".$this->observation->getCodeObservation();
    }

    public function updateImage(){
        $lastname = $this->filename;
        $fs = new Filesystem();
        $endName = explode("KER",$lastname);
        $this->filename = $this->observation->getCodeObservation().' CMD KER'.$endName[1];
        $fs->rename($this->getUploadRootDir().'/'.$lastname, $this->getDeletePath());
    }

    public function isValid($file){
        $EXT = AllConstants::EXT_IMG;
        if(!is_executable($file) && in_array(strtoupper(pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION)), $EXT)){
            return true;
        }
        return false;
    }
}
