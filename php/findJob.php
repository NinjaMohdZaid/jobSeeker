<?php 
                            session_start();
                            if(isset($_SESSION['Loggedin'])){ 
                            include '../partials/profileDetails.php';
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
    <link rel="stylesheet" href="../css/findJob.css">
    <title>Find Letest Jobs|Nearby You</title>
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
            <form action="findJob.php" method="get">
            <div id="middleArea1a"><img src="../icons/graySearchIcon.png" alt="image Not Loaded"><input type="search" name="SkillsDesignationCompanies" placeholder="Skills,Companies,Designations"></div>
            <div id="middleArea1b"><img src="../icons/grayLocationIcon.png" alt="image not Loaded"><input type="search" name="Location" placeholder="Enter Location"></div>
            <input type="hidden" name="search" value="true" >
            <button>Search</button>
            </form>
            <!--area for showing last 4 top search-->
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
        </div>
        <footer>
        <?php
             $page='userInterface';
             include '../partials/footer.php';
               ?>
        </footer>
</body>
</html>