<?php include('../partial/config.php'); 

session_start();
if(isset($_SESSION['Login'])){
    header('location:userInterface.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
  $phoneNumber=$_POST['phoneNumber'];
  $password=$_POST['password'];
  //SQL Query for Checking user available or Not
  $sql="SELECT * FROM `loginstj` WHERE phoneNumber='$phoneNumber'";
  $result=mysqli_query($connect, $sql);
  $num=mysqli_num_rows($result);

  if($num==1){
    $sql1="SELECT * FROM `loginstj` WHERE phoneNumber='$phoneNumber' AND password='$password'";
    $result1=mysqli_query($connect, $sql1);
    $num1=mysqli_num_rows($result1);

    if($num1==1){
      session_start();
      $_SESSION['phoneNumber']=$phoneNumber;
      $_SESSION['Login']=TRUE;
      header('location:userInterface.php');
      
    }
    else{
      $flag='Wrong Password';
    }
  }
  else{
    $flag='No Account exist';
  }
}

?>
<html>
<head>
<title>Login | Short Term Job</title>
<link rel="stylesheet" href="../css/login.css">
</head>
<body>
<?php include('navigationBar.php');  ?>
<div id="middleArea1">
    <h2>Login Panel</h2>
    </div>
<div id="middleArea2">
<h2>Login</h2>
<?php 
if(isset($flag)){
  echo '<h3 class="warning">'.$flag.'</h3>';
}
?>

<!-- Login Form Start Here -->
<form action="" method="POST" class="inp">
<label for="phoneNumber">Number</label>
<input type="text" name="phoneNumber" placeholder="Enter Phone Number"> <br><br>
<label for="Password">Password</label>
<input type="password" name="password" placeholder="Enter Password"> <br>
<br>
<input type="submit" name="submit" id="in" class="btn-primary" placeholder="Log In">
</form>
<a href="createAccount.php" class="aaa">Don't have Account? Create New One</a>

</div>
<?php include('footer.php') ?>
</body>
</html>


