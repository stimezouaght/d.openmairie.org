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
$header = "
    <head>
        <meta charset=\"utf-8\">
        <title>:: openMairie :: %s</title>
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <link href=\"theme/css/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"theme/css/bootstrap-responsive.min.css\" rel=\"stylesheet\">
        <link href=\"theme/css/font-awesome.min.css\" rel=\"stylesheet\">
        <link href=\"theme/css/style.css\" rel=\"stylesheet\">
    </head>
";
        //
        printf($header, $this->html_title);
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
$navbar = "
    <div class=\"navbar navbar-inverse navbar-fixed-top\">
        <div class=\"navbar-inner\">
            <div class=\"container\">
                <button class=\"btn btn-navbar\" data-target=\".nav-collapse\" data-toggle=\"collapse\" type=\"button\">
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"brand\" href=\".\" title=\"openMairie est le projet logiciel libre des collectivités territoriales\">
                    <img src=\"theme/img/openmairie.png\" alt=\"openMairie\" />
                </a>
                <div class=\"nav-collapse collapse pull-right\">
                    <ul class=\"nav\">
                        <li class=\"dropdown\">
                            <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">
                                openMairie.org <b class=\"caret\"></b>
                            </a>
                            <ul class=\"dropdown-menu pull-right\">
                                <li><a href=\"http://www.openmairie.org\"><i class=\"icon-globe\"></i> Portail<br/><small>www.openmairie.org</small></a></li>
                                <li class=\"divider\"></li>
                                <li><a href=\"http://demo.openmairie.org\"><i class=\"icon-laptop\"></i> Espace Démonstration<br/><small>demo.openmairie.org</small></a></li>
                                <li class=\"divider\"></li>
                                <li><a href=\"http://docs.openmairie.org\"><i class=\"icon-book\"></i> Espace Documentation<br/><small>docs.openmairie.org</small></a></li>    
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
";
        //
        printf($navbar);

    }

    /**
     *
     */
    function start_container() {
//
$start_container = "
    <div class=\"container\">
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
            <p>&copy; openMairie 2004-2014 - <a href=\"http://www.openmairie.org\">openMairie.org</a>
            <small><span class=\"muted\">- Cet espace est hébergé par <a target=\"_blank\" href=\"http://www.atreal.fr/\">atReal</a></span></small></p>
        </footer>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-27539934-1', 'auto');
  ga('send', 'pageview');

</script>
";
        //
        printf($footer);
    }

    /**
     *
     */
    function start_display() {
        $this->start_page();
        $this->html_header();
        $this->start_body();
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
