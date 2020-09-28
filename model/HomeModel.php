<?php

class HomeModel extends GenericModel
{
    function __construct()
    {
        parent::__construct();
    }

    public function getStatistics(){
        $request = parent::getConnexion()->prepare("CALL statistics()");
        $request->execute() or die(print_r($request->errorInfo(), true));
        $result = $request->fetchAll();
        return $result;
    }

    public function getBestResidences() {
        $request = parent::getConnexion()->prepare("CALL get_best_residences()");
        $request->execute() or die(print_r($request->errorInfo(), true));
        $result = $request->fetchAll();
        return $result;
    }
}