<?php
require_once("model/ConnexionModel.php");
require_once("model/SearchEstablishmentModel.php");
require_once("view/ConnexionView.php");
require_once("view/HomeView.php");


class ConnexionController extends GenericController
{
    function __construct() {
        parent::__construct(new ConnexionModel(), new ConnexionView());
    }

    public function show() {
        $this->getView()->show();
    }

    public function showHome() {
        $homeView = new HomeView();
        $homeView->show();
    }

    function connectUser() {
        $userEmail = $_POST['email'];
        $userPassword = $_POST['password'];

        $response = $this->getModel()->connexion($userEmail, $userPassword);

        if(!$response){
            session_destroy();
            $_SESSION['connexion'] = "failed";
            $this->show();
        }else{
            $_SESSION['login'] = $userEmail;
            $userInformation = $this->getModel()->getUserInformation();
            $_SESSION['connexion'] = "success";
            $_SESSION['account_type'] = $userInformation['account_type'];
            if ($_SESSION['account_type'] == 0) {
                $_SESSION['userinfo'] = $userInformation['userinfo'];
            }
            $this->showHome();
        }
    }

    public function refreshSession(){
        $userInformation = $this->getModel()->refreshUser();
        $_SESSION['account_type'] = $userInformation['account_type'];
        $_SESSION['userinfo'] = $userInformation['userinfo'];
    }

    function disconnectUser(){
        $_SESSION['login'] = null;
        session_destroy();
        $this->showHome();
    }
}
