<?php
namespace CommersonBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sonata\CoreBundle\Validator\ErrorElement;

class BiopsieAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $list = $this->getConfigurationPool()->getContainer()->get('commerson_static_list');
        $formMapper
            ->tab('Informations')
                ->with('Générales', array('class' => 'col-md-6'))
                    ->add('numeroBiopsie', 'integer', array(
                         'label' => 'Numéro de la Biopsie',
                         'attr' => array('min'=> 0)
                    ))
                    ->add('whaleID', null, array(
                         'label' => "Identifiant de l'animal"
                    ))
                    ->add('observation', null, array(
                          'label' => "Code de l'observation",
                          'class' => 'CommersonBundle\Entity\Observation',
                          'choice_label' => 'code_observation'
                    ))
                    ->add('positionBiopsie', 'choice', array(
                          'choices' => $list->getPositions(),
                          'label' => "Position de la biopsie"
                    ))
                    ->add('bateau','choice', array(
                         'choices' => $list->getBateaux(),
                         'label' => "Bateau"
                    ))
                ->end()
                ->with('Localisation', array('class' => 'col-md-6'))
                     ->add('latitude', 'number', array(
                           'label' => 'Latitude'
                     ))
                     ->add('longitude', null, array(
                           'label' => 'Longitude'
                     ))
                     ->add('date',"datetime", array(
                           'label' => "Date de la biopsie (YYYY.MM.DD - HH.mm)"
                     ))
                     ->add('waypoint', null, array(
                           'label' => 'Waypoint'
                     ))
                ->end()
            ->end()
            ->tab('Manipulation')
                ->with('Préparations', array('class' => 'col-md-6'))
                    ->add('arme','choice', array(
                          'choices' => $list->getArmes(),
                          'label' => "Type d'arme"
                    ))
                    ->add('modeleArme', null, array(
                         'label' => "Modèle de l'arme"
                    ))
                    ->add('dimensionEmbout', null, array(
                         'label' => "Dimension de l'embout (en millimètres)"
                    ))
                    ->add('distanceTir', null, array(
                         'label' => "Distance de tir (en mètres)"
                    ))
                    ->add('tireur', null, array(
                          'class' => 'CommersonBundle\Entity\MyUser',
                          'choice_label' => function($user){return $user;}
                    ))
                ->end()
                ->with('Résultats', array('class' => 'col-md-6'))
                    ->add('emboutTouche', 'choice', array(
                        'label' => "L'embout a-t-il touché la cible ?",
                        'choices' => array(
                            "Non" => 0,
                            "Oui" => 1
                        )
                    ))
                    ->add('emboutPenetre', 'choice', array(
                        'label' => "L'embout a-t-il penétré la cible ?",
                        'choices' => array(
                            "Non" => 0,
                            "Oui" => 1
                        )
                    ))
                    ->add('emboutRecupere', 'choice', array(
                        'label' => "L'embout a-t-il été récuperé ?",
                        'choices' => array(
                            "Non" => 0,
                            "Oui" => 1
                        )
                    ))
                    ->add('echantillonPeau', 'choice', array(
                        'label' => "Avez-vous récuperé un échantillon de peau ?",
                        'choices' => array(
                            "Non" => 0,
                            "Oui" => 1
                        )
                    ))
                    ->add('echantillonChair', 'choice', array(
                        'label' => "Avez-vous récuperé un échantillon de chair ?",
                        'choices' => array(
                            "Non" => 0,
                            "Oui" => 1
                        )
                    ))
                ->end()
            ->end()
            ->tab('Comportement')
                ->with('Généralités', array('class' => 'col-md-6'))
                    ->add('reactionIndividu','choice', array(
                          'choices' => $list->getReactionsIndividu(),
                          'label' => "Réaction de l'individu"
                    ))
                    ->add('comportementIndividuSelect', 'choice', array(
                         'choices' => $list->getBehaviors(),
                         'label' => "Comportement de l'individu"
                    ))
                    ->add('reactionGroupe','choice', array(
                          'choices' => $list->getReactionsGroupe(),
                          'label' => "Réaction du groupe"
                    ))
                    ->add('comportementGroupeSelect', 'choice', array(
                         'choices' => $list->getBehaviors(),
                         'label' => "Comportement du groupe"
                    ))
                ->end()
                ->with('Remarques', array('class' => 'col-md-6'))
                    ->add('comportementGroupeAvant', null, array(
                         'label' => "Comportement du groupe (avant intervention)"
                    ))
                    ->add('comportementGroupeApres', null, array(
                         'label' => "Comportement du groupe (après intervention)"
                    ))
                ->end()
            ->end()
            ->tab('Autre')
                ->with('Fichiers', array('class' => 'col-md-6'))
                    ->add('videoOuiNon', null, array(
                         'label' => "Prise de vidéo(s)"
                    ))
                    ->add('fichiersVideos', null, array(
                         'label' => "Fichiers vidéo(s)"
                    ))
                    ->add('photoOuiNon', null, array(
                         'label' => "Prise de photo(s)"
                    ))
                    ->add('fichiersPhotos', null, array(
                         'label' => "Fichiers photo(s)"
                    ))
                ->end()
                ->with('Remarque', array('class' => 'col-md-6'))
                    ->add('remarque', null, array(
                         'label' => "Remarque"
                    ))
                ->end()
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper){
        unset($this->listModes['mosaic']);
        $datagridMapper->add('observation', null, array(
                            'label' => "Observation"
                       ))
                       ->add('whaleID', null, array(
                             'label' => "Identifiant de l'animal"
                       ))
                       ->add('arme', null, array(
                             'label' => "Type d'arme"
                       ))
        ;
    }

    protected function configureListFields(ListMapper $listMapper){
        $listMapper->add('numeroBiopsie', null, array(
                        'label' => "Numéro de la biopsie"
                   ))
                   ->add('observation', null, array(
                        'label' => "Observation"
                   ))
                   ->add('whaleID', null, array(
                         'label' => "Identifiant de l'animal"
                   ))
                   ->add('remarque', null, array(
                         'label' => "Remarque"
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

    public function configureShowFields(ShowMapper $showMapper){
      $showMapper->tab('Informations')
                    ->with('Générales', array('class' => 'col-md-6'))
                        ->add('observation', null, array(
                              'label' => "Code de l'observation"
                        ))
                        ->add('numeroBiopsie', null, array(
                             'label' => 'Numéro de la Biopsie'
                        ))
                        ->add('whaleID', null, array(
                             'label' => "Identifiant de l'animal"
                        ))
                        ->add('positionBiopsie', null, array(
                             'label' => "Position de la biopsie"
                        ))
                        ->add('bateau','choice', array(
                             'label' => "Bateau"
                        ))
                    ->end()
                    ->with('Localisation', array('class' => 'col-md-6'))
                         ->add('latitude', 'number', array(
                               'label' => 'Latitude'
                         ))
                         ->add('longitude', null, array(
                               'label' => 'Longitude'
                         ))
                         ->add('date',"datetime", array(
                               'label' => "Date de la biopsie (YYYY.MM.DD - HH.mm)"
                         ))
                         ->add('waypoint', null, array(
                               'label' => 'Waypoint'
                         ))
                    ->end()
                ->end()
      ->tab('Manipulation')
          ->with('Préparations', array('class' => 'col-md-6'))
              ->add('arme','choice', array(
                    'label' => "Type d'arme"
              ))
              ->add('modeleArme', null, array(
                   'label' => "Modèle de l'arme"
              ))
              ->add('dimensionEmbout', null, array(
                   'label' => "Dimension de l'embout (en millimètres)"
              ))
              ->add('distanceTir', null, array(
                   'label' => "Distance de tir (en mètres)"
              ))
              ->add('tireur', null, array(
                    'label' => "Tireur"
              ))
          ->end()
          ->with('Résultats', array('class' => 'col-md-6'))
              ->add('emboutTouche', null, array(
                  'label' => "L'embout a-t-il touché la cible ?"
              ))
              ->add('emboutPenetre', null, array(
                  'label' => "L'embout a-t-il penétré la cible ?"
              ))
              ->add('emboutRecupere', null, array(
                  'label' => "L'embout a-t-il été récuperé ?"
              ))
              ->add('echantillonPeau', null, array(
                  'label' => "Avez-vous récuperé un échantillon de peau ?"
              ))
              ->add('echantillonChair', null, array(
                  'label' => "Avez-vous récuperé un échantillon de chair ?"
              ))
          ->end()
      ->end()
      ->tab('Comportement')
          ->with('Généralités', array('class' => 'col-md-6'))
              ->add('reactionIndividu',null, array(
                    'label' => "Réaction de l'individu"
              ))
              ->add('comportementIndividuSelect', null, array(
                   'label' => "Comportement de l'individu"
              ))
              ->add('reactionGroupe',null, array(
                    'label' => "Réaction du groupe"
              ))
              ->add('comportementGroupeSelect', null, array(
                   'label' => "Comportement du groupe"
              ))
          ->end()
          ->with('Remarques', array('class' => 'col-md-6'))
              ->add('comportementGroupeAvant', null, array(
                   'label' => "Comportement du groupe (avant intervention)"
              ))
              ->add('comportementGroupeApres', null, array(
                   'label' => "Comportement du groupe (après intervention)"
              ))
          ->end()
      ->end()
      ->tab('Autre')
          ->with('Fichiers', array('class' => 'col-md-6'))
              ->add('videoOuiNon', null, array(
                   'label' => "Prise de vidéo(s)"
              ))
              ->add('fichiersVideos', null, array(
                   'label' => "Fichiers vidéos"
              ))
              ->add('photoOuiNon', null, array(
                   'label' => "Prise de photo(s)"
              ))
              ->add('fichiersPhotos', null, array(
                   'label' => "Fichiers photos"
              ))
          ->end()
          ->with('Remarque', array('class' => 'col-md-6'))
              ->add('remarque', null, array(
                   'label' => "Remarque"
              ))
          ->end()
      ->end()
      ;
    }
}
