<?php
//condition for this page 
session_start();
// s means serial number of the job
if(isset($_SESSION['Loggedin'])){ 
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
    <link rel="stylesheet" href="../css/previewJob.css">
    <title>Details Of Job | And Apply For Job</title>
</head>
<body>
<nav>
                            <?php
                               $page='companyInterface';
                               include '../partials/navigation.php';
                             ?>
                         </nav>
<?php
if(isset($_GET['actionPerformed']))
{
   if(isset($_GET['updated'])){
         if($_GET['updated']=='yes')
          {
            $placeholder='Your job has been Edited ';
            include '../partials/successStatus.php';
          }
          else
          {
            $placeholder='Your job has not been Edited';
            include '../partials/successStatus.php';
          }
        }
        else
        {
            //container for saving a job
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
                    <!-- <p><img src="../icons/exp.png" class="img">   Experience(in numbers)</p> -->
                    <p><img src="../icons/wallet.png" class="img"> Salary : <?php echo $row['salary'];?></p>
                    <p><img src="../icons/location.png" class="img"> Location :<?php echo $row['nearbyPlace'].'<br>&nbsp&nbsp&nbsp&nbspCity-'.$row['city'].'<br>&nbsp&nbsp&nbsp&nbspState-'.$row['state'].'<br>&nbsp&nbsp&nbsp&nbspPin Code-'.$row['pinCode'].'<br>&nbsp&nbsp&nbsp&nbspCountry-'.$row['country']; ?></p> 
                </div>
                <div class="middleArea1aab">
                  <?php
                  echo '  <a href="../php/applicantsCheck.php?sno='.$row['sno'].'" class="btn">Watch Resume of Applicants</a>
                    <a href="editJob.php?s='.$row['sno'].'" class="btn">Edit This Job</a>';
                    ?>
                </div>
            </div>
            <br>
            <hr>
            <br>
            <p class="mA">Number Of Vaccancies : <?php echo $row['numberOfVaccancies']; ?></p>
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
    </div>
</div>
     <footer>
               <?php
            $page='companyInterface';
            include '../partials/footer.php';
           ?>
    </footer>
</body>
</html>