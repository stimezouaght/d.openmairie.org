<?php
/**
 *
 */

//
require "page.class.php";
$page = new page();

$page->set_html_title("Espace Documentation");
$page->set_title("Espace Documentation");
$page->set_icon("icon-book");
$page->set_identifier("documentation");

//
$page->start_display();

//
include "documentation.inc.php";
//
foreach ($docs as $id => $rubrik) {
    //
    echo "<div>";
    //
    echo "<h4>";
    echo $rubrik["title"];
    echo "</h4>";
    //
    echo "<table class=\"table table-bordered table-condensed\">\n";
    echo "<thead>";
    echo "<tr>";
    echo "<th>";
    echo "&nbsp;";
    echo "</th>";
    
    if (!isset($rubrik["versions"]) || (isset($rubrik["versions"]) &&  $rubrik["versions"] != false)) {
        echo "<th>";
        echo "version";
        echo "</th>";
    }

    echo "<th>";
    echo "format";
    echo "</th>";

    echo "</tr>";
    echo "</thead>\n";
    echo "<tbody>\n";
    //
    foreach ($rubrik["apps"] as $key => $app) {

        //
        $counter = 0;
        //
        $versions_nb = 0;
        if (isset($app["versions"])) {
            $versions_nb = count($app["versions"]);
        }
        
        //
        if ($versions_nb == 0) {
            //
            echo "<tr>";
            //
                //
                echo "<td>";
                //
                echo $app["title"];
                //
                echo "</td>";
            
            //
            if (!isset($rubrik["versions"]) || (isset($rubrik["versions"]) &&  $rubrik["versions"] != false)) {
                echo "<td>";
                echo "-";
                echo "</td>";
            }
            //
            echo "<td>";
            echo "-";
            echo "</td>";
            //
            echo "</tr>\n";
        } else {

            foreach ($app["versions"] as $version) {
                //
                echo "<tr>";
                //
                if ($counter == 0) {
                    //
                    echo "<td rowspan=\"".$versions_nb."\">";
                    //
                    echo $app["title"];
                    //
                    echo "</td>";
                }
                //
                if (!isset($rubrik["versions"]) || (isset($rubrik["versions"]) &&  $rubrik["versions"] != false)) {
                    echo "<td>";
                    echo $version["title"];
                    if ($version["title"] == "trunk" || $version["title"] == "latest") {
                        echo " <i title=\"Documentation de la version en cours de développement (non publiée)\" class=\"icon-question-sign cursor-help\"></i>";
                    }
                    echo "</td>";
                }
                //
                echo "<td>";
                if (count($version["formats"]) == 0) {
                    echo "-";
                } else {
                    foreach ($version["formats"] as $format) {
                        //
                        echo "<a target=\"_blank\" href=\"";
                        if (isset($format["file"]) && file_exists($format["file"])) {
                            echo $format["file"];
                        } elseif (isset($format["url"])) {
                            echo $format["url"];
                        } else {
                            echo $format["path"];
                        }
                        echo "\">".$format["folder"]."</a>&nbsp;";
                    }
                }
                echo "</td>";
                //
                echo "</tr>\n";
                //
                $counter++;
            }
            
        }

    }
    //
    echo "<tbody>\n";
    echo "</table>\n";
    //
    echo "</div>";
}
//
$page->end_display();

?>
