<?php include('../partial/config.php'); 
include('../partial/config.php');
session_start();
if(!isset($_SESSION['Login'])){
    header('location:login.php');
}
else{
    $phoneNumber=$_SESSION['phoneNumber'];
}
$sql="SELECT * FROM `loginstj` WHERE phoneNumber='$phoneNumber'";
$result=mysqli_query($connect, $sql);
if($result){
    $row=mysqli_fetch_assoc($result);
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $full_name=$_POST['full_name'];
    $sql1="UPDATE `loginstj` SET full_name='$full_name' WHERE phoneNumber='$phoneNumber'";
    $result1=mysqli_query($connect, $sql1);
    if($result1){
        header('location:editProfile.php?success=1');
    }
    else{
        header('location:editProfile.php?success=0');
    }
}

?>

<link rel="stylesheet" href="../css/changePassword.css">
<title>Edit Profile | STJ</title>
<?php include('navigationBar.php'); 
if(isset($_GET['success'])){
    if($_GET['success']==1){
        $placeholder='Name Updated';
        include('../partial/successStatus.php');
    }
    else{
            $placeholder='Name Not Updated';
            include('../partial/successStatus.php');
    }
    
}
?>
<div id="middleArea1">
    <h2>Edit Profile</h2>
</div>
<div id="middleArea2">
<div class="wrapper">
<h1>Choose the Field which you have edit</h1>
<br><br>
<form action="editProfile.php" method="POST">
<input type="text" name="full_name" value="<?php echo $row['full_name']; ?>">
<button id="update">Update</button>
</form>
<br><br>
<a href="changePassword.php">Change Password</a>  
</div>
</div>




<?php include('footer.php'); ?>