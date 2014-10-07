<?php
/**
 *
 */

//
require "page.class.php";
$page = new page();

$page->set_html_title("Espace Démonstration");
$page->set_title("Espace Démonstration");
$page->set_icon("icon-laptop");
$page->set_identifier("demonstration");

//
$page->start_display();

//
$rubrik_title_bloc =
'
<li class="span4">
    <div class="thumbnail">
        <h4>%s<br/><small>%s</small></h4>
        <p>%s</p>
    </div>
</li>
';
//
$app_link_bloc =
'
<i class="icon-ok"></i>
<a target="_blank" href="%s">
%s
</a>
<span>
%s
</span>
<br/>
';
$app_link_label_framework_bloc =
'
<span class="label %s">%s</span>
';
$app_link_label_sig_bloc =
'
<span class="label label-warning" title="Fonctions de géolocalisation intégrées">
    <!--i class="icon-screenshot"></i-->SIG
</span>
';

//
include "demonstration.inc.php";

$view = "by_app"; 

//$view = "by_category";

if ($view == "by_category") {

    // On récupère la liste des catégories
    $categories = array("", );
    $demos_by_category = array();
    $demos_by_category[0] = array(
        "title" => "",
        "apps" => array(),
    );
    foreach ($demos as $key => $value) {
        //
        if (isset($value["categories"]) && is_array($value["categories"])) {
            //
            foreach ($value["categories"] as $category) {
                //
                if (!in_array($category, $categories)) {
                    //
                    $categories[] = $category;
                    //
                    $demos_by_category[] = array(
                        "title" => $category,
                        "apps" => array($key, ),
                    );
                } else {
                    //
                    $demos_by_category[array_search($category, $categories)]["apps"][] = $key;
                }
            }
        } else {
            $demos_by_category[0]["apps"][] = $value["title"];
        }
    }

    //
    echo '<ul class="thumbnails">';
    // On boucle sur chaque catégorie
    foreach ($demos_by_category as $category) {
        //
        $bloc_links = "";
        //
        if (isset($category["apps"]) && count($category["apps"]) != 0) {
            //
            foreach ($category["apps"] as $app_id) {
                //
                $app = $demos[$app_id];
                //
                foreach ($app["versions"] as $version) {
                    //
                    $app_link_labels = "";
                    if (isset($version["framework"]) && $version["framework"] != "") {
                        $app_link_labels .= sprintf(
                            $app_link_label_framework_bloc,
                            (strpos($version["framework"], "4.") === false ? "label-default" : "label-info"),
                            "OM".$version["framework"]
                        );
                    }
                    if (isset($version["sig"]) && $version["sig"] == true) {
                        $app_link_labels .= sprintf($app_link_label_sig_bloc);
                    }
                    //
                    $bloc_links .= sprintf(
                        $app_link_bloc, 
                        $version["href"], 
                        $app["title"]." ".$version["title"], 
                        $app_link_labels
                    );
                }
            }
            //
            printf(
                $rubrik_title_bloc, 
                $category["title"],
                "",
                $bloc_links
            );
        }
    }
    //
    echo '</ul>';
} elseif ($view == "by_app") {
    //
    $demos_by_app = $demos;
    //
    echo '<ul class="thumbnails">';
    // On boucle sur chaque catégorie
    foreach ($demos_by_app as $app) {
        //
        $bloc_links = "";
        //
        foreach ($app["versions"] as $version) {
            //
            $app_link_labels = "";
            if (isset($version["framework"]) && $version["framework"] != "") {
                $app_link_labels .= sprintf(
                    $app_link_label_framework_bloc,
                    (strpos($version["framework"], "4.") === false ? "label-default" : "label-info"),
                    "OM".$version["framework"]
                );
            }
            if (isset($version["sig"]) && $version["sig"] == true) {
                $app_link_labels .= sprintf($app_link_label_sig_bloc);
            }
            //
            $bloc_links .= sprintf(
                $app_link_bloc, 
                $version["href"], 
                $app["title"]." ".$version["title"], 
                $app_link_labels
            );
        }
        //
        printf(
            $rubrik_title_bloc, 
            $app["title"], 
            substr($app["description"], 0, 130)."...",
            $bloc_links
        );
    }
    //
    echo '</ul>';
}

//
echo "<script src=\"http://docs.openmairie.org/demo.stats.js\"></script>";

//
$page->end_display();

?>
