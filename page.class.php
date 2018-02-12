<?php

class page {

    var $html_title = "";
    var $title = "";
    var $icon = "";
    var $identifier = "";



    function set_html_title($html_title = "") {
        $this->html_title = $html_title;
    }
    function set_title($title = "") {
        $this->title = $title;
    }
    function set_icon($icon = "") {
        $this->icon = $icon;
    }
    function set_identifier($identifier = "") {
        $this->identifier = $identifier;
    }

    /**
     *
     */
    function start_page() {
//
$start_page = "<!DOCTYPE html>
<html>
";
        //
        printf($start_page);
    }

    /**
     *
     */
    function end_page() {
//
$end_page = "
</html>
";
        //
        printf($end_page);
    }

    /**
     *
     */
    function html_header() {
//
$header = '
    <head>
        <meta charset="utf-8">
        <title>%s openMairie</title>
        <link rel="icon" type="image/png" href="theme/img/a4fc58cc5a7b8f58690ad15e83e3d06ed5d4451f.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="theme/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="theme/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="theme/css/font-awesome.min.css" rel="stylesheet">
        <link href="theme/css/style.css?v=%s" rel="stylesheet">
    </head>
';
        //
        printf($header, $this->html_title, date("Y-m-d"));
    }

    /**
     *
     */
    function start_body() {
//
$start_body = "
    <body>
";
        //
        printf($start_body);
    }

    /**
     *
     */
    function end_body() {
//
$end_body = "
    <script src=\"theme/js/jquery.min.js\"></script>
    <script src=\"theme/js/bootstrap.min.js\"></script>
    <script src=\"theme/js/masonry.pkgd.min.js\"></script>
    <script src=\"theme/js/script.js\"></script>
    </body>
";
        //
        printf($end_body);
    }

    function navbar() {
//
$navbar = '
    <div class="header">
        <div class="container wrap">
            <a class="brand" href="." title="openMairie est le projet logiciel libre des collectivités territoriales">
                <img src="theme/img/0bbbc8347ddf1484c69117bb13b5d641b24da943.png" alt="openMairie" />
            </a>
        </div>
    </div>
';
        //
        printf($navbar);

    }

    /**
     *
     */
    function start_container() {
//
$start_container = "
    <div class=\"container wrap\">
";
        //
        printf($start_container);
    }

    /**
     *
     */
    function end_container() {
//
$end_container = "
    </div>
";
        //
        printf($end_container);
    }

    /**
     *
     */
    function title() {
//
$title = "
        <div class=\"page-header\">
            <h1><small><i class=\"%s\"></i> %s</small></h1>
        </div>
";
        //
        printf($title, $this->icon, $this->title);
    }

    /**
     *
     */
    function start_main() {
//
$start_main = "
        <div id=\"main\">
";
        //
        printf($start_main);
    }

    /**
     *
     */
    function end_main() {
//
$end_main = "
    </div>
";
        //
        printf($end_main);
    }

    /**
     *
     */
    function footer() {
//
$footer = "
        <hr/>

        <footer>
            <p>&copy; openMairie 2004-%s - <a href=\"http://www.openmairie.org\">openMairie.org</a></p>
        </footer>
";
        //
        printf(
            $footer,
            date("Y")
        );
    }

    /**
     *
     */
    function global_topbar() {
        printf('
<div class="openmairie-global-topbar">
    <div class="container wrap">
        <div>
<a href="http://www.openmairie.org">openMairie.org</a> |
<a href="http://demo.openmairie.org">Démonstration</a> |
<a href="http://docs.openmairie.org">Documentation</a> |
<a href="http://communaute.openmairie.org">Forum</a>
        </div>
    </div>
</div>
        ');
    }


    /**
     *
     */
    function start_display() {
        $this->start_page();
        $this->html_header();
        $this->start_body();
        $this->global_topbar();
        $this->navbar();
        $this->start_container();
        $this->title();
        $this->start_main();
    }

    /**
     *
     */
    function end_display() {
        $this->end_main();
        $this->footer();
        $this->end_container();
        $this->end_body();
        $this->end_page();
    }
}

?>
