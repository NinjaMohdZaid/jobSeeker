<?php
// page to tempararorly delete job
// in this page  i have created a attribute in table whose name is isRecycled and conditions are applied on it
require 'dbmsConnection.php';
session_start();
$phoneNumber=$_SESSION['phoneNumber'];
  if(isset($_SESSION['Loggedin'])){ 
    include '../partials/profileDetails.php';
    if($row['type']!='company')
    {
        header('Location:../partials/error504.php');
        exit;
    }
    else{
        $sno=$_GET['sno'];
        $sql="UPDATE `jobs` SET `InRecycleBin`='yes' WHERE `sno`='$sno'";
        $result=mysqli_query($connect,$sql);
        if($result)
        {
           //means deleted
           header('Location:../php/postedJobs.php?actionPerformed=success&deleted=yes');
        }
        else{
            //means not deleted
            header('Location:../php/postedJobs.php?actionPerformed=success&deleted=no');
        }
    }
  }
  else
  {
        header('Location:../partials/error504.php');
        exit;
  }


?>