<?php
namespace OrnithoPinniBundle\Admin\General;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use PortalBundle\Form\Type\CartoType;

class Position_GPSAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $list = $this->getConfigurationPool()->getContainer()->get('static_list');
        $formMapper
            ->add('Carte', CartoType::class, array(
                'label' => " ",
                'mapped' => false,
                'required' => false,
                'data' => array(
                    'heure' => 'heure',
                    'latitude' => 'latitude',
                    'longitude' => 'longitude',
                    'altitude' => 'altitude',
                    'nom' => 'idPtGps',
                    'districts' => ['Kerguelen', 'Amsterdam', 'Possession', 'Crozet', 'Saint-Paul'],
                    'astuce' => 'Vous pouvez glisser un fichier GPX directement sur la carte!',
                    'info' => 'Vous pouvez également saisir à la main toutes les données!'
                )
            ))
            ->add('idPtGps', null, array(
                'label' => 'Waypoint',
                'required' => false
            ))
            ->add('numeroGps', null, array(
                'label' => 'Numéro GPS',
                'required' => false
            ))
            ->add('origine','choice', array(
                 'choices' => $list->getOrigines(),
                 'label' => "Origine *",
                 'placeholder' => 'Choisir...',
                 'required' => false
            ))
            ->add('latitude', null, array(
                'label' => 'Latitude *',
                'required' => false
            ))
            ->add('longitude', null, array(
                'label' => 'Longitude *',
                'required' => false
            ))
            ->add('isAltitudeSIG', null, array(
                'label' => 'Altitude depuis SIG ?',
                'required' => false
            ))
            ->add('altitude', null, array(
                'label' => 'Altitude',
                'required' => false
            ))
            ->add('heure', 'time', array(
                'label' => 'Heure',
                'required' => false
            ))
            ->add('remarque', null, array(
                'label' => 'Remarque',
                'required' => false
            ))
        ;
    }

    protected function configureListFields(ListMapper $listMapper){
        unset($this->listModes['mosaic']);
        $listMapper
            ->add('id', null, [
                'label' => 'Identifiant'
            ])
            ->add('idPtGps', null, array(
                'label' => 'Waypoint'
            ))
            ->add('latitude', null, array(
                'label' => 'Latitude'
            ))
            ->add('longitude', null, array(
                'label' => 'Longitude'
            ))
            ->add('origine', null, array(
                'label' => 'Origine'
            ))
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
      //Gérer la génération du point !

      if($object->getLatitude()==null){
          $errorElement
              ->with('latitude')
                  ->addViolation("La latitude doit être renseignée")
              ->end()
          ;
      }
      if($object->getLongitude()==null){
          $errorElement
              ->with('longitude')
                  ->addViolation("La longitude doit être renseignée")
              ->end()
          ;
      }
      if($object->getOrigine()==null){
          $errorElement
              ->with('origine')
                  ->addViolation("L'origine doit être renseignée")
              ->end()
          ;
      }
    }
}
