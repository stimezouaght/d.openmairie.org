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
        "4.6" => array(
            "title" => "4.6.1",
            "framework" => "4.7.0",
            "href" => "a/openads/4.6",
            "autoinstall" => true,
            "svn" => "svn://scm.adullact.net/svn/openfoncier/tags/4.6.1",
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
        "1.4" => array(
            "title" => "1.4.0",
            "framework" => "4.8",
            "href" => "a/openaria/1.4",
            "autoinstall" => true,
            "svn" => "svn://scm.adullact.net/svn/openaria/tags/1.4.0",
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
$demos["opendebitdeboisson"] = array(
    "title" => "openDébitDeBoisson",
    "description" => "openDébitDeBoisson est destiné au service de demandes de débit de boisson et a
pour objectif de gérer les demandes de licences de débit de boisson en tenant
compte : des périmètres d'exclusion, du type de demande de licence, de la
géolocalisation de l'établissement, des établissements environnants ayant une
même licence, des dates de demande de licence, des document fournis, générer
les récépissés de ces même demandes et bien plus encore...",
    "categories" => array(
        "Population",
    ),
    "versions" => array(
        "2.0" => array(
            "title" => "2.0.0 (dev)",
            "framework" => "4.9",
            "sig" => true,
            "href" => "a/opendebitdeboisson/2.0",
            "autoinstall" => true,
            "svn" => "svn://scm.adullact.net/svn/openboisson/branches/2.0.0-develop",
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
$demos["openmarcheforain"] = array(
    "title" => "openMarchéForain",
    "description" => "openMarchéForain est un logiciel libre permettant la gestion des Commerçants non sédentaires sur les marchés forains.",
    "categories" => array(
    ),
    "versions" => array(
        "2.4" => array(
            "title" => "2.4.2",
            "framework" => "4.6.3",
            "href" => "a/openmarcheforain/2.4",
            "autoinstall" => true,
            "svn" => "svn://scm.adullact.net/svn/openmarchefor/tags/2.4.2",
            "db" => "pgsql",
            "schema" => "openmf",
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


//
$demos["framework_openmairie"] = array(
    "title" => "Framework openMairie",
    "description" => "Le framework openMairie est une librairie PHP qui permet de créer une
application très rapidement en générant, à partir du modèle de données, des
formulaires, des listings, des éditions PDF, des affichages sur carte et bien
plus encore...",
    "categories" => array(
        "Développement",
    ),
    "versions" => array(
        "4.9" => array(
            "title" => "4.9.0 (dev)",
            "framework" => "4.9",
            "href" => "a/framework_openmairie/4.9",
            "autoinstall" => true,
            "svn" => "svn://scm.adullact.net/svn/openmairie/openmairie_exemple/branches/4.9.0-develop",
            "db" => "pgsql",
            "sig" => true,
        ),
    ),
);

?>
