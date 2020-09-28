<?php

class SearchGroupModel extends GenericModel
{
    function __construct() {
        parent::__construct();
    }

    public function getAllGroups(){
        $request = parent::getConnexion()->prepare("SELECT * FROM residence_groupe");
        $request->execute();
        return $request->fetchAll();
    }
}