<?php
namespace OrnithoPinniBundle\Admin\SAGIR;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\CoreBundle\Form\Type\DatePickerType;

class DecouverteAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
      $list = $this->getConfigurationPool()->getContainer()->get('static_list');
      $formMapper
          ->with('Localisation', array('class' => 'col-md-12'))
              ->add('releve', 'sonata_type_admin', array(
                  'label' => 'Relevé GPS *',
                  'required' => false
              ))
          ->end()
          ->with('Espèce', array('class' => 'col-md-12'))
              ->add('espece', null, array(
                    'required' => false,
                    'class' => 'OrnithoPinniBundle\Entity\General\Espece',
                    'choice_label' => function($e){return $e->getNomCourant();},
                    'label' => "Espèce *"
              ))
          ->end()
          ->with('Découverte', array('class' => 'col-md-12'))
              ->add('protocole', 'sonata_type_model_hidden')
              ->add('nombreIndividus', null, array(
                   'label' => "Combien d'individus avez-vous découvert ? *",
                   'required' => false,
                   'attr' => array('min' => '0')
              ))
              ->add('ficheSagirCompletee', null, array(
                   'label' => "Avez-vous completé une fiche SAGIR ?",
                   'required' => false,
              ))
              ->add('numeroFicheSagir', null, array(
                   'label' => "Si oui, précisez le numéro...",
                   'required' => false,
              ))
              ->add('dateEnvoiFiche', DatePickerType::class, array(
                  'label' => "Si oui, précisez la date d'envoi...",
                  'format'=>'dd/MM/yyyy',
                  'required' => false
              ))
              ->add('envoiEchantillons', null, array(
                   'label' => "Avez-vous envoyé des échantillons ?",
                   'required' => false,
              ))
              ->add('dateEnvoiEchantillons', DatePickerType::class, array(
                  'label' => "Si oui, précisez la date d'envoi...",
                  'format'=>'dd/MM/yyyy',
                  'required' => false
              ))
              ->add('causeMortSuspectee', null, array(
                   'label' => "Cause de la mort suspectée",
                   'required' => false
              ))
              ->add('commentaires', null, array(
                   'label' => "Commentaires",
                   'required' => false
              ))
          ->end()
          ->with('Animaux découverts', array('class' => 'col-md-12'))
              ->add('animaux', 'sonata_type_collection', array(
                  'required' => false,
                  'label' => "Animaux découverts *",
                  "by_reference" => false
              ),array(
                  'edit' => 'inline',
                  'inline' => 'table'
              ))
          ->end()
      ;

    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper){
        //A FAIRE
    }

    protected function configureListFields(ListMapper $listMapper){
        unset($this->listModes['mosaic']);
        $listMapper
            ->add('code', null, array())
            ->add('_action', null, array(
               'actions' => array(
                   'show' => array(),
                   'edit' => array(),
                   'delete' => array()
               )
            ))
        ;
    }

    public function validate(ErrorElement $errorElement, $object){
        if($object->getAnimaux()==null || count($object->getAnimaux())==0){
            $errorElement
                ->with('animaux')
                    ->addViolation("Au moins un animal doit être renseigné")
                ->end()
            ;
        }
        if($object->getReleve()==null){
            $errorElement
                ->with('releve')
                    ->addViolation("Le relevé GPS doit être renseigné")
                ->end()
            ;
        }
        if($object->getEspece()==null){
            $errorElement
                ->with('espece')
                    ->addViolation("L'espèce doit être renseignée")
                ->end()
            ;
        }
        if($object->getNombreIndividus()==null && $object->getNombreIndividus()!=0){
            $errorElement
                ->with('nombreIndividus')
                    ->addViolation("Le nombdre d'individus doit être renseigné")
                ->end()
            ;
        }
    }

    /*
     * Permet de gérer le lien inverse si imbrication première
     * N'est pas appelé si non executé depuis cet admin
     */
    public function prePersist($o){
        $this->toExecute($o);
    }
    public function preUpdate($o){
        $this->toExecute($o);
    }

    public function toExecute($o){
        foreach($o->getAnimaux() as $child){
            $child->setDecouverte($o);
        }
    }
}
