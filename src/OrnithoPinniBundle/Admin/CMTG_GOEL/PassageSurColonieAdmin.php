<?php
namespace OrnithoPinniBundle\Admin\CMTG_GOEL;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class PassageSurColonieAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
      $formMapper
        ->with('Colonie', array('class' => 'col-md-12'))
            ->add('colonie', null, array(
                'label' => "Colonie *",
                'required' => false
            ))
        ->end()
        ->with('Passage', array('class' => 'col-md-12'))
            ->add('protocole', 'sonata_type_model_hidden')
            ->add('nbJeunesMobiles', null, array(
                'required' => false,
                'label' => 'Nombre de jeunes mobiles *',
                'attr' => array('min' => '0')
            ))
        ->end()
        ->with('Nids', array('class' => 'col-md-12'))
            ->add('nids', 'sonata_type_collection', array(
                'required' => false,
                'label' => 'Nids *',
                'by_reference' => false
            ),array(
                'edit' => 'inline',
                'inline' => 'table'
            ))
            ->add('remarque', null, array(
                'required' => false,
                'label' => 'Remarque'
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
        if($object->getNids()==null || count($object->getNids())==0){
            $errorElement
                ->with('nids')
                    ->addViolation("Au moins un nid doit être renseigné")
                ->end()
            ;
        }
        if($object->getNbJeunesMobiles()==null){
            $errorElement
                ->with('nbJeunesMobiles')
                    ->addViolation("Le nombre de jeunes mobiles doit être renseigné")
                ->end()
            ;
        }
        if($object->getColonie()==null){
            $errorElement
                ->with('colonie')
                    ->addViolation("La colonie doit être renseignée")
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
        foreach($o->getNids() as $child){
            $child->setPassage($o);
        }
    }

}
