<?php

require_once("model/HomeModel.php");
require_once("view/HomeView.php");

class HomeController extends GenericController
{

    function __construct() {
        parent::__construct(new HomeModel(), new HomeView());
    }

    function show() {
        parent::getView()->show(parent::getModel()->getStatistics(), parent::getModel()->getBestResidences());
    }
}

?>