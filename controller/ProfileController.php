<?php
require_once("model/ProfileModel.php");
require_once("model/SaveEstablishmentModel.php");
require_once("model/SearchEstablishmentModel.php");
require_once("model/SearchUserModel.php");
require_once("model/CandidaturesModel.php");
require_once("model/SearchGroupModel.php");
require_once("model/SearchLegalStatusModel.php");
require_once("model/SearchResidenceStatusModel.php");
require_once("model/SearchServiceModel.php");
require_once("view/ProfileView.php");
require_once("view/AdminView.php");

class ProfileController extends GenericController
{

    private $accountType;
    private $userApplications;
    private $saveEstablishmentModel;
    function __construct() {
        parent::__construct(new ProfileModel(), new ProfileView());
        $this->accountType = $_SESSION['account_type'];
        $this->userApplications = parent::getModel()->getProfileApplications();
        $this->saveEstablishmentModel = new SaveEstablishmentModel();
    }

    public function show(){
        if ($this->accountType == 2){
            $searchEstablishmnetModel = new SearchEstablishmentModel();
            $searchUserModel = new SearchUserModel();
            $searchGroupsModel = new SearchGroupModel();
            $searchLegalStatus = new SearchLegalStatusModel();
            $searchResidenceStatus = new SearchResidenceStatusModel();
            $searchServiceModel = new SearchServiceModel();
            $groupList = $searchGroupsModel->getAllGroups();
            $residenceList = $searchEstablishmnetModel->getAllEstablishments();
            $proUserList = $searchUserModel->getAllProUsers();
            $legal_statusList = $searchLegalStatus->getAllLegalStatus();
            $residence_statusList = $searchResidenceStatus->getAllResidenceStatus();
            $serviceList = $searchServiceModel->getAllServices();
            $adminView = new AdminView();
            $adminView->show($_SESSION['login'],$proUserList, $groupList, $residenceList, $legal_statusList, $residence_statusList, $serviceList);
        }else if ($this->accountType == 1) {
            $CandidaturesModel = new CandidaturesModel();
            $candidaturesList = $CandidaturesModel->getCandidatures($_SESSION['login']);
            parent::getView()->show($this->accountType, $_SESSION['login'], $candidaturesList);
        } else {
            parent::getView()->show($this->accountType, $_SESSION['userinfo'], $this->userApplications);
        }
    }


    public function addResidence(){
        $residenceName = $_POST['residenceName'];
        $this->saveEstablishmentModel->saveEstablishment($residenceName);
        $this->show();
    }

    public function submitCandidature(){
        $fundingType = 'Personnel';
        $dossier = 0;
        $gir = $_POST['gir'];
        if ($_POST['aide'] != 0){
            $fundingType = 'Aide sociale';
        }
        if( $_POST['ouidossier'] !=0){
            $dossier = 1;
        }
        echo json_encode($_POST['residenceid']);
        parent::getModel()->updateUser($fundingType, $dossier, $gir, $_POST['residenceid']);
        $this->accountType = $_SESSION['account_type'];
        $this->userApplications = parent::getModel()->getProfileApplications();
        $this->saveEstablishmentModel = new SaveEstablishmentModel();
        $this->show();
    }
}