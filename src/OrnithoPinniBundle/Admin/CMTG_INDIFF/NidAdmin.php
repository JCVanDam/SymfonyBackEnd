<?php
namespace OrnithoPinniBundle\Admin\CMTG_INDIFF;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class NidAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
            ->add('protocole', 'sonata_type_model_hidden')
            ->add('nb_oeufs', 'integer', array(
                 'label' => "Nombre d'oeufs *",
                 'required' => false,
                 'attr' => array('min' => '0')
            ))
            ->add('nb_poussins', 'integer', array(
                 'label' => "Nombre de poussins *",
                 'required' => false,
                 'attr' => array('min' => '0')
            ))
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
      if($object->getNbOeufs()==null && $object->getNbOeufs()!=0){
          $errorElement
              ->with('nb_oeufs')
                  ->addViolation("Le nombre d'oeufs doit être renseigné")
              ->end()
          ;
      }
      if($object->getNbPoussins()==null && $object->getNbPoussins()!=0){
          $errorElement
              ->with('nb_poussins')
                  ->addViolation("Le nombre de poussins doit être renseigné")
              ->end()
          ;
      }
    }
}
