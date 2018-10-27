<?php
namespace OrnithoPinniBundle\Admin\CMTG_INDIFF;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;

class SaisieAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $list = $this->getConfigurationPool()->getContainer()->get('static_list');
        $formMapper
                ->with('Espèce', array('class' => 'col-md-12'))
                    ->add('protocole', 'sonata_type_model_hidden')
                    ->add('espece', null, array(
                          'required' => false,
                          'class' => 'OrnithoPinniBundle\Entity\General\Espece',
                          'choice_label' => function($e){return $e->getNomCourant();},
                          'label' => "Espèce *"
                    ))
                ->end()
                ->with('Général', array('class' => 'col-md-12'))
                    ->add('comptageJumelle', null, array(
                         'label' => "Utilisation des jumelles",
                         'required' => false
                    ))
                    ->add('comportement', null, array(
                         'label' => "Comportement",
                         'required' => false
                    ))
                    ->add('contactsAvecEspece','choice', array(
                         'choices' => $list->getContactsAvecEspeces(),
                         'label' => "Contact avec l'espèce *",
                         'required' => false,
                         'placeholder' => 'Choisir...'
                    ))
                    ->add('lieuComptage', 'choice', array(
                         'choices' => $list->getLieuxComptages(),
                         'label' => "Lieu du comptage *",
                         'required' => false,
                         'placeholder' => 'Choisir...'
                    ))
                    ->add('precisionCoordonnee', 'choice', array(
                         'choices' => $list->getPrecisionsGPS(),
                         'label' => "Précision de la coordonnée *",
                         'required' => false,
                         'placeholder' => 'Choisir...'
                    ))
                ->end()
                ->with('Spécialisation', array('class' => 'col-md-12'))
                    ->add('childType', ChoiceFieldMaskType::class, [
                        'choices' => [
                            'Classe' => 'C1',
                            'Minimum / Maximum' => 'C2',
                            'Territoire' => 'C3',
                            'Precis' => 'C4'
                        ],
                        'map' => [
                            'C1' => ['CMTG_INDIFF_protocole_classe'],
                            'C2' => ['CMTG_INDIFF_protocole_min_max'],
                            'C3' => ['CMTG_INDIFF_protocole_territoire'],
                            'C4' => ['CMTG_INDIFF_protocole_precis']
                        ],
                        'required' => false,
                        'label' => "Type de dénombrement *",
                        'placeholder' => 'Choisir un type de dénombrement'
                    ])
                    ->add('CMTG_INDIFF_protocole_min_max', 'sonata_type_admin', array(
                        'label' => 'Minimum / Maximum *',
                        'required' => false,
                        'attr' => array('style' => 'padding-left:5%;')
                    ))
                    ->add('CMTG_INDIFF_protocole_territoire', 'sonata_type_admin', array(
                        'label' => 'Territoire *',
                        'required' => false,
                        'attr' => array('style' => 'padding-left:5%;')
                    ))
                    ->add('CMTG_INDIFF_protocole_precis', 'sonata_type_admin', array(
                        'label' => 'Dénombrement précis *',
                        'required' => false,
                        'attr' => array('style' => 'padding-left:5%;')
                    ))
                    ->add('CMTG_INDIFF_protocole_classe', 'sonata_type_admin', array(
                        'label' => 'Classe *',
                        'required' => false,
                        'attr' => array('style' => 'padding-left:5%;')
                    ))
                ->end()
                ->add('remarque', null, array(
                    'label' => 'Remarque',
                    'required' => false
                ))
        ;
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

    public function validate(ErrorElement $errorElement, $object)
    {
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getEntityManager('ornitho_pinni');
        if($object->getChildType()==null){
            $errorElement
                ->with('childType')
                    ->addViolation("Le type de protocole doit être renseigné")
                ->end()
            ;
        }
        if($object->getContactsAvecEspece()==null){
            $errorElement
                ->with('contactsAvecEspece')
                    ->addViolation("Le contact avec l'espèce doit être renseigné")
                ->end()
            ;
        }
        if($object->getPrecisionCoordonnee()==null){
            $errorElement
                ->with('precisionCoordonnee')
                    ->addViolation("La précision doit être renseignée")
                ->end()
            ;
        }
        if($object->getLieuComptage()==null){
            $errorElement
                ->with('lieuComptage')
                    ->addViolation("Le lieu de comptage doit être renseigné")
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
        if($object->getChildType() == 'C1'){
            if($object->getCMTGINDIFFProtocoleMinMax()!=null){
                $em->remove($object->getCMTGINDIFFProtocoleMinMax());
                $object->setCMTGINDIFFProtocoleMinMax(null);
            }
            if($object->getCMTGINDIFFProtocoleTerritoire()!=null){
                $em->remove($object->getCMTGINDIFFProtocoleTerritoire());
                $object->setCMTGINDIFFProtocoleTerritoire(null);
            }
            if($object->getCMTGINDIFFProtocolePrecis()!=null){
                $em->remove($object->getCMTGINDIFFProtocolePrecis());
                $object->setCMTGINDIFFProtocolePrecis(null);
            }
            if($object->getCMTGINDIFFProtocoleClasse()==null){
                $errorElement
                    ->with('CMTG_INDIFF_protocole_classe')
                        ->addViolation("Le protocole choisi doit être renseigné")
                    ->end()
                ;
            }
        }
        if($object->getChildType() == 'C2'){
          if($object->getCMTGINDIFFProtocoleClasse()!=null){
              $em->remove($object->getCMTGINDIFFProtocoleClasse());
              $object->setCMTGINDIFFProtocoleClasse(null);
          }
          if($object->getCMTGINDIFFProtocoleTerritoire()!=null){
              $em->remove($object->getCMTGINDIFFProtocoleTerritoire());
              $object->setCMTGINDIFFProtocoleTerritoire(null);
          }
          if($object->getCMTGINDIFFProtocolePrecis()!=null){
              $em->remove($object->getCMTGINDIFFProtocolePrecis());
              $object->setCMTGINDIFFProtocolePrecis(null);
          }
          if($object->getCMTGINDIFFProtocoleMinMax()==null){
              $errorElement
                  ->with('CMTG_INDIFF_protocole_min_max')
                      ->addViolation("Le protocole choisi doit être renseigné")
                  ->end()
              ;
          }
        }
        if($object->getChildType() == 'C3'){
          if($object->getCMTGINDIFFProtocoleClasse()!=null){
              $em->remove($object->getCMTGINDIFFProtocoleClasse());
              $object->setCMTGINDIFFProtocoleClasse(null);
          }
          if($object->getCMTGINDIFFProtocoleMinMax()!=null){
              $em->remove($object->getCMTGINDIFFProtocoleMinMax());
              $object->setCMTGINDIFFProtocoleMinMax(null);
          }
          if($object->getCMTGINDIFFProtocolePrecis()!=null){
              $em->remove($object->getCMTGINDIFFProtocolePrecis());
              $object->setCMTGINDIFFProtocolePrecis(null);
          }
          if($object->getCMTGINDIFFProtocoleTerritoire()==null){
              $errorElement
                  ->with('CMTG_INDIFF_protocole_territoire')
                      ->addViolation("Le protocole choisi doit être renseigné")
                  ->end()
              ;
          }
        }
        if($object->getChildType() == 'C4'){
          if($object->getCMTGINDIFFProtocoleClasse()!=null){
              $em->remove($object->getCMTGINDIFFProtocoleClasse());
              $object->setCMTGINDIFFProtocoleClasse(null);
          }
          if($object->getCMTGINDIFFProtocoleMinMax()!=null){
              $em->remove($object->getCMTGINDIFFProtocoleMinMax());
              $object->setCMTGINDIFFProtocoleMinMax(null);
          }
          if($object->getCMTGINDIFFProtocoleTerritoire()!=null){
              $em->remove($object->getCMTGINDIFFProtocoleTerritoire());
              $object->setCMTGINDIFFProtocoleTerritoire(null);
          }
          if($object->getCMTGINDIFFProtocolePrecis()==null){
              $errorElement
                  ->with('CMTG_INDIFF_protocole_precis')
                      ->addViolation("Le protocole choisi doit être renseigné")
                  ->end()
              ;
          }
        }
    }

}
