<?php

class GenericModel {
    private $dns;
    private $user;
    private $password;
    private $connexion;


    function __construct() {
        $this->dns = "mysql:host=".Configuration::DATABASE_HOSTNAME.";port=".Configuration::DATABASE_PORT.";dbname=".Configuration::DATABASE_NAME;
        $this->user = Configuration::DATABASE_USERNAME;
        $this->password = Configuration::DATABASE_PASSWORD;
        $this->connexion = self::init();
    }

    function init() {
        $this->connexion = new PDO($this->dns, $this->user, $this->password);
        $this->connexion->query('SET NAMES utf8');
        return $this->connexion;
    }

    public function getConnexion(){
        return $this->connexion;
    }

    public function cryptPassword($userPassword, $userEmail){
        return hash('sha256',  $userEmail . $userPassword);
    }


    /**
     * @param $email
     * @param $title
     * @param $content
     * @return PHPMailer
     * @throws phpmailerException
     */
    public function setPHPMailer($email, $title, $content) {

        $mail = new PHPMailer;
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;

        //Set the hostname of the mail server
        $mail->Host = Configuration::SMTP_SERVER_HOSTNAME;
        $mail->Host = gethostbyname(Configuration::SMTP_SERVER_HOSTNAME);
        $mail->Port = Configuration::SMTP_SERVER_PORT;
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = Configuration::SMTP_ENCRYPTION;
        $mail->SMTPAuth = true;
        $mail->Username = Configuration::SENDER_EMAIL;
        $mail->Password = Configuration::SENDER_PASSWORD;
        $mail->setFrom(Configuration::SENDER_EMAIL, Configuration::SENDER_NAME);
        $mail->addReplyTo(Configuration::SENDER_EMAIL, Configuration::SENDER_NAME);
        $mail->addAddress($email, 'test user');
        $mail->Subject = $title;
        $mail->Body = $content;
        $mail->AltBody = $content;
        $mail->Helo = "HELO";
        $mail->SMTPOptions = Configuration::SMTP_OPTIONS;

        return $mail;
    }


}

?>