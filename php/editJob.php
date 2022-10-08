<?php
//condition for this page 
session_start();
$phoneNumber=$_SESSION['phoneNumber'];
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
    <link rel="stylesheet" href="../css/editJob.css">
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
        else
        {
            //container for saving a job
        }
    }

?>
<!-- middleArea1 starts from here -->
   <?php
     echo '<form method="POST" class="middleArea1" action="../partials/editJobInsert.php?s='.$sno.'">'
   ?>
    <div class="m">
        <div class="middleArea1a">
                <div id="titleAndImage">
                    <h1><input id="jobTitle" type="text" name="jobTitle" value="<?php echo $row['jobTitle']; ?>" ></h1>
                    <p><?php echo '<img src="https://source.unsplash.com/weekly?'.$row['typeOfJob'].'" alt="Image Not Loaded">'; ?></p>
                </div>
                <hr>
                <br><br>
            <div class="middleArea1aa">
                <div class="middleArea1aaa">
                    <!-- <p><img src="../icons/exp.png" class="img">   Experience(in numbers)</p> -->
                    <p><img src="../icons/wallet.png" class="img"> Salary : <input type="text" name="salary" value="<?php echo $row['salary'];?>"></p>
                    <p><img src="../icons/location.png" class="img"> Location : <?php echo '<input type="text" name="nearbyPlace" value="'.$row['nearbyPlace'].'"><br>&nbsp&nbsp&nbsp&nbspCity-<input type="text" name="city" value="'.$row['city'].'"><br>&nbsp&nbsp&nbsp&nbspState-<input type="text" name="state" value="'.$row['state'].'"><br>&nbsp&nbsp&nbsp&nbspPin Code-<input type="text"name="pinCode" value="'.$row['pinCode'].'"><br>&nbsp&nbsp&nbsp&nbspCountry-<input type="text" name="country" value="'.$row['country'].'">'; ?></p> 
                </div>
            </div>
            <br>
            <hr>
            <br>
            <p class="mA">Number Of Vaccancies : <input type="text" name="numberOfVaccancies" value="<?php echo $row['numberOfVaccancies']; ?>"></p>
        </div>
        <div class="m1">
            <br>
            <h2>Job Description</h2>
            <p><textarea name="jobDescription" id="" cols="150" rows="10"><?php echo $row['jobDescription']; ?></textarea></p>
            <br><br>
            <h4>Job Duties</h4>
            <br>
            <p><input type="text" name="typeOfJob" value="<?php echo $row['typeOfJob']; ?>"></p>
            <br><br>
            <div class="other-details">
                <div class="details"><label>Interview Mode And Date:</label><span>
                    <?php 
                    
                if($row['interviewMode']=='')
                {
                    echo 'No Interview';
                }
                else{ 
                    //condition to check online or offline is to show
                     if($row['interviewMode']=='online')
                     {
                          $otherMode='offline';
                     }
                     else{
                          $otherMode='online';
                     }
                    echo '<select name="interviewMode"><option value="'.$row['interviewMode'].'">'.$row['interviewMode'].'</option><option value="'.$otherMode.'">'.$otherMode.'</option></select> On Date:<input type="date" name="interviewDate" value="'.$row['interviewDate'].'"> Time: <input type="time" name="interviewTime" value="'.$row['interviewTime'].'"';
                }
                ?></span></div>
                <div class="details"><label>Work Mode:</label><span><?php 
                if($row['jobMode']=='online')
                {
                    $otherJobMode='offline';
                }
                else{
                    $otherJobMode='online';
                }
                 
                 echo '<select name="jobMode"><option value="'.$row['jobMode'].'">'.$row['jobMode'].'</option><option value="'.$otherJobMode.'">'.$otherJobMode.'</option></select>'; 
                 
                 ?></span></div>
                <div class="details"><label>Working Time:</label><span><?php echo 'From <input type="time" name="jobTimeFrom" value="'.$row['jobTimeFrom'].'"> To <input type="time" name="jobTimeTo" value="'.$row['jobTimeTo'].'"';  ?></span></div>
                <div class="details"><label>Working Days:</label><span>
                <?php
                   if($row['monday']=='yes')
                   {
                       echo '<input type="checkbox" name="monday" value="yes" checked>
                       <label for="monday">Monday</label>';
                   }
                   else
                   {
                      echo '<input type="checkbox" name="monday" value="yes">
                           <label for="monday">Monday</label>';
                   }
                   if($row['tuesday']=='yes')
                   {
                       echo '<input type="checkbox" name="tuesday" value="yes" checked>
                       <label for="monday">Tuesday</label>';
                   }
                   else{
                    echo '<input type="checkbox" name="tuesday" value="yes">
                    <label for="monday">Tuesday</label>';
                   }
                   if($row['wednesday']=='yes')
                   {
                       echo ' <input type="checkbox" name="wednesday" value="yes" checked>
                       <label for="monday">Wednesday</label>';
                   }
                   else
                   {
                    echo ' <input type="checkbox" name="wednesday" value="yes">
                    <label for="monday">Wednesday</label>';
                   }
                   if($row['thursday']=='yes')
                   {
                       echo ' <input type="checkbox" name="thursday" value="yes" checked>
                       <label for="monday">Thursday</label>';
                   }
                   else{
                    echo ' <input type="checkbox" name="thursday" value="yes">
                    <label for="monday">Wednesday</label>';
                   }
                   if($row['friday']=='yes')
                   {
                       echo ' <input type="checkbox" name="friday" value="yes" checked>
                       <label for="friday">Friday</label>';
                   }
                   else{
                    echo ' <input type="checkbox" name="friday" value="yes">
                    <label for="friday">Friday</label>';
                   }
                   if($row['saturday']=='yes')
                   {
                       echo '<input type="checkbox" name="saturday" value="yes" checked>
                       <label for="friday">Saturday</label>';
                   }

                   
                ?>
                </span></div>
            </div>
            <div class="education">
                <div class="heading">Minimum Education & Skills Required</div>
                <div class="details"><label>Details:</label><span><input type="text" name="minimumEducationAndSkillsRequired" value="<?php echo $row['minimumEducationAndSkillsRequired']; ?>"></span></div>
            </div>
        </div>
    </div>
    <input type="submit" value="Save Changes">
    </form>
    <footer>
               <?php
            $page='companyInterface';
            include '../partials/footer.php';
           ?>
    </footer>
</body>
</html>
