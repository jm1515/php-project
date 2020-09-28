<?php
/**
 * Created by PhpStorm.
 * Date: 18/06/2018
 * Time: 15:45
 */

require_once("model/SubscriptionModel.php");
require_once("view/SubscriptionView.php");
require_once("view/ConnexionView.php");
require_once("controller/ProfileController.php");
require_once("controller/ConnexionController.php");
require_once("model/UserModel.php");

class SubscriptionController extends GenericController {
    private $url;
    private $secretKey;

    function __construct() {
        parent::__construct(new SubscriptionModel(), new SubscriptionView());
        $this->secretKey = Configuration::CAPTCHA_SECRET_KEY;
        $this->url = Configuration::CAPTCHA_VERIFICATION_URL;
    }

    public function show() {
        $this->getView()->show();
    }

    public function showConnexionView() {
        $connexionView = new ConnexionView();
        $connexionView->show();
    }

    public function updateUser(){
        $userNewPhoneNumber = $_POST['userNewPhoneNumber'];
        $userNewAddress = $_POST['userNewAddress'];
        $userNewPostal = $_POST['userNewPostal'];
        $userNewCity = $_POST['userNewCity'];
        parent::getModel()->updateUser($userNewPhoneNumber, $userNewAddress, $userNewPostal, $userNewCity);
        $refresh = new ConnexionController();
        $refresh->refreshSession();
        $redirect = new ProfileController();
        $redirect->show();
    }

    public function subscribeProUser(){
        $userEmail = $_POST['userProEmail'];
        $userPassword = $_POST['userProPassword'];
        parent::getModel()->subscribeProUser($userEmail, $userPassword);
        $redirect = new ProfileController();
        $redirect->show();
    }

    public function subscribeUser(){
        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['userPassword'];
        $userName = $_POST['userName'];
        $userForeName = $_POST['userForeName'];
        $userBirthDate = $_POST['userBirthDate'];
        $userPhoneNumber = $_POST['userPhoneNumber'];
        $userGender = $_POST['userGender'];
        $userAddress = $_POST['userAddress'];
        $userZipCode = $_POST['userZipCode'];
        $userCity = $_POST['userCity'];

        if(empty($userEmail)|| empty($userPassword) || empty($userName) || empty($userForeName) || empty($userBirthDate) || empty($userPhoneNumber) || empty($userGender) || empty($userAddress) || empty($userZipCode) || empty($userCity)){
            $this->show();
            return;
        }

        // captcha verification
        $recaptchaKey = $_POST["g-recaptcha-response"];

        $data = array(
            'secret' => $this->secretKey,
            'response' => $recaptchaKey
        );
        $options = array(
            'http' => array (
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $verify = file_get_contents($this->url, false, $context);
        $captcha_success=json_decode($verify);

        if ($captcha_success->success==false) {
            echo "<p>You are a bot!</p>";
            $this->show();
        } else if ($captcha_success->success==true) {
            $resp = $this->getModel()->subscribeUser($userEmail, $userPassword, $userGender, $userName, $userAddress, $userZipCode, $userCity, $userForeName, $userBirthDate, $userPhoneNumber);
            $resp_mail = $this->getModel()->sendMail($userEmail);

            if(!$resp_mail){
                echo "Activation email not send !";
                echo " ";
            }

            if(!$resp){
                echo "Subscription Failed !";
                $this->show();
            }

            $_SESSION['account_validation'] = "on wait";
            $this->showConnexionView();
        }
    }

    public function validUser(){
        $userEmail =  urldecode($_GET['userEmail']);
        $key = urldecode($_GET['key']);

        if(empty($userEmail)|| empty($key)){
            //TODO gerer l'erreur
            $this->show();
            return false;
        }

        $resp = $this->getModel()->validUser($userEmail,$key);
        if(!$resp){
            echo "Validation Failed !";
            $_SESSION['account_validation'] = "failed";
            $this->show();
        }

        $_SESSION['account_validation'] = "success";
        $this->showConnexionView();
    }

    public function subscribeResidence(){

        $residenceName = $_POST['residenceName'];
        $accountIdPro = $_POST['emailPro'];
        $legal_status = $_POST['statutLegal'];
        $email_residence = $_POST['emailResidence'];
        $prix_residence = $_POST['prixResidence'];
        $status = implode(',', $_POST['status']);
        $grpRattache = $_POST['grpRattache'];
        $service = implode(',', $_POST['service']);
        $proAdress = $_POST['proAdress'];
        $proPostalCode = $_POST['proPostalCode'];
        $proCity = $_POST['proCity'];
        $proTel = $_POST['proTel'];
        $proSite = $_POST['proSite'];
        $proPhoto = file_get_contents($_FILES['proPhoto']['tmp_name']);
        $descriptif = $_POST['descriptif'];

        if(empty($accountIdPro)||
            empty($residenceName) ||
            empty($legal_status) ||
            empty($email_residence) ||
            empty($prix_residence) ||
            empty($status) ||
            empty($grpRattache) ||
            empty($service) ||
            empty($proAdress) ||
            empty($proPostalCode) ||
            empty($proCity) ||
            empty($proTel) ||
            empty($proSite) ||
            empty($proPhoto) ||
            empty($descriptif))
        {
            $this->show();
            return;
        }

        $resp = $this->getModel()->suscribeResidence($residenceName, $accountIdPro, $legal_status, $email_residence, $prix_residence, $status, $grpRattache, $service, $proAdress, $proPostalCode, $proCity, $proTel, $proSite, $proPhoto, $descriptif);
        if(!$resp){
            echo "Subscription Failed !";
        }
        header("Location: index.php?page=Profile");
        exit(0);
    }

}