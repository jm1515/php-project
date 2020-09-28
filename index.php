<?php
session_start();
error_reporting(E_ERROR);

require_once("config/Configuration.php");
require_once("controller/GenericController.php");
require_once("model/GenericModel.php");

if (!(isset($_GET['page'])) && !(isset($_GET['action']))){
    $page = "HomeController";
    require_once("controller/".$page.".php");
    $instance = new $page();
    $instance->show();
    include("view/page/template.php");
}else {
    if (isset($_GET['page']) && isset ($_GET['action'])) {
        $page = $_GET['page']."Controller";
        $action = $_GET['action'];
        require("controller/" . $page . ".php");
        $instance = new $page();
        $instance->$action();
        include("view/page/template.php");
    } else {
        if (isset($_GET['page'])){
            $page = $_GET['page']."Controller";
            require_once("controller/".$page.".php");
            $instance = new $page();
            $instance->show();
            include("view/page/template.php");
        }
    }
}
?>