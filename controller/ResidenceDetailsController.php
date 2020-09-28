<?php

require_once("model/SearchEstablishmentModel.php");
require_once("view/ResidenceDetailsView.php");

class ResidenceDetailsController extends GenericController
{
    private $result;
    private $services;
    private $comments;
    function __construct() {
        parent::__construct(new SearchEstablishmentModel(), new ResidenceDetailsView());
        $this->showDetails();
    }

    public function show(){
        parent::getView()->show($this->result, $this->services, $this->comments);
    }

    function showDetails() {
        $this->services = array();
        if (isset($_GET['residence'])) {
            $residence_id = htmlspecialchars($_GET['residence']);
            $this->result = parent::getModel()->getEstablishmentById($residence_id);
            $this->services = parent::getModel()->getEstablishmentServices($residence_id);
            $this->comments = parent::getModel()->getEstablishmentComment($residence_id);
        }
    }
}