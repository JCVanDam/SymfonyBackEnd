<?php

namespace OrnithoPinniBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OrnithoPinniBundle:Default:index. html.twig');
    }

    // Numero du piquet 	Code du piquet 	Espèce 	Nombre de passages effectués cette saison 	Date du dernier passage

    public function get_passages_from_seasonAction(Request $request){
        $html = "<table class='table'><thead><tr><th scope='col'>Numéro</th><th scope='col'>Code</th><th scope='col'>Espèce</th><th scope='col'>Nombre de passages effectués en ".$request->query->get('season')."</th><th scope='col'>Date du dernier passage</th></tr></thead><tbody>";
        $em = $this->getDoctrine()->getEntityManager('ornitho_pinni');
        if($request->isXmlHttpRequest()){
            $passages = $em->getRepository('OrnithoPinniBundle:DEMOS\PassageSurTerrier', 'ornitho_pinni');
            $passages = $passages->findFromSeason($request->query->get('specy'));
            $count = array();
            $res = array();
            foreach ($passages as $p){
              $count[$p['id']] = 0;
              $res[$p['id']] = $p;
            }
            foreach ($passages as $p){
              if($request->query->get('season') == $p["saison"]){
                $count[$p['id']]++;
              }
            }
            foreach ($res as $p){

                if($p["date_dernier_passage"] == null || $p["saison"]!=$request->query->get('season')){
                  $date = "Pas encore de passage cette saison...";
                }else{
                  $date = $p["date_dernier_passage"];
                }
                $html.="<tr><td>".$p["numero_piquet"]."</td><td><strong>".$p["code_piquet"]."</strong></td><td>".$p["nom_courant"]."</td><td>".$count[$p['id']]."</td><td>".$date."</td></tr>";
            }
            $html.="</tbody></table>";
            return new Response($html);
        }
        return "<p>AJAX FAILED</p>";
    }
}
