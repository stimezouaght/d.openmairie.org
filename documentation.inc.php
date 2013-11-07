<?php
/**
 *
 *
 */

//
$docs = array();

//
$docs["applications"] = array(
    "title" => "Applications",
    "apps" => array(
        array(
            "id" => "openads",
            "type" => "readthedocs",
            "source_url" => "https://github.com/openmairie/openads-documentation",
            "source_type" => "github",
        ),
        array(
            "id" => "openaria",
            "type" => "readthedocs",
            "source_url" => "https://github.com/openmairie/openaria-documentation",
            "source_type" => "github",
        ),
        array(
            "id" => "opencimetiere",
            "type" => "readthedocs",
            "source_url" => "https://github.com/openmairie/opencimetiere-documentation",
            "source_type" => "github",
        ),
        array(
            "title" => "openCirculation",
            "folder" => "opencirculation",
        ),
        array(
            "id" => "opencourrier",
            "type" => "readthedocs",
            "source_url" => "https://github.com/openmairie/opencourrier-documentation",
            "source_type" => "github",
        ),
        array(
            "id" => "openelec",
            "type" => "readthedocs",
            "source_url" => "https://github.com/openmairie/openelec-documentation",
            "source_type" => "github",
        ),
        array(
            "title" => "openPersonnalité",
            "folder" => "openpersonnalite",
        ),
        array(
            "id" => "openresultat",
            "type" => "readthedocs",
            "source_url" => "https://github.com/openmairie/openresultat-documentation",
            "source_type" => "github",
        ),
        array(
            "id" => "openscrutin",
            "type" => "readthedocs",
            "source_url" => "https://github.com/openmairie/openscrutin-documentation",
            "source_type" => "github",
        ),
    ),
);

//
$docs["framework"] = array(
    "title" => "Framework",
    "apps" => array(
        array(
            "id" => "openmairie",
            "type" => "readthedocs",
            "source_url" => "https://github.com/openmairie/omframework-documentation",
            "source_type" => "github",
        ),
    ),
);

/**
 *
 */
// Pour chaque rubrique
foreach ($docs as $id => $rubrik) {

    // On stocke le path de la rubrique si un dossier est défini
    // Sinon on part du principe qu'on se trouve dans le dossier
    // racine    
    $rubrik_path = "";
    if (isset($rubrik["folder"])) {
        $rubrik_path = $rubrik["folder"]."/";
    }

    // Pour chaque application
    foreach ($rubrik["apps"] as $key => $app) {

        //
        if (isset($app["type"]) && $app["type"] == "readthedocs") {

            // Récupération des infos sur le projet sur ReadTheDocs.org
            $ch = curl_init("http://readthedocs.org/api/v1/project/".$app["id"]."/?format=json");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
            $project_infos = json_decode(curl_exec($ch));
            curl_close($ch);
            //var_dump($project_infos);

            // Récupération des infos sur les différentes versions du projet 
            // su ReadTheDocs.org
            $ch = curl_init("http://readthedocs.org/api/v1/version/".$app["id"]."/?format=json");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
            $project_versions_infos = json_decode(curl_exec($ch));
            curl_close($ch);
            //var_dump($project_versions_infos);

            //
            if ($project_infos != NULL) {
                $docs[$id]["apps"][$key]["title"] = $project_infos->{'description'};
                $docs[$id]["apps"][$key]["language"] = $project_infos->{'language'};
                $docs[$id]["apps"][$key]["default_branch"] = $project_infos->{'default_branch'};
            } else {
                $docs[$id]["apps"][$key]["title"] = $app["id"];
                $docs[$id]["apps"][$key]["language"] = "";
                $docs[$id]["apps"][$key]["default_branch"] = "";
            }


            //
            $versions = array();
            //
            foreach ($project_versions_infos->{'objects'} as $value) {
                //
                if ($value->{'active'} == '1') {
                    //
                    $versions[$value->{'verbose_name'}] = array(
                        "id" => $value->{'verbose_name'},
                        "title" => ($value->{'verbose_name'} == "latest" && $project_infos->{'default_branch'} != "" ? $project_infos->{'default_branch'} : $value->{'verbose_name'}),
                    );
                }
            }
            //
            $docs[$id]["apps"][$key]["versions"] = array();
            foreach($versions as $version) {
                // On stocke son répertoire et son path
                $docs[$id]["apps"][$key]["versions"][$version["id"]]["title"] = $version["title"];
                $docs[$id]["apps"][$key]["versions"][$version["id"]]["folder"] = $version["id"];
                //$docs[$id]["apps"][$key]["versions"][$version]["path"] = $docs[$id]["apps"][$key]["path"].$version."/";

                // On intialise le tableau des versions
                $docs[$id]["apps"][$key]["versions"][$version["id"]]["formats"] = array();

                //
                $docs[$id]["apps"][$key]["versions"][$version["id"]]["formats"]["html"] = array();
                $docs[$id]["apps"][$key]["versions"][$version["id"]]["formats"]["html"]["folder"] = "html";
                $docs[$id]["apps"][$key]["versions"][$version["id"]]["formats"]["html"]["url"] = "http://docs.openmairie.org/projects/".$app["id"]."/".$docs[$id]["apps"][$key]["language"]."/".$version["id"]."/";

                $docs[$id]["apps"][$key]["versions"][$version["id"]]["formats"]["pdf"] = array();
                $docs[$id]["apps"][$key]["versions"][$version["id"]]["formats"]["pdf"]["folder"] = "pdf";
                $docs[$id]["apps"][$key]["versions"][$version["id"]]["formats"]["pdf"]["url"] = "http://media.readthedocs.org/pdf/".$app["id"]."/".$version["id"]."/".$app["id"].".pdf";

                $docs[$id]["apps"][$key]["versions"][$version["id"]]["formats"]["source"] = array();
                $docs[$id]["apps"][$key]["versions"][$version["id"]]["formats"]["source"]["folder"] = "source";
                $source_url = "";
                if ($app["source_type"] == "github") {
                    //
                    $version_id = $version["id"];
                    //
                    if ($version["id"] == "latest") {
                        if ($docs[$id]["apps"][$key]["default_branch"] == "") {
                            $version_id = "master";
                        } else {
                            $version_id = $docs[$id]["apps"][$key]["default_branch"];
                        }
                    }
                    $source_url = $app["source_url"]."/tree/".$version_id;
                } elseif ($app["source_type"] == "adullact") {
                    $source_url = $app["source_url"];
                }
                $docs[$id]["apps"][$key]["versions"][$version["id"]]["formats"]["source"]["url"] = $source_url;
            }
            //
            continue;
        }

        // Si le répertoire de la documentation existe bien
        if (is_dir($rubrik_path.$app["folder"])) {

            // On stocke le path de l'application 
            $docs[$id]["apps"][$key]["path"] = $rubrik_path.$app["folder"]."/";

            // On intialise le tableau des versions
            $docs[$id]["apps"][$key]["versions"] = array();
            
            // On récupère la liste des versions (répertoires) contenus
            // dans le répertoire de l'application
            $versions = scandir($docs[$id]["apps"][$key]["path"]);
            
            // Pour chaque version
            foreach ($versions as $version) {

                // Si l'élément est effectivemnt un répertoire et est bien
                // une version
                if ($version != "." && $version != ".."
                    && $version != ".svn"
                    && is_dir($docs[$id]["apps"][$key]["path"].$version)) {

                    // On initialise le tableau de la version en questions
                    $docs[$id]["apps"][$key]["versions"][$version] = array();

                    // On stocke son répertoire et son path
                    $docs[$id]["apps"][$key]["versions"][$version]["folder"] = $version;
                    $docs[$id]["apps"][$key]["versions"][$version]["title"] = $version;
                    $docs[$id]["apps"][$key]["versions"][$version]["path"] = $docs[$id]["apps"][$key]["path"].$version."/";

                    // On intialise le tableau des versions
                    $docs[$id]["apps"][$key]["versions"][$version]["formats"] = array();
            
                    if (!isset($rubrik["versions"]) || (isset($rubrik["versions"]) &&  $rubrik["versions"] != false)) {
                        // On récupère la liste des formats (répertoires) contenus
                        // dans le répertoire de la version
                        $formats = scandir($docs[$id]["apps"][$key]["versions"][$version]["path"]);
                    } else {
                        // On récupère la liste des formats (répertoires) contenus
                        // dans le répertoire de la version
                        $formats = $versions;
                    }

                    // Pour chaque format
                    foreach ($formats as $format) {

                        // Si l'élément est effectivemnt un répertoire et est bien
                        // un format
                        if ($format != "." && $format != ".."
                            && $format != ".svn"
                            && is_dir($docs[$id]["apps"][$key]["versions"][$version]["path"].$format)) {

                            // On initialise le tableau du format en question
                            $docs[$id]["apps"][$key]["versions"][$version]["formats"][$format] = array();

                            // On stocke son répertoire et son path
                            $docs[$id]["apps"][$key]["versions"][$version]["formats"][$format]["folder"] = $format;
                            $docs[$id]["apps"][$key]["versions"][$version]["formats"][$format]["path"] = $docs[$id]["apps"][$key]["versions"][$version]["path"].$docs[$id]["apps"][$key]["versions"][$version]["formats"][$format]["folder"]."/";

                            //
                            if ($format == "pdf") {
                                $pdf_files = scandir($docs[$id]["apps"][$key]["versions"][$version]["formats"][$format]["path"]);
                                rsort($pdf_files);
                                $file = NULL;
                                while (count($pdf_files != 0)) {
                                    $file = array_shift($pdf_files);
                                    if ($file != "."
                                        && $file != ".."
                                        && $file != ".svn"
                                        && $file != "index.php") {
                                        break;
                                    } else {
                                        $file = NULL;
                                    }
                                }
                                if ($file != NULL) {
                                    $docs[$id]["apps"][$key]["versions"][$version]["formats"][$format]["file"] = $docs[$id]["apps"][$key]["versions"][$version]["formats"][$format]["path"].$file;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

?>

