<?php
namespace CommersonBundle\Services;

class StaticList {
    public function getVisibilites(){
        return([
            "< 100 mètres" => "< 100m",
            "< 200 mètres" => "< 200m",
            "> 200 mètres" => "> 200m"
        ]);
    }

    public function getBateaux(){
        return([
            "Marion Dufresne" => "Marion Dufresne",
            "Chaland" => "Chaland",
            "Curieuse" => "Curieuse",
            "Zodiac" => "Zodiac",
            "Voilier" => "Voilier",
            "Autre" => "Autre"
        ]);
    }

    public function getEtatsMer(){
        return([
            "Très calme" => "Très calme",
            "Calme" => "Calme",
            "Peu agitée" => "Peu agitée",
            "Agitée" => "Agitée",
            "Très agitée" => "Très agitée"
        ]);
    }

    public function getComportements(){
        return([
            "1 - Poursuite (plus de 3 minutes)" => "Poursuite -3min",
            "2 - Poursuite (moins de 3 minutes)" => "Poursuite -3min",
            "3 - Pas de poursuite" => "Pas de poursuite"
        ]);
    }

    public function getReactionsIndividu(){
        return([
            "Aucune" => "Aucune",
            "Légère" => "Légère",
            "Modérée" => "Modérée",
            "Forte" => "Forte"
        ]);
    }

    public function getReactionsGroupe(){
        return([
            "Aucune" => "Aucune",
            "Sous-groupe" => "Sous-groupe",
            "Ensemble du groupe" => "Ensemble du groupe"
        ]);
    }

    public function getArmes(){
        return([
            "Arablète" => "Arablète",
            "Carabine" => "Carabine",
            "Perche" => "Perche"
        ]);
    }

    public function getPositions(){
        return([
            "Flanc droit" => "droite",
            "Flanc gauche" => "gauche"
        ]);
    }

    public function getBehaviors(){
        return([
            "Secousse" => "Secousse",
            "Surprise" => "Surprise",
            "Éclaboussure de la queue" => "Éclaboussure de la queue",
            "Tape de la queue" => "Tape de la queue",
            "Se jette en avant" => "Se jette en avant",
            "Saute" => "Saute",
            "Plonge" => "Plonge",
            "Marsouine" => "Marsouine",
            "Fuite" => "Fuite",
            "Fuite prolongée" => "Fuite prolongée",
            "Changement de direction" => "Changement de direction"
        ]);
    }
}
