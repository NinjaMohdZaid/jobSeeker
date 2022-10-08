<?php 
include('../partial/config.php');
session_start();
if(!isset($_SESSION['Login'])){
    header('location:login.php');
}
else{
    $phoneNumber=$_SESSION['phoneNumber'];
}
include('navigationBar.php'); ?>
<link rel="stylesheet" href="../css/changePassword.css">
<title>Change Password | STJ</title>
<div id="middleArea1">
    <h2>Change Password</h2>
</div>
<div id="middleArea2">
<div class="wrapper">
<h1>Change Password</h1>
<br><br>
<?php
if(isset($_GET['phoneNumber']))
{
$phoneNumber=$_GET['phoneNumber'];
}
?>
<form action="" method="POST">
<label for="CurrentPassword">Enter Current Password</label>
<input type="password" name="current_password" placeholder="Current Password">
<label for="NewPassword">Enter New Password</label>
<input type="password" name="new_password" placeholder="New Password">
<label for="ConfirmPassword">Confirm Password</label>
<input type="password" name="confirm_password" placeholder="Confirm Password">
<input type="hidden" name="phoneNumber" value="<?php echo $phoneNumber; ?>" >
<input type="submit" name="submit" value="Change Password" class="a">
</form>
</div>
</div>
<?php
//Check whether the Submit Button is Clicked or Not
if(isset($_POST['submit']))
{
//echo "Clicked";
//1. Get the Data from form
$phoneNumber=$_POST['phoneNumber'];
$current_password=$_POST['current_password'];
$new_password=$_POST['new_password'];
$confirm_password=$_POST['confirm_password'];
//2. Check whether the user with current ID and Current Password Exists or not
$sql = "SELECT * FROM loginstj WHERE phoneNumber=$phoneNumber AND password='$current_password'";
// Execute the Query
$res = mysqli_query($conn, $sql);
if($res==true)
{
//Check Whether data is available or not
$count=mysqli_num_rows($res);
if($count==1)
{
//User Exists and Password Can be Changed
//echo "Password Match";
// Check whether data is available or not
if($new_password==$confirm_password)
{
//Update the Password
$sql2 = "UPDATE loginstj SET password='$new_password' WHERE phoneNumber=$phoneNumber";
//Execute the Query
$res2 = mysqli_query($conn, $sql2);
//Check whether the query executed or not
if($res2==true)
{
//Redirect to Manage Admin Page with Success Message
$_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully. </div>";
//Redirect the User
header('location:u.php');
}
else
{
//Display Error Message
//Redirect to Manage Admin Page with Error Message
$_SESSION['change-pwd'] = "<div class='error'>Failed to changed Password </div>";
//Redirect the User
header('location:changePassword.php');
}
}
else
{
//Redirect to Manage Admin Page with Error Message
$_SESSION['pwd-not-match'] = "<div class='error'>Password Did not Match. </div>";
//Redirect the User
header('location:changePassword.php');
}
}
else
{
//User Does not Exists Set Message and Redirect
$_SESSION['user-not-found'] = "<div class='error'>User Not Found. </div>";
//Redirect the User
header('location:changePassword.php');
}
}
}
?>
<?php include('footer.php'); ?>