<?php
namespace OrnithoPinniBundle\Admin\SAGIR;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class ProtocoleAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
            ->add('decouvertes', 'sonata_type_collection', array(
                'required' => false,
                'label' => "Découvertes *",
                "by_reference" => false
            ),array(
                'edit' => 'inline',
                'inline' => 'table'
            ))
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
        if($object->getDecouvertes()==null || count($object->getDecouvertes())==0){
            $errorElement
                ->with('decouvertes')
                    ->addViolation("Au moins une découverte doit être renseignée")
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
        foreach($o->getDecouvertes() as $child){
            $child->setProtocole($o);
        }
    }
}
