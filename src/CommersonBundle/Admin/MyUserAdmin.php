<?php
namespace CommersonBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class MyUserAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper->add('nom', null, array(
                        'label' => 'Nom'
                   ))
                   ->add('prenom', null, array(
                        'label' => 'Prénom'
                   ))
                   ->add('email', null, array(
                        'label' => 'Email'
                   ))
                   ->add('programme', null, array(
                        'label' => 'Programme'
                   ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper){
        $datagridMapper->add('programme', null, array(
                           'label' => 'Programme'
                       ))
        ;
    }

    protected function configureListFields(ListMapper $listMapper){
        unset($this->listModes['mosaic']);
        $listMapper->add('nom', null, array(
                        'label' => 'Nom'
                   ))
                   ->add('prenom', null, array(
                        'label' => 'Prénom'
                   ))
                   ->add('code', null, array(
                        'label' => 'Code'
                   ))
                   ->add('email', null, array(
                        'label' => 'Email'
                   ))
                   ->add('programme', null, array(
                        'label' => 'Programme'
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
      $showMapper->add('nom', null, array(
                      'label' => 'Nom'
                 ))
                 ->add('prenom', null, array(
                      'label' => 'Prénom'
                 ))
                 ->add('code', null, array(
                      'label' => 'Code'
                 ))
                 ->add('email', null, array(
                      'label' => 'Email'
                 ))
                 ->add('programme', null, array(
                      'label' => 'Programme'
                 ))
      ;
    }

    /*
     * Pour chaque création d'un objet MyUser
     */
    public function prePersist($user){
        $this->editCodeMyUser($user);
    }

    /*
     * Pour chaque modification d'un objet MyUser
     */
    public function preUpdate($user){

    }

    /*
     * Création d'un identifiant unique
     */
    public function editCodeMyUser($user){
        $code = strtoupper(substr($user->getPrenom(), 0, 2).substr($user->getNom(), 0, 2));
        $repo = $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository('CommersonBundle:MyUser', 'dauphin_commerson');
        if($repo->countAllMyUsersPerCode($code)>0){
            $i=0;
            $letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
            while($repo->countAllMyUsersPerCode($code)>0 && $i<count($letters)-1){
                $code[3] = $letters[$i];
                $i++;
            }
        }
        $user->setCode($code);
    }
}
