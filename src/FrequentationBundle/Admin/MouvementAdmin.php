<?php

namespace FrequentationBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Sonata\CoreBundle\Form\Type\DateTimePickerType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MouvementAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        // On filtre la liste des sites et des transits selon la variable globale district
        // $district=$this->getConfigurationPool()->getContainer()->getParameter('district');
        $district= "Amsterdam";
        $formMapper
        ->add('zoneDepart', 'entity', array(
                    'required' => true,
                    'class'    => 'FrequentationBundle:zoneSite',
                    'multiple' => false,

                    'query_builder' => function(\Doctrine\ORM\EntityRepository $er) use ($district) {
                        return $er->getZoneDistrict($district);
                    })
        )
        ->add('dateDepart', DatePickerType::class, array(
                    'dp_collapse'           => true,
                    'dp_calendar_weeks'     => true,
                    'dp_view_mode'          => 'days',
                    'dp_min_view_mode'      => 'days',
                    'format' => 'dd.MM.yyyy'

        ))
       ->add('itineraire', 'entity', array(
                    'required' => true,
                    'class'    => 'FrequentationBundle:zoneSite',
                    'multiple' => false,
                    'query_builder' => function(\Doctrine\ORM\EntityRepository $er) use ($district) {
                        return $er->getTransitDistrict($district);
                    })
        )

        ->add('zoneArrivee', 'entity', array(
                    'required' => true,
                    'class'    => 'FrequentationBundle:zoneSite',
                    'multiple' => false,
                    'query_builder' => function(\Doctrine\ORM\EntityRepository $er) use ($district) {
                        return $er->getZoneDistrict($district);
                    })
        )
        ->add('jourTransit','integer')
        ->add('dateArrivee', DatePickerType::class, array(
                    'dp_collapse'           => true,
                    'dp_calendar_weeks'     => true,
                    'dp_view_mode'          => 'days',
                    'dp_min_view_mode'      => 'days',
                    'format' => 'dd.MM.yyyy'

        ))
        // ->add('users', EntityType::class, [
        //         'class' => 'FrequentationBundle\Entity\User',
        //         'label'=>'Manipeurs pour ce  mouvement',
        //         'multiple' => true,
        //       ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->addIdentifier('zoneDepart', 'text')
        ->add('zoneArrivee', 'text')
        ->add('itineraire', 'text')
        ->add('dateArrivee', 'datetime')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {

    }

    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Mouvement'; // shown in the breadcrumb on the create view
    }

     public function prePersist($object)
    {
       // dump($object);die;
    //    $user = $this
    //    ->getConfigurationPool()
    //    ->getContainer()
    //    ->get('security.token_storage')->getToken()->getUser();

    //    $object->setChefmanipe($user)->getId();


     }


      public function preUpdate($object)
      {
        // dump($object);die;
    //     // $user = $this->getConfigurationPool()
    //     // ->getContainer()
    //     // ->get('security.token_storage')
    //     // ->getToken()
    //     // ->getUser();

    //     // $object->setChefmanipe($user)->getId();
       }


    // public function createQuery($context = 'list')
    // {
    //     // $query = parent::createQuery($context);

    //     // dump($this->getConfigurationPool()->getContainer()->getParameter('district'));die;
    //     // $user=$this->getConfigurationPool()->getContainer()->get('security.token_storage')
    //     // ->getToken()->getUser();

    //     // $execQuery=true;
    //     // foreach( $user->getRoles() as $role)
    //     // {
    //     //     if($role == "ROLE_ADMIN"){
    //     //             $execQuery=false;
    //     //     }
    //     // }

    //     // if($execQuery === true ){

    //     //     $query
    //     //           ->andWhere($query->expr()
    //     //                             ->eq($query
    //     //                             ->getRootAliases()[0] . '.chefmanipe', ':chefmanipe')
    //     //     );
    //     //     $query->setParameter('chefmanipe', $user->getId());
    //     // }

    //     // return $query;

    // }
}
