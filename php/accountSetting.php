<?php
//checking user type or logged in or not and give profile details
       session_start();
       $phoneNumber=$_SESSION['phoneNumber'];
       if(isset($_SESSION['Loggedin'])){ 
        include '../partials/profileDetails.php';
        $sql1="SELECT * FROM `userbasicdetails` WHERE phoneNumber='$phoneNumber'";
        $result1=mysqli_query($connect,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        if($row['type']!='user')
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
    <link rel="stylesheet" href="../css/accountSetting.css">
    <title>Account Setting</title>
</head>
<body>
    <nav>
         <?php
            $page='userInterface';
            include '../partials/navigation.php';
          ?>
     </nav>
    
<div id="middleArea1">
    <h2>Find A Job at India's No.1 Job Site</h2>
            <form action="accountSetting.php" method="get">
            <div id="middleArea1a"><img src="../icons/graySearchIcon.png" alt="image Not Loaded"><input type="search" name="SkillsDesignationCompanies" placeholder="Skills,Companies,Designations"></div>
            <div id="middleArea1b"><img src="../icons/grayLocationIcon.png" alt="image not Loaded"><input type="search" name="Location"placeholder="Enter Location"></div>
            <input type="hidden" name="search" value="true" >
            <button>Search</button>
            </form>
            <!--area for last search-->
            <div id="middleArea1c">
            <?php
            include '../partials/resultPastSearchJobs.php';
            ?>
        </div>
        <div>
            <?php
               
                if (isset($_GET['search'])) {
                    include '../partials/jobSearchResult.php';
                    }
            ?>
        </div>
        <div id="middleArea1d">
            <div id="middleArea1d1"><img src="../icons/job.jpg" alt="Icon"> Jobs</div>
            <div id="middleArea1d2"><img src="../icons/companyBuilding.png" alt="Icon">Companies</div>
            <div id="middleArea1d3"><img src="../icons/salary.png" alt="Icon">Salaries</div>
        </div>
</div>
<div id="middleArea2">
    <div id="middleArea2b">
        <div id="middleArea2b1">
            <h1>Account</h1><br><hr><br>
            <h2>Change Email</h2>
            <form action="../partials/settingsOfUser.php?v1=Account&v2=emailChanging" method="POST">
             <!--v1 means in which and v2 means what to change eg if we want to change email then v1 is account and v2 is emailChanging-->
            <input type="text" name="email" value="<?php echo $row['email'] ?>">
            <button id="changeEmailbtn">Update</button>
            </form>


        </div><br>
        <div id="middleArea2b2">
            <h2>Passward Reset</h2><br>
            <form action="../partials/settingsOfUser.php?v1=Account&v2=passwordResetting" method="POST">
                <label>Current Password</label><br>
                <input type="password" class="passwordReset" name="c_Password"><br><br>
                <label>New Password</label><br>
                <input type="text"  class="passwordReset" name="newPassword"><br><br>
                <label >Confirm New Password</label><br>
                <input type="password"  class="passwordReset" name="confirmNewPassword"><br><br><hr><br><br>
                <button id="savePasswordSettingBtn">Save Change</button><br><br>
            </form><br><br>
        </div><br>
        <div id="middleArea2b3">
        <h2>Demographic</h2><br>
            <form action="../partials/settingsOfUser.php?v1=Account&v2=demographicChanging" method="POST">
                <label>Gender</label><br>
                <select name="gender" id="reset"> 
                <option value="<?php echo $row1['gender']; ?>"><?php echo $row1['gender']; ?></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Prefer_not_to_state">Prefer not to state</option>
                </select><br><br>
                <label>Birth Of Birth</label><br>
                <input type="date" id="resetbirth" value="<?php echo $row1['dateOfBirth']; ?>" name="dateOfBirth"><br><br>
                <label >Highest Education</label><br>
                <select name="digreeOrCertification" id="reset">
                <option value="<?php echo $row1['digreeOrCertification']; ?>"><?php echo $row1['digreeOrCertification']; ?></option>
                <option value="high_school">High School</option>
                <option value="junior_college">Diploma/Junior College</option>
                <option value="bachlor's">Bachlor's Degree</option>
                <option value="master">Master's Degree</option>
                <option value="mba">MBA</option>
                <option value="llb">LLB/LLM</option>
                <option value="MD">MD</option>
                <option value="PHD">PHD</option>
                </select><br><br><hr><br><br>
                <button id="savePasswordSettingBtn">Save Change</button><br><br>
            </form><br><br>  
        </div><br>
        <div id="middleArea2b4">
        <h2>Close Account</h2><br> 
        <form action="../partials/settingsOfUser.php?v1=Account&v2=accountClosing" method="POST">
        <button id="closeAccountBtn">Close Account</button><br><br>
        </form>
        </div><br>
    </div>
</div>
<footer>
     <?php
      $page='userInterface';
      include '../partials/footer.php';
     ?>
</footer>
</body>
</html>