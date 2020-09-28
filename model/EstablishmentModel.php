<?php

class EstablishmentModel
{
    private $establishmentId; // Permet de retrouver les commentaires, photos et services associés
    private $establishmentName; // Nom de l'établissement
    private $establishmentLegalStatus; // Statut juridique
    private $establishmentAddress; // Adresse de l'établissement
    private $establishmentTown;
    private $establishmentPostalCode;
    private $establishmentGIR;
    private $establishmentPhoneNumber;
    private $establishmentSiteURL; // URL du site de l'établissement en question
    private $establishmentSocialReason;

    function __construct()
    {
        parent::__construct();
    }

    //Getters & Setters ------------------------
    public function getEstablishmentId()
    {
        return $this->establishmentId;
    }

    public function setEstablishmentId($establishmentId)
    {
        $this->establishmentId = $establishmentId;
    }

    public function getEstablishmentName()
    {
        return $this->establishmentName;
    }

    public function setEstablishmentName($establishmentName)
    {
        $this->establishmentName = $establishmentName;
    }

    public function getEstablishmentLegalStatus()
    {
        return $this->establishmentLegalStatus;
    }

    public function setEstablishmentLegalStatus($establishmentLegalStatus)
    {
        $this->establishmentLegalStatus = $establishmentLegalStatus;
    }

    public function getEstablishmentAddress()
    {
        return $this->establishmentAddress;
    }

    public function setEstablishmentAddress($establishmentAddress)
    {
        $this->establishmentAddress = $establishmentAddress;
    }

    public function getEstablishmentTown()
    {
        return $this->establishmentTown;
    }

    public function setEstablishmentTown($establishmentTown)
    {
        $this->establishmentTown = $establishmentTown;
    }

    public function getEstablishmentPostalCode()
    {
        return $this->establishmentPostalCode;
    }

    public function setEstablishmentPostalCode($establishmentPostalCode)
    {
        $this->establishmentPostalCode = $establishmentPostalCode;
    }

    public function getEstablishmentGIR()
    {
        return $this->establishmentGIR;
    }

    public function setEstablishmentGIR($establishmentGIR)
    {
        $this->establishmentGIR = $establishmentGIR;
    }

    public function getEstablishmentPhoneNumber()
    {
        return $this->establishmentPhoneNumber;
    }

    public function setEstablishmentPhoneNumber($establishmentPhoneNumber)
    {
        $this->establishmentPhoneNumber = $establishmentPhoneNumber;
    }

    public function getEstablishmentSiteURL()
    {
        return $this->establishmentSiteURL;
    }

    public function setEstablishmentSiteURL($establishmentSiteURL)
    {
        $this->establishmentSiteURL = $establishmentSiteURL;
    }

    public function getEstablishmentSocialReason()
    {
        return $this->establishmentSocialReason;
    }

    public function setEstablishmentSocialReason($establishmentSocialReason)
    {
        $this->establishmentSocialReason = $establishmentSocialReason;
    }


}

?>