<?php
        session_start();
         if(isset($_SESSION['Loggedin']))
         {
           $phoneNumber=$_SESSION['phoneNumber'];
           $sno=$_GET['sno'];
           require '../partials/dbmsConnection.php';
           $sql="DELETE FROM `usersappliedforjobs` WHERE sno='$sno' AND phoneNumber='$phoneNumber'";
           $result=mysqli_query($connect,$sql);
           if($result)
           {
               header('Location:../php/viewDetailsAndApplyForJob.php?s='.$sno.'&actionPerformed=success&appliedCancel=yes');
           }
           else
           {
               header('Location:../php/viewDetailsAndApplyForJob.php?s='.$sno.'&actionPerformed=success&appliedCancel=no');
           }
         }
         else
         {
             header('Location:error504.php');
         }
?>