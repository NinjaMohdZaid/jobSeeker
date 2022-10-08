<?php
include('../partial/config.php'); 
// Process the value from Form and Save it in Database
// Check whether the submit button is clicked or not
if($_SERVER['REQUEST_METHOD']=='POST')
{
// 1. Get the Data from form
$full_name = $_POST['full_name'];
$phoneNumber = $_POST['phoneNumber'];
$password = $_POST['password']; // Password Encryption with MD5

$confirmPassword = $_POST['confirmPassword'];
if($password==$confirmPassword){
    $sql = "SELECT * FROM `loginstj` WHERE phoneNumber='$phoneNumber' ";
    $result = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($result);
    if($num==1){
        $flag = 'Phone Number already in use';
    }
    else{
        $sql = "INSERT INTO `loginstj`(`full_name`, `phoneNumber`, `password`) VALUES ('$full_name', '$phoneNumber', '$password')";
        $result = mysqli_query($connect, $sql);
        if($result){
            session_start();
            $_SESSION['Login']=TRUE;
            $_SESSION['phoneNumber']=$phoneNumber;
            header('location:userInterface.php');
        }
        else{
            $flag='Technical Error';

        }
    }
}
else{
    $flag='Password Not Match';
}
}
else{


}
?>


<title>Create Account | STJ</title>
<?php include('navigationBar.php'); ?>

<link rel="stylesheet" href="../css/createAccount.css">
<div id="middleArea1">
    <h2>Create Account Panel</h2>
    </div>
<div id="middleArea2">
<div class="wrapper">
<div class="login">
<h1 align="center">Create Account</h1>
<?php
if(isset($flag))
{
echo '<h3 class="warning">'.$flag.'</h3>';
}
?>
<form action="" method="POST" enctype="multipart/form-data" class="middleArea">
<label for="fullname">Full Name</label>
<input type="text" name="full_name" placeholder="Enter Your Name" required>
<label for="Number">Number</label>
<input type="text" name="phoneNumber" placeholder="Enter Your Number" required>
<label for="createPassword">Create Password</label>
<input type="text" name="password" placeholder="Create Password" required minlength="6">

<label for="confirmPassword">Confirm Password</label>
<input type="password" name="confirmPassword" placeholder="Confirm Password" required minlength="6">
<input type="submit" name="submit" class="login1" value="Add Account">
</form>
<br>
<a href="login.php" id="aaa">Log In</a>
</div>
</div>
</div>
<?php include('footer.php'); ?>
