<?php

namespace CommersonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CommersonBundle\Entity\Traits\myUploadedFile as FileTrait;
use Symfony\Component\Filesystem\Filesystem;
use CommersonBundle\Resources\config\AllConstants;

/**
* File
*
* @ORM\Table()
* @ORM\Entity(repositoryClass="CommersonBundle\Repository\FileRepository")
* @ORM\HasLifecycleCallbacks()
*/
class File
{
    use FileTrait;

    /**
    * @var integer
    *
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Sortie", inversedBy="gpx_files")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sortie;

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
    * Get full path to file
    */
    public function getWebPath()
    {
        $webPath = "uploads/".$this->sortie->getCodeSortie()."/".$this->filename;
        return $webPath;
    }


    /**
     * Set sortie.
     *
     * @param \CommersonBundle\Entity\Sortie $sortie
     *
     * @return File
     */
    public function setSortie(\CommersonBundle\Entity\Sortie $sortie)
    {
        $this->sortie = $sortie;

        return $this;
    }

    /**
     * Get sortie.
     *
     * @return \CommersonBundle\Entity\Sortie
     */
    public function getSortie()
    {
        return $this->sortie;
    }

    public function rename($file, $i){
        if($i!=0){
              return '(copie '.$i.')'.$file->getClientOriginalName();
        }else{
              return $file->getClientOriginalName();
        }
    }

    public function getUploadRootDir()
    {
        return __DIR__."/../../../web/uploads/".$this->sortie->getCodeSortie()."    TRACE";
    }

    public function __toString() {
        return "".$this->filename;
    }

    public function isValid($file){
        $EXT = AllConstants::EXT_GPS;
        if(!is_executable($file) && in_array(strtoupper(pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION)), $EXT)){
            return true;
        }
        return false;
    }
}
