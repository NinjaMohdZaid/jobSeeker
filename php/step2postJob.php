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
    <link rel="stylesheet" href="../css/step2postJob.css">
    <title>Step 2 | Post Job</title>
</head>
<body>
                         <nav>
                            <?php
                               $page='companyInterface';
                               include '../partials/navigation.php';
                             ?>
                         </nav>
<div id="middleArea1">
    <img src="../icons/job.jpg" alt="Image Not Loaded">
    <h2>Create A Vaccancy</h2>
    </div>
                <!--middleArea2 starts from here-->
            <div id="middleArea2">
            <h2>Provide Location Of Job</h2>
            <form action="../partials/postJob.php?value=2" method="post">
            <label for="type">Country</label>
            <input type="text" list="country" name="country" required>
            <datalist id="country">
            <option value="India">
            <option value="China">
            <option value="Nepal">
            <option value="Bhutan">
            <option value="United State">
            <option value="Indonesia">
            <option value="Pakistan">
            <option value="Japan">
            <option value="Turkey">
            <option value="Singapore">
            <option value="Saudi Arabia">
            </datalist>
            <label for="state">State</label>
            <input type="text" name="state" required>
            <label for="city">City</label>
            <input type="text" name="city" required>
            <label for="pinCode">Pin Code</label>
            <input type="text" name="pinCode" required>
            <label for="nearbyPlace">Nearby Place</label>
            <input type="text" name="nearbyPlace" required>
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