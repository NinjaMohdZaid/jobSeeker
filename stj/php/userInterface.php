<?php 
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/userInterface.css">
</head>
<body>
<?php  include('navigationBar.php'); 

?>
<br><br>


<h1 align= "center">Your STJ Dashboard</h1>
<hr>

<div id="middleArea2">
            <div id="middleArea2a">
                
                <div id="middleArea2a1">
                    <!--this div is for profile of the user-->
                    <h2 align="center">About You</h2>
                    <div id="middleArea2a1a">
                      <div id="middleArea2a1a1">
                            <h2><?php echo $row['full_name']; ?></h2>
                            <a href="editProfile.php">Edit Profile</a>
                        </div> 
                    </div>
                </div>
            </div>
            <div id="middleArea2b">
                    <a href="form.php">Post A Service</a>
                 </div>
                 </div>

                 <?php  include('footer.php');  ?>
</body>
</html>