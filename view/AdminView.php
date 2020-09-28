<?php

class AdminView
{
    function show($adminEmail, $proUsers, $groupList, $residenceList, $legal_statusList, $residence_statusList, $serviceList) {
        include("view/page/dashboardAdmin.php");
    }
}