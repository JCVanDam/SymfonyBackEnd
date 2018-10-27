<?php
namespace CommersonBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Symfony\Component\Filesystem\Filesystem;

use CommersonBundle\Entity\File;
use \Datetime;

class SortieAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $list = $this->getConfigurationPool()->getContainer()->get('commerson_static_list');
        $ext = "";
        $ext2 = "";
        if($this->isCurrentRoute('edit')){
            if($this->getSubject()->getPiste()!=null){
                $ext = " (ATTENTION : cela remplaçera le fichier ".$this->getSubject()->getPiste()->getFileName().")";
            }
            if($this->getSubject()->getWaypoints()!=null){
                $ext2 = " (ATTENTION : cela remplaçera le fichier ".$this->getSubject()->getWaypoints()->getFileName().")";
            }
        }
        $formMapper
                ->tab('Sortie')
                    ->with('Généralités', array('class' => 'col-md-6'))
                        ->add('saisisseur', null, array(
                             'label' => "Saisisseur",
                             'class' => 'CommersonBundle\Entity\MyUser',
                             'choice_label' => function($user){return $user;}
                        ))
                        ->add('observateur', null, array(
                             'label' => "Observateur",
                             'class' => 'CommersonBundle\Entity\MyUser',
                             'choice_label' => function($user){return $user;}
                        ))
                        ->add('date_depart',  "datetime", array(
                              'label' => 'Date de départ',
                              'years' => range(2000, date('Y')),
                              'attr' => array("class" => "my_date_src")
                        ))
                        ->add('date_arrivee',  "datetime", array(
                              'label' => "Date d'arrivée",
                              'years' => range(2000, date('Y')),
                              'attr' => array("class" => "my_date_dest")
                        ))
                    ->end()
                    ->with('Précisions', array('class' => 'col-md-6'))
                        ->add('visibilite','choice', array(
                             'choices' => $list->getVisibilites(),
                             'label' => "Visibilité"
                        ))
                        ->add('etatMer','choice', array(
                             'choices' => $list->getEtatsMer(),
                             'label' => "État de la mer"
                        ))
                        ->add('bateau','choice', array(
                             'choices' => $list->getBateaux(),
                             'label' => "Bateau"
                        ))
                        ->add('golfeMorbihan', null, array(
                             'label' => "Sortie uniquement dans le golfe du Morbihan"
                        ))
                        ->add('lieux', null, array(
                             'label' => "Lieux"
                        ))
                        ->add('remarque', null, array(
                             'label' => "Remarque"
                        ))
                        ->add('piste', 'file', array(
                            'mapped'=>false,
                            'required'=>false,
                            'label' => "Piste".$ext
                        ))
                        ->add('waypoints', 'file', array(
                            'mapped'=>false,
                            'required'=>false,
                            'label' => "Waypoints".$ext2
                        ))
                    ->end()
                ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper){
        $datagridMapper
            ->add('visibilite',null, array(
                 'label' => "Visibilité"
            ))
            ->add('codeSortie',null, array(
                 'label' => "Code de la sortie"
            ))
            ->add('etatMer', null, array(
                 'label' => "État de la mer"
            ))
            ->add('bateau', null, array(
                 'label' => "Bateau"
            ))
            ->add('golfeMorbihan', null, array(
                 'label' => "Sortie uniquement dans le golfe du Morbihan"
            ))
        ;
    }

    protected function configureListFields(ListMapper $listMapper){
        unset($this->listModes['mosaic']);
        $listMapper
                ->add('codeSortie', null, array(
                     'label' => "Code de la sortie"
                ))
                ->add('dateDepart', null, array(
                     'label' => "Départ"
                ))
                ->add('dateArrivee', null, array(
                     'label' => "Arrivée"
                ))
                ->add('visibilite',null, array(
                     'label' => "Visibilité"
                ))
                ->add('etatMer', null, array(
                     'label' => "État de la mer"
                ))
                ->add('bateau', null, array(
                     'label' => "Bateau"
                ))
                ->add('golfeMorbihan', null, array(
                     'label' => "Sortie uniquement dans le golfe du Morbihan"
                ))
                ->add('piste', 'string', array(
                     'label' => "Piste",
                     'mapped'=>false
                ))
                ->add('waypoints', 'string', array(
                     'label' => "Waypoints",
                     'mapped'=>false
                ))
                ->add('_action', null, array(
                  'actions' => array(
                     'show' => array(),
                     'edit' => array(),
                     'delete' => array()
                  )
                ))
        ;
    }

    public function configureShowFields(ShowMapper $showMapper){
        $showMapper
        ->tab('Sortie')
            ->with('Généralités', array('class' => 'col-md-12'))
                ->add('codeSortie', null, array(
                     'label' => "Code de la sortie"
                ))
                ->add('saisisseur', null, array(
                     'label' => "Saisisseur"
                ))
                ->add('observateur', null, array(
                     'label' => "Observateur"
                ))
                ->add('dateDepart', null, array(
                     'label' => "Départ"
                ))
                ->add('dateArrivee', null, array(
                     'label' => "Arrivée"
                ))
                ->add('remarque', null, array(
                     'label' => "Remarque"
                ))
            ->end()
            ->with('Précisions', array('class' => 'col-md-12'))
                ->add('visibilite', null, array(
                     'label' => "Visibilité"
                ))
                ->add('etatMer', null, array(
                     'label' => "État de la mer"
                ))
                ->add('bateau', null, array(
                     'label' => "Bateau"
                ))
                ->add('golfeMorbihan', null, array(
                     'label' => "Sortie uniquement dans le golfe du Morbihan"
                ))
                ->add('lieux', null, array(
                     'label' => "Lieux"
                ))
                ->add('gpx_files', null, array(
                     'label' => "Fichiers chargés"
                ))
            ->end()
        ->end()
        ->tab('Observations')
            ->with('Observations', array('class' => 'col-md-12'))
                ->add('observations', null, array(
                     'label' => "Observations",
                     'template' => 'CommersonBundle:Admin:observations_type.html.twig'
                ))
            ->end()
        ->end()
        ;
    }

    public function validate(ErrorElement $errorElement, $object){
        $this->setDates($object);
        if ($object->getDateDepart() > $object->getDateArrivee()) {
              $errorElement
                  ->with('dateArrivee')
                  ->addViolation("Merci de saisir une heure d'arrivée supérieure à l'heure de départ")
                  ->end()
              ;
        }
    }

    /*
     * Pour chaque création d'un objet Sortie
     */
    public function prePersist($sortie){
        $this->editCodeSortie($sortie);
        $this->editGpxFiles($sortie);
    }

    /*
     * Pour chaque modification d'un objet Sortie
     */
    public function preUpdate($sortie){
        $this->updateTheSortie($sortie);
        $this->editGpxFiles($sortie);
    }

    public function editGpxFiles($sortie){
        //PISTE
        if($this->getForm()->get('piste')->getData() != null){
            $file1 = $sortie->getPiste();
            if($file1==null){
                $file1 = new File();
            }
            $file1->setSortie($sortie);
            $file1->setFile($this->getForm()->get('piste')->getData());
            $sortie->setPiste($file1);
        }
        //WAYPOINTS
        if($this->getForm()->get('waypoints')->getData() != null){
            $file2 = $sortie->getWaypoints();
            if($file2==null){
                $file2 = new File();
            }
            $file2->setSortie($sortie);
            $file2->setFile($this->getForm()->get('waypoints')->getData());
            $sortie->setWaypoints($file2);
        }
    }

    /*
     * Modifie le code de la Sortie
     * Format : YYYY BAT MM DD OBSE
     */
    public function editCodeSortie($sortie){
        $date = $sortie->getDateDepart();
        $code = strtoupper($date->format('Y')." ".substr($sortie->getBateau(), 0, 3)." ".$date->format('m')." ".$date->format('d')." ".$sortie->getObservateur()->getCode());
        $i = 1;
        while($this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository('CommersonBundle:Sortie', 'dauphin_commerson')->existThisCode($code." ".$i)){
            $i++;
        }
        $sortie->setCodeSortie($code." ".$i);
    }

    public function updateTheSortie($sortie){
        //FAIRE LA MEME
        $date = $sortie->getDateDepart();
        $code = strtoupper($date->format('Y')." ".substr($sortie->getBateau(), 0, 3)." ".$date->format('m')." ".$date->format('d')." ".$sortie->getObservateur()->getCode());
        $i = 1;
        while($this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository('CommersonBundle:Sortie', 'dauphin_commerson')->existThisCodeWithId($code." ".$i, $sortie->getId())){
            $i++;
        }
        $sortie->updateSortie($code." ".$i);
    }

    public function setDates($sortie){
        $sortie->setDateArrivee(new \DateTime($sortie->getDateDepart()->format('Y')."-".$sortie->getDateDepart()->format('m')."-".$sortie->getDateDepart()->format('d')." ".$sortie->getDateArrivee()->format('H').":".$sortie->getDateArrivee()->format('i')));
    }
}
