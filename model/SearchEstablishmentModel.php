<?php

class SearchEstablishmentModel extends GenericModel
{
    //TODO compléter les methodes en fonction de la BD et prévoir les recherches multi-arguments

    function __construct(){
        parent::__construct();
    }

    public function getAllEstablishments(){
        $request = parent::getConnexion()->prepare("SELECT * FROM residence");
        $request->execute();
        return $request->fetchAll();
    }

    public function getEstablishmentById($residence_id){
        $request = parent::getConnexion()->prepare("SELECT * FROM residence WHERE residence_id = ?");
        $request->execute(array($residence_id));
        return $request->fetchAll();
    }

    public function searchEstablishment($service, $department, $pricemin, $pricemax, $name){
        $request = parent::getConnexion()->prepare("CALL search_residence_by_criterias(?, ?, ?, ?, ?)");
        $request->execute(array($service, $department, $pricemin, $pricemax, $name)) or die(print_r($request->errorInfo(), true));
        $result = $request->fetchAll();
        return $result;
    }

    public function getEstablishmentServices($residence_id){
        $request = parent::getConnexion()->prepare("CALL search_services_by_residence(?)");
        $request->execute(array($residence_id)) or die(print_r($request->errorInfo(), true));
        $result = $request->fetchAll();
        return $result;
    }

    public function getEstablishmentComment($residence_id){
        $request = parent::getConnexion()->prepare("CALL get_comment_by_residence(?)");
        $request->execute(array($residence_id)) or die(print_r($request->errorInfo(), true));
        $result = $request->fetchAll();
        return $result;
    }
}