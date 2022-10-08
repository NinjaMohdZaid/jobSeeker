<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/CompanyInterface.css">
	<title>Login by | <?php session_start(); echo $_SESSION['phoneNumber']; ?></title>
</head>
<body>
<?php
               
                if (isset($_GET['postJobStatus'])) {
                    if($_GET['postJobStatus']=='yes')
                    {
                       $placeholder='Your Job has been posted';
                       include '../partials/successStatus.php';
                    }
                    else{
                        $placeholder='Your Job has not been posted';
                        include '../partials/successStatus.php';
                    }
                }
                if(isset($_GET['profileStatus']))
                {
                    if($_GET['profileStatus']=='yes')
                    {
                       $placeholder='Your Profile has been Completed ';
                       include '../partials/successStatus.php';
                    }
                    else
                    {
                        $placeholder='Your Profile has not been Completed ';
                        include '../partials/successStatus.php';
                    }
                }
            ?>
                    <nav>
                            <?php
                               $page='companyInterface';
                               include '../partials/navigation.php';
                             ?>
                         </nav>
                            <?php
                                 require '../partials/dbmsConnection.php';
                                 $phoneNumber=$_SESSION['phoneNumber'];
                                 $sql="SELECT * FROM `companybasicdetails` WHERE `phoneNumber`='$phoneNumber'";
                                 $result=mysqli_query($connect,$sql);
                                 $num=mysqli_num_rows($result);
                                 if($num==1){
                                     //it means profile is complete
                                  $row1=mysqli_fetch_assoc($result);
                                  //choose row1 becouse to avoid the overwriting
                                  $flag=1;
                                 }
                                 else{
                                     //it means uncomplete profile
                                    $flag=0;
                                 }
                            ?>
    <div id="middleArea1">
            <div id="middleArea1a">
                <h1>Your JobSeeker Dashboard</h1>
                <div id="middleArea1a1">
                    <!--this div is for profile of the user-->
                    <div id="middleArea1a1a">
                        <?php
                        if($flag==1)
                           {
                           echo '<img src="../img/companyImages/'.$row1['logoCompany'].'" alt="This is image of user">'; 
                           }
                           else
                           {
                           echo '<img src="../icons/companyLogo.png" alt="This is image of user">';  
                           }
                        ?>
                        <div id="middleArea1a1a1">
                        <h2>
                        <?php 
                            if(isset($_SESSION['Loggedin'])){ 
                            include '../partials/profileDetails.php';
                            if($row['type']!='company')
                            {
                                header('Location:../partials/error504.php');
                                exit;
                            }
                            echo $row['fullName'];
                            }
                            else
                            {
                                header("Location: ../");
                                exit;
                            }
                            ?>
                        </h2>
                            <?php
                                 
                                 if($flag==1){
                                     //flag=1 it means profile is complete
                                  echo'<a href="companyProfile.php">Profile</a>';
                                 }
                                 else{
                                     //flag=0 means profile is incomplete
                                    echo'<a href="companyDetails.php">InComplete</a>';
                                 }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="middleArea1b">
                <p id="middleArea1b1">Let’s make your next great hire. Fast.</p>
                <a href="step1postJob.php">Post Jobs</a>
            </div>
    </div>
    <hr>
    <div id="middleArea3">
        <h3 class="alertClass">NEW!</h3>
        <p>Tools to help you Navigate COVID-19 and find jobs you love</p>
        <a href="covid.php" target="_blank">View Covid-19 Resources</a>
    </div>
    <hr>
    <?php
        require '../partials/dbmsConnection.php';
        $sql1="SELECT * FROM `jobs` WHERE phoneNumber='$phoneNumber' AND InRecycleBin=''";
        $result1=mysqli_query($connect,$sql1);
        $num1=mysqli_num_rows($result1);
        
        ?>
        <div id="middleArea4">
            <?php
        if($num1>0)
        {   
            echo '<h2>Posted Jobs</h2><div id="middleArea4a">';
            while($row1=mysqli_fetch_assoc($result1))
            {   
                $sno=$row1['sno'];
                $sqlU="SELECT * FROM `usersappliedforjobs` WHERE sno='$sno'";
                $resultU=mysqli_query($connect,$sqlU);
                $numU=mysqli_num_rows($resultU);
        echo '<div class="middleArea4a1">
        <img src="https://source.unsplash.com/weekly?'.$row1['typeOfJob'].'" alt="image Not Loaded">
        <h3>'.$row1['jobTitle'].'</h3><p>'.mb_strimwidth($row1['jobDescription'], 0, 80, ".....").'</p>
        <a href="applicantsCheck.php?sno='.$row1['sno'].'">'.$numU.' Peoples Applied For this ! Click And Check</a>
        <div id="action">
        <a href="../partials/moveJobInRecycleBin.php?sno='.$row1['sno'].'"><img src="../icons/delete.png" alt="delete"></a>
        <a href="previewJob.php?s='.$row1['sno'].'"><img src="../icons/view.png" alt="View"></a>
        <a href="editJob.php?s='.$row1['sno'].'"><img src="../icons/edit.png" alt="edit"></a>
        </div>
        </div>';
            }
        }
        ?>
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