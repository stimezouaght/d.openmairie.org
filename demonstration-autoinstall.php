<?php

//
include "demonstration.inc.php";

// Enclenchement de la tamporisation de sortie
ob_start();
//
foreach ($demos as $key_app => $app) {
    //
    foreach ($app["versions"] as $key_version => $version) {
        //
        if (isset($version["autoinstall"]) && $version["autoinstall"] == true) {
            //
            if (!isset($version["svn"])
                || !isset($version["db"])) {
                continue;
            }
            //
            echo $key_app;
            echo "\n";
            //
            echo $key_version;
            echo "\n";
            //
            echo $version["svn"];
            echo "\n";
            //
            echo $version["db"];
            echo "\n";
            //
            echo (isset($version["schema"]) ? $version["schema"] : $key_app);
            echo "\n";
        }
    }
}

//Affecte le contenu courant du tampon de sortie a $return puis l'efface
$return = ob_get_clean();

//
$filename = "demonstration-autoinstall.txt";
file_put_contents($filename, $return);

?>
