<?php ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="icon" type="image/png" href="view/images/logo-head.png" />
        <title></title>
        <!-- META TAGS -->
        <meta charset="utf-8">
        <!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
        <!-- FONTAWESOME ICONS -->
        <link rel="stylesheet" href="view/css/font-awesome.min.css">
        <!-- ALL CSS FILES -->
        <link href="view/css/materialize.css" rel="stylesheet">
        <link href="view/css/style.css" rel="stylesheet">
        <link href="view/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
        <link href="view/css/responsive.css" rel="stylesheet">
    </head>
    <body>

        <?php
        require_once("header.php");

        new $page();

        require_once("footer.php");
        ?>

    </body>

    <script src="view/js/jquery.min.js"></script>
    <script src="view/js/jquery-ui.js"></script>
    <script src="view/js/angular.min.js"></script>
    <script src="view/js/bootstrap.js" type="text/javascript"></script>
    <script src="view/js/materialize.min.js" type="text/javascript"></script>
    <script src="view/js/jquery.mixitup.min.js" type="text/javascript"></script>
    <script src="view/js/custom.js"></script>
</html>
