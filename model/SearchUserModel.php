<?php

class SearchUserModel extends GenericModel
{
    function __construct() {
        parent::__construct();
    }

    public function getAllProUsers(){
        $request = parent::getConnexion()->prepare("SELECT * FROM account WHERE account_type = 1");
        $request->execute();
        return $request->fetchAll();
    }

}