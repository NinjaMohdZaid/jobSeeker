<?php
//script for save changes in the database
session_start();
$phoneNumber=$_SESSION['phoneNumber'];
require 'dbmsConnection.php';
$sno=$_GET['s'];
if($_SERVER['REQUEST_METHOD']=='POST'){
    $numberOfVaccancies=$_POST['numberOfVaccancies'];
    $typeOfJob=$_POST['typeOfJob'];
    $jobTitle=$_POST['jobTitle'];
    $salary=$_POST['salary'];
    $minimumEducationAndSkillsRequired=$_POST['minimumEducationAndSkillsRequired'];
    $jobDescription=$_POST['jobDescription'];
    $country=$_POST['country'];
    $city=$_POST['city'];
    $pinCode=$_POST['pinCode'];
    $nearbyPlace=$_POST['nearbyPlace'];
    $interviewDate=$_POST['interviewDate'];
    $interviewTime=$_POST['interviewTime'];
    $interviewMode=$_POST['interviewMode'];
    $jobTimeFrom=$_POST['jobTimeFrom'];
    $jobTimeTo=$_POST['jobTimeTo'];
    $monday=$_POST['monday'];
    $tuesday=$_POST['tuesday'];
    $wednesday=$_POST['wednesday'];
    $thursday=$_POST['thursday'];
    $friday=$_POST['friday'];
    $saturday=$_POST['saturday'];
    $jobMode=$_POST['jobMode'];
    $state=$_POST['state'];
$sql1="UPDATE `jobs` SET `numberOfVaccancies`='$numberOfVaccancies',`typeOfJob`='$typeOfJob',`jobTitle`='$jobTitle',`salary`='$salary',`minimumEducationAndSkillsRequired`='$minimumEducationAndSkillsRequired',`jobDescription`='$jobDescription',`country`='$country',`city`='$city',`pinCode`='$pinCode',`nearbyPlace`='$nearbyPlace',`interviewDate`='$interviewDate',`interviewTime`='$interviewTime',`interviewMode`='$interviewMode',`jobTimeFrom`='$jobTimeFrom',`jobTimeTo`='$jobTimeTo',`monday`='$monday',`tuesday`='$tuesday',`wednesday`='$wednesday',`thursday`='$thursday',`friday`='$friday',`saturday`='$saturday',`jobMode`='$jobMode',`state`='$state' WHERE `sno`='$sno' AND `phoneNumber`='$phoneNumber' AND `inRecycleBin`=''";
$result1=mysqli_query($connect,$sql1);
if($result1)
{
   header('Location:../php/previewJob.php?s='.$sno.' &actionPerformed=update&updated=yes');
}
else{
    header('Location:../php/previewJob.php?s='.$sno.' &actionPerformed=update&updated=no');
}
}
else
{
    header('Location:error504.php');
}

?>