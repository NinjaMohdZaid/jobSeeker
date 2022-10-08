<?php
//condition for this page 
session_start();
// s means serial number of the job
if(isset($_SESSION['Loggedin'])){ 
        require '../partials/profileDetails.php';
        if($row['type']!='user')
        {
            header('Location:../partials/error504.php');
        }
         if($_GET['s'])
         {
             $sno=$_GET['s'];
             require '../partials/dbmsConnection.php';
           $sql="SELECT * FROM `jobs` WHERE sno='$sno'";
           $result=mysqli_query($connect,$sql);
           $num = mysqli_num_rows($result);
           if($result)
           {
               if(($num>1) OR ($num==0))
               {
                   //this means a error
                   header('Location:../partials/error504.php');
               }
               else{
                   //this means all conditions are stisfied
                   $row=mysqli_fetch_assoc($result);
                   $p=$row['phoneNumber'];
                   //fetching data from other table
                   $sql1="SELECT * FROM `companybasicdetails` WHERE `phoneNumber`='$p'";
                   $result1=mysqli_query($connect,$sql1);
                   $row1=mysqli_fetch_assoc($result1);

               }
           }
           else{
               header('Location:../partials/error504.php');
           }

         }
         else{
             header('Location:../partials/error504.php');
         }
    }
        else
        {
         //condition if not logged in
         header('Location:../');

        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/viewDetailsAndApplyForJob.css">
    <title>Details Of Job | And Apply For Job</title>
</head>
<body>
<!--navigation starts from here-->
<nav>
     <?php
        $page='userInterface';
        include '../partials/navigation.php';
      ?>
     </nav>

<?php
if(isset($_GET['actionPerformed']))
{
   if(isset($_GET['applied'])){
         if($_GET['applied']=='yes')
          {
            $placeholder='Your Application for this job has been submitted';
            include '../partials/successStatus.php';
          }
          else
          {
            $placeholder='Your Application for this job has Not been submitted';
            include '../partials/successStatus.php';
          }
        }
        if(isset($_GET['appliedCancel'])){
            if($_GET['appliedCancel']=='yes')
             {
               $placeholder='Your Application for this job has been Cancelled';
               include '../partials/successStatus.php';
             }
             else
             {
               $placeholder='Your Application for this job has Not been Cancelled';
               include '../partials/successStatus.php';
             }
           }
        
    }

?>
<!-- middleArea1 starts from here -->
<div class="middleArea1">
    <div class="m">
        <div class="middleArea1a">
                <div id="titleAndImage">
                    <h1><?php echo $row['jobTitle']; ?></h1>
                    <p><?php echo '<img src="https://source.unsplash.com/weekly?'.$row['typeOfJob'].'" alt="Image Not Loaded">'; ?></p>
                </div>
                <hr>
                <br><br>
            <div class="middleArea1aa">
                <div class="middleArea1aaa">
                    <p><img src="../icons/exp.png" class="img">   Experience(in yaers)</p>
                    <p><img src="../icons/wallet.png" class="img"> Salary : <?php echo $row['salary'];?></p>
                    <p><img src="../icons/location.png" class="img"> Location :<?php echo $row['nearbyPlace'].'<br>&nbsp&nbsp&nbsp&nbspCity-'.$row['city'].'<br>&nbsp&nbsp&nbsp&nbspState-'.$row['state'].'<br>&nbsp&nbsp&nbsp&nbspPin Code-'.$row['pinCode'].'<br>&nbsp&nbsp&nbsp&nbspCountry-'.$row['country']; ?></p> 
                </div>
                <div class="middleArea1aab">
                  <?php
                    //check saved or unsaved C means save or unsaved query
                    $snoC=$row['sno'];
                    $sqlC="SELECT * FROM `usersavedjob` WHERE phoneNumber='$phoneNumber' AND sno='$snoC'";
                    $resultC=mysqli_query($connect,$sqlC);
                    $numC=mysqli_num_rows($resultC);
                    if($numC!=1)
                    {
                        //$c for showing which heart mark has to show with link
                       $c='<a href="../partials/saveJob.php?sno='.$row['sno'].'" class="btn">Save this Job</a>';
                    }
                    else{
                         $c='<a href="../partials/unsaveJob.php?sno&sno='.$row['sno'].'" class="btn">Unsave this Job</a>';
                    }
                    //check job is applied or not
                    $snoD=$row['sno'];
                    $sqlD="SELECT * FROM `usersappliedforjobs` WHERE phoneNumber='$phoneNumber' AND sno='$snoD'";
                    $resultD=mysqli_query($connect,$sqlD);
                    $numD=mysqli_num_rows($resultD);
                    if($numD!=1)
                    {
                        //$c for showing which heart mark has to show with link
                       $d='<a href="../partials/applyForJob.php?sno='.$row['sno'].'" class="btn">Apply for this job</a>';
                    }
                    else{
                         $d='<a href="../partials/cancelApply.php?sno='.$row['sno'].'" class="btn">Cancel Your Application</a>';
                    }
                    echo $d.$c;
                    ?>
                </div>
            </div>
            <br>
            <hr>
            <br>
            <p class="mA">Number Of Vaccancies : <?php echo $row['numberOfVaccancies']; ?><a href="#" class="a"></a></p>
        </div>
        <div class="m1">
            <br>
            <h2>Job Description</h2>
            <p><?php echo $row['jobDescription']; ?></p>
            <br><br>
            <h4>Job Duties</h4>
            <br>
            <p><?php echo $row['typeOfJob']; ?></p>
            <br><br>
            <div class="other-details">
                <div class="details"><label>Interview Mode And Date:</label><span><?php 
                if($row['interviewMode']=='')
                {
                    echo 'No Interview';
                }
                else{
                    echo $row['interviewMode'].' On Date:'.$row['interviewDate'].' Time:'.$row['interviewTime'];
                }
                ?></span></div>
                <div class="details"><label>Work Mode:</label><span><?php echo $row['jobMode'];  ?></span></div>
                <div class="details"><label>Working Time:</label><span><?php echo 'From '.$row['jobTimeFrom'].' To '.$row['jobTimeTo'];  ?></span></div>
                <div class="details"><label>Working Days:</label><span>
                <?php
                   if($row['monday']=='yes')
                   {
                       echo 'Monday |';
                   }
                   if($row['tuesday']=='yes')
                   {
                       echo ' Tuesday |';
                   }
                   if($row['wednesday']=='yes')
                   {
                       echo ' Wednesday |';
                   }
                   if($row['thursday']=='yes')
                   {
                       echo ' Thursday |';
                   }
                   if($row['friday']=='yes')
                   {
                       echo ' Friday |';
                   }
                   if($row['saturday']=='yes')
                   {
                       echo ' Saturday |';
                   }

                   
                ?>
                </span></div>
            </div>
            <div class="education">
                <div class="heading">Minimum Education & Skills Required</div>
                <div class="details"><label>Details:</label><span><?php echo $row['minimumEducationAndSkillsRequired']; ?></span></div>
            </div>
        </div>
        <div class="m2" id="about">
           <?php
            echo'<h1>About Company</h1>
            <p>'.$row1['aboutCompany'].'</p>
            <br><br>
            <h3>Company Info</h3><div class="details"><label>Website</label><span><a href="'.$row1['website'].'" target="_blank" >'.$row1['website'].'</a></span></div><div class="details"><label>Main Headquarter</label><span>'.$row1['headquarterAddress'].'</span></div>';
            ?>
             <div id="rating">
                 <?php
                    $sqlE="SELECT * FROM `ratings` WHERE sno='$sno' AND phoneNumber='$phoneNumber'";
                    $resultE=mysqli_query($connect,$sqlE);
                    $numE=mysqli_num_rows($resultE);
                    if($numE==1)
                    {
                         //means already rated
                         $showFlag=1;
                    }
                    else{
                               //not rated
                               $showFlag=0;
                    }
                    if($showFlag==0)
                    {
                     if($_SERVER['REQUEST_METHOD']=='POST'){
                          //script for submitting feedback rate
                          $rate=$_POST['rate'];
                          $sqlR="INSERT INTO `ratings`(`sno`, `phoneNumber`, `rate`) VALUES ('$sno','$phoneNumber','$rate')";
                          $resultR=mysqli_query($connect,$sqlR);
                          if($resultR)
                          {
                                $feedback=1;
                          }
                          else{
                                $feedback=0;
                          }
                     }
                     else{
                        echo '<span>How much you like this job | Rate This Job</span>
                        <form action="viewDetailsAndApplyForJob.php?s='.$sno.'#about" method="POST">
                            <input type="radio" name="rate" value="1">
                            <label for="1">1</label>
                            <input type="radio" name="rate" value="2">
                            <label for="2">2</label>
                            <input type="radio" name="rate" value="3">
                            <label for="3">3</label>
                            <input type="radio" name="rate" value="4">
                            <label for="4">4</label>
                            <input type="radio" name="rate" value="5">
                            <label for="5">5</label>
                            <br>
                            <button>Submit Feedback</button>
                        </form>';
                     }
                    }
                    if(isset($feedback)){
                        if($feedback==1)
                        {
                            echo '<span>Thanks for your response </span>';
                        }
                    }
                   ?>
                 
              </div>
        </div>
    </div>
</div>
<br>
<br>
<footer>
    <?php
        $page='userInterface';
        include '../partials/footer.php';
        ?>
</footer>
</body>
</html>