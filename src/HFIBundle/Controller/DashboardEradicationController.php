<?php

namespace HFIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DashboardEradicationController extends Controller
{
  public function listAction()
  {
      $dataEradication = $this
        ->getDoctrine()
        ->getManager('hfi')
        ->getRepository('HFIBundle:Observation', 'hfi')
        ->getDataEradication();
      $year = $this->getYearArray();
      if (($stationEvolution = $this->getStationEvolution($year))){
        foreach ($dataEradication as $value){
          $year = ["Annee1","Annee2","Annee3","Annee4","Annee5","Annee6","Annee7"];
          if ($value["identifiant_manip"]){
            foreach ($year as $key => $item){
              if (!$this->checkArray($item, $stationEvolution[$value["identifiant_manip"]])){
                $stationEvolution[$value["identifiant_manip"]][$item] = null;
              }
            }
            $stationEvolution[$value["identifiant_manip"]]["id"] = $value["id"];
            $stationEvolution[$value["identifiant_manip"]]["espece"] = $value["espece"];
            $stationEvolution[$value["identifiant_manip"]]["nom_site"] = $value["nom_site"];
            // $stationEvolution[$value["identifiant_manip"]]["methode_eradication"] = $value["methode_eradication"];
          }
        }
      }
      return $this->render(
        'HFIBundle:Default:eradicationDashboard.html.twig', [
          'stationEvolution' => $stationEvolution
        ]
      );
    }

    private function getKeyYear($year)
    {
      switch ($year) {
        case "2012/2013":
            return "Annee1";
        case "2013/2014":
            return "Annee2";
        case "2014/2015":
            return "Annee3";
        case "2015/2016":
            return "Annee4";
        case "2016/2017":
            return "Annee5";
        case "2017/2018":
            return "Annee6";
        case "2018/2019":
            return "Annee7";
      }
    }

    private function getStat($stat)
    {
      switch ($stat) {
        case "Présence":
            return "presence";
        case "Absence":
            return "absence";
        case null:
            return "first";
      }
    }

    private function checkArray($needle, $haystack)
    {
      foreach($haystack as $key => $value){
        if ($key == $needle){
          return true;
        }
      }
      return false;
    }

    private function getYearArray()
    {
      $year = [
        "2012/2013" => [],
        "2013/2014" => [],
        "2014/2015" => [],
        "2015/2016" => [],
        "2016/2017" => [],
        "2017/2018" => [],
        "2018/2019" => [],
      ];

      foreach($year as $key => $value){
        $argv = explode("/", $key);
        $year[$key] = $this
          ->getDoctrine()
          ->getManager('hfi')
          ->getRepository('HFIBundle:Observation', 'hfi')
          ->getStatYear($argv[0], $argv[1]);
      }
      return $year;
    }

    private function getStationEvolution($year)
    {
      $stationEvolution = [];
      foreach ($year as $key => $value){
        for ($i = 0; $i < count($value); $i++){
          $e = $value[$i]["type_observation"];
          $m = $value[$i]["identifiant_manip"];
          $stat = $this->getStat($e);
          if ($m && $stat == "presence"){
            $stationEvolution[$m][$this->getKeyYear($key)] = "presence";
            // break;
          } else if ($m){
            $stationEvolution[$m][$this->getKeyYear($key)] = $stat;
          }
        }
      }
      return empty($stationEvolution) ? null : $stationEvolution;
    }
}
