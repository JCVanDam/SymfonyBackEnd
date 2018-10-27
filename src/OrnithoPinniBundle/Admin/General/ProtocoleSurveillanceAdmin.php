<?php
namespace OrnithoPinniBundle\Admin\General;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;

class ProtocoleSurveillanceAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $list = $this->getConfigurationPool()->getContainer()->get('static_list');
        $formMapper
                ->with('Observation', array('class' => 'col-md-12'))
                    ->add('code', null, array(
                         'label' => "Code",
                         'required' => false,
                         'attr' => ['readonly' => true]
                    ))
                ->end()
                ->with('Protocole', array('class' => 'col-md-12'))
                    ->add('childType', ChoiceFieldMaskType::class, [
                        'choices' => [
                            'Surveillance échouage' => 'C1',
                            'Surveillance épidémiologique (SAGIR)' => 'C2'

                        ],
                        'map' => [
                          'C1' => ['ECHOUAGE_protocole'],
                          'C2' => ['SAGIR_protocole']
                        ],
                        'required' => false,
                        'label' => "Type de protocole *",
                        'placeholder' => 'Choisir un type de protocole',
                    ])
                    ->add('ECHOUAGE_protocole', 'sonata_type_admin', array(
                        'label' => 'Surveillance échouage *',
                        'required' => false,
                        'attr' => ["style" => "padding-left:5%;"]
                    ))
                    ->add('SAGIR_protocole', 'sonata_type_admin', array(
                        'label' => 'Surveillance épidémiologique (SAGIR) *',
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
            if($object->getECHOUAGEProtocole()!=null){
                $em->remove($object->getECHOUAGEProtocole());
                $object->setECHOUAGEProtocole(null);
            }
        }else{
            if($object->getECHOUAGEProtocole()==null){
                $errorElement
                    ->with('CMTG_ECHOUAGE_protocole')
                        ->addViolation("Le protocole doit être renseigné")
                    ->end()
                ;
            }
        }
        if($object->getChildType() != 'C2'){
            if($object->getSAGIRProtocole()!=null){
                $em->remove($object->getSAGIRProtocole());
                $object->setSAGIRProtocole(null);
            }
        }else{
            if($object->getSAGIRProtocole()==null){
                $errorElement
                    ->with('CMTG_SAGIR_protocole')
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
    }
}
