<?php
namespace OrnithoPinniBundle\Admin\General;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;

class ProtocoleAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $list = $this->getConfigurationPool()->getContainer()->get('static_list');
        $formMapper
                ->with('Observation', array('class' => 'col-md-12'))
                    ->add('code', null, array(
                         'label' => "Code",
                         'required' => false,
                         'attr' => ['readonly' => true]
                    ))
                    ->add('observateurs', null, array(
                          'by_reference' => false,
                          'multiple' => true,
                          'required' => false,
                          'label' => "Observateurs *"
                    ))
                ->end()
                ->with('Protocole', array('class' => 'col-md-12'))
                    ->add('childType', ChoiceFieldMaskType::class, [
                        'choices' => [
                            'Observations et comptages ponctuels' => 'C1',
                            'Dénombrements pinnipèdes' => 'C2',
                            'Comptage sternes' => 'C3',
                            'Succès reproducteur (manchot papou, cormoran de Kerguelen)' => 'C4',
                            'Colonies démographie simplifiée (pétrel de Kerguelen, pétrel noir)' => 'C5',
                            'Points comptage espèces hypogées' => 'C6',
                            'Transects espèces hypogées' => 'C7',
                            'Transects espèces épigées' => 'C8',
                            'Comptage goélands dominicains' => 'C9'

                        ],
                        'map' => [
                          'C1' => ['CMTG_INDIFF_protocole'],
                          'C2' => ['CMTG_PINNI_protocole'],
                          'C3' => ['CMTG_OISEAUX_MARINS_protocole'],
                          'C4' => ['SREP_protocole'],
                          'C5' => ['DEMOS_protocole'],
                          'C6' => ['PC_protocole'],
                          'C7' => ['TRSC_HYP_protocole'],
                          'C8' => ['TRSC_EPI_protocole'],
                          'C9' => ['CMTG_GOEL_protocole']
                        ],
                        'required' => false,
                        'label' => "Type de protocole *",
                        'placeholder' => 'Choisir un type de protocole',
                    ])
                    ->add('CMTG_INDIFF_protocole', 'sonata_type_admin', array(
                        'label' => 'Observations et comptages ponctuels *',
                        'required' => false,
                        'attr' => ["style" => "padding-left:5%;"]
                    ))
                    ->add('CMTG_PINNI_protocole', 'sonata_type_admin', array(
                        'label' => 'Dénombrements pinnipèdes *',
                        'required' => false,
                        'attr' => ["style" => "padding-left:5%;"]
                    ))
                    ->add('CMTG_OISEAUX_MARINS_protocole', 'sonata_type_admin', array(
                        'label' => 'Comptage sternes *',
                        'required' => false,
                        'attr' => ["style" => "padding-left:5%;"]
                    ))
                    ->add('SREP_protocole', 'sonata_type_admin', array(
                        'label' => 'Succès reproducteur (manchot papou, cormoran de Kerguelen) *',
                        'required' => false,
                        'attr' => ["style" => "padding-left:5%;"]
                    ))
                    ->add('DEMOS_protocole', 'sonata_type_admin', array(
                        'label' => 'Colonies démographie simplifiée (pétrel de Kerguelen, pétrel noir) *',
                        'required' => false,
                        'attr' => ["style" => "padding-left:5%;"]
                    ))
                    ->add('PC_protocole', 'sonata_type_admin', array(
                        'label' => 'Points comptage espèces hypogées *',
                        'required' => false,
                        'attr' => ["style" => "padding-left:5%;"]
                    ))
                    ->add('TRSC_HYP_protocole', 'sonata_type_admin', array(
                        'label' => 'Transects espèces hypogées *',
                        'required' => false,
                        'attr' => ["style" => "padding-left:5%;"]
                    ))
                    ->add('TRSC_EPI_protocole', 'sonata_type_admin', array(
                        'label' => 'Transects espèces épigées *',
                        'required' => false,
                        'attr' => ["style" => "padding-left:5%;"]
                    ))
                    ->add('CMTG_GOEL_protocole', 'sonata_type_admin', array(
                        'label' => 'Comptage goélands dominicains *',
                        'required' => false,
                        'attr' => ["style" => "padding-left:5%;"]
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

    public function configureShowFields(ShowMapper $showMapper){
        //A FAIRE
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getEntityManager('ornitho_pinni');
        if($object->getChildType() != 'C1'){
            if($object->getCMTGINDIFFProtocole()!=null){
                $em->remove($object->getCMTGINDIFFProtocole());
                $object->setCMTGINDIFFProtocole(null);
            }
        }else{
            if($object->getCMTGINDIFFProtocole()==null){
                $errorElement
                    ->with('CMTG_INDIFF_protocole')
                        ->addViolation("Le protocole doit être renseigné")
                    ->end()
                ;
            }
        }
        if($object->getChildType() != 'C2'){
            if($object->getCMTGPINNIProtocole()!=null){
                $em->remove($object->getCMTGPINNIProtocole());
                $object->setCMTGPINNIProtocole(null);
            }
        }else{
            if($object->getCMTGPINNIProtocole()==null){
                $errorElement
                    ->with('CMTG_PINNI_protocole')
                        ->addViolation("Le protocole doit être renseigné")
                    ->end()
                ;
            }
        }
        if($object->getChildType() != 'C3'){
            if($object->getCMTGOISEAUXMARINSProtocole()!=null){
                $em->remove($object->getCMTGOISEAUXMARINSProtocole());
                $object->setCMTGOISEAUXMARINSProtocole(null);
            }
        }else{
            if($object->getCMTGOISEAUXMARINSProtocole()==null){
                $errorElement
                    ->with('CMTG_OISEAUX_MARINS_protocole')
                        ->addViolation("Le protocole doit être renseigné")
                    ->end()
                ;
            }
        }
        if($object->getChildType() != 'C4'){
            if($object->getSREPProtocole()!=null){
                $em->remove($object->getSREPProtocole());
                $object->setSREPProtocole(null);
            }
        }else{
            if($object->getSREPProtocole()==null){
                $errorElement
                    ->with('SREP_protocole')
                        ->addViolation("Le protocole doit être renseigné")
                    ->end()
                ;
            }
        }
        if($object->getChildType() != 'C5'){
            if($object->getDEMOSProtocole()!=null){
                $em->remove($object->getDEMOSProtocole());
                $object->setDEMOSProtocole(null);
            }
        }else{
            if($object->getDEMOSProtocole()==null){
                $errorElement
                    ->with('DEMOS_protocole')
                        ->addViolation("Le protocole doit être renseigné")
                    ->end()
                ;
            }
        }
        if($object->getChildType() != 'C6'){
            if($object->getPCProtocole()!=null){
                $em->remove($object->getPCProtocole());
                $object->setPCProtocole(null);
            }
        }else{
            if($object->getPCProtocole()==null){
                $errorElement
                    ->with('PC_protocole')
                        ->addViolation("Le protocole doit être renseigné")
                    ->end()
                ;
            }
        }
        if($object->getChildType() != 'C7'){
            if($object->getTRSCHYPProtocole()!=null){
                $em->remove($object->getTRSCHYPProtocole());
                $object->setTRSCHYPProtocole(null);
            }
        }else{
            if($object->getTRSCHYPProtocole()==null){
                $errorElement
                    ->with('TRSC_HYP_protocole')
                        ->addViolation("Le protocole doit être renseigné")
                    ->end()
                ;
            }
        }
        if($object->getChildType() != 'C8'){
            if($object->getTRSCEPIProtocole()!=null){
                $em->remove($object->getTRSCEPIProtocole());
                $object->setTRSCEPIProtocole(null);
            }
        }else{
            if($object->getTRSCEPIProtocole()==null){
                $errorElement
                    ->with('TRSC_EPI_protocole')
                        ->addViolation("Le protocole doit être renseigné")
                    ->end()
                ;
            }
        }
        if($object->getChildType() != 'C9'){
            if($object->getCMTGGOELProtocole()!=null){
                $em->remove($object->getCMTGGOELProtocole());
                $object->setCMTGGOELProtocole(null);
            }
        }else{
            if($object->getCMTGGOELProtocole()==null){
                $errorElement
                    ->with('CMTG_GOEL_protocole')
                        ->addViolation("Le protocole doit être renseigné")
                    ->end()
                ;
            }
        }

        if($object->getChildType()==null){
            $errorElement
                ->with('childType')
                    ->addViolation("Le type de protocole doit être renseigné")
                ->end()
            ;
        }

        if($object->getObservateurs()==null || count($object->getObservateurs())==0){
            $errorElement
                ->with('observateurs')
                    ->addViolation("Au moins un observateur doit être renseigné")
                ->end()
            ;
        }
    }
}
