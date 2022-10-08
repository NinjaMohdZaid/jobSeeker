<?php
session_start();
//this page will updates new settings of the user
if(isset($_SESSION['Loggedin'])){ 
     if($_SERVER['REQUEST_METHOD']=='POST'){
                require 'dbmsConnection.php';
                if($_GET['v1']=='Account')
                    {   
                       //1.changing account settings
                       if($_GET['v2']=='emailChanging')
                       {
                           //1.1 email changing updating email;
                           $email=$_POST['email'];
                           $phoneNumber=$_SESSION['phoneNumber'];
                           $sql="UPDATE accounts SET email = '$email' WHERE phoneNumber='$phoneNumber'";
                           $result=mysqli_query($connect,$sql);
                                  if($result)
                                  {
                                       header('Location:../php/accountSetting.php');
                                  }
                                  else{
                                       header('Location:error504.php');
                                  }
                       }
                       else
                       {
                           if($_GET['v2']=='passwordResetting')
                           {
                               //1.2 password resetting
                              include 'profileDetails.php';
                              if($_POST['c_Password']!=$row['password'])
                              {
                                  echo 'Old password is wrong';
                              }
                              else{
                                  if($_POST['newPassword']!=$_POST['confirmNewPassword'])
                                  {
                                    echo 'Password Not Matched with Confirmed password';
                                  }
                                  else{
                                    //if all conditions are satisfied then
                                    $newPassword=$_POST['newPassword'];
                                    $phoneNumber=$_SESSION['phoneNumber'];
                                    $sql="UPDATE accounts SET password = '$newPassword' WHERE phoneNumber='$phoneNumber'";
                                    $result=mysqli_query($connect,$sql);
                                           if($result)
                                           {
                                                header('Location:../php/accountSetting.php');
                                           }
                                           else{
                                                header('Location:error504.php');
                                           }

                                  }
                              }
                           }
                           else{
                               if($_GET['v2']=='demographicChanging')
                               {
                                $phoneNumber=$_SESSION['phoneNumber'];
                                $gender=$_POST['gender'];
                                $dateOfBirth=$_POST['dateOfBirth'];
                                $digreeOrCertification=$_POST['digreeOrCertification'];
                                $sql="UPDATE userbasicdetails SET gender='$gender',dateOfBirth='$dateOfBirth',digreeOrCertification='$digreeOrCertification' WHERE phoneNumber='$phoneNumber'";
                                $result=mysqli_query($connect,$sql);
                                if($result)
                                {
                                    header('Location:../php/accountSetting.php');
                                }
                                else
                                {
                                    header('Location:error504.php');
                                }
                               }
                               else{
                                   //closing account 
                                   $phoneNumber=$_SESSION['phoneNumber'];
                                   $sql="DELETE from accounts where phoneNumber='$phoneNumber'";
                                   $result=mysqli_query($connect,$sql);
                                           if($result)
                                           {
                                                session_start();
                                                session_unset();
                                                session_destroy();
                                                $_SESSION['Loggedin']=false;
                                                header("Location:../");
                                               //deleted successfully
                                           }
                                           else{
                                                header('Location:error504.php');
                                           }

                               }
                           }
                       }
                    }
                }
                else{
                    header("Location:error504.php");
                    exit;
                }
          }
?>