<?php
//Controlling access
session_start();
if(isset($_SESSION['Loggedin'])){ 
    require '../partials/profileDetails.php';
     if($row['type']!='company')
       {
            header('Location:../partials/error504.php');
            
          }
    }

?>
<!--html starts from here after checking the type-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/step1postJob.css">
    <title>Step 1 | Post Job</title>
</head>
<body>
                       <nav>
                            <?php
                               $page='companyInterface';
                               include '../partials/navigation.php';
                             ?>
                         </nav>
<!-- middleArea1 starts from here  -->
<div id="middleArea1">
    <img src="../icons/job.jpg" alt="Image Not Loaded">
    <h2>Create A Vaccancy</h2>
    </div>
          <div id="middleArea2">
          <h2>Provide The Job Details</h2>
          <form action="../partials/postJob.php?value=1" method="post">
          <label for="typeOfJob">Type Of Job</label>
          <input type="text" list="jobs" name="typeOfJob" required>
          <datalist id="jobs">
          <option value="Web Developer">
          <option value="Software Developer">
          <option value="Programmer">
          <option value="Front End Developer">
          <option value="PHP Developer">
          <option value="Architect">
          </datalist>
          <label for="numberOfVaccancies">Number Of Vaccancies</label>
          <input type="text" name="numberOfVaccancies" required>
          <label for="jobTitle">Job Title</label>
          <input type="text" name="jobTitle" required>
          <label for="salary">Inhand Salary</label>
          <input type="text" name="salary" required>
          <label for="minimumEducationAndSkillsRequired">Minimum Education & Skills Required</label>
          <input type="text" name="minimumEducationAndSkillsRequired" required>
          <label for="jobDescription">Job Description</label>
          <textarea name="jobDescription" cols="30" rows="10" name="jobDescription" required></textarea>
          <button>Next</button>
          </form>
          </div>
 
          <footer>
               <?php
                 $page='companyInterface';
                 include '../partials/footer.php';
                ?>
          </footer>
</body>
</html>