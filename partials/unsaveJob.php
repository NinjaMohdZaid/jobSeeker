<?php
//unsave a job to particular user
   session_start();
   $phoneNumber=$_SESSION['phoneNumber'];
   require 'dbmsConnection.php';
   $sno=$_GET['sno'];
   $sql="DELETE FROM `usersavedjob` WHERE phoneNumber='$phoneNumber' AND sno='$sno'";
   $result=mysqli_query($connect,$sql);
   if($result)
   {
       $url=$_SERVER['HTTP_REFERER'];
       header('Location:'.$url.'&jobUnSave=yes');
   }
?>