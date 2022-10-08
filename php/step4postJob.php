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
    <link rel="stylesheet" href="../css/step4postJob.css">
    <title>Step 4 | Post Job</title>
</head>
<body>
<nav>
                            <?php
                               $page='companyInterface';
                               include '../partials/navigation.php';
                             ?>
                         </nav>
<!-- middleArea1 starts from here -->
<div id="middleArea1">
             <img src="../icons/job.jpg" alt="Image Not Loaded">
             <h2>Create A Vaccancy</h2>
             </div>
         <div id="middleArea2">
         <h2>Provide Job Timing Details</h2>
         <form action="../partials/postJob.php?value=4" method="post">
         <label for="jobTimeFrom">From</label>
         <input type="time" name="jobTimeFrom" required>
         <label for="jobTimeTo">To</label>
         <input type="time" name="jobTimeTo" required>
         <label for="workingDays">Working Days</label>
         <div id="middleArea2a">
         <div class="middleArea2a1">
         <input type="checkbox" name="monday" value="yes">
         <label for="Monday">Monday</label>
         </div>
         <div class="middleArea2a1">
         <input type="checkbox" name="tuesday" value="yes">
         <label for="tuesday">Tuesday</label>
         </div>
         <div class="middleArea2a1">
         <input type="checkbox" name="wednesday" value="yes">
         <label for="wednesday">Wednesday</label>
         </div>
         <div class="middleArea2a1">
         <input type="checkbox" name="thursday" value="yes">
         <label for="thursday">Thursday</label>
         </div>
         <div class="middleArea2a1">
         <input type="checkbox" name="friday" value="yes">
         <label for="friday">Friday</label>
         </div>
         <div class="middleArea2a1">
         <input type="checkbox" name="saturday" value="yes">
         <label for="saturday">Saturday</label>
         </div>
         </div>
         <label for="jobMode">Job Mode</label>
         <select name="jobMode" required>
             <option value="online">Online</option>
             <option value="offline">Offline</option>
         </select>
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