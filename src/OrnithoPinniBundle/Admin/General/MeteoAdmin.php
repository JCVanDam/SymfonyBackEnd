<?php
namespace OrnithoPinniBundle\Admin\General;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class MeteoAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $list = $this->getConfigurationPool()->getContainer()->get('static_list');
        $formMapper
            ->add('visibilite','choice', array(
                 'choices' => $list->getVisibilites(),
                 'label' => "Visibilité",
                 'placeholder' => 'Choisir...'
            ))
            ->add('vent','choice', array(
                 'choices' => $list->getVents(),
                 'label' => "Vent",
                 'placeholder' => 'Choisir...'
            ))
            ->add('couverture_nuageuse','choice', array(
                 'choices' => $list->getCouverturesNuageuses(),
                 'label' => "Couverture nuageuse",
                 'placeholder' => 'Choisir...'
            ))
            ->add('precipitations','choice', array(
                 'choices' => $list->getPrecipitations(),
                 'label' => "Précipitations",
                 'placeholder' => 'Choisir...'
            ))
            ->add('couverture_neigeuse_au_sol','choice', array(
                 'choices' => $list->getCouverturesNeigeusesAuSol(),
                 'label' => "Couverture neigeuse au sol",
                 'placeholder' => 'Choisir...'
            ))
            ->add('lune','choice', array(
                 'choices' => $list->getLunes(),
                 'label' => "Lune",
                 'placeholder' => 'Choisir...'
            ))
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
    }
}
