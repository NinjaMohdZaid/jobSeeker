<!--This page loges in a user if the type of user is company then redirects
 it to the company webpage if the type is user than redirects it to the user interface otherwise asks
  for the the type that hire or searching a job -->
<?php
session_start();
if(!isset($_SESSION['Loggedin'])){
 header("Location:../");
          }
          else{
            $phoneNumber=$_SESSION['phoneNumber'];
 require 'dbmsConnection.php';
 $sql="SELECT * FROM `accounts` WHERE phoneNumber='$phoneNumber'";
                $result=mysqli_query($connect,$sql);
                $num=mysqli_num_rows($result);
            if($num==1){
                $row=mysqli_fetch_assoc($result);
                echo "<br>Welcome ".$row['fullName']."  How Are You Dude";
            }
            if($row['type']=='user')
            {
              // echo "<br>User hai ye to";
               header("Location: ../php/userInterface.php");
            }
            else{
                if($row['type']=='company'){
                //echo "<br>company hai ye to";
                header("Location: ../php/companyInterface.php");
                }
                else{
                   // echo "<br>we have to set type company or user";
                   header("Location: ../php/settingAtypeOfUserOrCompany.php");
                }
            }
        }
?>
