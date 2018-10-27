<?php
namespace OrnithoPinniBundle\Admin\SREP;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;

class PassageSurColonieAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
        ->with('Colonie', array('class' => 'col-md-12'))
            ->add('protocole', 'sonata_type_model_hidden')
            ->add('colonie', null, array(
                  'required' => false,
                  'class' => 'OrnithoPinniBundle\Entity\SREP\Colonie',
                  'choice_label' => function($c){return $c;},
                  'label' => "Colonie *"
            ));
            if($this->getSubject() ==null || $this->getSubject()->getId()==null) {
                //DEFAULT
                $formMapper
                ->add('isUpdated', ChoiceFieldMaskType::class, [
                    'choices' => [
                        'Non' => 'C1',
                        'Oui' => 'C2'
                    ],
                    'map' => [
                        'C1' => [],
                        'C2' => ['releve']
                    ],
                    'required' => false,
                    'label' => "Souhaitez-vous modifier la position de la colonie ? *",
                    'placeholder' => 'Choisir...',
                    'data' => 'C1'
                ]);
            }else{
                //RECUP BDD
                $formMapper
                ->add('isUpdated', ChoiceFieldMaskType::class, [
                    'choices' => [
                        'Non' => 'C1',
                        'Oui' => 'C2'
                    ],
                    'map' => [
                        'C1' => [],
                        'C2' => ['releve']
                    ],
                    'required' => false,
                    'label' => "Souhaitez-vous modifier la position de la colonie ? *",
                    'placeholder' => 'Choisir...'
                ]);
            }
            $formMapper
            ->add('releve', 'sonata_type_admin', array(
                'label' => 'Relevé GPS *',
                'required' => false
            ))
        ->end()
        ->with('Comptages', array('class' => 'col-md-12'))
            ->add('comptages', 'sonata_type_collection', array(
                'required' => false,
                'label' => 'Comptages *',
                'by_reference' => false
            ),array(
                'edit' => 'inline',
                'inline' => 'table'
            ))
            ->add('remarque', null, array(
                'label' => 'Remarque',
                'required' => false
            ))
        ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper){
        unset($this->listModes['mosaic']);
        $listMapper
            ->add('_action', null, array(
               'actions' => array(
                   'show' => array(),
                   'edit' => array(),
                   'delete' => array()
               )
            ))
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        if($object->getColonie()==null){
            $errorElement
                ->with('colonie')
                    ->addViolation("La colonie doit être renseignée")
                ->end()
            ;
        }
        if($object->getIsUpdated()!=null){
          if($object->getIsUpdated() == 'C2'){
                $releve = clone $object->getReleve();
                $object->getColonie()->setReleve($releve);
          }else{
              $object->setReleve(null);
          }
        }else{
          $errorElement
              ->with('isUpdated')
                  ->addViolation("Ce champs doit être renseigné")
              ->end()
          ;
        }

        if($object->getComptages()==null || count($object->getComptages())==0){
            $errorElement
                ->with('comptages')
                    ->addViolation("Au moins un comptage doit être renseigné")
                ->end()
            ;
        }
        $tab = [];
        foreach($object->getComptages() as $c){
            if((array_key_exists($c->getTypeEffectif(),$tab))){
                $tab[$c->getTypeEffectif()]++;
            }else{
                $tab[$c->getTypeEffectif()] = 1;
            }
        }
        foreach($tab as $key => $value){
            if($value>1){
              $errorElement
                  ->with('comptages')
                      ->addViolation("Vous ne pouvez pas avoir plusieurs comptages pour le type effectif '".$key."' dans un même passage sur colonie")
                  ->end()
              ;
            }
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
        foreach($o->getComptages() as $child){
            $child->setPassage($o);
        }
    }

}
