<?php
//check that login or not
session_start();
if(isset($_SESSION['Loggedin']))
{
   header("Location: ../partials/afterLogin.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signUpForUser.css">
    <title>Sign Up On JobSeeker</title>
</head>
<body>
                <nav>
                            <?php
                               $page='unlogin';
                               include '../partials/navigation.php';
                             ?>
                         </nav>
    <div id="middleArea1">
        <h3>Register on the JobSeeker To get your favourite Job Easly</h3>
    </div>
    <!--form for registering the new user-->
    <div id="middleArea2">
        <img src="../icons/newUserIcon.png" alt="User Icon">
        <h1>
            Create a new account 
        </h1>
        <!--Warning-->
        <h3 class="warning">
            <?php 
                  if(isset($_GET['status']))
                  {
                      if($_GET['status']=='passwordNotMatch')
                      {
                        echo 'Password Do Not Match Please Renter Again';
                      }
                      else{
                               echo 'Phone Number Or Email Already in Use Please Use another';
                      }
                  }
                 
        
        ?>
        </h3>
        <form action="../partials/insertCreateAccount.php" method="POST">
             <label for="fullName">Name</label>
             <input type="text" name="fullName" placeholder="Enter Your Full Name" required>
             <label for="phoneNumber">Phone Number</label>
             <input type="phone" name="phoneNumber" placeholder="Enter Your Phone Number(without country code)" required minlength="10" maxlength="10">
             <label for="email">Email</label>
             <input type="email" name="email" placeholder="Enter Your Email" required>
             <label for="password"> Create Password</label>
             <input type="text" name="password" placeholder="Create A Password" required  minlength="6">
             <label for="confirmPassword">Confirm Password</label>
             <input type="password" name="confirmPassword" placeholder="Confirm Password" required minlength="6">
             <button>Register</button>
        </form>
    </div>
    <!--footer starts from here-->
   <footer>
        <?php
            $page='unlogin';
            include '../partials/footer.php';
        ?>
   </footer>
</body>
</html>