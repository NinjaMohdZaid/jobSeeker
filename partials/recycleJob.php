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
        $sql="UPDATE `jobs` SET `InRecycleBin`='' WHERE `sno`='$sno'";
        $result=mysqli_query($connect,$sql);
        if($result)
        {
                     //recycled
                     header('Location:../php/postedJobs.php?actionPerformed=success&recycled=yes');
        }
        else{
                     //recycling failed
                     header('Location:../php/postedJobs.php?actionPerformed=success&recycled=no');
        }
    }
  }
  else
  {
        header('Location:../partials/error504.php');
        exit;
  }


?>