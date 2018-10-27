<?php

namespace CommersonBundle\Entity\Traits;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use CommersonBundle\Entity\ImageEntity;
use CommersonBundle\Entity\FileEntity;
use Symfony\Component\Filesystem\Filesystem;

use InvalidArgumentException;

trait myUploadedFile
{
    /**
    * @ORM\Column(name="filename", type="string")
    */
    protected $filename;

    protected $file;

    /**
    * @return mixed
    */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
    * @param mixed $filename
    */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
    * @return mixed
    */
    public function getFile()
    {
        return $this->file;
    }

    /**
    * Set file for upload
    *
    * @param $file
    */
    public function setFile($file)
    {
        if($this->isValid($file)==false){
            throw new InvalidArgumentException("Nous n'acceptons pas ce type de fichier");
        }
        $fileSystem = new Filesystem();
        $fileName = $this->rename($file, 0);
        $i = 1;
        while($fileSystem->exists($this->getUploadRootDir().'/'.$fileName)){
            $fileName = $this->rename($file, $i);
            $i++;
        }

        if(!is_null($this->filename)){
            unlink($this->getUploadRootDir().'/'.$this->filename);
        }

        $this->file = $file;
        $file->move($this->getUploadRootDir(), $fileName);

        $this->filename = $fileName;
        $this->file = null;
    }

    /**
    * Get id
    *
    * @return integer
    */
    public function getId()
    {
        return $this->id;
    }

    public function getDeletePath(){
        return $this->getUploadRootDir()."/".$this->filename;
    }

    public function getTwigPath(){
        return "http://127.0.0.1:8000/".$this->getWebPath();
    }
}
