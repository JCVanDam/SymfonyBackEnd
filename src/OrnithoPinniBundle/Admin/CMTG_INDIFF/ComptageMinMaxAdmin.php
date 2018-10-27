<?php
namespace OrnithoPinniBundle\Admin\CMTG_INDIFF;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class ComptageMinMaxAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $list = $this->getConfigurationPool()->getContainer()->get('static_list');
        $formMapper
            ->add('typeEffectif','choice', array(
                 'choices' => $list->getTypesEffectifs(),
                 'label' => "Type d'effectif"
            ))
            ->add('minimum', null, array(
                 'label' => "Minimum *",
                 'required' => false,
                 'attr' => array('min' => '0')
            ))
            ->add('maximum', null, array(
                 'label' => "Maximum *",
                 'required' => false,
                 'attr' => array('min' => '0')
            ))
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
      if($object->getMinimum()==null){
          $errorElement
              ->with('minimum')
                  ->addViolation("Le minimum doit être renseigné")
              ->end()
          ;
      }
      if($object->getMaximum()==null){
          $errorElement
              ->with('maximum')
                  ->addViolation("Le maximum doit être renseigné")
              ->end()
          ;
      }
      if($object->getMaximum()!=null && $object->getMinimum()!=null && ($object->getMaximum()<$object->getMinimum())){
          $errorElement
              ->with('maximum')
                  ->addViolation("Le maximum doit être supérieur au minimum")
              ->end()
          ;
      }
    }

}
