<?php
namespace CommersonBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use CommersonBundle\Entity\Image;

class ObservationAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $list = $this->getConfigurationPool()->getContainer()->get('commerson_static_list');
        $formMapper
            ->tab('Informations')
                ->with('Générales', array('class' => 'col-md-6'))
                    ->add('sortie', null, array(
                          'required' => true,
                          'class' => 'CommersonBundle\Entity\Sortie',
                          'choice_label' => function($sortie){return $sortie;},
                          'label' => "Sortie"
                    ))
                    ->add('nombreMin', "integer", array(
                         'label' => "Minimum d'individus observés",
                         'attr' => array('min'=> 0)
                    ))
                    ->add('nombreMax', "integer", array(
                         'label' => "Maximum d'individus observés",
                         'attr' => array('min'=> 0)
                    ))
                    ->add('photoOuiNon', null, array(
                         'label' => "Prise de photos"
                    ))
                ->end()
                ->with('Comportementales', array('class' => 'col-md-6'))
                    ->add('comportementApproche','choice', array(
                         'choices' => $list->getComportements(),
                         'label' => "Comportement à l'approche"
                    ))
                    ->add('remarqueComportement', null, array(
                         'label' => "Remarque à propos du comportement"
                    ))
                ->end()
            ->end()
            ->tab('Localisation')
                ->with('Localisation', array('class' => 'col-md-12'))
                    ->add('localisation', 'sonata_type_admin', array(
                         //'label' => "Localisation du début"
                    ))
                ->end()
            ->end()
            ->tab("Ajout d'images")
                ->add('null_images','file', array(
                      'label' => 'Images',
                      'mapped' => false,
                      'multiple' => true,
                      'required' => false
                ))
            ->end()
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper){
        $datagridMapper
                ->add('codeObservation', null, array(
                     'label' => "Code de l'observation"
                ))
                ->add('nombreMin', null, array(
                     'label' => "Minimum d'individus observés"
                ))
                ->add('nombreMax', null, array(
                     'label' => "Maximum d'individus observés"
                ))
                ->add('photoOuiNon', null, array(
                     'label' => "Avec prise de photos"
                ))
        ;
    }

    protected function configureListFields(ListMapper $listMapper){
        unset($this->listModes['mosaic']);
        $listMapper
                ->add('sortie', null, array(
                     'label' => "Code de la sortie"
                ))
                ->add('codeObservation', null, array(
                     'label' => "Code de l'observation"
                ))
                ->add('nombreMin', null, array(
                     'label' => "Minimum d'individus observés"
                ))
                ->add('nombreMax', null, array(
                     'label' => "Maximum d'individus observés"
                ))
                ->add('photoOuiNon', null, array(
                     'label' => "Avec prise de photos"
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
            ->tab('Observation')
                ->with('Images', array('class' => 'col-md-12'))
                    ->add('sortie', null, array(
                         'label' => "Code de la sortie"
                    ))
                    ->add('codeObservation', null, array(
                         'label' => "Code de l'observation"
                    ))
                    ->add('remarqueComportement', null, array(
                         'label' => "Remarque à propos du comportement"
                    ))
                    ->add('nombreMin', null, array(
                         'label' => "Minimum d'individus observés"
                    ))
                    ->add('nombreMax', null, array(
                         'label' => "Maximum d'individus observés"
                    ))
                    ->add('photoOuiNon', null, array(
                         'label' => "Prise de photos"
                    ))
                    ->add('comportementApproche', null, array(
                         'label' => "Comportement à l'approche"
                    ))
                    ->add('localisation', null, array(
                         'label' => "Localisation"
                    ))
                    ->add('biopsies', null, array(
                         'label' => "Biopsies"
                    ))
                ->end()
            ->end()
            ->tab('Images')
                ->with('Images', array('class' => 'col-md-12'))
                    ->add('images', null, array(
                         'label' => "Images",
                         'template' => 'CommersonBundle:Admin:images_type.html.twig'
                    ))
                ->end()
            ->end()
        ;
    }

    public function validate(ErrorElement $errorElement, $object){
        $this->setDates($object);
        if ($object->getNombreMin() > $object->getNombreMax()) {
              $errorElement
                  ->with('nombreMax')
                  ->addViolation("Ce nombre doit être supérieur au nombre minimum d'individus observés")
                  ->end()
              ;
        }

        if ($object->getLocalisation()->getDateFin() < $object->getLocalisation()->getDateDebut()) {
              $errorElement
                  ->with('localisation')
                  ->addViolation("La fin d'observation doit être supérieure au début de l'observation")
                  ->end()
              ;
        }
        if ($object->getLocalisation()->getDateDebut() < $object->getSortie()->getDateDepart()) {
              $errorElement
                  ->with('localisation')
                  ->addViolation("Le début d'observation doit être supérieur au début de sortie")
                  ->end()
              ;
        }
        if ($object->getLocalisation()->getDateFin() > $object->getSortie()->getDateArrivee()) {
              $errorElement
                  ->with('localisation')
                  ->addViolation("La fin d'observation doit être inférieure à la fin de sortie")
                  ->end()
              ;
        }
    }

    /*
     * Pour chaque création d'un objet Observation
     */
    public function prePersist($obs){
        $this->editCodeObservation($obs);
        $this->addFiles($obs);
    }

    /*
     * Pour chaque modification d'un objet Observation
     */
    public function preUpdate($obs){
        $obs->updateObservation();
        $this->addFiles($obs);
    }

    /*
     * Ajout de plusieurs fichiers
     */
    public function addFiles($obs){
        foreach($this->getForm()->get('null_images')->getData() as $file){
            $img = new Image();
            $img->setObservation($obs);
            $img->setFile($file);
            $obs->addImage($img);
        }
    }

    /*
     * Modifie le code de la Observation
     * Format : codeSortie P_00+ID
     */
    public function editCodeObservation($obs){
        $codes = $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository('CommersonBundle:Observation', 'dauphin_commerson')->getAllCodes($obs->getSortie());
        if(count($codes)==0){
            $nbObs = 0;
        }else{
            $nbObs = (integer)substr($codes[0]["codeObservation"], -3);
        }
        $obs->setCodeObservation($obs->getSortie()->getCodeSortie()." P_".sprintf("%03s", $nbObs+1));
    }

    public function setDates($obs){
        $dateDep = clone $obs->getSortie()->getDateDepart();
        $dateDep->setTime($obs->getLocalisation()->getDateDebut()->format('H'), $obs->getLocalisation()->getDateDebut()->format('i'));
        $dateArr = clone $obs->getSortie()->getDateDepart();
        $dateArr->setTime($obs->getLocalisation()->getDateFin()->format('H'), $obs->getLocalisation()->getDateFin()->format('i'));

        $obs->getLocalisation()->setDateDebut($dateDep);
        $obs->getLocalisation()->setDateFin($dateArr);
    }
}
