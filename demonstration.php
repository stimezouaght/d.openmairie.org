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
include "demonstration.inc.php";
//
$rubrik_title_bloc =
'
<li class="span4">
    <div class="thumbnail">
        <h4>%s</h4>
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
echo '<ul class="thumbnails">';
//
foreach ($demos as $demo) {
    //
    $bloc_links = "";
    //
    if (isset($demo["apps"])) {
        //
        foreach ($demo["apps"] as $app) {
            //
            $app_link_labels = "";
            if (isset($app["framework"]) && $app["framework"] != "") {
                $app_link_labels .= sprintf($app_link_label_framework_bloc,
                                            ($app["framework"] == "OM4" ? "label-info": "label-default"),
                                            $app["framework"]);
            }
            if (isset($app["sig"]) && $app["sig"] == true) {
                $app_link_labels .= sprintf($app_link_label_sig_bloc);
            }
            //
            $bloc_links .= sprintf($app_link_bloc, $app["link"], $app["title"], $app_link_labels);
        }
    }
    //
    printf($rubrik_title_bloc, $demo["title"], $bloc_links);
}
//
echo '</ul>';

//
$page->end_display();

?>
