<?php
//this page is for posting a job in various steps
require 'dbmsConnection.php';
session_start();
$phoneNumber=$_SESSION['phoneNumber'];
if($_SERVER['REQUEST_METHOD']=='POST'){
if($_GET['value']==1){
    //echo "1";
     $typeOfJob=$_POST['typeOfJob'];
     $numberOfVaccancies=$_POST['numberOfVaccancies'];
     $jobTitle=$_POST['jobTitle'];
     $salary=$_POST['salary'];
     $minimumEducationAndSkillsRequired=$_POST['minimumEducationAndSkillsRequired'];
     $jobDescription=$_POST['jobDescription'];
     $sql="INSERT INTO `jobs` (`sno`, `phoneNumber`, `typeOfJob`,`numberOfVaccancies`,`jobTitle`, `salary`,`minimumEducationAndSkillsRequired`, `jobDescription`, `country`, `city`, `pinCode`, `nearbyPlace`, `interviewDate`, `interviewTime`, `interviewMode`, `jobTimeFrom`, `jobTimeTo`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `jobMode`,`status`,`inRecycleBin`) VALUES (NULL, '$phoneNumber', '$typeOfJob','$numberOfVaccancies','$jobTitle', '$salary','$minimumEducationAndSkillsRequired','$jobDescription', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','step1Clear','')";
     $result=mysqli_query($connect,$sql);
    if(!$result){
            header('Location:error504.php');
    }
    else
    {
        header('location:../php/step2postJob.php');
    }
  
}
else
{
        if($_GET['value']==2)
         {   
                $phoneNumber=$_SESSION['phoneNumber'];
                $sql="SELECT `sno` FROM `jobs` WHERE phoneNumber='$phoneNumber' and status='step1Clear'";
                $result=mysqli_query($connect,$sql);
                $row=mysqli_fetch_assoc($result);
                $sno=$row['sno'];
                $country=$_POST['country'];
                $state=$_POST['state'];
                $city=$_POST['city'];
                $pinCode=$_POST['pinCode'];
                $nearbyPlace=$_POST['nearbyPlace'];
                $sql="UPDATE `jobs` SET country='$country',state='$state',city='$city',pinCode='$pinCode',nearbyPlace='$nearbyPlace',status='step2Clear' WHERE sno='$sno'";
                $result=mysqli_query($connect,$sql);
        if(!$result){
                header('Location:error504.php');
        }
        else
        {
            header('location:../php/step3postJob.php');
        }
                
         }
         else{
             if($_GET['value']==3)
             {
                 $phoneNumber=$_SESSION['phoneNumber'];
                 $sql="SELECT `sno` FROM `jobs` WHERE phoneNumber='$phoneNumber' and status='step2Clear'";
                 $result=mysqli_query($connect,$sql);
                 $row=mysqli_fetch_assoc($result);
                $sno=$row['sno'];
                $interviewDate=$_POST['interviewDate'];
                $interviewTime=$_POST['interviewTime'];
                $interviewMode=$_POST['interviewMode'];
                $sql="UPDATE `jobs` SET interviewDate='$interviewDate',interviewTime='$interviewTime',interviewMode='$interviewMode',status='step3Clear' WHERE sno='$sno'";
                $result=mysqli_query($connect,$sql);
        if(!$result){
                header('Location:error504.php');
        }
        else
        {
            header('location:../php/step4postJob.php');
        }
                 
             }
             else{
                 if($_GET['value']==4){

                 $phoneNumber=$_SESSION['phoneNumber'];
                 $sql="SELECT `sno` FROM `jobs` WHERE phoneNumber='$phoneNumber' and status='step3Clear'";
                 $result=mysqli_query($connect,$sql);
                 $row=mysqli_fetch_assoc($result);
                 $sno=$row['sno'];
                $jobTimeFrom=$_POST['jobTimeFrom'];
                $jobTimeTo=$_POST['jobTimeTo'];
                $interviewMode=$_POST['interviewMode'];
                $monday=$_POST['monday'];
                $tuesday=$_POST['tuesday'];
                $wednesday=$_POST['wednesday'];
                $thursday=$_POST['thursday'];
                $friday=$_POST['friday'];
                $saturday=$_POST['saturday'];
                $jobMode=$_POST['jobMode'];
                $sql="UPDATE `jobs` SET jobTimeFrom='$jobTimeFrom',jobTimeTo='$jobTimeTo',monday='$monday',tuesday='$tuesday',wednesday='$wednesday',thursday='$thursday',friday='$friday',saturday='$saturday',jobMode='$jobMode',status='step4Clear' WHERE sno='$sno'";
                $result=mysqli_query($connect,$sql);
        if(!$result){
            header('Location:../php/companyInterface.php?postJobStatus=no');
        }
        else
        {
            header('Location:../php/companyInterface.php?postJobStatus=yes');
        }
                 }
         }
         }
}
}
?>