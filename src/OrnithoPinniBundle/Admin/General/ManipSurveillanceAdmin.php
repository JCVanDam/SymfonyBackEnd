<?php
namespace OrnithoPinniBundle\Admin\General;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\CoreBundle\Form\Type\DatePickerType;

use PortalBundle\Form\Type\SiteType;

class ManipSurveillanceAdmin extends AbstractAdmin {

    public function getFormTheme(){
        return array_merge(
            parent::getFormTheme(),
            array('OrnithoPinniBundle:admin:my_redirection.html.twig')
        );
    }

    protected function configureFormFields(FormMapper $formMapper){
        $list = $this->getConfigurationPool()->getContainer()->get('static_list');
        $formMapper
            ->tab('Manip')
                ->with('Manip', array('class' => 'col-md-12'))
                    ->add('code', null, array(
                        'label' => 'Code',
                        'attr' => ['readonly' => true],
                        'required' => false
                    ))
                    ->add('date', DatePickerType::class, array(
                        'label' => 'Date *',
                        'format'=>'dd/MM/yyyy',
                        'required' => false
                    ))
                    ->add('heure', 'time', array(
                        'label' => 'Heure',
                        'required' => false
                    ))
                    ->add('collecteur', null, array(
                        'label' => "Qui collecte et transmet l'information ? *",
                        'required' => false
                    ))
                    ->add('decouvreur', null, array(
                        'label' => 'Découvreur *',
                        'required' => false
                    ))
                    ->add('organisme', 'choice', array(
                        'label' => 'Organisme *',
                        'choices' => $list->getOrganismes(),
                        'required' => false
                    ))
                    ->add('precisionOrganisme', null, array(
                        'label' => 'Précisions',
                        'required' => false
                    ))
                ->end()
                ->with('Localisation', array('class' => 'col-md-12'))
                    // ->add('site_depart', SiteType::class, array(
                    //       'mapped' => false,
                    //       'required' => false,
                    //       'label' => "Site de départ *",
                    //       'placeholder' => "---"
                    // ))
                    ->add('site', null, array(
                        'label' => "Site *",
                        'required' => false
                    ))
                ->end()
                ->with('Météo', array('class' => 'col-md-12'))
                    ->add('meteo', 'sonata_type_admin', array(
                        'label' => 'Météo',
                        'required' => false
                    ))
                ->end()
            ->end()
            ->tab('Protocoles')
                ->with('Protocoles', array('class' => 'col-md-12'))
                    ->add('protocoles', 'sonata_type_collection', array(
                      'required' => false,
                      'by_reference' => false
                    ), array(
                      'edit' => 'inline',
                      'inline' => 'table'
                    ))
                ->end()
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper){
        $datagridMapper
            ->add('date', 'doctrine_orm_date_range', array(
                'label' => 'Date'
            ))
            ->add('site', null, array(
                'label' => 'Site'
            ))
            ->add('protocoles', null, array(
                'label' => "Protocoles"
            ))
        ;
    }

    protected function configureListFields(ListMapper $listMapper){
        unset($this->listModes['mosaic']);
        $listMapper
            ->add('id', null, [
                'label' => 'Identifiant'
            ])
            ->add('date', null, array(
                'label' => 'Date',
                'format' => 'd/m/Y'
            ))
            ->add('heure', null, array(
                'label' => 'Heure'
            ))
            ->add('site', null, array(
                  'label' => "Site"
            ))
            ->add('protocoles', null, array(
                'label' => "Protocoles"
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
        $showMapper
        ->tab('Manip')
            ->with('Manip', array('class' => 'col-md-12'))
                ->add('code', null, array(
                    'label' => 'Code'
                ))
                ->add('date', null, array(
                    'label' => 'Date',
                    'format'=>'d/m/Y'
                ))
                ->add('heure', null, array(
                    'label' => 'Heure'
                ))
                ->add('remarque', null, array(
                    'label' => 'Remarque'
                ))
            ->end()
            ->with('Localisations', array('class' => 'col-md-12'))
                ->add('site', null, array(
                      'label' => "Site"
                ))
            ->end()
            ->with('Météo', array('class' => 'col-md-12'))
                ->add('meteo', null, array(
                    'label' => 'Météo'
                ))
            ->end()
        ->end()
        ->tab('Protocoles')
            ->with('Protocoles', array('class' => 'col-md-12'))
                ->add('protocoles', null, array(
                    'label' => 'Protocoles'
                ))
            ->end()
        ->end()
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {

      // if($this->getForm()->get('site_depart')->getData()!=null){
      //   $depart = $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository('OrnithoPinniBundle:Localisation\Site', 'ornitho_pinni')->find($this->getForm()->get('site_depart')->getData());
      //   $object->setSiteDe($depart);
      // }else{
      //   $errorElement
      //       ->with('site_depart')
      //           ->addViolation("Le site de départ doit être renseigné")
      //       ->end()
      //   ;
      // }
      if($object->getProtocoles()==null || count($object->getProtocoles())==0){
          $errorElement
              ->with('protocoles')
                  ->addViolation("Au moins un protocole doit être renseigné")
              ->end()
          ;
      }
      if($object->getSite()==null){
          $errorElement
              ->with('site')
                  ->addViolation("Le site doit être renseigné")
              ->end()
          ;
      }
      if($object->getDate()==null){
          $errorElement
              ->with('date')
                  ->addViolation("La date doit être renseignée")
              ->end()
          ;
      }
      if($object->getCollecteur()==null){
          $errorElement
              ->with('collecteur')
                  ->addViolation("Le collecteur doit être renseigné")
              ->end()
          ;
      }
      if($object->getDecouvreur()==null){
          $errorElement
              ->with('decouvreur')
                  ->addViolation("Le découvreur doit être renseigné")
              ->end()
          ;
      }
      if($object->getOrganisme()==null){
          $errorElement
              ->with('organisme')
                  ->addViolation("L'organisme doit être renseigné")
              ->end()
          ;
      }
      if($object->getMeteo()->getVisibilite()==null &&
         $object->getMeteo()->getLune()==null &&
         $object->getMeteo()->getCouvertureNeigeuseAuSol()==null &&
         $object->getMeteo()->getPrecipitations()==null &&
         $object->getMeteo()->getVent()==null &&
         $object->getMeteo()->getCouvertureNuageuse()==null){
            $object->setMeteo(null);
         }
      //dump($object);
    }

    /*
     * Permet de gérer l'appartenance à la création
     */
    public function prePersist($o){
        $this->toExecute($o);
    }

    /*
     * Permet de gérer l'appartenance à l'update
     */
    public function preUpdate($o){
        $this->toExecute($o);
    }

    public function toExecute($o){
      foreach($o->getProtocoles() as $p){
          $p->setManip($o);
      }
    }
}
