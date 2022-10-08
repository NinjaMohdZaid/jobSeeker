<?php
 //code to appling for a job
 session_start();
 if(isset($_SESSION['Loggedin']))
 {
   $phoneNumber=$_SESSION['phoneNumber'];
   $sno=$_GET['sno'];
   require '../partials/dbmsConnection.php';
   $sql="INSERT INTO `usersappliedforjobs`(`sno`, `phoneNumber`) VALUES ('$sno','$phoneNumber')";
   $result=mysqli_query($connect,$sql);
   if($result)
   {
       header('Location:../php/viewDetailsAndApplyForJob.php?s='.$sno.'&actionPerformed=success&applied=yes');
   }
   else
   {
       header('Location:../php/viewDetailsAndApplyForJob.php?s='.$sno.'&actionPerformed=success&applied=no');
   }
 }
 else
 {
     header('Location:error504.php');
 }




?>
