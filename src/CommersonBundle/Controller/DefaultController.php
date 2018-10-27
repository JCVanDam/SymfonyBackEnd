<?php

namespace CommersonBundle\Controller;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FilesystemIterator;
use CommersonBundle\Resources\config\AllConstants;

class DefaultController extends Controller
{
    private $arrayFileSor = array();
    private $arrayFileObs = array();
    private $arrayFileFil = array();
    private $arrayFileImg = array();
    private $arrayFileOthers = array();


    public function indexAction()
    {
        return $this->render('CommersonBundle:Default:index.html.twig');
    }

    //Parcours en profondeur (fonction récursive)
    //Pas de test sur les extensions...
    public function parcours($files, $parent){
        foreach($files as $file){
            if($file->getType()=="dir"){
                if(substr($file->getPathname(), -5) == "TRACE"){
                    //SORTIE
                    array_push($this->arrayFileSor, $file);
                }
                else if(substr($file->getPathname(), -5, 2) == "P_"){
                    //OBSERVATION
                    array_push($this->arrayFileObs, $file);
                }else{
                    //OTHERS
                    array_push($this->arrayFileOthers, $file);
                }
                $this->parcours(new FilesystemIterator($file->getPathname()), $file->getFilename());
            }else{
                if(substr($parent, -5) == "TRACE" && in_array(strtoupper($file->getExtension()), AllConstants::EXT_GPS)){
                    //PISTE OU WAYPOINT
                    array_push($this->arrayFileFil, $file);
                }
                else if(substr($parent, -5, 2) == "P_" && in_array(strtoupper($file->getExtension()), AllConstants::EXT_IMG)){
                    //IMAGE
                    array_push($this->arrayFileImg, $file);
                }else{
                    //OTHERS
                    array_push($this->arrayFileOthers, $file);
                }
            }
        }
    }

    public function testAction()
    {
        //BDD --> FOLDER - BEGIN
        $fs = new Filesystem();
        $em = $this->getDoctrine()->getManager();
        $sorties = $em->getRepository('CommersonBundle:Sortie')->selectAll();
        $observations = $em->getRepository('CommersonBundle:Observation')->selectAll();
        $images = $em->getRepository('CommersonBundle:Image')->selectAll();
        $files = $em->getRepository('CommersonBundle:File')->selectAll();

        $nbDosSor = 0;
        $nbDosObs = 0;
        $nbDosImg = 0;
        $nbDosFil = 0;

        $listSor = $sorties;
        $listObs = $observations;
        $listImg = $images;
        $listFil = $files;

        //SORTIE - BEGIN
        $deleteID = array();
        $i=0;

        foreach($sorties as $s){
            if(!$fs->exists(__DIR__."/../../../web/uploads/".$s->getCodeSortie()."    TRACE")){
                $nbDosSor++;
            }else{
                array_push($deleteID, $i);
            }
            $i++;
        }

        for($j=count($deleteID)-1;$j>=0;$j--){
            unset($listSor[$deleteID[$j]]);
        }
        //SORTIE - END
        //OBSERVATION - BEGIN
        $deleteID = array();
        $i=0;

        foreach($observations as $o){
            if(!$fs->exists(__DIR__."/../../../web/uploads/".$o->getCodeObservation())){
                $nbDosObs++;
            }else{
                array_push($deleteID, $i);
            }
            $i++;
        }

        for($j=count($deleteID)-1;$j>=0;$j--){
            unset($listObs[$deleteID[$j]]);
        }
        //OBSERVATION - END
        //IMAGE - BEGIN
        $deleteID = array();
        $i=0;

        foreach($images as $im){
            if(!$fs->exists(__DIR__."/../../../web/uploads/".$im->getObservation()->getCodeObservation()."/".$im->getFilename())){
                $nbDosImg++;
            }else{
                array_push($deleteID, $i);
            }
            $i++;
        }

        for($j=count($deleteID)-1;$j>=0;$j--){
            unset($listImg[$deleteID[$j]]);
        }
        //IMAGE - END
        //FILE - BEGIN
        $deleteID = array();
        $i=0;

        foreach($files as $f){
            if(!$fs->exists(__DIR__."/../../../web/uploads/".$f->getObservation()->getCodeSortie()."    TRACE/".$f->getFilename())){
                $nbDosFil++;
            }else{
                array_push($deleteID, $i);
            }
            $i++;
        }

        for($j=count($deleteID)-1;$j>=0;$j--){
            unset($listFil[$deleteID[$j]]);
        }
        //FILE - END

        //BDD --> FOLDER - END
        //FOLDER --> BDD - BEGIN
        $this->arrayFileSor = array();
        $this->arrayFileObs = array();
        $this->arrayFileFil = array();
        $this->arrayFileImg = array();
        $this->arrayFileOthers = array();

        $this->parcours(new FilesystemIterator(__DIR__."/../../../web/uploads"), "uploads");

        $nbArrayFileSor = count($this->arrayFileSor);
        $nbArrayFileObs = count($this->arrayFileObs);
        $nbArrayFileFil = count($this->arrayFileFil);
        $nbArrayFileImg = count($this->arrayFileImg);

        //SORTIE - BEGIN
        $deleteID = array();
        $i=0;

        foreach($this->arrayFileSor as $f){
            for($j=0; $j<count($sorties);$j++){
                if($sorties[$j]->getCodeSortie()."    TRACE" == $f->getFilename()){
                    array_push($deleteID, $i);
                }
            }
            $i++;
        }

        for($j=count($deleteID)-1;$j>=0;$j--){
            unset($this->arrayFileSor[$deleteID[$j]]);
        }
        //SORTIE - END
        //OBSERVATION - BEGIN
        $deleteID = array();
        $i=0;

        foreach($this->arrayFileObs as $f){
            for($j=0; $j<count($observations);$j++){
                if($observations[$j]->getCodeObservation() == $f->getFilename()){
                    array_push($deleteID, $i);
                }
            }
            $i++;
        }

        for($j=count($deleteID)-1;$j>=0;$j--){
            unset($this->arrayFileObs[$deleteID[$j]]);
        }
        //OBSERVATION - END
        //IMAGE - BEGIN
        $deleteID = array();
        $i=0;

        foreach($this->arrayFileImg as $f){
            for($j=0; $j<count($images);$j++){
                if($images[$j]->getFilename() == $f->getFilename()){
                    array_push($deleteID, $i);
                }
            }
            $i++;
        }

        for($j=count($deleteID)-1;$j>=0;$j--){
            unset($this->arrayFileImg[$deleteID[$j]]);
        }
        //IMAGE - END
        //FILE - BEGIN
        $deleteID = array();
        $i=0;

        foreach($this->arrayFileFil as $f){
            for($j=0; $j<count($files);$j++){
                if($files[$j]->getFilename() == $f->getFilename()){
                    array_push($deleteID, $i);
                }
            }
            $i++;
        }

        for($j=count($deleteID)-1;$j>=0;$j--){
            unset($this->arrayFileFil[$deleteID[$j]]);
        }
        //FILE - END
        //FOLDER --> BDD - END

        return $this->render('CommersonBundle:Default:test.html.twig',
                                 array('nbSor' => count($sorties),
                                       'nbObs' => count($observations),
                                       'nbImg' => count($images),
                                       'nbFil' => count($files),
                                       'listSor' => $listSor,
                                       'listObs' => $listObs,
                                       'listImg' => $listImg,
                                       'listFil' => $listFil,
                                       'nbDosSor' => $nbDosSor,
                                       'nbDosObs' => $nbDosObs,
                                       'nbDosImg' => $nbDosImg,
                                       'nbDosFil' => $nbDosFil,
                                       'arrayFileSor' => $this->arrayFileSor,
                                       'arrayFileObs' => $this->arrayFileObs,
                                       'arrayFileFil' => $this->arrayFileFil,
                                       'arrayFileImg' => $this->arrayFileImg,
                                       'arrayFileOthers' => $this->arrayFileOthers,
                                       'nbArrayFileSor' => $nbArrayFileSor,
                                       'nbArrayFileObs' => $nbArrayFileObs,
                                       'nbArrayFileFil' => $nbArrayFileFil,
                                       'nbArrayFileImg' => $nbArrayFileImg
                                 )
                             );
    }
}
