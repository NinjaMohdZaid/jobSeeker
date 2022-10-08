<?php
// page to permanently delete job
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
        $sql="DELETE FROM `jobs` WHERE `sno`='$sno' AND `InRecycleBin`='yes'";
        $result=mysqli_query($connect,$sql);
        if($result){
          //delete permanently
          header('Location:../php/postedJobs.php?actionPerformed=success&p_deleted=yes');
        }
        else
        {
         //Not Deleted
         header('Location:../php/postedJobs.php?actionPerformed=success&p_deleted=no');
        }
    }
  }
  else
  {
        header('Location:../partials/error504.php');
        exit;
  }


?>