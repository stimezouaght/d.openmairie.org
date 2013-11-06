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
            "title" => "openADS (anciennement openFoncier)",
            "folder" => "openfoncier",
        ),
        array(
            "title" => "openCimetière",
            "folder" => "opencimetiere",
        ),
        array(
            "title" => "openCirculation",
            "folder" => "opencirculation",
        ),
        array(
            "title" => "openElec",
            "folder" => "openelec",
        ),
        array(
            "title" => "openPersonnalité",
            "folder" => "openpersonnalite",
        ),
    ),
);

//
$docs["framework"] = array(
    "title" => "Framework",
    "apps" => array(
        array(
            "title" => "Guide du développeur",
            "folder" => "framework",
        ),
    ),
);

// Pour chaque rubrique
foreach ($docs as $id => $rubrik) {
    
    $rubrik_path = "";
    if (isset($rubrik["folder"])) {
        $rubrik_path = $rubrik["folder"]."/";
    }

    // Pour chaque application
    foreach ($rubrik["apps"] as $key => $app) {
    
        // Si le répertoire de la documentation existe bien
        if (is_dir($rubrik_path.$app["folder"])) {

            // on initialise le path de l'application
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

