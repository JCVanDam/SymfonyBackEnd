<?php
namespace OrnithoPinniBundle\Admin\ECHOUAGE;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;

class DecouverteAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
      $list = $this->getConfigurationPool()->getContainer()->get('static_list');
      $formMapper
        ->with('Localisation', array('class' => 'col-md-12'))
            ->add('releve', 'sonata_type_admin', array(
                'label' => 'Relevé GPS',
                'required' => false
            ))
            ->add('precisionGeo', null, array(
                'label' => 'Précision géographique (si relevé non renseigné)',
                'required' => false
            ))
        ->end()
        ->with('Espèce', array('class' => 'col-md-12'))
            ->add('protocoleOpportuniste', 'sonata_type_model_hidden')
            ->add('protocoleEnTournee', 'sonata_type_model_hidden')
            ->add('espece', null, array(
                  'required' => false,
                  'class' => 'OrnithoPinniBundle\Entity\General\Espece',
                  'choice_label' => function($e){return $e->getNomCourant();},
                  'label' => "Espèce *"
            ))
        ->end()
        ->with('Découverte', array('class' => 'col-md-12'))
            ->add('statut','choice', array(
                 'choices' => ["Vivant"=>"vivant", "Mort"=>"mort"],
                 'label' => "Statut *",
                 'required' => false,
                 'placeholder' => "Choisir..."
            ))
            ->add('age','choice', array(
                 'choices' => $list->getSagirAges(),
                 'label' => "Âge *",
                 'required' => false,
                 'placeholder' => "Choisir..."
            ))
            ->add('etatGeneral', null, array(
                'label' => "Etat général",
                'required' => false
            ))
            ->add('circonstanceEchouage', null, array(
                'label' => "Circonstance de l'échouage",
                'required' => false
            ))
            ->add('isRelache', null, array(
                'label' => "Relaché ?",
                'required' => false
            ))
            ->add('conditionRelache', null, array(
                'label' => "Si relaché, dans quelles conditions ?",
                'required' => false
            ))
            ->add('isPhotos', null, array(
                'label' => "Photos ?",
                'required' => false
            ))
            ->add('photos', null, array(
                'label' => "Si photos, quels noms de fichiers ?",
                'required' => false
            ))
            ->add('remarque', null, array(
                'label' => "Remarque",
                'required' => false
            ))
            ;
            if($this->getSubject() ==null || $this->getSubject()->getId()==null) {
                //DEFAULT
                $formMapper
                ->add('isBiometrie', ChoiceFieldMaskType::class, [
                    'choices' => [
                        'Oui' => 'C1',
                        'Non' => 'C2'
                    ],
                    'map' => [
                        'C1' => ['biometrie'],
                        'C2' => []
                    ],
                    'required' => false,
                    'label' => "Avez-vous des informatons biométriques ? *",
                    'placeholder' => 'Choisir...',
                    'data' => 'C2'
                ]);
            }else{
                //RECUP BDD
                $formMapper
                ->add('isBiometrie', ChoiceFieldMaskType::class, [
                    'choices' => [
                        'Oui' => 'C1',
                        'Non' => 'C2'
                    ],
                    'map' => [
                        'C1' => ['biometrie'],
                        'C2' => []
                    ],
                    'required' => false,
                    'label' => "Avez-vous des informatons biométriques ? *",
                    'placeholder' => 'Choisir...'
                ]);
            }
            $formMapper
            ->add('biometrie', 'sonata_type_admin', array(
                'label' => 'Biométrie',
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
        if($object->getReleve()==null || ($object->getReleve()->getOrigine()==null
           && $object->getReleve()->getLatitude()==null
           && $object->getReleve()->getLongitude()==null
           && $object->getReleve()->getAltitude()==null
           && $object->getReleve()->getHeure()==null
           && $object->getReleve()->getIsAltitudeSIG()==null
           && $object->getReleve()->getDate()==null
           && $object->getReleve()->getRemarque()==null
           && $object->getReleve()->getIdPtGps()==null
           && $object->getReleve()->getNumeroGps()==null)){
          $object->setReleve(null);
        }
        if($object->getAge()==null){
            $errorElement
                ->with('age')
                    ->addViolation("L'âge être renseigné")
                ->end()
            ;
        }
        if($object->getReleve()==null){
            if($object->getPrecisionGeo()==null){
              $errorElement
                  ->with('precisionGeo')
                      ->addViolation("Si le relevé n'est pas renseigné, ce champs doit l'être")
                  ->end()
              ;
            }
        }
        if($object->getEspece()==null){
            $errorElement
                ->with('espece')
                    ->addViolation("L'espèce doit être renseignée")
                ->end()
            ;
        }
        if($object->getStatut()==null){
            $errorElement
                ->with('statut')
                    ->addViolation("Le statut doit être renseignée")
                ->end()
            ;
        }
        if($object->getIsBiometrie()==null){
            $errorElement
                ->with('isBiometrie')
                    ->addViolation("Ce champs doit être renseigné")
                ->end()
            ;
        }else if($object->getIsBiometrie()=='C2'){
            $object->setBiometrie(null);
        }else{
          if($object->getBiometrie()->getAilePliee() == null || $object->getBiometrie()->getLongueurCulmen() == null || $object->getBiometrie()->getPoids() == null){
            $errorElement
                ->with('biometrie')
                    ->addViolation("La biométrie doit être renseignée")
                ->end()
            ;
          }
        }
    }

}
