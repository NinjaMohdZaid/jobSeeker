<?php
//save a job to particular user
   session_start();
   $phoneNumber=$_SESSION['phoneNumber'];
   require 'dbmsConnection.php';
   $sno=$_GET['sno'];
   $sql="INSERT INTO `usersavedjob`(`sno`, `phoneNumber`) VALUES ('$sno','$phoneNumber')";
   $result=mysqli_query($connect,$sql);
   if($result)
   {  
       $url=$_SERVER['HTTP_REFERER'];
       header('Location:'.$url.'&jobSave=yes');
   }
?>