<?php


class ProfileView
{
    function show($accountType, $accountinfo, $accountApplications) {
        if ($accountType == 0){
            include("view/page/dashboardPart.php");
        } else if ($accountType == 1){
            include("view/page/dashboardPro.php");
        }
    }
}