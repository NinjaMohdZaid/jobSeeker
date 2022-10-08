<?php 
include('partial/config.php');
session_start();
if(isset($_SESSION['Login'])){
    $phoneNumber=$_SESSION['phoneNumber'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | STJ</title>
    <link rel="stylesheet" href="stj.css">
</head>
<body>
<div class="topnav">
  <a class="active" href="stj.php">STJ</a>
  <div class="topnav-right">
    <a href="stj.php">Home</a>  
    <?php 
    if(!isset($_SESSION['Login'])){
    echo '<a href="php/login.php">Sign In</a>';
    }
    else{
      echo '<a href="php/logout.php">Logout</a>';
    }
    ?>
    <a href="../">JobSeeker</a>
  </div>
</div>

    
    <h1 align="center">Short Term Job</h1>
    <hr>
    <?php 
        echo '<form method="GET" action="stj.php">

            <input type="textbox" placeholder="Search Category" id="search" name="value" required/>
            <input type="hidden" name="status" value="true">
            <button>Search</button>
        </form> ';
    ?>
    <hr>

    <div class="middleArea">

        <?php  

        require 'partial/config.php';

        if(isset($_GET['status'])){
            $value=$_GET['value'];
            $sql = "SELECT * FROM `category` WHERE `categoryName` LIKE '%$value%'";
            $result = mysqli_query($connect,$sql);
            $row=mysqli_fetch_assoc($result);
                echo '<style>#middleArea11{ background: url(img/categoryImages/'.$row['image'].');} </style><div class="middleArea1" id="middleArea11"><a href="php/stj2.php?categoryName='.$row['categoryName'].'">'.$row['categoryName'].'</a></div>';
            
        }
        else{

            $sql = "SELECT * FROM `category` ";

            $result = mysqli_query($connect,$sql);

            $i=1;

            while($row=mysqli_fetch_assoc($result)){
                echo '<style>#middleArea1'.$i.'{ background: url(img/categoryImages/'.$row['image'].');} </style><div class="middleArea1" id="middleArea1'.$i.'"><a href="php/stj2.php?categoryName='.$row['categoryName'].'">'.$row['categoryName'].'</a></div>';
                $i++;
            }

        }

        
        ?>
    </div>
    <hr>
<hr>
    <div id="middleArea5">
        <div id="middleArea5a">
            <img src="icons/stjIcon.jpg" alt="STJ">
        </div>
        <div id="middleArea5b">
            <div class="middleArea5b1"><h3 class="exploreJobseekerHeading">Services</h3><a href="../">JobSeeker</a><a href="stj.php">STJ</a></div>
            <div class="middleArea5b1"><h3 class="exploreJobseekerHeading">Community</h3><a href="../php/termsOfUse.php" target="_blank">Terms of Use</a></div>
        <div class="middleArea5b1"><h3 class="exploreJobseekerHeading">Meta</h3><?php 
    if(!isset($_SESSION['Login'])){
    echo '<a href="php/createAccount.php">Create Account</a>';
    }
    else{
      echo '<a href="php/form.php">Provide Service</a>';
    }
    ?><a href="php/admin_Stj.php">Admin Panel</a><?php 
    if(!isset($_SESSION['Login'])){
    echo '<a href="php/login.php">Sign In</a>';
    }
    else{
      echo '<a href="php/logout.php">Logout</a>';
    }
    ?></div>
        </div>
    </div>
    <hr>
    <div id="middleArea6">
          <a href="/" id="facebookIcon"><img src="icons/facebookIcon.png" alt="Icon Facebook"></a>
          <a href="/" id="instagramIcon"><img src="icons/instagramIcon.png" alt="Icon Instagram"></a>
          <a href="/" id="twitterIcon"><img src="icons/twitterIcon.png" alt="Icon Twitter"></a>
          <a href="/" id="youtubeIcon"><img src="icons/youtubeIcon.png" alt="Icon YouTube"></a>
    </div>
    <hr>
    <footer id="copyright">
        <p>Copyright © 2021-2030,Short Term Job, Inc. "Short Term Job" and logo are registered trademarks of Short Term Job, Inc</p>
    </footer>
</body>
</html>
</body>

</html>