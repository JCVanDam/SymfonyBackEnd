<?php
namespace OrnithoPinniBundle\Services;

class StaticList {
    public function getVisibilites(){
        return([
            "Mauvaise (moins de 50m)" => "mauvaise (moins de 50m)",
            "Moyenne (entre 50 et 200m)" => "moyenne (entre 50 et 200m)",
            "Bonne (supérieure à 200m)" => "bonne (supérieure à 200 m)"
        ]);
    }

    public function getVents(){
        return([
            "Inférieur à 25 nœuds" => "inférieur à 25 noeuds",
            "Entre 25 et 45 nœuds" => "entre 25 et 45 noeuds",
            "Supérieur à 45 nœuds" => "supérieur à 45 noeuds"
        ]);
    }

    public function getIndicesReproduction(){
        return([
            "Nombreuses paires d'ailes ou pelotes" => "nombreuses_paires_ailes_ou_pelotes",
            "Adulte qui couve" => "adulte_qui_couve",
            "Vu nid avec oeuf" => "vu_nid_avec_oeuf",
            "Poussin entendu" => "poussin_entendu",
            "Poussin vu" => "poussin_vu"
        ]);
    }

    public function getCouverturesNuageuses(){
        return([
            "Pas un seul nuage" => "pas un seul nuage",
            "Inférieure à 1/3 de nuages" => "inférieure à 1/3 de nuages",
            "Entre 1/3 et 2/3 de nuages" => "entre 1/3 et 2/3 de nuages",
            "Supérieure à 2/3 de nuages" => "supérieure à 2/3 de nuages",
            "100% de nuages" => "100% de nuages"
        ]);
    }

    public function getActivitesEtComportements(){
        return([
            "Attaque" => "attaque",
            "Alarme/Situation de blessure" => "alarme_situation_blessure",
            "Etat de vigilance" => "etat_de_vigilance",
            "Repos" => "repos",
            "Se nourrit" => "se_nourrit",
            "Se pose" => "se_pose",
            "S'envole" => "s_envole",
            "Vu en vol" => "vu_en_vol",
            "Autre (à préciser en remarque)" => "autres_preciser_en_remarques"
        ]);
    }

    public function getPrecipitations(){
        return([
            "Nulles" => "nulles",
            "Pluies faibles" => "pluie faibles",
            "Pluies fortes" => "pluie fortes",
            "Neiges faibles" => "neige faibles",
            "Neiges fortes" => "neige fortes"
        ]);
    }

    public function getCouverturesNeigeusesAuSol(){
        return([
            "Nulle" => "0%-pas de neige",
            "Inférieure à 50%" => "<50%",
            "Entre 50% et 75%" => "50 à 75%",
            "Supérieure à 75%" => ">75%"
        ]);
    }

    public function getLunes(){
        return([
            "Pas de lune (0)" => "0 - pas de lune",
            "Un quart de lune (0.25)" => "0.25 - 1 quart",
            "Une demi-lune (0.5)" => "0.5 - demi lune",
            "Pleine lune (1)" => " 1 - pleine lune"
        ]);
    }

    public function getTypesEffectifs(){
        return([
            "A - Nombre de nids avec couveur indéterminé" => "A-Nb de nids avec couveur indeterminé",
            "B - Nombre de nids avec couveur sur oeuf" => "B-Nb de nids avec couveur sur oeuf",
            "C - Nombre de nids avec couveur sur poussin" => "C-Nb de nids avec couveur sur poussin",
            "D - Nombre de nids avec couveur oeuf + poussin" => "D-Nb de nids avec couveur oeuf + poussin",
            "E - Nombre de nids avec poussin seul" => "E-Nb de nids avec poussin seul",
            "F - Nombre de nids occupés vides (présence adulte)" => "F-Nb de nids occupés vides  (présence adulte)",
            "G - Nombre de nids actifs (vide pas d'adultes)" => "G-Nb de nids actifs  (vide pas d'adultes)",
            "H - Nombre de mâles" => "H-Nb de males",
            "I - Nombre de femelles" => "I-Nb de femelles",
            "J - Nombre d'adultes (sexe indeterminé)" => "J-Nb adultes sexe indeterminé",
            "K - Nombre d'immatures" => "K-Nb d'immatures",
            "L - Nombre de poussins ou jeunes de l'année hors nid" => "L-Nb de poussins ou jeunes de l'année hors nid",
            "M - Nombre d'indéterminés (adulte, immature et/ou poussin jeune de l'année)" => "M-Nb d'indéterminés (adulte,immature et/ou poussin jeune de l'année)"
        ]);
    }

    public function getOrigines(){
        return([
          "extrait du GPS (GPX)" => "extrait du GPS (GPX)",
          "pointage manuel sur la carte" => "pointage manuel sur la carte",
          "saisie manuelle de coordonnées GPS" => "saisie manuelle de coordonnées GPS",
          "extrait d'un SIG" => "extrait d'un SIG",
          "extrait de mapsource" => "extrait de mapsource",
          "centroïde de l'île" => "centroïde de l'île",
          "pas de coordonnées pour le point (toponymie)" => "pas de coordonnées pour le point (toponymie)"
        ]);
    }

    public function getContactsAvecEspeces(){
        return([
          "Adulte transportant de la nourriture" => "Adulte transportant de la nourriture",
          "Adulte qui couve" => "Adulte qui couve",
          "Attaque" => "Attaque",
          "Couple observé" => "Couple observé",
          "Coquille d'œuf" => "Coquille d'oeuf",
          "Cris d'alarme" => "Cris d'alarme",
          "Ebauche de nid ou de terrier" => "Ebauche de nid ou de terrier",
          "Espèce entendue de jour" => "Espèce entendue de jour",
          "Espèce entendue de nuit" => "Espèce entendue de nuit",
          "Espèce observée à terre" => "Espèce observée à terre",
          "Jeune de l'année" => "Jeune de l'année",
          "Nid avec œuf" => "Nid avec œuf",
          "Nid avec poussin" => "Nid avec poussin",
          "Nid occupé" => "Nid occupé",
          "Nid vide utilisé récemment" => "Nid vide utilisé récemment",
          "Parade nuptiale" => "Parade nuptiale",
          "Poussin entendu" => "Poussin entendu",
          "Poussin vu" => "Poussin vu",
          "Réponse positive à la repasse" => "Réponse positive à la repasse",
          "Individu en mue" => "Individu en mue",
          "Simulation blessure, détournement attention" => "Simulation blessure, détournement attention",
          "Vu en vol" => "Vu en vol",
          "Présence de terriers caractéristiques de cette espèce" => "Présence de terriers caractéristiques de cette espèce",
          "Colonie" => "Colonie",
          "Autres (préciser en remarques)" => "Autres (préciser en remarques)"
        ]);
    }

    public function getLieuxComptages(){
        return([
          "Depuis un bateau" => "depuis un bateau",
          "À terre" => "à terre",
          "Hélicoptère" => "hélicoptère",
          "Image satellite" => "image satellite",
          "Drone" => "drone"
        ]);
    }

    public function getPrecisionsGPS(){
        return([
          "0 - Non renseigné" => "0 - non renseigné",
          "1 - Coord. précise, position du nid, de la colonie" => "1 - coord. précise, position du nid, de la colonie",
          "2 - Moins precis, position de la zone" => "2 - moins precis, position de la zone",
          "3 - Pris du haut ou du bas de la falaise" => "3 - pris du haut ou du bas de la falaise",
          "4 - Point d'observation, point de comptage si eloigné" => "4 - point d'observation, point de comptage si eloigné",
          "5 - Île dans son ensemble, pas de précision" => "5 - ile dans son ensemble, pas de précision",
          "6 - Secteur prospecté entre le site de départ et le site d'arrivée" => "6 - secteur prospecté entre le site de départ et le site d'arrivée"
        ]);
    }

    public function getTypeEffectifsSaisie(){
      return([
        "Pachas" => "Pachas",
        "Femelles" => "Femelles",
        "Mâles périphériques" => "Mâles périphériques",
        "Pup ou jeune de l'année" => "Pup ou jeune de l'année"
        ]);
    }

    public function getComptageTypes(){
      return([
        "À l'envol" => "À l'envol",
        "À distance" => "À distance"
        ]);
    }

    public function getSaisieTypes(){
      return([
        "Nb d'adultes" => "Nb d'adultes",
        "Nb de jeunes volants" => "Nb de jeunes volants",
        "Nb d'immatures" => "Nb d'immatures",
        "Nb d'oeufs" => "Nb d'oeufs",
        "Nb de poussins" => "Nb de poussins"
        ]);
    }

    public function getSaisieTypes02(){
      return([
        "Adulte en position de couveur" => "Adulte en position de couveur",
        "Nid occupé vide" => "Nid occupé vide",
        "Poussins en crèche ou hors nid" => "Poussins en crèche ou hors nid"
        ]);
    }

    public function getSaisons(){
        $year = 2010;
        $tab = [];
        while($year <= date("Y")){
            $year2 = $year+1;
            $tab[$year."/".$year2] = $year."/".$year2;
            $year++;
        }
        return $tab;
    }

    public function getSaisons02(){
        $year = 2010;
        $tab = [];
        while($year <= date("Y")){
            $tab["".$year] = "".$year;
            $year++;
        }
        return $tab;
    }

    public function getIndicesOccupation(){
      return([
        "Bouché/détruit" => "bouche_detruit",
        "Coquille d'oeuf" => "coquille_oeuf",
        "Fientes à l'entrée" => "fientes_a_lentree",
        "Pas de traces d'occupation" => "pas_de_trace_doccupation",
        "Plumes à l'entrée" => "plumes_a_lentree",
        "Terre gratée" => "terre_gratee",
        "Traces de pas à l'entrée" => "traces_de_pas_a_lentree",
        "Végétation arrachée" => "vegetation_arrachee",
        "Végétation poussant à l'interieur" => "vegetation_poussant_a_linterieur"
      ]);
    }

    public function getReponsesRepasse(){
      return([
        "Pas de repasse" => "pas_de_repasse",
        "Positive" => "positive",
        "Négative" => "negative"
      ]);
    }

    public function getOccupationsTerrier(){
      return([
        "Terrier non fouillé ou trop profond" => "terrier_non_fouille_ou_trop_profond",
        "Adulte présent" => "adulte_present",
        "Vide" => "vide"
      ]);
    }

    public function getVerifsOeuf(){
      return([
        "Terrier non fouillé ou trop profond" => "terrier_non_fouille_ou_trop_profond",
        "Oeuf" => "oeuf",
        "Poussin" => "poussin",
        "Vide" => "vide"
      ]);
    }

    public function getPentes(){
      return([
        "Plat" => "plat",
        "1° à 10°" => "1_a_10",
        "11° à 20°" => "11_a_20",
        "21° à 30°" => "21_a_30",
        "31° à 40°" => "31_a_40",
        "41° à 50°" => "41_a_50",
        "> à 50°" => "sup_a_50",
      ]);
    }

    public function getOrientationsPente(){
      return([
        "0" => "0",
        "N-S" => "N-S",
        "S-N" => "S-N",
        "W-E" => "W-E",
        "E-W" => "E-W",
        "NE-SW" => "NE-SW",
        "SW-NE" => "SW-NE",
        "SE-NW" => "SE-NW",
        "NW-SE" => "NW-SE"
      ]);
    }

    public function getDirectionsSuivies(){
      return([
        "N-S" => "N-S",
        "S-N" => "S-N",
        "W-E" => "W-E",
        "E-W" => "E-W",
        "NE-SW" => "NE-SW",
        "SW-NE" => "SW-NE",
        "SE-NW" => "SE-NW",
        "NW-SE" => "NW-SE",
        "Changeant" => "Changeant"
      ]);
    }

    public function getStatuts(){
      return([
        "Adulte sur oeuf" => "adulte_sur_oeuf",
        "Adulte sur poussin" => "adulte_sur_poussin",
        "Adulte sur vide" => "adulte_sur_vide",
        "Non reproducteur" => "non_reproducteur",
        "Indeterminé" => "indetermine",
        "Mort" => "mort"
      ]);
    }

    public function getAges(){
      return([
        "Juvénile" => "juvenile",
        "Immature" => "immature",
        "Adulte" => "adulte",
        "ND" => "nd"
      ]);
    }

    public function getSagirAges(){
      return([
        "Nouveau-né" => "nouveau-ne",
        "Immature" => "immature",
        "Adulte" => "adulte",
        "Sénescent" => "senescent",
        "Indéterminé" => "indetermine"
      ]);
    }

    public function getSexes(){
      return([
        "Mâle" => "male",
        "Femelle" => "femelle",
        "Indeterminé" => "indetermine"
      ]);
    }

    public function getOrganismes(){
      return([
        "TAAF" => "taaf",
        "IPEV n°109" => "ipev_109",
        "IPEV n°1151" => "ipev_1151",
        "IPEV n°394" => "ipev_394",
        "IPEV / Autre programme" => "ipev",
        "Autre" => "autre"
      ]);
    }

    public function getClasses(){
      return([
        "1-50" => "1-50",
        "1-25" => "1-25",
        "26-50" => "26-50",
        "101-200" => "101-200",
        "51-100" => "51-100",
        "201-500" => "201-500",
        "1001-2000" => "1001-2000",
        "2001-5000" => "2001-5000",
        "5001-10000" => "5001-10000",
        "10001-20000" => "10001-20000",
        "20000 et +" => "20000"
      ]);
    }

    public function getPresences(){
      return([
        "Adulte sur oeuf" => "adulte_sur_oeuf",
        "Adulte sur poussin" => "adulte_sur_poussin",
        "Adulte sur vide" => "adulte_sur_vide",
        "Adulte sur inconnu" => "adulte_sur_inconnu",
        "Couple sur oeuf" => "couple_sur_oeuf",
        "Couple sur poussin" => "couple_sur_poussin",
        "Couple sur vide" => "couple_sur_vide",
        "Oeuf" => "oeuf",
        "Oeuf cassé" => "oeuf_cassé",
        "Poussin" => "poussin",
        "Poussin mort" => "poussin_mort",
        "Vide" => "vide",
        "Occupé par une autre espece (précisez en remarques)" => "occupe_par_autre_espece",
        "Terrier trop profond" => "terrier_trop_profond",
        "Autre" => "X"
      ]);
    }
}
