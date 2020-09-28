<?php
/**
 * Created by PhpStorm.
 * User: PoluxTOAD
 * Date: 26/06/2018
 * Time: 15:00
 */

class CandidaturesModel extends GenericModel
{
    function __construct() {
        parent::__construct();
    }

    public function getCandidatures($proEmail){
        $request = parent::getConnexion()->prepare("CALL get_candidatures_by_pro_email(?)");
        $request->execute(array($proEmail)) or die(print_r($request->errorInfo(), true));
        $result = $request->fetchAll();
        return $result;
    }
}