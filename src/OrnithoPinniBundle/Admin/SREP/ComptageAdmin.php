<?php
namespace OrnithoPinniBundle\Admin\SREP;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class ComptageAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $list = $this->getConfigurationPool()->getContainer()->get('static_list');
        $formMapper
        ->with('Saisies', array('class' => 'col-md-12'))
            ->add('passage', 'sonata_type_model_hidden')
            ->add('type_effectif','choice', array(
                 'choices' => $list->getSaisieTypes02(),
                 'label' => "Type d'effectif *",
                 'required' => false,
                 'placeholder' => 'Choisir...'
            ))
            ->add('comptage01', 'integer', array(
                 'label' => "Comptage 01 *",
                 'required' => false,
                 'attr' => array('min' => '0')
            ))
            ->add('comptage02', 'integer', array(
                 'label' => "Comptage 02",
                 'required' => false,
                 'attr' => array('min' => '0')
            ))
            ->add('comptage03', 'integer', array(
                 'label' => "Comptage 03",
                 'required' => false,
                 'attr' => array('min' => '0')
            ))
            ->add('comptage04', 'integer', array(
                 'label' => "Comptage 04",
                 'required' => false,
                 'attr' => array('min' => '0')
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
      if($object->getComptage01()==null && $object->getComptage01()!=0){
        $errorElement
            ->with('comptage01')
                ->addViolation("Au moins un comptage doit être renseigné")
            ->end()
        ;
      }else{
          $moyenne = $object->getComptage01();
          $nb = 1;
          if($object->getComptage02()!=null){
              $moyenne += $object->getComptage02();
              $nb++;
          }
          if($object->getComptage03()!=null){
              $moyenne += $object->getComptage03();
              $nb++;
          }
          if($object->getComptage04()!=null){
              $moyenne += $object->getComptage03();
              $nb++;
          }
          $object->setMoyenne($moyenne/$nb);
      }
      if($object->getTypeEffectif()==null){
          $errorElement
              ->with('typeEffectif')
                  ->addViolation("Le type d'effectif doit être renseigné")
              ->end()
          ;
      }
    }

}
