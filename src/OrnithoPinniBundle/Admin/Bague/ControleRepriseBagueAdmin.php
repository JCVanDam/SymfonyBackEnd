<?php
namespace OrnithoPinniBundle\Admin\Bague;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class ControleRepriseBagueAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $list = $this->getConfigurationPool()->getContainer()->get('static_list');
        $formMapper
        ->with('Observation ou comptage ponctuel', array('class' => 'col-md-12'))
            ->add('CMTG_INDIFF_saisie', null, array(
                  'required' => false,
                  'class' => 'OrnithoPinniBundle\Entity\CMTG_INDIFF\Saisie',
                  'choice_label' => function($p){
                                        $manip = $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository('OrnithoPinniBundle:General\Protocole', 'ornitho_pinni')->findFromCMTG($p->getProtocole()->getId());
                                        $manip = $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository('OrnithoPinniBundle:General\Manip', 'ornitho_pinni')->find($manip[0]["id"]);
                                        return $manip->getSiteDe().", ".$manip->getDate()->format("d/m/Y").", ".$p->getProtocole()->getReleve()->getIdPtGPS().", ".$p->getEspece().", (id =".$p->getId().")";
                                    },
                  'label' => "Observation ou comptage ponctuel *",
                  'required' => false
            ))
        ->end()
        ->with('Espèce', array('class' => 'col-md-12'))
            ->add('espece', null, array(
                  'required' => false,
                  'class' => 'OrnithoPinniBundle\Entity\General\Espece',
                  'choice_label' => function($e){return $e->getNomCourant();},
                  'label' => "Espèce *",
                  'required' => false
            ))
        ->end()
        ->with('Contrôle/Reprise de bague', array('class' => 'col-md-12'))
            ->add('statut','choice', array(
                 'choices' => $list->getStatuts(),
                 'label' => "Statut *",
                 'required' => false
            ))
            ->add('numeroBagueMetal', null, array(
                 'label' => "Numéro bague métal",
                 'required' => false
            ))
            ->add('numeroBagueDarvic', null, array(
                 'label' => "Numéro bague darvic",
                 'required' => false
            ))
            ->add('paysOrigine', null, array(
                 'label' => "Pays d'origine",
                 'required' => false
            ))
            ->add('remarques', null, array(
                 'label' => "Remarques",
                 'required' => false
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
      if($object->getCMTGINDIFFSaisie()==null){
          $errorElement
              ->with('CMTG_INDIFF_saisie')
                  ->addViolation("Le protocole doit être renseigné")
              ->end()
          ;
      }
      if($object->getEspece()==null){
          $errorElement
              ->with('espece')
                  ->addViolation("L'espèce doit être renseignée")
              ->end()
          ;
      }
      if($object->getStatut()==null){
          $errorElement
              ->with('statut')
                  ->addViolation("Le statut doit être renseigné")
              ->end()
          ;
      }
      if($object->getNumeroBagueMetal()==null && $object->getNumeroBagueDarvic()==null){
        $errorElement
            ->with('numeroBagueMetal')
                ->addViolation("Merci de renseigner le numéro de bague métal et/ou le numéro de bague Darvic")
            ->end()
        ;
        $errorElement
            ->with('numeroBagueDarvic')
                ->addViolation("Merci de renseigner le numéro de bague métal et/ou le numéro de bague Darvic")
            ->end()
        ;
      }
    }

}
