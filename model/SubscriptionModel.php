<?php

require'lib/PHPMailer/PHPMailerAutoload.php';

class SubscriptionModel extends GenericModel {
    private $user;

    function __construct() {
        parent::__construct();
    }

    public function subscribeUser($userEmail, $userPassword, $userGender, $userName, $userAddress, $userZipCode, $userCity, $userForeName, $userBirthDate, $userPhoneNumber){
        //TODO verifier les données
        $userPassword = $this->cryptPassword($userPassword, $userEmail);

        $this->user = new UserModel($userEmail,
            $userPassword,
            $userName,
            $userForeName,
            $userBirthDate,
            $userPhoneNumber,
            $userAddress,
            $userZipCode,
            $userCity,
            $userGender);


        $request = parent::getConnexion()->prepare("CALL insert_user_opasenior(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $request_response = $request->execute(array(
            $this->user->getUserEmail(),
            $this->user->getUserPassword(),
            $this->user->getUserGender(),
            $this->user->getUserName(),
            $this->user->getUserForename(),
            $this->user->getUserAddress(),
            $this->user->getUserPostalCode(),
            $this->user->getUserTown(),
            $this->user->getUserBirthDate(),
            $this->user->getUserPhoneNumber()
        )) or die(print_r($request->errorInfo(), true));

        if(!$request_response){
            return false;
        }

        return $request;
    }

    public function updateUser($userNewPhoneNumber, $userNewAddress, $userNewPostal, $userNewCity){
        $request = parent::getConnexion()->prepare("UPDATE resident SET resident_phone_number = ?, resident_address = ?, resident_postal = ?, resident_city = ? WHERE resident_account_id = ?");
        $request_response = $request->execute(array($userNewPhoneNumber, $userNewAddress, $userNewPostal, $userNewCity, $_SESSION['userinfo']['resident_account_id'])) or die(print_r($request->errorInfo(), true));
    }

    public function subscribeProUser($email, $password){
        $request = parent::getConnexion()->prepare("CALL insert_pro(?, ?)");
        $request_response = $request->execute(array($email, $password)) or die(print_r($request->errorInfo(), true));
    }

    public function suscribeResidence($residenceName, $accountIdPro, $legal_status, $email_residence, $prix_residence, $status, $grpRattache, $service, $proAdress, $proPostalCode, $proCity, $proTel, $proSite, $proPhoto, $descriptif) {
        $request = parent::getConnexion()->prepare("CALL insert_residence(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $request_response = $request->execute(array(
            $residenceName,
            $proAdress,
            $proPostalCode,
            $proCity,
            $proTel,
            $email_residence,
            $prix_residence,
            $grpRattache,
            $accountIdPro,
            $legal_status,
            $proPhoto,
            $status,
            $service
        )) or die(print_r($request->errorInfo(), true));

        if(!$request_response){
            return false;
        }

        return $request;
    }

    /**
     * @param $userEmail
     * @return mixed
     */
    public function sendMail($userEmail) {
        // Génération aléatoire d'une clé
        $key = md5(microtime(TRUE) * 100000);

        // Insertion de la clé dans la base de données (à adapter en INSERT si besoin)
        $stmt = parent::getConnexion()->prepare("UPDATE account SET account_key=:key WHERE account_email like :email");
        $stmt->bindParam(':key', $key);
        $stmt->bindParam(':email', $userEmail);
        $stmt->execute();

        $sujet = "Activer votre compte";
        $message = $this->setSubscriptionMailBody($userEmail, $key);
        $mail = $this->setPHPMailer($userEmail, $sujet, $message);

        // envoie du mail
        $resp_send_mail = $mail->send();

        if (!$resp_send_mail) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            return false;
        }

        // echo "Message sent!";
        return true;
    }

    /**
     * @param $userEmail
     * @param $key
     * @return array
     */
    public function setSubscriptionMailBody($userEmail, $key) {
        // Le lien d'activation est composé du login(log) et de la clé(cle)
        $message = "Bienvenue<br><br>";

        $message .= "Pour activer votre compte, veuillez cliquer sur le lien ci dessous
            ou copier/coller dans votre navigateur internet: <br><br>";

        // Activation Link
        $message .= Configuration::SITE_URL . "?page=Subscription&action=validUser" . "&userEmail=" . urlencode($userEmail) . "&key=" . urlencode($key) . "
             <br><br>";

        $message .= "    --------------- <br><br>";
        $message .= "  Ceci est un mail automatique, Merci de ne pas y répondre.<br><br>";

        return $message;
    }

    function validUser($userEmail, $key) {
        // Récupération de la clé correspondant au $login dans la base de données
        $request = parent::getConnexion()->prepare("SELECT account_key, account_is_valid FROM account WHERE account_key=:key and account_email like :email");
        $request->bindParam(':key', $key);
        $request->bindParam(':email', $userEmail);
        $request->execute();
        $data = $request->fetch();

        $bdkey = $data['account_key'];
        $isValid = $data['account_is_valid'];

        // On teste la valeur de la variable $actif récupéré dans la BDD
        if($isValid == '1') { // Si le compte est déjà actif on prévient
            echo "Votre compte est déjà actif !";
            return true;
        }
        if($key == $bdkey) { // On compare nos deux clés
            // La requête qui va passer notre champ actif de 0 à 1
            $request = parent::getConnexion()->prepare("UPDATE account SET account_is_valid = 1 WHERE account_email like :email ");
            $request->bindParam(':email', $userEmail);
            $request->execute();
            echo "Votre compte a bien été activé !";

            return true;
        }
        else { // Si les deux clés sont différentes on provoque une erreur...
            echo "Erreur ! Votre compte ne peut être activé...";
            return false;
        }

    }
}