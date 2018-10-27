<?php

namespace HFIBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\AdminType;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Sonata\CoreBundle\Form\Type\DateTimePickerType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

use HFIBundle\Entity\Eradication;
use HFIBundle\Entity\FicheTerrain;
use HFIBundle\Entity\TypeMilieu;
use HFIBundle\Entity\MethodologieInvertebre;
use PortalBundle\Form\Type\CartoType;

use \Datetime;

class ObservationAdmin extends AbstractAdmin
{

    protected $datagridValues = [
      '_sort_order' => 'DESC',
    ];

    protected function configureFormFields(FormMapper $formMapper)
    {
      $userNameList = [];
      $list = $this
        ->getConfigurationPool()
        ->getContainer()
        ->get('usefull.hfi.static_list');
      $users = $this
        ->getConfigurationPool()
        ->getContainer()
        ->get('doctrine')
        ->getEntityManager('user')
        ->getRepository('ApplicationSonataUserBundle:User', 'user')
        ->findAll();
      foreach ($users as $key => $value){
        $userNameList[$value->getUsername()] = $value->getUsername();
      }
      if ($this->isCurrentRoute('create'))
      {
        $formMapper
          ->tab('Informations sur l\'observation')
            ->with('Information protocole', ['class' => 'col-md-12'])
              ->add('protocole', ChoiceFieldMaskType::class,
                [
                  'label' => 'Protocole',
                  'choices' => $list->getProtocole(),
                  'map' => [
                    'Autre' => ['nProtocoleAutre'],
                    'Restauration Phylica' => ['numeroPlantation', 'nbPhylica'],
                    'Eradication' => ['identifiantManip']
                  ],
                  'placeholder' => 'Choisir un protocole',
                  'required' => false
                ])
              ->add('nProtocoleAutre', null,
                [
                  'label' => 'Protocole autre',
                  'required' => false
                ])
            ->end()
            ->with('Identifiant', ['class' => 'col-md-4'])
              ->add('numeroObservation', 'text',
                [
                  'label' => 'Numéro d\'Observation',
                  'required' => false
                ])
              ->add('identifiantManip', 'text',
                [
                  'label' => 'Identifiant manip',
                  'required' => false
                ])
              ->add('numeroPlantation', 'text',
                [
                  'label' => 'Numéro plantation',
                  'required' => false
                ])
              ->add('nbPhylica', 'integer',
                [
                  'label' => 'Nombre de phylica',
                  'required' => false
                ])
            ->end()
            ->with('Date', ['class' => 'col-md-4'])
              ->add('dateObservation', DatePickerType::class,
                [
                  'label' => 'Date observation',
                  'dp_collapse'           => true,
                  'dp_calendar_weeks'     => true,
                  'dp_view_mode'          => 'days',
                  'dp_min_view_mode'      => 'days',
                  'format' => 'dd.MM.yyyy',
                  'required' => false
                ])
            ->end()
            ->with('Source', ['class' => 'col-md-4'])
              ->add('observationUser', 'choice',
                [
                  'label' => 'Auteur',
                  'choices' => $userNameList,
                  'multiple' => true,
                  'required' => false
                ])
              ->add('source', 'choice',
                [
                  'label' => 'Source',
                  'choices' => $list->getSource(),
                  'required' => false
                ])
            ->end()
            ->with('Localisation', ['class' => 'col-md-12'])
              ->add('Carte', CartoType::class, array(
                  'label' => " ",
                  'mapped' => false,
                  'data' => [
                      'latitude' => 'latitude',
                      'longitude' => 'longitude',
                      'altitude' => 'altitude',
                      'districts' => ['Kerguelen', 'Amsterdam', 'Crozet'],
                      'astuce' => 'Vous pouvez glisser un fichier GPX directement sur la carte!',
                      'info' => 'Vous pouvez également saisir à la main toutes les données!'
                  ]
              ))
              ->add('toponyme', EntityType::class,
                [
                  'class' => 'HFIBundle\Entity\Toponyme',
                  'choice_label' => 'nomSite'
                ])
              ->add('altitude', 'number',
                [
                  'label' => 'Altitude',
                  'required' => false
                ])
              ->add('latitude', 'number',
                [
                  'label' => 'Latitude (DDD WGS 84)',
                  'required' => false
                ])
              ->add('longitude', 'number',
                [
                  'label' => 'Longitude (DDD WGS 84)',
                  'required' => false
                ])
            ->end()
          ->end()
          ->tab('Fiche Terrain')
            ->with('Description', ['class' => 'col-md-6'])
              ->add('statutFicheTerrain', 'choice',
                [
                  'label' => 'Statut fiche terrain',
                  'choices' => [
                    'Fiche complète' => 'Fiche complète',
                    'Fiche incomplète' => 'Fiche incomplète'
                  ],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Surface', ['class' => 'col-md-6'])
              ->add('longueurFicheTerrain', 'integer',
                [
                  'label' => 'Longueur(mètres)',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('largeurFicheTerrain', 'integer',
                [
                  'label' => 'Largeur(mètres)',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Milieu', ['class' => 'col-md-4'])
              ->add('typeMilieu', 'choice',
                [
                  'label' => 'Type de milieu',
                  'choices' => $list->getTypeMilieu(),
                  'placeholder' => 'Définir le type de milieu',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('milieuAutre', 'text',
                [
                  'label' => 'Milieu autre',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Erosion', ['class' => 'col-md-4'])
              ->add('erosion', 'choice',
                [
                  'label' => 'Erosion',
                  'choices' => $list->getErosion(),
                  'multiple' => true,
                  'mapped' => false,
                  'required' => false
                ])
              ->add('erosionAutre', 'text',
                [
                  'label' => 'Erosion autre',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Habitat', ['class' => 'col-md-4'])
              ->add('habitat', 'choice',
                [
                  'label' => 'Habitat',
                  'choices' => $list->getHabitat(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('commentaireHabitat', 'text',
                [
                  'label' => 'Commentaire habitat',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Contexte', ['class' => 'col-md-4'])
              ->add('substrat', 'choice',
                [
                  'label' => 'Substrat',
                  'choices' => $list->getSubstrat(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('humidite', 'choice',
                [
                  'label' => 'Humidite',
                  'choices' => $list->getHumidite(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('categorieMeteo', 'choice',
                [
                  'label' => 'Catégorie météo',
                  'choices' => $list->getMeteo(),
                  'multiple' => true,
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Topographie', ['class' => 'col-md-4'])
              ->add('topographie', ChoiceFieldMaskType::class,
                [
                  'label' => 'Topographie',
                  'choices' => $list->getTypeTopo(),
                  'map' => [
                    'Autre' => ['topoAutre']
                  ],
                  'placeholder' => 'Définir une topographie',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('topoAutre', 'text',
                [
                  'label' => 'Topographie autre',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('pente', 'choice',
                [
                  'label' => 'Pente',
                  'choices' => $list->getPente(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('orientation', 'choice',
                [
                  'label' => 'Orientation',
                  'choices' => $list->getOrientation(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('conditionExposition', 'choice',
                [
                  'label' => 'Condition exposition',
                  'choices' => $list->getConditionExposition(),
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Recouvrement (en %, peut dépasser 100%)', ['class' => 'col-md-4'])
              ->add('recBlocs', 'integer',
                [
                  'label' => 'Blocs(>20cm)',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('recCailloux', 'integer',
                [
                  'label' => 'Cailloux(2 à 20cm)',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('recGraviers', 'integer',
                [
                  'label' => 'Graviers(2cm à 2mm)',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('recSols', 'integer',
                [
                  'label' => 'Sols(<2mm)',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('recStrateBryoLichenique', 'integer',
                [
                  'label' => 'Strate bryoLichenique',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('recStrateHerbacee', 'integer',
                [
                  'label' => 'Strate herbacée',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('recStrateArbustive', 'integer',
                [
                  'label' => 'Strate arbustive',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
          ->end()
          ->tab('Prélèvement')
            ->with('Prélèvement', ['class' => 'col-md-4'])
              ->add('lieuPrelevement', null,
                [
                  'label' => 'Commentaire sur le lieu de prélevement',
                  'required' => false
                ])
            ->end()
            ->with('Echantillons', ['class' => 'col-md-4'])
              ->add('echantillon', ChoiceFieldMaskType::class,
                [
                  'label' => 'Echantillon',
                  'choices' => $list->getBoolean(),
                  'map' => [
                    'true' => ['nombreEchantillon', 'typeEchantillon', 'referenceEchantillon']
                  ],
                  'data' => "false",
                  'placeholder' => 'Définir la présence ou l\'absence d\'échantillon',
                  'required' => false
                ])
              ->add('nombreEchantillon', 'integer',
                [
                  'label' => 'Nombre d\'échantillon',
                  'required' => false
                ])
              ->add('typeEchantillon', 'text',
                [
                  'label' => 'Type d\'échantillon',
                  'required' => false
                ])
              ->add('referenceEchantillon', 'text',
                [
                  'label' => 'Référence d\'échantillon',
                  'required' => false
                ])
            ->end()
          ->end()
          ->tab('Observation végétation')
            ->with('Description', ['class' => 'col-md-12'])
              ->add('statutDescriptionVegetations', 'choice',
                [
                  'label' => 'Statut description végétation',
                  'choices' => [
                    'Liste espèces complète' => 'Liste espèces complète',
                    'Liste espèces incomplète' => 'Liste espèces incomplète'
                  ],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('', ['class' => 'col-md-12'])
              ->add('descriptionVegetations', 'sonata_type_collection',
                [
                  'label' => 'Description végétations',
                  'required' => true,
                  'by_reference' => false,
                ],
                [
                   'edit' => 'inline',
                   'inline' => 'table',
                   'sortable' => 'position',
                ]
              )
            ->end()
          ->end()
          ->tab('Observation vertébrés')
            ->with('', ['class' => 'col-md-10'])
              ->add('descriptionVertebres', 'sonata_type_collection',
                [
                  'label' => 'Description vertébrés',
                  'required' => true,
                  'by_reference' => false,
                ],
                [
                   'edit' => 'inline',
                   'inline' => 'table',
                   'sortable' => 'position',
                ]
              )
            ->end()
          ->end()
          ->tab('Observation invertébrés')
            ->with('Milieu', ['class' => 'col-md-4'])
              ->add('habitatInvertebre', 'choice',
                [
                  'label' => 'Habitat(à saisir si non saisi dans la fiche terrain)',
                  'choices' => $list->getHabitat(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('milieuPrelevement', 'choice',
                [
                  'label' => 'Milieu prélèvement',
                  'choices' => $list->getMilieuPrelevement(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('milieuAutre', 'text',
                [
                  'label' => 'Milieu autre',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Mode', ['class' => 'col-md-4'])
              ->add('modePrelevement', ChoiceFieldMaskType::class,
                [
                  'label' => 'Mode de prélèvement',
                  'choices' => $list->getModePrelevement(),
                  'map' => [
                    'berlese' => ['volLongueur', 'volLargeur', 'volHauteur'],
                    'tri manuel de terre' => ['volLongueur', 'volLargeur', 'volHauteur'],
                    'chasse a vue' => ['nbrePersonne','tpsParPers'],
                    'piege barber' => ['nbrePiege','tpsOuverture'],
                    'piege jaune' => ['nbrePiege','tpsOuverture'],
                    'piege jaune appate' => ['nbrePiege','tpsOuverture'],
                    'barquette' => ['planteHote'],
                    'lavages de plantes' => ['planteHote'],
                    'autre' => ['milieuAutre'],
                  ],
                  'placeholder' => 'Choisir un mode de prélèvement',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('nbrePersonne', 'integer',
                [
                  'label' => 'Nombre personne',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('tpsParPers', 'integer',
                [
                  'label' => 'Temps par personnes(min)',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('nbrePiege', 'integer',
                [
                  'label' => 'Nombre de pièges',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('tpsOuverture', 'integer',
                [
                  'label' => 'Temps d\'Ouverture(jours)',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('planteHote', EntityType::class,
                [
                  'class' => 'HFIBundle\Entity\SystematiqueFlore',
                  'choice_label' => function($e){return $e->concate();},
                  'label' => 'Plante hôte',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Volume', ['class' => 'col-md-4'])
              ->add('volLongueur', 'integer',
                [
                  'label' => 'Longueur(cm)',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('volLargeur', 'integer',
                [
                  'label' => 'Largeur(cm)',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('volHauteur', 'integer',
                [
                  'label' => 'Hauteur(cm)',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('', ['class' => 'col-md-10'])
              ->add('descriptionInvertebres', 'sonata_type_collection',
                [
                  'label' => 'Description invertébrés',
                  'required' => true,
                  'by_reference' => false,
                ],
                [
                   'edit' => 'inline',
                   'inline' => 'table',
                   'sortable' => 'position',
                ]
              )
            ->end()
          ->end()
          ->tab('Eradication')
            ->with('Espece', ['class' => 'col-md-6'])
              ->add('nomScientifique', EntityType::class,
                [
                  'class' => 'HFIBundle\Entity\SystematiqueFlore',
                  'label' => 'Nom scientifique',
                  'choice_label' => function($sysFlore){
                    if ($sysFlore->getOrigine() == "Introduite"){
                      return $sysFlore->getNomScientifique();
                    }
                  },
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Observation', ['class' => 'col-md-6'])
              ->add('typeObservation', ChoiceFieldMaskType::class,
                 [
                   'label' => 'Type d\'Observation',
                   'choices' => $list->getObservation(),
                   'map' => [
                     'A éradiquer' => [
                       'typeColonisation', 'nombrePiedApproximatif', 'phenologie',
                       'miseEnPot', 'miseEnHerbier', 'hautMoy', 'hautMax',
                       'calculeSurface', 'presenceGraine'
                     ],
                     'Première éradication' => [
                       'typeColonisation', 'arrachage', 'etatBachage', 'coupe',
                       'epandageSel', 'produitUtilise', 'dilution',
                       'traitementThermique',  'surfaceTraitement',
                       'nombrePiedApproximatif','phenologie',
                       'miseEnPot', 'miseEnHerbier', 'hautMoy', 'hautMax',
                       'calculeSurface', 'presenceGraine'
                     ],
                     'Présence' => [
                       'typeColonisation', 'arrachage', 'etatBachage', 'coupe',
                       'epandageSel', 'produitUtilise', 'dilution',
                       'traitementThermique',  'surfaceTraitement',
                       'nombrePiedApproximatif','phenologie',
                       'miseEnPot', 'miseEnHerbier', 'hautMoy', 'hautMax',
                       'calculeSurface', 'presenceGraine'
                      ]
                   ],
                   'placeholder' => 'Choisir un type d\'observation',
                   'mapped' => false,
                   'required' => false
                 ])
            ->end()
            ->with('Information population', ['class' => 'col-md-4'])
              ->add('phenologie','choice',
                [
                  'label' => 'Phénologie(stade le plus avancé)',
                  'choices' => $list->getPhenologie(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('presenceGraine', 'choice',
                [
                  'label' => 'Présence de graines',
                  'choices' => $list->getBoolean(),
                  'data' => 'false',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Surface', ['class' => 'col-md-4'])
              ->add('calculeSurface', ChoiceFieldMaskType::class,
                [
                  'label' => 'Mode de calcule de surface',
                  'choices' => [
                    'Surface réelle(m2)' => 'reelle',
                    'Surface estimé' => 'estime'
                  ],
                  'map' => [
                    'reelle' => ['longueurReelleTraite', 'largeurReelleTraite'],
                    'estime' => ['surfaceEstimation']
                  ],
                  'placeholder' => 'Choisir une méthode de calcule de surface',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('longueurReelleTraite', 'text',
                [
                  'label' => 'Longueur(en mètres)',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('largeurReelleTraite', 'text',
                [
                  'label' => 'Largeur(en mètres)',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('surfaceEstimation', 'choice',
                [
                  'label' => 'Surface estimé',
                  'choices' => $list->getSurfaceEstimee(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('nombrePiedApproximatif', ChoiceFieldMaskType::class,
                [
                  'label' => 'Nombre de pieds aproximatif',
                  'choices' => [
                    "Inférieur à 50" => 'false',
                    "Supérieur à 50" => 'true'
                  ],
                  'map' => [
                    'false' => ['nombrePiedExact']
                  ],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('nombrePiedExact','integer',
                [
                  'label' => 'Nombre pied exact',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Colonisation', ['class' => 'col-md-4'])
              ->add('typeColonisation', ChoiceFieldMaskType::class,
                [
                  'label' => 'Type de colonisation',
                  'choices' => $list->getColonisation(),
                  'map' => [
                  'disperse' => ['nbrPatch'],
                  'discontinu' => ['nbrPatch']
                ],
                  'placeholder' => 'Choisir un type de colonisation',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('nbrPatch', 'integer',
                [
                  'label' => 'Nombre de patch',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Hauteur', ['class' => 'col-md-12'])
              ->add('hautMoy','integer',
                [
                  'label' => 'hauteur moyenne(cm)',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('hautMax','integer',
                [
                  'label' => 'hauteur max(cm)',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Méthode mécanique', ['class' => 'col-md-6'])
              ->add('arrachage', 'choice',
                [
                  'label' => 'Arrachage',
                  'choices' => $list->getBoolean(),
                  'data' => 'false',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('etatBachage', 'choice',
                [
                  'label' => 'Bachage',
                  'choices' => $list->getEtatBachage(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('coupe', 'choice',
                [
                  'label' => 'Coupe',
                  'choices' => $list->getBoolean(),
                  'data' => 'false',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('traitementThermique', 'choice',
                [
                  'label' => 'Traitement thermique',
                  'choices' => $list->getBoolean(),
                  'data' => 'false',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Méthode chimique', ['class' => 'col-md-6'])
              ->add('epandageSel', 'choice',
                [
                  'label' => 'Epandage de sel',
                  'choices' => $list->getBoolean(),
                  'data' => 'false',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('produitUtilise', 'choice',
                [
                  'label' => 'Traitement chimique',
                  'choices' => $list->getProduit(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('dilution', 'number',
                [
                  'label' => 'Dilution(en %)',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Herbier', ['class' => 'col-md-12'])
              ->add('miseEnHerbier', 'choice',
                [
                  'label' => 'Mise en herbier',
                  'choices' => $list->getBoolean(),
                  'data' => 'false',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Surface traité', ['class' => 'col-md-6'])
              ->add('surfaceTraitement', ChoiceFieldMaskType::class,
                [
                  'label' => 'Surface traitée',
                  'choices' => [
                    'En totalité' => 'En totalité',
                    'En partie' => 'En partie'
                  ],
                  'map' => [
                    'En partie' => ['longueurTraite', 'largeurTraite']
                  ],
                  'placeholder' => 'Précisez la part de la surface colonisée traité',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('nbrPiedArrache', 'integer',
                [
                  'label' => 'Nombre pied arraché',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Surface traité(Longueur)', ['class' => 'col-md-3'])
              ->add('longueurTraite', 'integer',
                [
                  'label' => 'Longueur(en mètres)',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Surface traité(largeur)', ['class' => 'col-md-3'])
              ->add('largeurTraite', 'integer',
                [
                  'label' => 'Largeur(en mètres)',
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
          ->end()
          ->tab('Media')
            ->with('Photographie', ['class' => 'col-md-10'])
              ->add('photo', ChoiceFieldMaskType::class,
                [
                  'label' => 'Photographie',
                  'choices' => [
                    'Présence' => 'presence',
                    'Absence' => 'absence'
                  ],
                  'map' => [
                    'presence' => ['referencePhoto']
                  ],
                  'placeholder' => 'Définir la présence ou l\'absence de photographie',
                  'required' => false
                ])
              ->add('referencePhoto', null,
                [
                  'label' => 'Référence photographie',
                  'required' => false
                ])
            ->end()
          ->end()
          ->tab('Commentaire générale')
            ->with('Commentaire', ['class' => 'col-md-8'])
              ->add('commentaire', 'text',
                [
                  'required' => false
                ])
            ->end()
          ->end()
        ;
      } else
      {
        $ficheTerrain = $this
          ->getConfigurationPool()
          ->getContainer()
          ->get('doctrine')
          ->getEntityManager('hfi')
          ->getRepository('HFIBundle:Observation', 'hfi')
          ->getFicheTerrain($this->getSubject()->getId());
        $eradication = $this
          ->getConfigurationPool()
          ->getContainer()
          ->get('doctrine')
          ->getEntityManager('hfi')
          ->getRepository('HFIBundle:Observation', 'hfi')
          ->getEradication($this->getSubject()->getId());
        if ($eradication){
          $eradication['arrachage'] = (!$eradication['arrachage']) ? "false" : "true";
          $eradication['coupe'] = (!$eradication['coupe']) ? "false" : "true";
          $eradication['traitementThermique'] = (!$eradication['traitementThermique']) ? "false" : "true";
          $eradication['epandageSel'] = (!$eradication['epandageSel']) ? "false" : "true";
          $eradication['miseEnHerbier'] = (!$eradication['miseEnHerbier']) ? "false" : "true";
          $eradication['presenceGraine'] = (!$eradication['presenceGraine']) ? "false" : "true";
          $eradication['nombrePiedApproximatif'] = (!$eradication['nombrePiedApproximatif']) ? "false" : "true";
        }
        $methodologieInvertebre = $this
          ->getConfigurationPool()
          ->getContainer()
          ->get('doctrine')
          ->getEntityManager('hfi')
          ->getRepository('HFIBundle:Observation', 'hfi')
          ->getMethodologieInvertebre($this->getSubject()->getId());
        if ($this->getSubject()){
          $echantillon = (!$this->getSubject()->getEchantillon()) ? "false" : "true";
        } else {
          $echantillon = "false";
        }
        $currentId = $eradication['id'];
        $formMapper
          ->tab('Informations sur l\'observation')
            ->with('Information protocole', ['class' => 'col-md-12'])
              ->add('protocole', ChoiceFieldMaskType::class,
                [
                  'label' => 'Protocole',
                  'choices' => $list->getProtocole(),
                  'map' => [
                    'Autre' => ['nProtocoleAutre'],
                    'Restauration Phylica' => ['numeroPlantation', 'nbPhylica'],
                    'Eradication' => ['identifiantManip']
                  ],
                  'placeholder' => 'Choisir un protocole',
                  'required' => false
                ])
              ->add('nProtocoleAutre', null,
                [
                  'label' => 'Protocole autre',
                  'required' => false
                ])
            ->end()
            ->with('Identifiant', ['class' => 'col-md-4'])
              ->add('numeroObservation', 'text',
                [
                  'label' => 'Numéro d\'Observation',
                  'required' => false
                ])
              ->add('identifiantManip', 'text',
                [
                  'label' => 'Identifiant manip',
                  'required' => false
                ])
              ->add('numeroPlantation', 'text',
                [
                  'label' => 'Numéro plantation',
                  'required' => false
                ])
              ->add('nbPhylica', 'integer',
                [
                  'label' => 'Nombre de phylica',
                  'required' => false
                ])
            ->end()
            ->with('Date', ['class' => 'col-md-4'])
              ->add('dateObservation', DatePickerType::class,
                [
                  'label' => 'Date observation',
                  'dp_collapse'           => true,
                  'dp_calendar_weeks'     => true,
                  'dp_view_mode'          => 'days',
                  'dp_min_view_mode'      => 'days',
                  'format' => 'dd.MM.yyyy',
                  'required' => false
                ])
              ->add('dateSaisie', DatePickerType::class,
                [
                  'label' => 'Date saisie',
                  'dp_collapse'           => true,
                  'dp_calendar_weeks'     => true,
                  'dp_view_mode'          => 'days',
                  'dp_min_view_mode'      => 'days',
                  'format' => 'dd.MM.yyyy',
                  'attr' => ['readonly' => true],
                  'required' => false
                ])
            ->end()
            ->with('Source', ['class' => 'col-md-4'])
              ->add('observationUser', 'choice',
                [
                  'label' => 'Auteur',
                  'choices' => $userNameList,
                  'multiple' => true,
                  'required' => false
                ])
              ->add('source', 'choice',
                [
                  'label' => 'Source',
                  'choices' => $list->getSource(),
                  'required' => false
                ])
            ->end()
            ->with('Localisation', ['class' => 'col-md-12'])
              ->add('Carte', CartoType::class,
                [
                    'label' => " ",
                    'mapped' => false,
                    'data' => [
                        'latitude' => 'latitude',
                        'longitude' => 'longitude',
                        'altitude' => 'altitude',
                        'districts' => ['Kerguelen', 'Amsterdam', 'Crozet'],
                        'astuce' => 'Vous pouvez glisser un fichier GPX directement sur la carte!',
                        'info' => 'Vous pouvez également saisir à la main toutes les données!'
                    ]
                ])
              ->add('toponyme', EntityType::class,
                [
                  'class' => 'HFIBundle\Entity\Toponyme',
                  'choice_label' => 'nomSite'
                ])
              ->add('altitude', 'number',
                [
                  'label' => 'Altitude',
                  'required' => false
                ])
              ->add('latitude', 'number',
                [
                  'label' => 'Latitude (DDD WGS 84)',
                  'required' => false
                ])
              ->add('longitude', 'number',
                [
                  'label' => 'Longitude (DDD WGS 84)',
                  'required' => false
                ])
            ->end()
          ->end()
          ->tab('Fiche Terrain')
            ->with('Description', ['class' => 'col-md-6'])
              ->add('statutFicheTerrain', 'choice',
                [
                  'label' => 'Statut fiche terrain',
                  'data' => $ficheTerrain['statutFicheTerrain'],
                  'choices' => [
                    'Fiche complète' => 'Fiche complète',
                    'Fiche incomplète' => 'Fiche incomplète'
                  ],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Surface saisi', ['class' => 'col-md-3'])
              ->add('longueurFicheTerrain', 'integer',
                [
                  'label' => 'Longueur(mètres)',
                  'data' => $ficheTerrain['longueur'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('largeurFicheTerrain', 'integer',
                [
                  'label' => 'Largeur(mètres)',
                  'data' => $ficheTerrain['largeur'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Surface calculée', ['class' => 'col-md-3'])
              ->add('expression', 'text',
                [
                  'label' => 'Expression',
                  'data' => $ficheTerrain['longueur']  . ' X ' . $ficheTerrain['largeur'],
                  'attr' => ['readonly' => true],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('resultat', 'integer',
                [
                  'label' => 'Résultat(en m2)',
                  'data' => $ficheTerrain['longueur'] * $ficheTerrain['largeur'],
                  'attr' => ['readonly' => true],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Milieu', ['class' => 'col-md-4'])
              ->add('typeMilieu', 'choice',
                [
                  'label' => 'Type de milieu',
                  'data' => $ficheTerrain['typeMilieu'],
                  'choices' => $list->getTypeMilieu(),
                  'placeholder' => 'Définir le type de milieu',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('milieuAutre', 'text',
                [
                  'label' => 'Milieu autre',
                  'data' => $ficheTerrain['milieuAutre'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Erosion', ['class' => 'col-md-4'])
              ->add('erosion', 'choice',
                [
                  'label' => 'Erosion',
                  'data' => $ficheTerrain['erosion'],
                  'choices' => $list->getErosion(),
                  'multiple' => true,
                  'mapped' => false,
                  'required' => false
                ])
              ->add('erosionAutre', 'text',
                [
                  'label' => 'Erosion autre',
                  'data' => $ficheTerrain['erosionAutre'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Habitat', ['class' => 'col-md-4'])
              ->add('habitat', 'choice',
                [
                  'label' => 'Habitat',
                  'data' => $ficheTerrain['habitat'],
                  'choices' => $list->getHabitat(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('commentaireHabitat', 'text',
                [
                  'label' => 'Commentaire habitat',
                  'data' => $ficheTerrain['commentaireHabitat'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Contexte', ['class' => 'col-md-4'])
              ->add('substrat', 'choice',
                [
                  'label' => 'Substrat',
                  'data' => $ficheTerrain['substrat'],
                  'choices' => $list->getSubstrat(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('humidite', 'choice',
                [
                  'label' => 'Humidite',
                  'data' => $ficheTerrain['humidite'],
                  'choices' => $list->getHumidite(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('categorieMeteo', 'choice',
                [
                  'label' => 'Catégorie météo',
                  'data' => $ficheTerrain['categorieMeteo'],
                  'choices' => $list->getMeteo(),
                  'multiple' => true,
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Topographie', ['class' => 'col-md-4'])
              ->add('topographie', ChoiceFieldMaskType::class,
                [
                  'label' => 'Topographie',
                  'data' => $ficheTerrain['topographie'],
                  'choices' => $list->getTypeTopo(),
                  'map' => [
                    'Autre' => ['topoAutre']
                  ],
                  'placeholder' => 'Définir une topographie',
                  'mapped' => false,
                  'required' => false
                ])
              ->add('topoAutre', 'text',
                [
                  'label' => 'Topographie autre',
                  'data' => $ficheTerrain['topoAutre'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('pente', 'choice',
                [
                  'label' => 'Pente',
                  'data' => $ficheTerrain['pente'],
                  'choices' => $list->getPente(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('orientation', 'choice',
                [
                  'label' => 'Orientation',
                  'data' => $ficheTerrain['orientation'],
                  'choices' => $list->getOrientation(),
                  'mapped' => false,
                  'required' => false
                ])
              ->add('conditionExposition', 'choice',
                [
                  'label' => 'Condition exposition',
                  'data' => $ficheTerrain['conditionExposition'],
                  'choices' => $list->getConditionExposition(),
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Recouvrement (en %, peut dépasser 100%)', ['class' => 'col-md-4'])
              ->add('recBlocs', 'integer',
                [
                  'label' => 'Blocs(>20cm)',
                  'data' => $ficheTerrain['recBlocs'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('recCailloux', 'integer',
                [
                  'label' => 'Cailloux(2 à 20cm)',
                  'data' => $ficheTerrain['recCailloux'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('recGraviers', 'integer',
                [
                  'label' => 'Graviers(2cm à 2mm)',
                  'data' => $ficheTerrain['recGraviers'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('recSols', 'integer',
                [
                  'label' => 'Sols(<2mm)',
                  'data' => $ficheTerrain['recSols'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('recStrateBryoLichenique', 'integer',
                [
                  'label' => 'Strate bryoLichenique',
                  'data' => $ficheTerrain['recStrateBryoLichenique'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('recStrateHerbacee', 'integer',
                [
                  'label' => 'Strate herbacée',
                  'data' => $ficheTerrain['recStrateHerbacee'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('recStrateArbustive', 'integer',
                [
                  'label' => 'Strate arbustive',
                  'data' => $ficheTerrain['recStrateArbustive'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
          ->end()
          ->tab('Prélèvement')
            ->with('Prélèvement', ['class' => 'col-md-4'])
              ->add('lieuPrelevement', null,
                [
                  'label' => 'Commentaire sur le lieu de prélevement',
                  'required' => false
                ])
            ->end()
            ->with('Echantillons', ['class' => 'col-md-4'])
              ->add('echantillon', ChoiceFieldMaskType::class,
                [
                  'label' => 'Echantillon',
                  'choices' => $list->getBoolean(),
                  'map' => [
                    'true' => ['nombreEchantillon', 'typeEchantillon', 'referenceEchantillon']
                  ],
                  'data' => $echantillon,
                  'placeholder' => 'Définir la présence ou l\'absence d\'échantillon',
                  'required' => false
                ])
              ->add('nombreEchantillon', 'integer',
                [
                  'label' => 'Nombre d\'échantillon',
                  'required' => false
                ])
              ->add('typeEchantillon', 'text',
                [
                  'label' => 'Type d\'échantillon',
                  'required' => false
                ])
              ->add('referenceEchantillon', 'text',
                [
                  'label' => 'Référence d\'échantillon',
                  'required' => false
                ])
            ->end()
          ->end()
          ->tab('Observation végétation')
            ->with('Description', ['class' => 'col-md-12'])
              ->add('statutDescriptionVegetations', 'choice',
                [
                  'label' => 'Statut description végétation',
                  'choices' => [
                    'Liste espèces complète' => 'Liste espèces complète',
                    'Liste espèces incomplète' => 'Liste espèces incomplète'
                  ],
                  'data' => $this->getSubject()->getStatutDescriptionVegetations(),
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('', ['class' => 'col-md-12'])
              ->add('descriptionVegetations', 'sonata_type_collection',
                [
                  'required' => true,
                  'by_reference' => false,
                ],
                [
                   'edit' => 'inline',
                   'inline' => 'table',
                   'sortable' => 'position',
                ]
              )
            ->end()
          ->end()
          ->tab('Observation vertébrés')
            ->with('', ['class' => 'col-md-10'])
              ->add('descriptionVertebres', 'sonata_type_collection',
                [
                  'label' => 'Description vertébrés',
                  'required' => true,
                  'by_reference' => false,
                ],
                [
                   'edit' => 'inline',
                   'inline' => 'table',
                   'sortable' => 'position',
                ]
              )
            ->end()
          ->end()
          ->tab('Observation invertébrés')
            ->with('Milieu', ['class' => 'col-md-4'])
              ->add('habitatInvertebre', 'choice',
                [
                  'label' => 'Habitat(à saisir si non saisi dans la fiche terrain)',
                  'choices' => $list->getHabitat(),
                  'mapped' => false,
                  'data' => $methodologieInvertebre['habitatInvertebre'],
                  'required' => false
                ])
              ->add('milieuPrelevement', 'choice',
                [
                  'label' => 'Milieu prélèvement',
                  'choices' => $list->getMilieuPrelevement(),
                  'mapped' => false,
                  'data' => $methodologieInvertebre['milieuPrelevement'],
                  'required' => false
                ])
              ->add('milieuAutre', 'text',
                [
                  'label' => 'Milieu autre',
                  'mapped' => false,
                  'data' => $methodologieInvertebre['milieuAutre'],
                  'required' => false
                ])
            ->end()
            ->with('Mode', ['class' => 'col-md-4'])
              ->add('modePrelevement', ChoiceFieldMaskType::class,
                [
                  'label' => 'Mode de prélèvement',
                  'choices' => $list->getModePrelevement(),
                  'map' => [
                    'berlese' => ['volLongueur', 'volLargeur', 'volHauteur', 'expression', 'resultat'],
                    'tri manuel de terre' => ['volLongueur', 'volLargeur', 'volHauteur', 'expression', 'resultat'],
                    'chasse a vue' => ['nbrePersonne','tpsParPers'],
                    'piege barber' => ['nbrePiege','tpsOuverture'],
                    'piege jaune' => ['nbrePiege','tpsOuverture'],
                    'piege jaune appate' => ['nbrePiege','tpsOuverture'],
                    'barquette' => ['planteHote'],
                    'lavages de plantes' => ['nomEspeceInvertebre'],
                    'autre' => ['milieuAutre']
                  ],
                  'placeholder' => 'Choisir un mode de prélèvement',
                  'mapped' => false,
                  'data' => $methodologieInvertebre['modePrelevement'],
                  'required' => false
                ])
              ->add('nbrePersonne', 'integer',
                [
                  'label' => 'Nombre personne',
                  'data' => $methodologieInvertebre['nbrePersonne'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('tpsParPers', 'integer',
                [
                  'label' => 'Temps par personnes',
                  'data' => $methodologieInvertebre['tpsParPers'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('nbrePiege', 'integer',
                [
                  'label' => 'Nombre de piège',
                  'data' => $methodologieInvertebre['nbrePiege'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('tpsOuverture', 'integer',
                [
                  'label' => 'Temps d\'Ouverture',
                  'data' => $methodologieInvertebre['tpsOuverture'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('nomEspeceInvertebre', 'text',
                [
                  'label' => 'Nom scientifique',
                  'data' => $methodologieInvertebre['nomScientifique'],
                  'attr' => ['readonly' => true],
                  'required' => false
                ])
            ->end()
            ->with('Volume', ['class' => 'col-md-4'])
              ->add('volLongueur', 'integer',
                [
                  'label' => 'Longueur(cm)',
                  'data' => $methodologieInvertebre['volLongueur'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('volLargeur', 'integer',
                [
                  'label' => 'Largeur(cm)',
                  'data' => $methodologieInvertebre['volLargeur'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('volHauteur', 'integer',
                [
                  'label' => 'Hauteur(cm)',
                  'data' => $methodologieInvertebre['volHauteur'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Description invertébré', ['class' => 'col-md-12'])
              ->add('descriptionInvertebres', 'sonata_type_collection',
                [
                  'label' => 'Description invertébrés',
                  'required' => true,
                  'by_reference' => false,
                ],
                [
                   'edit' => 'inline',
                   'inline' => 'table',
                   'sortable' => 'position',
                ]
              )
            ->end()
          ->end()
          ->tab('Eradication')
            ->with('Espece', ['class' => 'col-md-6'])
              ->add('nomEspeceEradication', 'text',
                [
                  'label' => 'Nom scientifique',
                  'data' => $eradication['nomEspeceEradication'],
                  'attr' => ['readonly' => true],
                  'required' => false
                ])
            ->end()
            ->with('Observation', ['class' => 'col-md-6'])
              ->add('typeObservation', ChoiceFieldMaskType::class,
                 [
                   'label' => 'Type d\'Observation',
                   'choices' => $list->getObservation(),
                   'map' => [
                     'A éradiquer' => [
                       'typeColonisation', 'nombrePiedApproximatif', 'phenologie',
                       'miseEnPot', 'miseEnHerbier', 'hautMoy', 'hautMax',
                       'calculeSurface', 'presenceGraine'
                     ],
                     'Première éradication' => [
                       'typeColonisation', 'arrachage', 'etatBachage', 'coupe',
                       'epandageSel', 'produitUtilise', 'dilution',
                       'traitementThermique',  'surfaceTraitement', 'nbrPiedArrache',
                       'nombrePiedApproximatif','phenologie', 'surfaceArchive',
                       'miseEnPot', 'miseEnHerbier', 'hautMoy', 'hautMax',
                       'calculeSurface', 'presenceGraine', 'surfaceArchiveTraitee',
                     ],
                     'Présence' => [
                       'typeColonisation', 'arrachage', 'etatBachage', 'coupe',
                       'epandageSel', 'produitUtilise', 'dilution',
                       'traitementThermique', 'surfaceTraitement', 'nbrPiedArrache',
                       'nombrePiedApproximatif','phenologie','surfaceArchive',
                       'miseEnPot', 'miseEnHerbier', 'hautMoy', 'hautMax',
                       'calculeSurface', 'presenceGraine', 'surfaceArchiveTraitee',
                      ]
                   ],
                   'placeholder' => 'Choisir un type d\'observation',
                   'data' => $eradication['typeObservation'],
                   'mapped' => false,
                   'required' => false
                 ])
            ->end()
            ->with('Information population', ['class' => 'col-md-4'])
              ->add('phenologie','choice',
                [
                  'label' => 'Phénologie(stade le plus avancé)',
                  'choices' => $list->getPhenologie(),
                  'data' => $eradication['phenologie'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('presenceGraine', 'choice',
                [
                  'label' => 'Présence de graines',
                  'choices' => $list->getBoolean(),
                  'data' => $eradication['presenceGraine'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Surface', ['class' => 'col-md-4'])
              ->add('surfaceArchive', 'text',
                [
                  'label' => 'Surface archivée',
                  'mapped' => false,
                  'attr' => ['readonly' => true],
                  'data' => $eradication['surfaceArchive'],
                  'required' => false
                ])
              ->add('calculeSurface', ChoiceFieldMaskType::class,
                [
                  'label' => 'Mode de calcule de surface',
                  'choices' => [
                    'Surface réelle(m2)' => 'reelle',
                    'Surface estimé' => 'estime'
                  ],
                  'map' => [
                    'reelle' => ['longueurReelleTraite', 'largeurReelleTraite'],
                    'estime' => ['surfaceEstimation']
                  ],
                  'placeholder' => 'Choisir une méthode de calcule de surface',
                  'data' => $eradication['calculeSurface'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('longueurReelleTraite', 'text',
                [
                  'label' => 'Longueur(en mètres)',
                  'data' => $eradication['longueurReelleTraite'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('largeurReelleTraite', 'text',
                [
                  'label' => 'Largeur(en mètres)',
                  'data' => $eradication['largeurReelleTraite'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('surfaceEstimation', 'choice',
                [
                  'label' => 'Surface estimé',
                  'choices' => $list->getSurfaceEstimee(),
                  'data' => $eradication['surfaceEstimee'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('nombrePiedApproximatif', ChoiceFieldMaskType::class,
                [
                  'label' => 'Nombre de pieds aproximatif',
                  'choices' => [
                    "Inférieur à 50" => 'true',
                    "Supérieur à 50" => 'false'
                  ],
                  'map' => [
                    'true' => ['nombrePiedExact']
                  ],
                  'data' => $eradication['nombrePiedApproximatif'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('nombrePiedExact','integer',
                [
                  'label' => 'Nombre pied exact',
                  'data' => $eradication['nombrePiedExact'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Colonisation', ['class' => 'col-md-4'])
              ->add('typeColonisation', ChoiceFieldMaskType::class,
                [
                  'label' => 'Type de colonisation',
                  'choices' => $list->getColonisation(),
                  'map' => [
                  'disperse' => ['nbrPatch'],
                  'discontinu' => ['nbrPatch']
                ],
                  'placeholder' => 'Choisir un type de colonisation',
                  'data' => $eradication['typeColonisation'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('nbrPatch', 'integer',
                [
                  'label' => 'Nombre de patch',
                  'data' => $eradication['nbrPatch'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Hauteur', ['class' => 'col-md-12'])
              ->add('hautMoy','integer',
                [
                  'label' => 'hauteur moyenne(cm)',
                  'data' => $eradication['hautMoy'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('hautMax','integer',
                [
                  'label' => 'hauteur max(cm)',
                  'data' => $eradication['hautMax'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Méthode mécanique', ['class' => 'col-md-6'])
              ->add('arrachage', 'choice',
                [
                  'label' => 'Arrachage',
                  'choices' => $list->getBoolean(),
                  'data' => $eradication['arrachage'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('etatBachage', 'choice',
                [
                  'label' => 'Bachage',
                  'choices' => $list->getEtatBachage(),
                  'data' => $eradication['etatBachage'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('coupe', 'choice',
                [
                  'label' => 'Coupe',
                  'choices' => $list->getBoolean(),
                  'data' => $eradication['coupe'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('traitementThermique', 'choice',
                [
                  'label' => 'Traitement thermique',
                  'choices' => $list->getBoolean(),
                  'data' => $eradication['traitementThermique'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Méthode chimique', ['class' => 'col-md-6'])
              ->add('epandageSel', 'choice',
                [
                  'label' => 'Epandage de sel',
                  'choices' => $list->getBoolean(),
                  'data' => $eradication['epandageSel'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('produitUtilise', 'choice',
                [
                  'label' => 'Traitement chimique',
                  'choices' => $list->getProduit(),
                  'data' => $eradication['produitUtilise'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('dilution', 'number',
                [
                  'label' => 'Dilution(en %)',
                  'data' => $eradication['dilution'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Herbier', ['class' => 'col-md-12'])
              ->add('miseEnHerbier', 'choice',
                [
                  'label' => 'Mise en herbier',
                  'choices' => $list->getBoolean(),
                  'data' => $eradication['miseEnHerbier'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Surface traité', ['class' => 'col-md-6'])
              ->add('surfaceArchiveTraitee', 'text',
                [
                  'label' => 'Surface traitée archivée',
                  'mapped' => false,
                  'attr' => ['readonly' => true],
                  'data' => $eradication['surfaceArchiveTraitee'],
                  'required' => false
                ])
              ->add('surfaceTraitement', ChoiceFieldMaskType::class,
                [
                  'label' => 'Surface traitée',
                  'choices' => [
                    'En totalité' => 'En totalité',
                    'En partie' => 'En partie'
                  ],
                  'map' => [
                    'En partie' => ['longueurTraite', 'largeurTraite']
                  ],
                  'placeholder' => 'Précisez la part de la surface colonisée traité',
                  'data' => $eradication['surfaceTraitement'],
                  'mapped' => false,
                  'required' => false
                ])
              ->add('nbrPiedArrache', 'integer',
                [
                  'label' => 'Nombre pied arraché',
                  'data' => $eradication['nbrPiedArrache'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Surface traité(Longueur)', ['class' => 'col-md-3'])
              ->add('longueurTraite', 'integer',
                [
                  'label' => 'Longueur(en mètres)',
                  'data' => $eradication['longueurTraite'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
            ->with('Surface traité(largeur)', ['class' => 'col-md-3'])
              ->add('largeurTraite', 'integer',
                [
                  'label' => 'Largeur(en mètres)',
                  'data' => $eradication['largeurTraite'],
                  'mapped' => false,
                  'required' => false
                ])
            ->end()
          ->end()
          ->tab('Media')
            ->with('Photographie', ['class' => 'col-md-10'])
              ->add('photo', ChoiceFieldMaskType::class,
                [
                  'label' => 'Photographie',
                  'choices' => [
                    'Présence' => 'presence',
                    'Absence' => 'absence'
                  ],
                  'map' => [
                    'presence' => ['referencePhoto']
                  ],
                  'placeholder' => 'Définir la présence ou l\'absence de photographie',
                  'required' => false
                ])
              ->add('referencePhoto', null,
                [
                  'label' => 'Référence photographie',
                  'required' => false
                ])
            ->end()
          ->end()
          ->tab('Commentaire générale')
            ->with('Commentaire', ['class' => 'col-md-8'])
              ->add('commentaire', 'text',
                [
                  'required' => false
                ])
            ->end()
          ->end()
        ;
      }
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
      $datagridMapper
        ->add('identifiantManip', null, ['label' => 'Identifiant manip',])
        ->add('nActivite', null, ['label' => 'Activité'])
        ->add('protocole', null, ['associated_property' => 'id'])
        ->add('nProtocoleAutre', null, ['label' => 'Protocole autre'])
        ->add('commentaire', null, ['label' => 'Commentaire'])
        ->add('numeroObservation', null, ['label' => 'Numéro d\'observation'])
        ->add('source', null, ['label' => 'Source'])
        ->add('nReleveInvertebre', null, ['label' => 'Relevé invértébré'])
        ->add('nReleveVegetation', null, ['label' => 'Relevé végétation'])
        ->add('lieuPrelevement', null, ['label' => 'Lieu prélevement'  ])
        ->add('echantillon', null, ['label' => 'Echantillon'])
        ->add('nombreEchantillon', null, ['label' => 'Nombre d\'échantillon'])
        ->add('photo', null, ['label' => 'Photographie'])
        ->add('referencePhoto', null, ['label' => 'Référence photographie'])
        ->add('altitude', null, ['label' => 'Altitude'])
        ->add('latitude', null, ['label' => 'Latitude'])
        ->add('longitude', null, ['label' => 'Longitude'])
      ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
      $listMapper
        ->add('identifiantManip', null, ['label' => 'Identifiant manip'])
        ->add('protocole', 'text', ['associated_property' => 'id'])
        ->add('numeroObservation', null,['label' => 'Numéro d\'Observation'])
        ->add('source', null, ['label' => 'Source'])
        ->add('nReleveInvertebre', null, ['label' => 'Relevé invértébré'])
        ->add('nReleveVegetation', null, ['label' => 'Relevé végétation'])
        ->add('altitude', null, ['label' => 'Altitude'])
        ->add('latitude', null, ['label' => 'Latitude'])
        ->add('longitude', null, ['label' => 'Longitude'])
        ->add('_action', null, [
          'actions' => [
            'show' => [],
            'edit' => [],
            'delete' => [],
          ]
        ])
      ;
    }

    public function configureShowFields(ShowMapper $showMapper)
    {
      $showMapper
        ->with('Identifiant',
          [
            'class'       => 'col-md-4',
            'box_class'   => 'box box-solid',
          ])
          ->add('identifiantManip', 'text', ['label' => 'Observation'])
          ->add('numeroObservation', 'text', ['label' => 'Numéro d\'Observation'])
          ->add('dateObservation', 'datetime', ['label'=>'Date de la observation'])
          ->add('dateSaisie', 'datetime', ['label'=>'Date de la saisie'])
          ->add('altitude', 'text', ['label' => 'Altitude'])
          ->add('latitude', 'text', ['label' => 'Latitude'])
          ->add('longitude', 'text', ['label' => 'Longitude'])
          ->add('source', 'text', ['label' => 'Source'])
        ->end()
        ->with('Prélèvement',
            [
              'class'       => 'col-md-4',
              'box_class'   => 'box box-solid',
            ])
          ->add('nReleveInvertebre', 'text', ['label' => 'Relevé invértébré'])
          ->add('nReleveVegetation', 'text', ['label' => 'Relevé végétation'])
          ->add('lieuPrelevement', 'text', ['label' => 'Lieu prélevement'  ])
        ->end()
        ->with('Photographie',
            [
              'class'       => 'col-md-4',
              'box_class'   => 'box box-solid',
            ])
          ->add('photo', 'text', ['label' => 'Photographie'])
          ->add('nProtocoleAutre', 'text', ['label' => 'Protocole autre'])
          ->add('referencePhoto', 'text', ['label' => 'Référence photographie'])
        ->end()
        ->with('Echantillon',
            [
              'class'       => 'col-md-4',
              'box_class'   => 'box box-solid',
            ])
          ->add('echantillon', 'text', ['label' => 'Echantillon'])
          ->add('nombreEchantillon', 'text', ['label' => 'Nombre d\'échantillon'])
            ->add('typeEchantillon', 'text', ['label' => 'Type d\'échantillon'])
            ->add('referenceEchantillon', 'text', ['label' => 'Référence d\'échantillon'])
        ->end()
      //   ->with('Informations sur l\'observation', ['class' => 'col-md-12'])
      //     ->add('nidentifiantObservation', null,
      //       [
      //         'label' => 'Identifiant observation',
      //         'required' => false
      //       ])
      //     // ->add('toponyme', null,
      //     //   [
      //     //     'class' => 'HFIBundle\Entity\Toponyme',
      //     //     'choice_label' => 'nomSite'
      //     //   ])
      //     // ->add('ficheTerrains', null,
      //     //   [
      //     //     'class' => 'HFIBundle\Entity\FicheTerrain'
      //     //   ])
      //   ->end()
      //   ->with('Information protocole',
      //       [
      //         'class'       => 'col-md-4',
      //         'box_class'   => 'box box-solid',
      //       ])
      //       ->add('nActivite', 'text', ['label' => 'Activité'])
      //       ->add('protocole', 'text', ['associated_property' => 'id'])
      //   ->end()
      //   // ->with('Graphique', ['class' => 'col-md-8'])
      //   //   ->add('', null, [
      //   //     'template' => 'HFIBundle:Default:chart.html.twig',
      //   //     'mapped' => false
      //   //   ])
      //   // ->end()
      // // $surfaceEvolution = $this
      // //   ->getConfigurationPool()
      // //   ->getContainer()
      // //   ->get('doctrine')
      // //   ->getRepository('HFIBundle:observation', 'hfi')
      // //   ->getSurfaceEvolution($this->getSubject()->getId());
      // // $this->data = json_encode($surfaceEvolution);
      ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
      $form = $this->getForm();
      if (($object->getProtocole() != "Eradication") &&
      $form->get('typeObservation')->getData()){
          $errorElement
            ->with('protocole')
              ->addViolation("Merci de selectionner le protocole eradication si vous souhaitez saisir une eradication.")
            ->end()
          ;
      } else if ((($object->getProtocole() != "Donnée observateur extérieur") &&
        ($object->getProtocole() != "Inventaire") &&
        ($object->getProtocole() != "Piégeages permanents") &&
        ($object->getProtocole() != "Répartition Merizodus") &&
        ($object->getProtocole() != "Transects Notodiscus") &&
        ($object->getProtocole() != "Transects Merizodus") &&
        ($object->getProtocole() != "Autre")) &&
        ($form->get('habitatInvertebre')->getData() ||
        $form->get('milieuPrelevement')->getData() ||
        $form->get('modePrelevement')->getData())){
          $errorElement
            ->with('protocole')
              ->addViolation("Si vous souhaitez saisir les champs de l'onglet description invértébré, merci de selectionner un des protocoles suivant: Donnée observateur extérieur, Inventaire, Piégeages permanents, Répartition Merizodus, Transects Notodiscus, Transects Merizodus ou Autre.")
            ->end()
          ;
      }
      if ($object->getNumeroObservation() == null) {
        $errorElement
          ->with('numeroObservation')
            ->addViolation("Le numéro d'observation doit être renseigné.")
          ->end()
        ;
      } else if ($object->getDateObservation() == null) {
        $errorElement
          ->with('dateObservation')
            ->addViolation("La date doit être renseignée.")
          ->end()
        ;
      } else if ($object->getObservationUser() == null) {
        $errorElement
          ->with('observationUser')
            ->addViolation("L'auteur doit être renseigné.")
          ->end()
        ;
      } else if ($object->getSource() == null) {
        $errorElement
          ->with('source')
            ->addViolation("La source doit être renseignée.")
          ->end()
        ;
      } else if ($object->getProtocole() == null) {
        $errorElement
          ->with('protocole')
            ->addViolation("Le protocole doit être renseigné.")
          ->end()
        ;
      } else if ($object->getLatitude() === null) {
        $errorElement
          ->with('latitude')
            ->addViolation("La latitude doit être renseigné (si vous n'avez pas la latitude tapez 0).")
          ->end()
        ;
      } else if ($object->getLongitude() === null) {
        $errorElement
          ->with('longitude')
            ->addViolation("Le longitude doit être renseigné (si vous n'avez pas la longitude tapez 0).")
          ->end()
        ;
      }
    }

    public function prePersist($object)
    {
      $em = $this
        ->getConfigurationPool()
        ->getContainer()
        ->get('doctrine')
        ->getEntityManager('hfi');
      $form = $this->getForm();

      $ficheTerrain = new FicheTerrain;
      $ficheTerrain->setStatutFicheTerrain($form->get('statutFicheTerrain')->getData());
      $ficheTerrain->setLongueur($form->get('longueurFicheTerrain')->getData());
      $ficheTerrain->setLargeur($form->get('largeurFicheTerrain')->getData());
      $ficheTerrain->setTypeMilieu($form->get('typeMilieu')->getData());
      $ficheTerrain->setMilieuAutre($form->get('milieuAutre')->getData());
      $ficheTerrain->setErosion($form->get('erosion')->getData());
      $ficheTerrain->setErosionAutre($form->get('erosionAutre')->getData());
      $ficheTerrain->setTopographie($form->get('topographie')->getData());
      $ficheTerrain->setTopoAutre($form->get('topoAutre')->getData());
      $ficheTerrain->setPente($form->get('pente')->getData());
      $ficheTerrain->setOrientation($form->get('orientation')->getData());
      $ficheTerrain->setConditionExposition($form->get('conditionExposition')->getData());
      $ficheTerrain->setRecBlocs($form->get('recBlocs')->getData());
      $ficheTerrain->setRecCailloux($form->get('recCailloux')->getData());
      $ficheTerrain->setRecGraviers($form->get('recGraviers')->getData());
      $ficheTerrain->setRecSols($form->get('recSols')->getData());
      $ficheTerrain->setRecStrateBryoLichenique($form->get('recStrateBryoLichenique')->getData());
      $ficheTerrain->setRecStrateHerbacee($form->get('recStrateHerbacee')->getData());
      $ficheTerrain->setRecStrateArbustive($form->get('recStrateArbustive')->getData());
      $ficheTerrain->setHabitat($form->get('habitat')->getData());
      $ficheTerrain->setCommentaireHabitat($form->get('commentaireHabitat')->getData());
      $ficheTerrain->setSubstrat($form->get('substrat')->getData());
      $ficheTerrain->setHumidite($form->get('humidite')->getData());
      $ficheTerrain->setCategorieMeteo($form->get('categorieMeteo')->getData());
      $object->setFicheTerrain($ficheTerrain);
      $em->persist($ficheTerrain);

      if ($form->get('protocole')->getData() == "Donnée observateur extérieur" ||
      $form->get('protocole')->getData() == "Inventaire" ||
      $form->get('protocole')->getData() == "Piégeages permanents" ||
      $form->get('protocole')->getData() == "Répartition Merizodus" ||
      $form->get('protocole')->getData() == "Transects Notodiscus" ||
      $form->get('protocole')->getData() == "Transects Merizodus" ||
      $form->get('protocole')->getData() == "Autre"){
        $methodologieInvertebre = new MethodologieInvertebre;
        $methodologieInvertebre->setHabitatInvertebre($form->get('habitatInvertebre')->getData());
        $methodologieInvertebre->setMilieuPrelevement($form->get('milieuPrelevement')->getData());
        $methodologieInvertebre->setMilieuAutre($form->get('milieuAutre')->getData());
        $methodologieInvertebre->setModePrelevement($form->get('modePrelevement')->getData());
        $methodologieInvertebre->setNbrePersonne($form->get('nbrePersonne')->getData());
        $methodologieInvertebre->setTpsParPers($form->get('tpsParPers')->getData());
        $methodologieInvertebre->setNbrePiege($form->get('nbrePiege')->getData());
        $methodologieInvertebre->setTpsOuverture($form->get('tpsOuverture')->getData());
        $methodologieInvertebre->setPlanteHote($form->get('planteHote')->getData());
        $methodologieInvertebre->setVolLongueur($form->get('volLongueur')->getData());
        $methodologieInvertebre->setVolLargeur($form->get('volLargeur')->getData());
        $methodologieInvertebre->setVolHauteur($form->get('volHauteur')->getData());
        $object->setMethodologieInvertebre($methodologieInvertebre);
        $em->persist($methodologieInvertebre);
      }
      $object->setDateSaisie(new DateTime());

      if ($form->get('protocole')->getData() == "Eradication"){
        $eradication = new Eradication;
        $eradication->setTypeObservation($form->get('typeObservation')->getData());
        $eradication->setCalculeSurface($form->get('calculeSurface')->getData());
        $eradication->setLargeurReelleTraite($form->get('largeurReelleTraite')->getData());
        $eradication->setLongueurReelleTraite($form->get('longueurReelleTraite')->getData());
        $eradication->setSurfaceEstimee($form->get('surfaceEstimation')->getData());
        $eradication->setNombrePiedApproximatif($form->get('nombrePiedApproximatif')->getData());
        $eradication->setNombrePiedExact($form->get('nombrePiedExact')->getData());
        $eradication->setTypeColonisation($form->get('typeColonisation')->getData());
        $eradication->setTypeObservation($form->get('typeObservation')->getData());
        $eradication->setNbrPatch($form->get('nbrPatch')->getData());
        $eradication->setPhenologie($form->get('phenologie')->getData());
        $eradication->setHautMax($form->get('hautMax')->getData());
        $eradication->setHautMoy($form->get('hautMoy')->getData());
        $eradication->setEtatBachage($form->get('etatBachage')->getData());
        ($form->get('arrachage')->getData() == "true") ? $eradication->setArrachage(true) : $eradication->setArrachage(false);
        ($form->get('coupe')->getData() == "true") ? $eradication->setCoupe(true) : $eradication->setCoupe(false);
        ($form->get('traitementThermique')->getData() == "true") ? $eradication->setTraitementThermique(true) : $eradication->setTraitementThermique(false);
        ($form->get('epandageSel')->getData() == "true") ? $eradication->setEpandageSel(true) : $eradication->setEpandageSel(false);
        $eradication->setProduitUtilise($form->get('produitUtilise')->getData());
        $eradication->setDilution($form->get('dilution')->getData());
        $eradication->setLargeurTraite($form->get('largeurTraite')->getData());
        $eradication->setLongueurTraite($form->get('longueurTraite')->getData());
        ($form->get('miseEnHerbier')->getData() == "true") ? $eradication->setMiseEnHerbier(true) : $eradication->setMiseEnHerbier(false);
        $eradication->setSurfaceTraitement($form->get('surfaceTraitement')->getData());
        $eradication->setNbrPiedArrache($form->get('nbrPiedArrache')->getData());
        $object->setEradication($eradication);
        $em->persist($eradication);
      }

      if ($form->get('nomScientifique')->getData()){
        $object->setNomEspeceEradication($form->get('nomScientifique')->getData()->getNomScientifique());
      }
      ($form->get('echantillon')->getData() == "true") ? $object->setEchantillon(true) : $object->setEchantillon(false);
      $object->setStatutDescriptionVegetations($form->get('statutDescriptionVegetations')->getViewData());

      foreach($object->getDescriptionInvertebres() as $DescriptionInvertebres){
        $DescriptionInvertebres->setObservation($object);
      }

      // foreach($object->getToponyme() as $Toponyme){
      //   $Toponyme->setObservation($object);
      // }

    }

    public function postPersist($object)
    {
      $invertebre = $this
        ->getConfigurationPool()
        ->getContainer()
        ->get('doctrine')
        ->getEntityManager('hfi')
        ->getRepository('HFIBundle:DescriptionInvertebre', 'hfi')
        ->checkInvertebre($this->getSubject()->getId());

      $vegetation = $this
        ->getConfigurationPool()
        ->getContainer()
        ->get('doctrine')
        ->getEntityManager('hfi')
        ->getRepository('HFIBundle:DescriptionVegetation', 'hfi')
        ->checkVegetation($this->getSubject()->getId());

      $em = $this
        ->getConfigurationPool()
        ->getContainer()
        ->get('doctrine')
        ->getEntityManager('hfi');

      $object->setNReleveVegetation($vegetation);
      $object->setNReleveInvertebre($invertebre);
      $em->persist($object);
      $em->flush();
    }

    public function preUpdate($object)
    {
      $em = $this
        ->getConfigurationPool()
        ->getContainer()
        ->get('doctrine')
        ->getEntityManager('hfi');

      $form = $this->getForm();
      if (($ficheTerrain = $this->getSubject()->getFicheTerrain()))
      {
        $ficheTerrain->setStatutFicheTerrain($form->get('statutFicheTerrain')->getData());
        $ficheTerrain->setLongueur($form->get('longueurFicheTerrain')->getData());
        $ficheTerrain->setLargeur($form->get('largeurFicheTerrain')->getData());
        $ficheTerrain->setTypeMilieu($form->get('typeMilieu')->getData());
        $ficheTerrain->setMilieuAutre($form->get('milieuAutre')->getData());
        $ficheTerrain->setErosion($form->get('erosion')->getData());
        $ficheTerrain->setErosionAutre($form->get('erosionAutre')->getData());
        $ficheTerrain->setTopographie($form->get('topographie')->getData());
        $ficheTerrain->setTopoAutre($form->get('topoAutre')->getData());
        $ficheTerrain->setPente($form->get('pente')->getData());
        $ficheTerrain->setOrientation($form->get('orientation')->getData());
        $ficheTerrain->setConditionExposition($form->get('conditionExposition')->getData());
        $ficheTerrain->setRecBlocs($form->get('recBlocs')->getData());
        $ficheTerrain->setRecCailloux($form->get('recCailloux')->getData());
        $ficheTerrain->setRecGraviers($form->get('recGraviers')->getData());
        $ficheTerrain->setRecSols($form->get('recSols')->getData());
        $ficheTerrain->setRecStrateBryoLichenique($form->get('recStrateBryoLichenique')->getData());
        $ficheTerrain->setRecStrateHerbacee($form->get('recStrateHerbacee')->getData());
        $ficheTerrain->setRecStrateArbustive($form->get('recStrateArbustive')->getData());
        $ficheTerrain->setHabitat($form->get('habitat')->getData());
        $ficheTerrain->setCommentaireHabitat($form->get('commentaireHabitat')->getData());
        $ficheTerrain->setSubstrat($form->get('substrat')->getData());
        $ficheTerrain->setHumidite($form->get('humidite')->getData());
        $ficheTerrain->setCategorieMeteo($form->get('categorieMeteo')->getData());
        $object->setFicheTerrain($ficheTerrain);
        $em->persist($ficheTerrain);
      }

      if (($methodologieInvertebre = $this->getSubject()->getMethodologieInvertebre()))
      {
        $methodologieInvertebre->setHabitatInvertebre($form->get('habitatInvertebre')->getData());
        $methodologieInvertebre->setMilieuPrelevement($form->get('milieuPrelevement')->getData());
        $methodologieInvertebre->setMilieuAutre($form->get('milieuAutre')->getData());
        $methodologieInvertebre->setModePrelevement($form->get('modePrelevement')->getData());
        $methodologieInvertebre->setNbrePersonne($form->get('nbrePersonne')->getData());
        $methodologieInvertebre->setTpsParPers($form->get('tpsParPers')->getData());
        $methodologieInvertebre->setNbrePiege($form->get('nbrePiege')->getData());
        $methodologieInvertebre->setTpsOuverture($form->get('tpsOuverture')->getData());
        $methodologieInvertebre->setPlanteHote($form->get('nomEspeceInvertebre')->getData());
        $methodologieInvertebre->setVolLongueur($form->get('volLongueur')->getData());
        $methodologieInvertebre->setVolLargeur($form->get('volLargeur')->getData());
        $methodologieInvertebre->setVolHauteur($form->get('volHauteur')->getData());
        $object->setMethodologieInvertebre($methodologieInvertebre);
        $em->persist($methodologieInvertebre);
      }

      if (($eradication = $this->getSubject()->getEradication()))
      {
        $eradication->setTypeObservation($form->get('typeObservation')->getData());
        $eradication->setCalculeSurface($form->get('calculeSurface')->getData());
        $eradication->setLargeurReelleTraite($form->get('largeurReelleTraite')->getData());
        $eradication->setLongueurReelleTraite($form->get('longueurReelleTraite')->getData());
        $eradication->setSurfaceEstimee($form->get('surfaceEstimation')->getData());
        $eradication->setNombrePiedApproximatif($form->get('nombrePiedApproximatif')->getData());
        $eradication->setNombrePiedExact($form->get('nombrePiedExact')->getData());
        $eradication->setTypeColonisation($form->get('typeColonisation')->getData());
        $eradication->setNbrPatch($form->get('nbrPatch')->getData());
        $eradication->setPhenologie($form->get('phenologie')->getData());
        $eradication->setHautMax($form->get('hautMax')->getData());
        $eradication->setHautMoy($form->get('hautMoy')->getData());
        $eradication->setDilution($form->get('dilution')->getData());
        $eradication->setProduitUtilise($form->get('produitUtilise')->getData());
        ($form->get('arrachage')->getData() == "true") ? $eradication->setArrachage(true) : $eradication->setArrachage(false);
        ($form->get('coupe')->getData() == "true") ? $eradication->setCoupe(true) : $eradication->setCoupe(false);
        ($form->get('traitementThermique')->getData() == "true") ? $eradication->setTraitementThermique(true) : $eradication->setTraitementThermique(false);
        ($form->get('epandageSel')->getData() == "true") ? $eradication->setEpandageSel(true) : $eradication->setEpandageSel(false);
        $eradication->setPresenceGraine($form->get('presenceGraine')->getData());
        $eradication->setEtatBachage($form->get('etatBachage')->getData());
        $eradication->setLargeurTraite($form->get('largeurTraite')->getData());
        $eradication->setLongueurTraite($form->get('longueurTraite')->getData());
        ($form->get('miseEnHerbier')->getData() == "true") ? $eradication->setMiseEnHerbier(true) : $eradication->setMiseEnHerbier(false);
        $eradication->setSurfaceTraitement($form->get('surfaceTraitement')->getData());
        $eradication->setNbrPiedArrache($form->get('nbrPiedArrache')->getData());
        $em->persist($eradication);
      }

      ($form->get('echantillon')->getData() == "true") ? $object->setEchantillon(true) : $object->setEchantillon(false);
      $object->setStatutDescriptionVegetations($form->get('statutDescriptionVegetations')->getViewData());

      foreach($object->getDescriptionInvertebres() as $DescriptionInvertebres){
        $DescriptionInvertebres->setObservation($object);
      }

      // foreach($object->getToponyme() as $Toponyme){
      //   $Toponyme->setObservation($object);
      // }

    }

    public function postUpdate($object)
    {
      $invertebre = $this
        ->getConfigurationPool()
        ->getContainer()
        ->get('doctrine')
        ->getEntityManager('hfi')
        ->getRepository('HFIBundle:DescriptionInvertebre', 'hfi')
        ->checkInvertebre($this->getSubject()->getId());

      $vegetation = $this
        ->getConfigurationPool()
        ->getContainer()
        ->get('doctrine')
        ->getEntityManager('hfi')
        ->getRepository('HFIBundle:DescriptionVegetation', 'hfi')
        ->checkVegetation($this->getSubject()->getId());

      $em = $this
        ->getConfigurationPool()
        ->getContainer()
        ->get('doctrine')
        ->getEntityManager('hfi');

      $object->setNReleveVegetation($vegetation);
      $object->setNReleveInvertebre($invertebre);
      $em->persist($object);
      $em->flush();
    }
}
