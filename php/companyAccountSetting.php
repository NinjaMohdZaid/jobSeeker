     <?php 
        session_start();
        $phoneNumber=$_SESSION['phoneNumber'];
         if(isset($_SESSION['Loggedin'])){ 
               include '../partials/profileDetails.php';
                      if($row['type']!='company')
                      {
                          header('Location:../partials/error504.php');
                          exit;
                      }
                   }
              else
                  {
                          header("Location: ../");
                          exit;
                  }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/companyAccountSetting.css">
    <title>Account Settings</title>
</head>
<body>
    <!--navigation starts from here-->
     <nav>
         <?php
            $page='companyInterface';
            include '../partials/navigation.php';
          ?>
      </nav>
      <!-- area1 starts from here -->
      <div id="middleArea1">
           <div id="middleArea1b">
        <div id="middleArea1b1">
            <h1>Account</h1><br><hr><br>
            <h2>Change Email</h2>
            <form action="../partials/settingsOfCompany.php?v1=Account&v2=emailChanging" method="POST">
             <!--v1 means in which and v2 means what to change eg if we want to change email then v1 is account and v2 is emailChanging-->
            <input type="text" name="email" value="<?php echo $row['email'] ?>">
            <button id="changeEmailbtn">Update</button>
            </form>
        </div><br>
        <div id="middleArea1b2">
            <h2>Passward Reset</h2><br>
            <form action="../partials/settingsOfCompany.php?v1=Account&v2=passwordResetting" method="POST">
                <label>Current Password</label><br>
                <input type="password" class="passwordReset" name="c_Password"><br><br>
                <label>New Password</label><br>
                <input type="text"  class="passwordReset" name="newPassword"><br><br>
                <label >Confirm New Password</label><br>
                <input type="password"  class="passwordReset" name="confirmNewPassword"><br><br><hr><br><br>
                <button id="savePasswordSettingBtn">Save Change</button><br><br>
            </form><br><br>
        </div><br>
        <div id="middleArea1b3">
        <h2>Close Account</h2><br> 
        <form action="../partials/settingsOfCompany.php?v1=Account&v2=accountClosing" method="POST">
        <button id="closeAccountBtn">Close Account</button><br><br>
        </form>
        </div><br>
    </div>
</div>
      <!-- footer starts from here -->
    <footer>
          <?php
             $page='companyInterface';
             include '../partials/footer.php';
          ?>
    </footer>
</body>
</html>