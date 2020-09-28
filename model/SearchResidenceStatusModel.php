<?php

class SearchResidenceStatusModel extends GenericModel
{
    function __construct() {
        parent::__construct();
    }

    public function getAllResidenceStatus(){
        $request = parent::getConnexion()->prepare("SELECT * FROM residence_status");
        $request->execute();
        return $request->fetchAll();
    }
}