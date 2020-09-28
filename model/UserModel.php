<?php
class UserModel
{
    private $userId;
    private $userType;
    private $userGender;
    private $userName;
    private $userForename;
    private $userAddress;
    private $userPostalCode;
    private $userTown;
    private $userPhoneNumber;
    private $userBirthDate;
    private $userFundingType;
    private $userBudget;
    private $userGIR;
    private $userEmail;
    private $userPassword;

    function __construct($userEmail, $userPassword, $userName, $userForeName, $userBirthDate, $userPhoneNumber, $userAddress, $userZipCode, $userCity, $userGender)
    {
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
        $this->userName = $userName;
        $this->userForename = $userForeName;
        $this->userBirthDate = $userBirthDate;
        $this->userPhoneNumber = $userPhoneNumber;
        $this->userAddress = $userAddress;
        $this->userPostalCode = $userZipCode;
        $this->userTown = $userCity;
        $this->userGender = $userGender;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getUserType()
    {
        return $this->userType;
    }

    public function setUserType($userType)
    {
        $this->userType = $userType;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getUserForename()
    {
        return $this->userForename;
    }

    public function setUserForename($userForename)
    {
        $this->userForename = $userForename;
    }

    public function getUserAddress()
    {
        return $this->userAddress;
    }

    public function setUserAddress($userAddress)
    {
        $this->userAddress = $userAddress;
    }

    public function getUserPhoneNumber()
    {
        return $this->userPhoneNumber;
    }

    public function setUserPhoneNumber($userPhoneNumber)
    {
        $this->userPhoneNumber = $userPhoneNumber;
    }

    public function getUserBirthDate()
    {
        return $this->userBirthDate;
    }

    public function setUserBirthDate($userBirthDate)
    {
        $this->userBirthDate = $userBirthDate;
    }

    public function getUserFundingType()
    {
        return $this->userFundingType;
    }

    public function setUserFundingType($userFundingType)
    {
        $this->userFundingType = $userFundingType;
    }

    public function getUserBudget()
    {
        return $this->userBudget;
    }

    public function setUserBudget($userBudget)
    {
        $this->userBudget = $userBudget;
    }

    public function getUserGIR()
    {
        return $this->userGIR;
    }

    public function setUserGIR($userGIR)
    {
        $this->userGIR = $userGIR;
    }

    public function getUserEmail()
    {
        return $this->userEmail;
    }

    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    public function getUserPassword()
    {
        return $this->userPassword;
    }

    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;
    }

    public function getUserPostalCode()
    {
        return $this->userPostalCode;
    }

    public function setUserPostalCode($userPostalCode)
    {
        $this->userPostalCode = $userPostalCode;
    }

    public function getUserTown()
    {
        return $this->userTown;
    }

    public function setUserTown($userTown)
    {
        $this->userTown = $userTown;
    }

    public function getUserGender()
    {
        return $this->userGender;
    }

    public function setUserGender($userGender)
    {
        $this->userGender = $userGender;
    }

}