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
    <link rel="stylesheet" href="../css/step3postJob.css">
    <title>Step 3 | Post Job</title>
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
           <h2>Provide Additional Interview Details</h2>
           <form action="../partials/postJob.php?value=3" method="post">
           <label for="interviewDate">Interview Date</label>
           <input type="date" name="interviewDate" required>
           <label for="interviewTime">Interview Time</label>
           <input type="time" name="interviewTime" required>
           <label for="interviewMode">Interview Mode</label>
           <select name="interviewMode" required>
               <option value="online">Online</option>
               <option value="offline">Offline</option>
           </select>
           <div id=middleArea2a>
               <a href="step4postJob.php">Skip</a>
               <button>Next</button>
               </form>
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