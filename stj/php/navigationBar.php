<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navigationBar.css">
</head>
<body>
<div class="topnav">
  <a class="active" href="../stj.php">STJ</a>
  <div class="topnav-right">
    <a href="../stj.php">Home</a>  
    <?php 
    if(!isset($_SESSION['Login'])){
    echo '<a href="login.php">Sign In</a>';
    }
    else{
      echo '<a href="logout.php">Logout</a>';
    }
    ?>
    
    <a href="../../">JobSeeker</a>
  </div>
</div>
</body>
</html>