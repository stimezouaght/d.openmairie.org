<?php
/**
 *
 *
 */

//
$demos = array();

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
        "3.0.x" => array(
            "title" => "3.0.0-a6",
            "framework" => "4.4.3",
            "sig" => true,
            "href" => "opencimetiere",
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
        "4.0.x" => array(
            "title" => "4.0.2",
            "framework" => "4.4.3",
            "sig" => true,
            "href" => "opencourrier",
            "autoinstall" => true,
            "svn" => "svn://scm.adullact.net/scmrepos/svn/opencourrier/tags/4.0.2",
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
        "4.2.x" => array(
            "title" => "4.2.0-rc2",
            "framework" => "4.1.10",
            "href" => "openelec",
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
        "1.14.x" => array(
            "title" => "1.14.1",
            "framework" => "2",
            "href" => "openresultat",
        ),
    ),
);

//
$demos["openscrutin"] = array(
    "title" => "openScrutin",
    "description" => "openRésultat permet la gestion des résultats électoraux lors de soirées
électorales : export des résultats pour la préfecture, animation sur
grand écran, publication des résultats sur le web, gestion des centaines, 
de la participation et bien plus encore.",
    "categories" => array(
        "Élections", 
    ),
    "versions" => array(
        "2.0.x" => array(
            "title" => "2.0.3",
            "framework" => "4.3.1",
            "href" => "openscrutin",
        ),
    ),
);

?>
