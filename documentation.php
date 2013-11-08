<?php
/**
 *
 */

class om_documentation {

    //
    var $_config = array();

    function __construct($config = array()) {
        //
        $this->_config = $config;
    }

    function is_project_exists($project = "") {
        //
        if ($project == "") {
            return false;
        }
        //
        foreach ($this->_config["applications"]["apps"] as $key => $value) {
            if ($value["id"] == $project) {
                return true;
            }
        }
        //
        return false;
    }

    function is_version_exists($project = "", $version = "") {
        //
        if (!$this->is_project_exists($project)) {
            $this->log("le projet n'existe pas");
            return false;
        }
        //
        if ($version == "") {
            return false;
        }
        //
        foreach ($this->_config["applications"]["apps"] as $app) {
            if ($app["id"] == $project) {
                foreach ($app["versions"] as $key => $value) {
                    if (isset($value["title"]) 
                        && $value["title"] == $version
                        || $key == $version) {
                        return true;
                    }
                }
                return false;
            }
        }
        //
        return false;
    }

    function is_format_exists($project = "", $version = "", $format = "") {
        //
        if (!$this->is_version_exists($project, $version)) {
            $this->log("la version et ou le projet n'existe(nt) pas");
            return false;
        }
        //
        if ($format == "") {
            return false;
        }
        //
        foreach ($this->_config["applications"]["apps"] as $app) {
            if ($app["id"] == $project) {
                foreach ($app["versions"] as $version_id => $version_infos) {
                    if (isset($version_infos["title"]) 
                        && $version_infos["title"] == $version
                        || $version_id == $version) {
                        if (isset($version_infos["formats"])) {
                            foreach ($version_infos["formats"] as $format_id => $format_infos) {
                                if ($format_id == $format) {
                                    return true;
                                }
                            }
                        }
                        return false;
                    }
                }
                return false;
            }
        }
        //
        return false;
    }

    function get_link($params = array()) {
        //
        $project = $params["project"];
        $version = $params["version"];
        $format = $params["format"];
        foreach ($this->_config["applications"]["apps"] as $app) {
            if ($app["id"] == $project) {
                foreach ($app["versions"] as $version_id => $version_infos) {
                    if (isset($version_infos["title"]) 
                        && $version_infos["title"] == $version
                        || $version_id == $version) {
                        if (isset($version_infos["formats"])) {
                            foreach ($version_infos["formats"] as $format_id => $format_infos) {
                                if ($format_id == $format) {
                                    if (isset($format_infos["url"])) {
                                        return $format_infos["url"];
                                    } elseif (isset($format_infos["file"])) {
                                        return $format_infos["file"];
                                    } elseif (isset($format_infos["path"])) {
                                        return $format_infos["path"];
                                    } else {
                                        return false;
                                    }
                                }
                            }
                        }
                        return false;
                    }
                }
                return false;
            }
        }
    }

    function manage_direct_link($params = array()) {
        //
        if (!isset($params["project"])) {
            $this->log("aucun projet transmis");
            return false;
        }
        //
        if (!$this->is_project_exists($params["project"])) {
            $this->log("le projet n'existe pas");
            return false;
        }
        //
        if (!isset($params["version"])) {
            // On prend la dernière version
            $params["version"] = "latest";
        }
        //
        if (!$this->is_version_exists($params["project"], $params["version"])) {
            // On prend la dernière version
            $params["version"] = "latest";
            //
            if (!$this->is_version_exists($params["project"], $params["version"])) {
                $this->log("la version n'existe pas");
                return false;
            }
        }
        //
        if (!isset($params["format"])) {
            // On prend le format html
            $params["format"] = "html";
        }
        //
        if (!$this->is_format_exists($params["project"], $params["version"], $params["format"])) {
            // On prend le format html
            $params["format"] = "html";
            if (!$this->is_format_exists($params["project"], $params["version"], $params["format"])) {
                $this->log("le format n'existe pas");
                return false;
            }
        }
        // On renvoi le lien
        $link = $this->get_link($params);
        //
        if (isset($params["path"]) && $link != false) {
            if ($this->url_exists($link.$params["path"].'/index.html')) {
                $link .= $params["path"].'/index.html';
            } elseif ($this->url_exists($link.$params["path"].'index.html')) {
                $link .= $params["path"].'index.html';
            } elseif ($this->url_exists($link.$params["path"])) {
                $link .= $params["path"];
            }
        }
        //
        if ($link != false) {
            header('Location:'.$link);
            die();
        }

        //
        return false;
    }

    function url_exists($url = "") {
        //
        $file_headers = @get_headers($url);
        //
        if ($file_headers[0] == 'HTTP/1.1 404 Not Found'
            || $file_headers[0] == 'HTTP/1.1 404 NOT FOUND') {
            return false;
        } else {
            return true;
        }
    }

    function log($message) {
        //echo $message;
    }
}


class om_documentation_project {



}


//
include "documentation.inc.php";
//
$om_documentation = new om_documentation($docs);
$om_documentation->manage_direct_link($_GET);

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
