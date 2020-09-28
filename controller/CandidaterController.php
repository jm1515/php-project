<?php
require_once("model/GenericModel.php");
require_once("view/CandidaterView.php");
class CandidaterController extends GenericController
{
    function __construct() {
        parent::__construct(new GenericModel(), new CandidaterView());
    }

    public function show() {
        $this->getView()->show();
    }
}