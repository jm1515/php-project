<?php

class SearchLegalStatusModel extends GenericModel
{
    function __construct() {
        parent::__construct();
    }

    public function getAllLegalStatus(){
        $request = parent::getConnexion()->prepare("SELECT * FROM legal_status");
        $request->execute();
        return $request->fetchAll();
    }
}