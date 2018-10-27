<?php

namespace PortalBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FormType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use PortalBundle\Resources\config\AllConstants;

class SiteType extends AbstractType
{
  public $sites_choices = AllConstants::SITES_CHOICES;
  public function configureOptions(OptionsResolver $resolver)
  {
      $resolver->setDefaults(array(
          'choices' => $this->getChoices()
      ));
  }

  public function getParent()
  {
      return ChoiceType::class;
  }

  public function getChoices(){
    //De la forme : "Kerguelen, 133, René-Bossière - Crête" => 43
    $choices = array();
    for ($i=0; $i<count($this->sites_choices); $i++){
        //Par exemple ["Kerguelen", [...]]
        $district = $this->sites_choices[$i];
        for ($j=0; $j<count(($district)[1]); $j++){
            //Par exemple ["133", [...]]
            $zone = (($district)[1])[$j];
            for ($k=0; $k<count(($zone)[1]); $k++){
                //Par exemple ["René-Bossière -  Crête", 43]
                $site = ($zone[1])[$k];
                $choices[$this->getDistrictName($district).", ".$this->getZoneName($zone).", ".$this->getSiteName($site).", ".$this->getSiteId($site)] = $this->getSiteId($site);
            }
        }
    }
    return $choices;
  }

  public function getSiteId($site){
      return $site[1];
  }

  public function getSiteName($site){
        return $site[0];
  }

  public function getZoneName($zone){
        return $zone[0];
  }

  public function getDistrictName($district){
        return $district[0];
  }
}
