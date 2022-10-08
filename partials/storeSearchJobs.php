<?php

if($valueStatus=='both')
{
    // echo 'both';
    $LocationCookie=$_GET['Location'];
    $SkillsDesignationCompaniesCookie=$_GET['SkillsDesignationCompanies'];
}
else{
    if($valueStatus=='onlyLocation')
    {
        $LocationCookie=$_GET['Location'];
        $SkillsDesignationCompaniesCookie=0;
        // echo 'Location';
    }
    else{
        $LocationCookie=0;
        $SkillsDesignationCompaniesCookie=$_GET['SkillsDesignationCompanies'];
        //echo 'skills etc';
    }
}
setcookie("LocationCookie",$LocationCookie,time() + (86400 * 10), "/"); // 86400 = 1 day
setcookie("SkillsDesignationCompaniesCookie",$SkillsDesignationCompaniesCookie,time() + (86400 * 10), "/"); // 86400 = 1 day
?>