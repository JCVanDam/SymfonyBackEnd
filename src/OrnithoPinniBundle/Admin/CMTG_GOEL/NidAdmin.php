<?php
namespace OrnithoPinniBundle\Admin\CMTG_GOEL;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use OrnithoPinniBundle\Form\Type\CustomintegerType;

class NidAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
      $formMapper
        ->with('Passages', array('class' => 'col-md-12'))
            ->add('passage', 'sonata_type_model_hidden')
            ->add('nidVide', null, array(
                 'label' => "Nid vide ?",
                 'required' => false
            ))
            ->add('nbOeufs', 'integer', array(
                 'label' => "Nombre d'oeufs *",
                 'required' => false,
                 'attr' => array('min' => '0')
            ))
            ->add('saisieSourisOeufs', CustomintegerType::class, array(
                'label' => " ",
                'required' => false,
                'mapped' => false,
                'data' => [
                  'unite' => 'w',
                  'fieldname' => 'nbOeufs'
                ]
            ))
            ->add('nbPoussins', 'integer', array(
                 'label' => "Nombre de poussins *",
                 'required' => false,
                 'attr' => array('min' => '0')
            ))
            ->add('saisieSourisPoussins', CustomintegerType::class, array(
                'label' => " ",
                'required' => false,
                'mapped' => false,
                'data' => [
                  'unite' => 'p',
                  'fieldname' => 'nbPoussins'
                ]
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
        if($object->getNidVide()==false){
            if($object->getNbOeufs()==null && $object->getNbOeufs()!=0){
                $errorElement
                    ->with('nbOeufs')
                        ->addViolation("Le nombre d'oeufs doit être renseigné")
                    ->end()
                ;
            }
            if($object->getNbPoussins()==null && $object->getNbPoussins()!=0){
                $errorElement
                    ->with('nbPoussins')
                        ->addViolation("Le nombre de poussins doit être renseigné")
                    ->end()
                ;
            }
        }else{
            $object->setNbPoussins(0);
            $object->setNbOeufs(0);
        }
    }

}
