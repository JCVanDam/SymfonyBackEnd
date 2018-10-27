<?php

namespace HFIBundle\Services;

class StaticList
{
   public function getCategorie()
   {
     return([
       "Atlas flore" => "Atlas_flore",
       "Eradication" => "Eradication",
       "Fiche terrain" => "Fiche_terrain",
       "Invertébrés" => "Invertebres"
     ]);
   }

   public function getDistrict()
   {
     return([
       "Kerguelen" => "Kerguelen",
       "Amsterdam" => "Amsterdam",
       "Crozet" => "Crozet"
     ]);
   }

   public function getObservation()
   {
       return([
         'A éradiquer' => 'A éradiquer',
         'Première éradication' => 'Première éradication',
         'Présence' => 'Présence',
         'Absence' => 'Absence'
       ]);
    }

    public function getSurfaceEstimee()
    {
      return([
        '< 0,1' => '0,05',
        '0,1 - 0,5' => '0,3',
        '0,5 - 1' => '0,75',
        '1 - 5' => '3',
        '5 - 20' => '12,5',
        '> 20' => '40'
      ]);
   }

   public function getPhenologie()
   {
     return([
       'Végétatif' => 'Végétatif',
       'Boutons' => 'Boutons',
       'Fleur' => 'Fleur',
       'Fruits' => 'Fruits',
       'Sénescence' => 'Sénescence'
     ]);
   }

   public function getProduit()
   {
     return([
       'Glyphosate' => 'glyphosate',
       'Devitalisant souche' => 'devitalisant'
     ]);
   }

   public function getColonisation()
   {
     return([
       'Très dispersé' => 'disperse',
       'Discontinu' => 'discontinu',
       'Continu' => 'continu'
     ]);
   }

   public function getEtatBachage()
   {
     return([
       'Verifier' => 'verifier',
       'Retirer' => 'retirer',
       'Installer' => 'installer'
     ]);
   }

   public function getSource()
   {
     return([
       '136' => '136',
       '136FH' => '136FH',
       'RN' => 'RN',
       'RN-ext' => 'RN-ext',
       'RN/1116' => 'RN/1116',
       'RN/136' => 'RN/136'
     ]);
   }

   public function getActivite()
   {
     return([
       'Gestion' => 'Gestion',
       'Prospection' => 'Prospection',
       'Suivi à long terme' => 'Suivi à long terme'
     ]);
   }

   public function getTypeTopo()
   {
     return([
         '1  - Terrain plat' => 'Terrain plat',
         '2  - Gradin' => 'Gradin',
         '3  - Bas de pente' => 'Bas de pente',
         '4  - Mi-pente' => 'Mi-pente',
         '5  - Haut de pentes' => 'Haut de pentes',
         '6  - Sommet vif' => 'Sommet vif',
         '7  - Plateau sommet' => 'Plateau sommet',
         '8  - Dépression' => 'Dépression',
         '9  - Tumulus' => 'Tumulus',
         '0  - Autre' => 'Autre'
     ]);
   }

  /* public function getPente()
   {
     return([
       '21  - 0' => '0',
       '22  - ]0-3]' => '2.5',
       '23  - ]3-10]' => '7.5',
       '24  - ]10-30]' => '21',
       '25  - ]30-80]' => '56',
       '26  - >80' => '100'
    ]);
   }*/

   public function getPente()
   {
     return([
	     '1  - 0' => '0',
       '2  - ]0-3]' => ']0-3]',
       '3  - ]3-10]' => ']3-10]',
       '4  - ]10-30]' => ']10-30]',
       '5  - >30' => '>30',
       '11 - [0-2]' => '[0-2]',
       '12 - ]2-10]' => ']2-10]',
       '13 - ]10-20]' => ']10-20]',
       '14 - ]20-50]' => ']20-50]',
       '21 - 0' => '0',
       '22 - ]0-3]' => ']0-3]',
       '23 - ]3-10]' => ']3-10]',
	     '24 - ]10-30]' => ']10-30]',
       '25 - ]30-80]' => ']30-80]',
	     '26 - >80' => '>80'
    ]);
   }

   public function getOrientation()
   {
     return([
       '0  - Sans' => 'Sans',
       '1  - Nord' => 'Nord',
       '2  - Nord-Est' => 'Nord-Est',
       '3  - Est' => 'Est',
       '4  - Sud-Est' => 'Sud-Est',
       '5  - Sud' => 'Sud',
       '6  - Sud-Ouest' => 'Sud-Ouest',
       '7  - Ouest' => 'Ouest',
       '8  - Nord-Ouest' => 'Nord-Ouest'
    ]);
   }

   public function getConditionExposition()
   {
     return([
       'EE  - Très exposé' => 'Très exposé',
       'E  - Exposé' => 'Exposé',
       'AE  - Moyennement exposé' => 'Moyennement exposé',
       'A  - Abrité' => 'Abrité',
       'AA  - Très abrité' => 'Très abrité'
    ]);
   }

   public function getErosion()
   {
     return([
       '0  - Négligeable' => 'Négligeable',
       '1  - Ravinement faible' => 'Ravinement faible',
       '2  - Ravinement fort' => 'Ravinement fort',
       '3  - Eolienne faible' => 'Eolienne faible',
       '4  - Eolienne fort' => 'Eolienne fort',
       '5  - Zone de glissement' => 'Zone de glissement',
       '6  - Animaux faible' => 'Animaux faible',
       '7  - Animaux intense' => 'Animaux intense',
       '8  - Autre' => 'Autre'
    ]);
   }

   public function getSubstrat()
   {
     return([
       'Sol minéral' => 'Sol minéral',
       'Sol organique' => 'Sol organique',
       'Sol organo-minéral' => 'Sol organo-minéral',
       'Sol tourbeux' => 'Sol tourbeux'
    ]);
   }

   public function getHumidite()
   {
     return([
       'Sec' => 'Sec',
       'Ressuyé' => 'Ressuyé',
       'Saturé' => 'Saturé',
       'Submergé' => 'Submergé',
       'Immergé' => 'Immergé'
    ]);
   }

   public function getParticulariteGeologique()
   {
     return([
       'Strié' => 'Strié',
       'Polygonal' => 'Polygonal'
    ]);
   }

   public function getMeteo()
   {
     return([
       'Brouillard' => 'Brouillard',
       'Grêle' => 'Grêle',
       'Neige' => 'Neige',
       'Nuages/Soleil' => 'Nuages/Soleil',
       'Nuages sans pluie' => 'Nuages sans pluie',
       'Pluie' => 'Pluie',
       'Soleil' => 'Soleil',
       'Vent fort' => 'Vent fort'
    ]);
   }

   public function getHabitat()
   {
     return([
       '1000 - Habitats de Crozet et Kerguelen' => 'Habitats de Crozet et Kerguelen',
       '1100 - Habitats côtiers' => 'Habitats côtiers',
       '1101 - Habitat à Crassula' => 'Habitat à Crassula',
       '1102 - Pelouse enrichie à Poa annula' => 'Pelouse enrichie à Poa annula',
       '1103 - Pelouse à Leptinella plumosa' => 'Pelouse à Leptinella plumosa',
       '1104 - Prairie côtière à tussocks' => 'Prairie côtière à tussocks',
       '1105 - Habitats à monticules' => 'Habitats à monticules',
       '1200 - Zones herbacées' => 'Zones herbacées',
       '1201 - Communauté primitive, association originelle' => 'Communauté primitive, association originelle',
       '1202 - Communauté ouverte à Acaena' => 'Communauté ouverte à Acaena',
       '1203 - Communauté fermée à Acaena' => 'Communauté fermée à Acaena',
       '1204 - Communauté à Azorelle' => 'Communauté à Azorelle',
       '1205 - Prairie intérieure à monticules' => 'Prairie intérieure à monticules',
       '1206 - Communauté ouverte à fougères' => 'Communauté ouverte à fougères',
       '1207 - Communauté fermée à fougères' => 'Communauté fermée à fougères',
       '1208 - Communauté mésique à fougères' => 'Communauté mésique à fougères',
       '1209 - Communauté mixte à Blechnum et Acaena' => 'Communauté mixte à Blechnum et Acaena',
       '1210 - Habitats à graminées introduites dominantes' => 'Habitats à graminées introduites dominantes',
       '1211 - Habitat à espèces introduites dominantes' => 'Habitat à espèces introduites dominantes',
       '1212 - Habitats dégradés' => 'Habitats dégradés',
       '1213 - Latrines à lapins' => 'Latrines à lapins',
       '1214 - Communanté à Festuca contracta' => 'Communanté à Festuca contracta',
       '1300 - Milieu humides et tourbières' => 'Milieu humides et tourbières',
       '1301 - Habitat tourbeux sec' => 'Habitat tourbeux sec',
       '1302 - Habitat tourbeux mésique' => 'Habitat tourbeux mésique',
       '1303 - Habitat tourbeux humide' => 'Habitat tourbeux humide',
       '1304 - Ligne de drainage' => 'Ligne de drainage',
       '1305 - Habitats boueux enrichi' => 'Habitats boueux enrichi',
       '1306 - Habitats de rives' => 'Habitats de rives',
       '1307 - Habitats de suintement' => 'Habitats de suintement',
       '1308 - Habitat aquatique' => 'Habitat aquatique',
       '1400 - Fell-field' => 'Fell-field',
       '1401 - Fell-field mésique' => 'Fell-field mésique',
       '1402 - Fell-field xérique' => 'Fell-field xérique',
       '1403 - Plaine alluviale' => 'Plaine alluviale',
       '1404 - Faille, paroi rocheuse' => 'Faille, paroi rocheuse',
       '1500 - Zone enneigées, glacées, libérées des glaces' => 'Zone enneigées, glacées, libérées des glaces',
       '2000 - Habitats d\'Amsterdam' => 'Habitats d\'Amsterdam',
       '2100 - Falaises côtières' => 'Falaises côtières',
       '2200 - Habitats de basse altitude' => 'Habitats de basse altitude',
       '2300 - Habitat de moyenne altitude dominé par les fougères' => 'Habitat de moyenne altitude dominé par les fougères',
       '2400 - Pentes tourbeuses' => 'Pentes tourbeuses',
       '2500 - Habitat tourbeux d\'altitude' => 'Habitat tourbeux d\'altitude',
       '2600 - Fell-field d\'altitude' => 'Fell-field d\'altitude',
       '2700 - Crevasses, coulées et cratères' => 'Crevasses, coulées et cratères',
       '3000 - Habitats de Saint Paul' => 'Habitats de Saint Paul',
       '3100 - Plages de galet et blocs' => 'Plages de galet et blocs',
       '3200 - Falaises côtières à l\'extérieur du cratère' => 'Falaises côtières à l\'extérieur du cratère',
       '3300 - Falaise à l\'intérieur du cratère' => 'Falaise à l\'intérieur du cratère',
       '3400 - Habitats anthropisés' => 'Habitats anthropisés',
       '3500 - Habitats de versants extérieurs' => 'Habitats de versants extérieurs',
       '3501 - Zone érodées en bordure des falaises côtières' => 'Zone érodées en bordure des falaises côtières',
       '3502 - Zone érodées de haut de pente' => 'Zone érodées de haut de pente',
       '3503 - Habitats a Scirpus nodosus dense' => 'Habitats a Scirpus nodosus dense',
       '3504 - Pentes herbeuses à Poa novarae' => 'Pentes herbeuses à Poa novarae',
       '3505 - Les "Terres chaudes"' => 'Les \"Terres chaudes\"'
    ]);
   }

   public function getProtocole()
   {
     return([
       'Atlas' => 'Atlas',
       'Donnée observateur extérieur' => 'Donnée observateur extérieur',
       'Eradication' => 'Eradication',
       'Inventaire' => 'Inventaire',
       'Restauration Phylica' => 'Restauration Phylica',
       'Ligne permanente Végétation' => 'Ligne permanente Végétation',
       'Ligne permanente Chardon' => 'Ligne permanente Chardon',
       'Observatoires Habitats' => 'Observatoires Habitats',
       'Observatoires espèces introduites' => 'Observatoires espèces introduites',
       'Observatoire Pringlea antiscorbutica' => 'BarObservatoire Pringlea antiscorbuticacoding',
       'Observatoire Lyallia kerguelensis' => 'Observatoire Lyallia kerguelensis',
       'Piégeages permanents' => 'Piégeages permanents',
       'Prospection télédétection' => 'Prospection télédétection',
       'Répartition Merizodus' => 'Répartition Merizodus',
       'Transects ecophy plantes' => 'Transects ecophy plantes',
       'Transects Notodiscus' => 'Transects Notodiscus',
       'Transects Merizodus' => 'Transects Merizodus',
       'Veille plantes introduites sur base' => 'Veille plantes introduites sur base',
       'Autre' => 'Autre'
    ]);
   }

   public function getImpact()
   {
     return([
       'Cadavre(s)' => 'Cadavre(s)',
       'Colonie' => 'Colonie',
       'Coulée' => 'Coulée',
       '(rat, souris)' => '(rat, souris)',
       'Déjections' => 'Déjections',
       'Destruction végétation' => 'Destruction végétation',
       'Erosion' => 'Erosion',
       'Herbivorie' => 'Herbivorie',
       'Impact humain' => 'Impact humain',
       'Nid(s)' => 'Nid(s)',
       'Pelote de réjection' => 'Pelote de réjection',
       'Phanères' => 'Phanères',
       'Piétinement-Tassement' => 'Piétinement-Tassement',
       'Restes alimentaires' => 'Restes alimentaires',
       'Souilles' => 'Souilles',
       'Terriers' => 'Terriers'
    ]);
   }

   public function getModePrelevement()
   {
     return([
       'BAR - Piège barber' => 'piège barber',
       'BAT - Battage' => 'battage',
       'BER - Berlèse' => 'berlèse',
       'BQT - Barquette' => 'barquette',
       'CV - Chasse à vue' => 'chasse à vue',
       'FAU - Filet fauchoir' => 'filet fauchoir',
       'LAV - Lavages de plantes' => 'lavages de plantes',
       'PJ - Piège jaune' => 'piège jaune',
       'PJA - Piège jaune appâté' => 'piège jaune appâté',
       'TRM - Tri manuel de terre' => 'tri manuel de terre',
    ]);
   }

   public function getMilieuPrelevement()
   {
     return([
       'Cadavre' => 'Cadavre',
       'Choux' => 'Choux',
       'Laisses de mer' => 'Laisses de mer',
       'Sous pierres' => 'Sous pierres',
       'Bloc tourbe' => 'Bloc tourbe',
       'Indéterminé' => 'Indéterminé',
       'Végétation' => 'Végétation',
       'Autre' => 'Autre',
    ]);
   }

   public function getRecouvrement()
   {
     return([
       '1 - 0 - 5%' => '0 - 5%',
       '2 - 5 - 25%' => '5 - 25%',
       '3 - 25 - 50%' => '25 - 50%',
       '4 - 50 - 75%' => '50 - 75%',
       '5 - + de 75%' => '+ de 75%',
       '6 ou + - présence' => 'présence',
       '11 - présence' => 'présence',
       '12 - 1 - 5%' => '1 - 5%',
       '13 - 5 - 10%' => '5 - 10%',
       '14 - 10 - 25%' => '10 - 25%',
       '15 - 25 - 50%' => '25 - 50%',
       '16 - 50 - 75%' => '50 - 75%',
       '17 - 75 - 100%' => '75 - 100%',
       '21 - présence' => 'présence',
       '22 - 1  - 10%' => '1 - 10%',
       '23 - 11 - 25%' => '11 - 25%',
       '24 - 26 - 50%' => '26 - 50%',
       '25 - 51 - 75%' => '51 - 75%',
       '26 - > 75%' => '> 75%',
    ]);
   }

   public function getSociabilite()
   {
     return([
       '1 - Plantes isolees' => 'plantes isolees',
       '2 - En petites touffes' => 'en petites touffes',
       '3 - En touffes moyennes' => 'en touffes moyennes',
       '4 - En large touffes' => 'en large touffes',
       '5 - Peuplement serré et continu' => 'peuplement serré et continu'
    ]);
   }

   public function getVigueur()
   {
     return([
       '1 - Grêle' => 'grêle',
       '2 - Normal' => 'normal',
       '3 - Robuste' => 'robuste'
    ]);
   }

   public function getAbondance()
   {
     return([
       '1 - Un peu' => 'un peu',
       '2 - Moyen' => 'moyen',
       '3 - Beaucoup' => 'beaucoup'
    ]);
   }

   public function getIntensiteImpact()
   {
     return([
       '1 - Nul ou faible' => 'nul ou faible',
       '2 - Moyen' => 'moyen',
       '3 - Fort' => 'fort'
     ]);
   }

   public function getAbondanceInvertebres()
   {
     return([
       '0 - Absence' => 'absence',
       '1 - 1-10 individus' => '1-10 individus',
       '2 - 11-30 individus' => '11-30 individus',
       '3 - 30-200 individus' => '30-200 individus',
       '4 - >200 individus' => '>200 individus',
       '8 - Espèce présente' => 'espece presente',
     ]);
   }

   public function getCodeInvertebres()
   {
     return([
        "ACARI"=>"ACARI",
        "ACC"=>"ACC",
        "ALLOC"=>"ALLOC",
        "AMALM"=>"AMALM",
        "AMBL"=>"AMBL",
        "AMBLM"=>"AMBLM",
        "AMBLP"=>"AMBLP",
        "AMPHI"=>"AMPHI",
        "ANATA"=>"ANATA",
        "ANATC"=>"ANATC",
        "ANTAA"=>"ANTAA",
        "ANTAC"=>"ANTAC",
        "ANTAD"=>"ANTAD",
        "ANTAJ"=>"ANTAJ",
        "APETL"=>"APETL",
        "APTES"=>"APTES",
        "ARAIG"=>"ARAIG",
        "ASELL"=>"ASELL",
        "ASTIG"=>"ASTIG",
        "ATROP"=>"ATROP",
        "AULAC"=>"AULAC",
        "AULAS"=>"AULAS",
        "AUSTI"=>"AUSTI",
        "BELGA"=>"BELGA",
        "BOTH"=>"BOTH",
        "BOTHA"=>"BOTHA",
        "BOTHB"=>"BOTHB",
        "BOTHCO"=>"BOTHCO",
        "BOTHCR"=>"BOTHCR",
        "BOTHDA"=>"BOTHDA",
        "BOTHDE"=>"BOTHDE",
        "BOTHF"=>"BOTHF",
        "BOTHGE"=>"BOTHGE",
        "BOTHGR"=>"BOTHGR",
        "BOTHGV"=>"BOTHGV",
        "BOTHR"=>"BOTHR",
        "BOTHS"=>"BOTHS",
        "BRACH"=>"BRACH",
        "BRADA"=>"BRADA",
        "CALLIV"=>"CALLIV",
        "CALYM"=>"CALYM",
        "CANOS"=>"CANOS",
        "CARNI"=>"CARNI",
        "CARTON"=>"CARTON",
        "CHILO"=>"CHILO",
        "CHIRO"=>"CHIRO",
        "CHRISA"=>"CHRISA",
        "CHRISD"=>"CHRISD",
        "CLOTP"=>"CLOTP",
        "COLEO"=>"COLEO",
        "COLLE"=>"COLLE",
        "CROZ"=>"CROZ",
        "CROZC"=>"CROZC",
        "CROZM"=>"CROZM",
        "CROZS"=>"CROZS",
        "CRUST"=>"CRUST",
        "CURCU"=>"CURCU",
        "DENDR"=>"DENDR",
        "DERO"=>"DERO",
        "DEROI"=>"DEROI",
        "DEROR"=>"DEROR",
        "DIPLO"=>"DIPLO",
        "DIPT"=>"DIPT",
        "DISKT"=>"DISKT",
        "DROSO"=>"DROSO",
        "ECTE"=>"ECTE",
        "ECTEB"=>"ECTEB",
        "ECTED"=>"ECTED",
        "ECTEG"=>"ECTEG",
        "ECTEP"=>"ECTEP",
        "ECTER"=>"ECTER",
        "ECTEVA"=>"ECTEVA",
        "ECTEVI"=>"ECTEVI",
        "EISET"=>"EISET",
        "EMBRH"=>"EMBRH",
        "ENCHY"=>"ENCHY",
        "ENTOMOB"=>"ENTOMOB",
        "ESCAR"=>"ESCAR",
        "FUCE"=>"FUCE",
        "FUCEM"=>"FUCEM",
        "HAHNC"=>"HAHNC",
        "HALIA"=>"HALIA",
        "HELEO"=>"HELEO",
        "INDET"=>"INDET",
        "ISOP"=>"ISOP",
        "IXOD"=>"IXOD",
        "IXODK"=>"IXODK",
        "IXODU"=>"IXODU",
        "KLEIDI"=>"KLEIDI",
        "LATHM"=>"LATHM",
        "LEPIDO"=>"LEPIDO",
        "LEPTOC"=>"LEPTOC",
        "LIMAC"=>"LIMAC",
        "LIMNO"=>"LIMNO",
        "LIMNOM"=>"LIMNOM",
        "LIPOD"=>"LIPOD",
        "LISTL"=>"LISTL",
        "LYCOS"=>"LYCOS",
        "MACRE"=>"MACRE",
        "MACROC"=>"MACROC",
        "MALLO"=>"MALLO",
        "MERIZ"=>"MERIZ",
        "MEROC"=>"MEROC",
        "MEST"=>"MEST",
        "MICR"=>"MICR",
        "MICRC"=>"MICRC",
        "MICRE"=>"MICRE",
        "MICRK"=>"MICRK",
        "MICRL"=>"MICRL",
        "MICROM"=>"MICROM",
        "MYRIA"=>"MYRIA",
        "MYRO"=>"MYRO",
        "MYROC"=>"MYROC",
        "MYROJ"=>"MYROJ",
        "MYROK"=>"MYROK",
        "MYROPA"=>"MYROPA",
        "MYROPU"=>"MYROPU",
        "MYZUA"=>"MYZUA",
        "MYZUC"=>"MYZUC",
        "MYZUO"=>"MYZUO",
        "MYZUP"=>"MYZUP",
        "NASOR"=>"NASOR",
        "NEMAT"=>"NEMAT",
        "NEOMA"=>"NEOMA",
        "NOTO"=>"NOTO",
        "NUL"=>"NUL",
        "NUNCU"=>"NUNCU",
        "OPILIO"=>"OPILIO",
        "ORIB"=>"ORIB",
        "OSTEM"=>"OSTEM",
        "PALIE"=>"PALIE",
        "PARAD"=>"PARAD",
        "PAROC"=>"PAROC",
        "PHOLP"=>"PHOLP",
        "PHREO"=>"PHREO",
        "PHTIA"=>"PHTIA",
        "PHTIR"=>"PHTIR",
        "PODURE"=>"PODURE",
        "PRIN"=>"PRIN",
        "PRINC"=>"PRINC",
        "PRINK"=>"PRINK",
        "PROST"=>"PROST",
        "PSEUDA"=>"PSEUDA",
        "PSOCO"=>"PSOCO",
        "PSOQ"=>"PSOQ",
        "PSYCP"=>"PSYCP",
        "PTINI"=>"PTINI",
        "PTYCC"=>"PTYCC",
        "PUC"=>"PUC",
        "RHOPP"=>"RHOPP",
        "RHYOE"=>"RHYOE",
        "RINGA"=>"RINGA",
        "SANG"=>"SANG",
        "SCATO"=>"SCATO",
        "SCIAJ"=>"SCIAJ",
        "SCIAR"=>"SCIAR",
        "SCIAW"=>"SCIAW",
        "SIPHA"=>"SIPHA",
        "SIPHO"=>"SIPHO",
        "SMIN"=>"SMIN",
        "SMITT"=>"SMITT",
        "STAPH"=>"STAPH",
        "STEAT"=>"STEAT",
        "SYMPHY"=>"SYMPHY",
        "TARDI"=>"TARDI",
        "TEGED"=>"TEGED",
        "TEMNA"=>"TEMNA",
        "TENUT"=>"TENUT",
        "THYSA"=>"THYSA",
        "TIQUE"=>"TIQUE",
        "TRICJ"=>"TRICJ",
        "TRICM"=>"TRICM",
        "VANEC"=>"VANEC",
        "VDT"=>"VDT",
     ]);
   }

   public function getTypeMilieu()
   {
     return([
         "11 - Côte rocheuse basse - Littoralle" => "Côte rocheuse basse",
         "12 - Plage de sable - Littoralle" => "Plage de sable",
         "13 - Falaise littorale - Littoralle" => "Falaise littorale",
         "14 - Estuaire - Littoralle" => "Estuaire",
         "15 - Pelouse - Littoralle" => "Pelouse",
         "16 - Autre littoral - Littoralle" => "Autre littoral",
         "20 - Autre zone herbacée - Herbacée" => "Autre zone herbacée",
         "21 - Bord de rivière - Herbacée" => "Bord de rivière",
         "22 - Fond de vallée - Herbacée" => "Fond de vallée",
         "23 - Versant - Herbacée" => "Versant",
         "24 - Plateau - Herbacée" => "Plateau",
         "30 - Autre Fell-field - Fell-field" => "Autre Fell-field",
         "31 - Versant - Fell-field" => "Versant",
         "32 - Eboulis - Fell-field" => "Eboulis",
         "33 - Paroi - Fell-field" => "Paroi",
         "34 - Plateau - Fell-field" => "Plateau",
         "35 - Zone sommitale - Fell-field" => "Zone sommitale",
         "36 - Faille - Fell-field" => "Faille",
         "40 - Autres - Fell-field" => "Autres",
     ]);
   }

   public function getHauteurMoy()
   {
     return([
       "]0 à 5]" => "]0 à 5]",
       "]5 à 10]" => "]5 à 10]",
       "]10 à 20]" => "]10 à 20]",
       "]20 à 30]" => "]20 à 30]",
       "> 30" => "> 30"
     ]);
   }

   public function getBoolean()
   {
     return([
       "Oui" => "true",
       "Non" => "false",
     ]);
   }

   public function getMorphe()
   {
     return([
       "cli - Clitellé" => "Clitellé",
       "coc - Cocon" => "Cocon",
       "fem - Femelle" => "Femelle",
       "lrv - Larve" => "Larve",
       "mal - Mâle" => "Mâle",
       "nym - Nymphe" => "Nymphe",
       "pup - Pup" => "Pup"
     ]);
   }

   public function getTraitement()
   {
     return([
       "Pas de traitement" => "Pas de traitement",
       "Désherbage" => "Désherbage"
     ]);
   }

   public function getPheno()
   {
     return([
       "NO_REPRO" => "NO_REPRO",
       "FR" => "FR",
       "FL" => "FL",
     ]);
   }

   public function getCompetition()
   {
     return([
       "no_invasive" => "no_invasive",
       "inconnu" => "inconnu"
     ]);
   }

   public function getPredation()
   {
     return([
       "rat" => "rat",
       "souris" => "souris",
       "rat + souris" => "rat + souris",
       "rat + chenille" => "rat + chenille",
       "souris + chenille" => "souris + chenille",
       "rat + souris + chenille" => "rat + souris + chenille"
     ]);
   }

   public function getSaison()
   {
     return([
       "Hiver" => "Hiver",
       "Ete" => "Ete"
     ]);
   }
}
