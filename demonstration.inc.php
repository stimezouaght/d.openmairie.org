<?php
/**
 * 
 *
 */

//
$demos = array();

//
$demos["openads"] = array(
    "title" => "openADS",
    "description" => "openADS est un logiciel libre de gestion de l'urbanisme. Il permet le suivi de
l'instruction des demandes de permis et d'autorisations. openADS comprend
la gestion de l'enchainement des tâches, des délais légaux et de la prise en
compte des contraintes du PLU, avec possibilité d'affichage cartographique
et bien plus encore.",
    "categories" => array(
        "Urbanisme",
    ),
    "versions" => array(
        "4.4" => array(
            "title" => "4.4.0",
            "framework" => "4.6",
            "href" => "a/openads/4.4",
            "autoinstall" => true,
            "svn" => "svn://scm.adullact.net/svn/openfoncier/tags/4.4.0",
            "db" => "pgsql",
        ),
    ),
);

//
$demos["openaria"] = array(
    "title" => "openARIA",
    "description" => "openARIA est un logiciel libre permettant l'Analyse du Risque Incendie et de l'Accessibilité pour les Établissements Recevant du Public (ERP).",
    "categories" => array(
        "Urbanisme",
    ),
    "versions" => array(
        "1.2" => array(
            "title" => "1.2.0",
            "framework" => "4.5",
            "href" => "a/openaria/1.2",
            "autoinstall" => true,
            "svn" => "svn://scm.adullact.net/svn/openaria/tags/1.2.0",
            "db" => "pgsql",
        ),
    ),
);

//
$demos["opencimetiere"] = array(
    "title" => "openCimetière",
    "description" => "openCimetière est un logiciel de gestion des concessions de cimetières. Il
permet la gestion de la place (défunt) dans les concessions, la gestion des
autorisations (concessionnaire et ayant droit), la gestion du terme de la
concession (transfert de défunt, transfert à l’ossuaire), la gestion des
concessions libres, la gestion des opérations funéraires, l’archivage
systématique de l’ensemble des données pour constituer une mémoire commune et
bien plus encore.",
    "categories" => array(
        "Activités funéraires", 
    ),
    "versions" => array(
        "3.0" => array(
            "title" => "3.0.0-a9",
            "framework" => "4.5",
            "sig" => true,
            "href" => "a/opencimetiere/3.0",
            "autoinstall" => true,
            "svn" => "svn://scm.adullact.net/svn/opencimetiere/tags/3.0.0-a9",
            "db" => "pgsql",
        ),
    ),
);

//
$demos["opencourrier"] = array(
    "title" => "openCourrier",
    "description" => "openCourrier est un logiciel de gestion de courrier entrant et sortant dans une
organisation avec possibilité d'affecter des tâches et bien plus encore.",
    "categories" => array(
        "Administration & communication",
        "Population", 
    ),
    "versions" => array(
        "4.1" => array(
            "title" => "4.1.4",
            "framework" => "4.4.8",
            "sig" => true,
            "href" => "a/opencourrier/4.1",
            "autoinstall" => true,
            "svn" => "svn://scm.adullact.net/svn/opencourrier/tags/4.1.4",
            "db" => "pgsql",
        ),
    ),
);

//
$demos["openelec"] = array(
    "title" => "openElec",
    "description" => "openElec est un logiciel de gestion des listes électorales. Il permet la
gestion complète des élections politiques, de l'inscription d'un électeur,
jusqu'à l'édition de sa carte électorale, l'édition des listes d'émargement,
le transfert à l'insee des nouvelles inscription et bien plus encore.",
    "categories" => array(
        "Élections", 
        "Population", 
    ),
    "versions" => array(
        "4.4" => array(
            "title" => "4.4.3",
            "framework" => "4.1.13",
            "href" => "a/openelec/4.4",
            "autoinstall" => true,
            "svn" => "svn://scm.adullact.net/svn/openelec/tags/4.4.3",
            "db" => "pgsql",
            "schema" => "public",
        ),
    ),
);

//
$demos["openresultat"] = array(
    "title" => "openRésultat",
    "description" => "openRésultat permet la gestion des résultats électoraux lors de soirées
électorales : export des résultats pour la préfecture, animation sur
grand écran, publication des résultats sur le web, gestion des centaines, 
de la participation et bien plus encore.",
    "categories" => array(
        "Élections", 
    ),
    "versions" => array(
        "1.16" => array(
            "title" => "1.16.1",
            "framework" => "2",
            "href" => "a/openresultat/1.16",
            "autoinstall" => true,
            "svn" => "svn://scm.adullact.net/svn/openresultat/tags/1.16.1",
            "db" => "mysql",
        ),
    ),
);

//
$demos["openscrutin"] = array(
    "title" => "openScrutin",
    "description" => "openScrutin est un logiciel de composition des bureaux de vote, il permet la
gestion des secrétaires, plantons, présidents, vice présidents, assesseurs,
délégués pour les élections politiques et bien plus encore.",
    "categories" => array(
        "Élections", 
    ),
    "versions" => array(
        "2.0" => array(
            "title" => "2.0.3",
            "framework" => "4.3.1",
            "href" => "a/openscrutin/2.0",
            "autoinstall" => true,
            "svn" => "svn://scm.adullact.net/svn/openscrutin/tags/2.0.3",
            "db" => "pgsql",
        ),
    ),
);

?>
