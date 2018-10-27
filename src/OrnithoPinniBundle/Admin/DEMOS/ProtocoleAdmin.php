<?php
namespace OrnithoPinniBundle\Admin\DEMOS;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;

use OrnithoPinniBundle\Form\Type\PreviewterrierType;

class ProtocoleAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
      $list = $this->getConfigurationPool()->getContainer()->get('static_list');
      $formMapper
      ->with('Protocole', array('class' => 'col-md-12'))
          ->add('choixSaisonEspece', ChoiceFieldMaskType::class, [
              'choices' => [
                  'Pétrel de Kerguelen' => 'Pétrel de Kerguelen',
                  'Pétrel noir' => 'Pétrel noir'
              ],
              'map' => [
                  'Pétrel de Kerguelen' => ['saison01'],
                  'Pétrel noir' => ['saison02']
              ],
              'required' => false,
              'label' => "De quelle espèce s'agit-il ? *",
              'placeholder' => 'Choisir...',
          ])
          ->add('saison01', 'choice', array(
              'choices' => $list->getSaisons(),
              'label' => "Saison *",
              'placeholder' => 'Choisir...',
              'required' => false,
              'mapped' => false
          ))
          ->add('saison02', 'choice', array(
              'choices' => $list->getSaisons02(),
              'label' => "Saison *",
              'placeholder' => 'Choisir...',
              'required' => false,
              'mapped' => false
          ))
          ->add('Carte', PreviewterrierType::class, array(
              'label' => " ",
              'required' => false,
              'mapped' => false
          ))
      ->end()
      ->with('Saisies', array('class' => 'col-md-12'))
          ->add('saisies', 'sonata_type_collection', array(
              'required' => false,
              'label' => 'Saisies *',
              'by_reference' => false
          ),array(
              'edit' => 'inline',
              'inline' => 'table'
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

    public function validate(ErrorElement $errorElement, $object){
      if($object->getSaisies()==null || count($object->getSaisies())==0){
          $errorElement
              ->with('saisies')
                  ->addViolation("Au moins un passage sur terrier doit être renseigné")
              ->end()
          ;
      }else{
        $i=1;
        foreach($object->getSaisies() as $p){
          if($p->getTerrier()->getEspece()->getNomCourant() != $object->getChoixSaisonEspece()){
            $errorElement
                ->with('saisies')
                    ->addViolation("Merci de renseigner un terrier de ".$object->getChoixSaisonEspece()." pour le passage n°".$i)
                ->end()
            ;
          }
          $i++;
        }
      }
      if($object->getChoixSaisonEspece()!=null){
        if($object->getChoixSaisonEspece() == 'Pétrel de Kerguelen'){
            $object->setSaison($this->getForm()->get('saison01')->getData());
        }else if($object->getChoixSaisonEspece() == 'Pétrel noir'){
            $object->setSaison($this->getForm()->get('saison02')->getData());
        }
      }else{
        $errorElement
            ->with('choixSaisonEspece')
                ->addViolation("Ce champs doit être renseigné")
            ->end()
        ;
      }
    }

    /*
     * Permet de gérer le lien inverse si imbrication première
     * N'est pas appelé si non executé depuis cet admin
     */
    public function prePersist($o){
        $this->toExecute($o);
    }
    public function preUpdate($o){
        $this->toExecute($o);
    }

    public function toExecute($o){
        foreach($o->getSaisies() as $child){
            $child->setProtocole($o);
        }
    }
}
