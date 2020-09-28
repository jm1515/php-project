<?php

class ProfileModel extends GenericModel
{
    function __construct()
    {
        parent::__construct();
    }

    public function getProfileApplications(){
        $request = parent::getConnexion()->prepare("CALL get_candidatures_by_resident(?)");
        $request->execute(array($_SESSION['userinfo']['resident_account_id'])) or die(print_r($request->errorInfo(), true));
        $result = $request->fetchAll();
        return $result;
    }

    public function updateUser($fundingType, $dossier, $gir, $residenceid){
        $request = parent::getConnexion()->prepare("UPDATE resident SET resisent_GIR = ?, resident_financement_type = ?,resident_social_care_file = ? WHERE resident_account_id = ?");
        $request->execute(array($gir, $fundingType, $dossier, $_SESSION['userinfo']['resident_account_id'])) or die(print_r($request->errorInfo(), true));

        $request2 = parent::getConnexion()->prepare("CALL insert_candidature(?, ?)");
        $request2->execute(array($_SESSION['userinfo']['resident_id'], $residenceid)) or die(print_r($request->errorInfo(), true));

    }
}