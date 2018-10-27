<?php
namespace OrnithoPinniBundle\Admin\CMTG_INDIFF;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class ProtocoleClasseAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $list = $this->getConfigurationPool()->getContainer()->get('static_list');
        $formMapper
            ->add('classe', 'choice', array(
              'choices' => $list->getClasses(),
              'required' => false,
              'label' => 'Classe *'
            ))
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
      if($object->getClasse()==null){
          $errorElement
              ->with('classe')
                  ->addViolation("La classe doit être renseignée")
              ->end()
          ;
      }
    }
}
