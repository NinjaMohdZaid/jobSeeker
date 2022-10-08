<?php
    session_start();
    $phoneNumber=$_SESSION['phoneNumber'];
    // echo $phoneNumber;
    require '../partials/dbmsConnection.php';
    if(isset($_SESSION['Loggedin'])){ 
        //if logged in check
        include '../partials/profileDetails.php';
        if($row!='user')
        {
           //checked user or not
           //i do all variable as like $sql1,$result1 becouse of not over written 
           $sql1="SELECT * FROM `userbasicdetails` WHERE phoneNumber='$phoneNumber'";
           $result1=mysqli_query($connect,$sql1);
           $num1=mysqli_num_rows($result1);
           $row1=mysqli_fetch_assoc($result1);
           if($num1!=0)
           {
             //check profile is complete or not without else
             //if $num1 !=0 mean profile is already updated
             header('Location:../partials/error504.php');
           }
           
        }   
        else{
            //throw to the error page if not type user
            header('Location:../partials/error504.php');
        }  
    }
    else
    {
        //if not logged in show login page
        header('Location:../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/UserStep1Finish.css">
    <title> Step1 | Finish Your Profile</title>
</head>
<body>
     <nav>
          <?php
             $page='userInterface';
             include '../partials/navigation.php';
           ?>
     </nav>
    <!--middleArea1 starts from here-->
    <div id="middleArea1">
    <h2>Find A Job at India's No.1 Job Site</h2>
            <form action="userInterface.php" method="get">
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
   <!-- middleArea2 starts from here-->
<div id="middleArea2">
    <div id="middleArea2a">
        <img src="../icons/accountLogo.png" alt="Image Not Loaded"  id="userIconImage">
    </div>
    <div id="middleArea2b">
        <h1>Hi! <?php echo $row['fullName'] ?>, Complete Your JobSeeker Profile!</h1>
        <p>Finishing your profile on JobSeeker helps us to better customise job 
            opportunities for you, share relevant company review and 
            salary information, and allows you to be discovered by employers.</p>
            <a href="userBasicDetails.php">Finish Your Profile</a>
            <p>Don’t worry, your reviews will always remain anonymous.</p>
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