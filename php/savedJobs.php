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
       //script for unsave a job
     if(isset($_GET['sno']))
     {   $sno=$_GET['sno'];
         $sqlD="DELETE FROM `usersavedjob` WHERE sno='$sno' AND phoneNumber='$phoneNumber'";
         $resultD=mysqli_query($connect,$sqlD);
         header('Location:savedJobs.php#middleArea1');
     }
    
    
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/savedJobs.css">
     <title>Saved Jobs</title>
 </head>
 <body>
     <nav>
         <?php
            $page='userInterface';
            include '../partials/navigation.php';
          ?>
     </nav>    
<!-- middleArea1 starts from here -->
    <?php
       $sql="SELECT * FROM `usersavedjob`,`jobs` WHERE usersavedjob.sno=jobs.sno AND usersavedjob.phoneNumber='$phoneNumber'";
       $result=mysqli_query($connect,$sql);
       $num=mysqli_num_rows($result);
       if($num>0)
       {
            echo '<h2>Saved Jobs</h2><div id="middleArea1">';
            while($row=mysqli_fetch_assoc($result))
            {
                echo '<div class="jobs"><img src="https://source.unsplash.com/weekly?'.$row['typeOfJob'].'" alt="image Not Loaded"><h3>'.$row['jobTitle'].'</h3><p>'.mb_strimwidth($row['jobDescription'], 0, 80, ".....").'</p><div id="action"><a href="savedJobs.php?sno='.$row['sno'].'"><img src="../icons/favourite.png"></a><a href="../php/viewDetailsAndApplyForJob.php?s='.$row['sno'].'"><img src="../icons/view.png"></a></div></div>';
            }
            echo '</div>';
       }
       else{
           echo '<h2>No Saved Job</h2>';
       }
     
    
    ?>

</div>



     <footer>
           <?php
              $page='userInterface';
              include '../partials/footer.php';
           ?>
    </footer>

 </body>
 </html>