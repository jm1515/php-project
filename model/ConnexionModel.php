<?php

class ConnexionModel extends GenericModel
{
    private $idAccount;

    function __construct()
    {
        parent::__construct();
    }

    public function connexion($userEmail, $userPassword){
        $userPassword = $this->cryptPassword($userPassword, $userEmail);

        $request = parent::getConnexion()->prepare("SELECT account_id, account_email, account_password FROM account WHERE account_email = :userEmail AND account_password = :userPassword ");
        $request->bindParam(':userEmail', $userEmail);
        $request->bindParam(':userPassword', $userPassword);
        $request->execute();
        $data = $request->fetch();

        $this->idAccount = $data['account_id'];

        if(!$data){
            print_r($request->errorInfo(), true);
            return false;
        }
        else {
            return true;
        }
    }

    public function getUserInformation(){
        $request = parent::getConnexion()->prepare("SELECT account_type FROM account WHERE account_id = :idAccount");
        $request->bindParam(':idAccount', $this->idAccount);
        $request->execute()or die(print_r($request->errorInfo(), true));
        $data = $request->fetch();

        if ($data['account_type'] == 0) {

            $request = parent::getConnexion()->prepare("SELECT * FROM resident WHERE resident_account_id = :idAccount");
            $request->bindParam(':idAccount', $this->idAccount);
            $request->execute();
            $data['userinfo'] = $request->fetch();
        }

        if(!$data){
            print_r($request->errorInfo(), true);
            return false;
        }
        else {
            return $data;
        }
    }

    public function refreshUser(){
        $request = parent::getConnexion()->prepare("SELECT * FROM resident WHERE resident_account_id = :idAccount");
        $request->bindParam(':idAccount', $_SESSION['userinfo']['resident_account_id']);
        $request->execute();
        $data['userinfo'] = $request->fetch();
        return $data;
    }

}

?>