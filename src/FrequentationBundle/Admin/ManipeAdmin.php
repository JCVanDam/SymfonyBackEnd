<?php

namespace FrequentationBundle\Admin;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ManipeAdmin extends AbstractAdmin
{
    protected function configureRoutes(\Sonata\AdminBundle\Route\RouteCollection $collection)
    {
        $collection->add('autorisation', 'autorisation');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $subject = $this->getSubject();
        $formMapper
        ->add('statut', TextType::class, [
              'attr' => ['readonly' => true],
        ])
        ->add('nomManipe', 'text')
        // ->add('chefManipe', EntityType::class, [
        //         'class' => 'FrequentationBundle\Entity\User'
        //       ])
        ->add('programme', EntityType::class, [
                'class' => 'FrequentationBundle\Entity\Programme',
                 'multiple' => true,
              ]);

        // ->add('programme', 'sonata_type_model', [
        //     'class' => 'FrequentationBundle\Entity\Programme',
        //     'property' => 'id',
        //     "btn_add" => false,
        //     'multiple' => true,

        // ])


        // ->add('users', EntityType::class, [
        //         'class' => 'FrequentationBundle\Entity\User',
        //         'label'=>'Manipeurs de la sortie',
        //         'multiple' => true,
        //       ])  ;

        if ($this->id($this->getSubject())) {
            $formMapper->add('mouvements', 'sonata_type_collection', [
                'required' => true,
                'by_reference' => false,

            ], [
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'position',

            ])
            ;
        }

         $formMapper->add('commentaire', 'textarea',array('required'=>false))
        ->add('commentaireresnat', 'textarea',array('required'=>false))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->addIdentifier('nomManipe', 'text')
        ->add('statut', 'text')
        ->add('commentaire', 'textarea')
        ->add('comentaireresnat', 'textarea')
        ->add('toponyme', null, ['associated_property' => 'id'])
        ->add('nomSite', 'text',['label' => 'Nom du site'])
        ->add('nomIdentiteSite', 'text',  ['label' => 'Nom identite du site'])
        ->add('dateSaisie', 'datetime', ['label' => 'Date de saisie'])
        ->add('district', 'text', ['label' => 'District'])
        ->add('altitude', 'text', ['label' => 'Altitude'])
        ->add('secteur', 'text', ['label' => 'Secteur'])
        ->add('codeGps', 'text', ['label' => 'Code GPS'])
        ->add('maille', 'text', ['label' => 'Maille'])
        ->add('distanceMer', 'text', ['label' => 'Distance a la Mer'])
        ;
    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nomManipe')
        ;
    }

    public function preValidate($object)
    {
       $object->setStatut("en Rédaction ");
    }

    public function prePersist($object)
    {
        $object->setStatut("En attente");
    }

}
