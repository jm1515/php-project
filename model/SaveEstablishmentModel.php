<?php

class SaveEstablishmentModel extends GenericModel
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Saves the establishment into the database
     */
    public function saveEstablishment(){
        $request = parent::getConnexion()->prepare("INSERT INTO residence VALUES()");
        $request->execute(array());
    }

    /**
     * Updates the current establishment on the databse
     */
    public function updateEstablishment(){
        //TODO verifier les données et compléter la requete en fonction des champs
        $request = parent::getConnexion()->prepare("UPDATE residence SET x WHERE x");
        $request->execute(array());
    }
}