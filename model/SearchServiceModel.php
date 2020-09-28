<?php

class SearchServiceModel extends GenericModel
{
    function __construct() {
        parent::__construct();
    }

    public function getAllServices(){
        $request = parent::getConnexion()->prepare("SELECT * FROM service");
        $request->execute();
        return $request->fetchAll();
    }
}