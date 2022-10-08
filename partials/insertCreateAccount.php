<!--this page is to insert the data into the database od the jobseeker as a new user-->
<?php
//check that login or not
session_start();
if(isset($_SESSION['Loggedin']))
{
   header("Location: ../partials/afterLogin.php");
  exit;
}

require 'dbmsConnection.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
$name=$_POST['fullName'];
$phoneNumber=$_POST['phoneNumber'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['confirmPassword'];

// checking user is present or nbot
$sql="SELECT * FROM `accounts` WHERE phoneNumber='$phoneNumber' OR email='$email'";
$result=mysqli_query($connect,$sql);
$num=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
if($num==1)
    {
    header('Location:../php/signUpForUser.php?status=accountAlreadyExist');
    }
    else{
        if($password!=$cpassword)
      {
       header('Location:../php/signUpForUser.php?status=passwordNotMatch');
      }
      else{
            //account create
            $sql="INSERT INTO `accounts` (`fullName`, `phoneNumber`, `email`, `password`, `type`) VALUES ('$name','$phoneNumber','$email', '$password', '')";
             $result=mysqli_query($connect,$sql);
  if($result){
    echo "{$name},Your Account is created successfull | We are happy to join us.";
    $sql="SELECT * FROM `accounts` WHERE phoneNumber='$phoneNumber'";
    $result=mysqli_query($connect,$sql);
    $row=mysqli_fetch_assoc($result);
    session_start();
    $login=true;
    $_SESSION['Loggedin']=TRUE;
    $_SESSION['phoneNumber']=$phoneNumber;
    header('Location:../php/settingAtypeOfUserOrCompany.php?status=accountCreated');
echo 'record inser ka diya ';
}
else
{
    header('Location:error504.php');
}
      }
    }

}
else{
    echo 'method is not post';
}
?>