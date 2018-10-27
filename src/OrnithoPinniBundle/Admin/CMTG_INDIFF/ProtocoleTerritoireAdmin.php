<?php
namespace OrnithoPinniBundle\Admin\CMTG_INDIFF;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class ProtocoleTerritoireAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
            ->add('nbTerritoires', 'integer', array(
                'label' => 'Nombre de territoires *',
                'required' => false,
                'attr' => array('min' => '0')
            ))
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
      if($object->getNbTerritoires()==null){
          $errorElement
              ->with('nbTerritoires')
                  ->addViolation("Le nombre de territoires doit être renseigné")
              ->end()
          ;
      }
    }
}
