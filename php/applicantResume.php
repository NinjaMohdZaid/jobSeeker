<?php
//fetching data
//this page is for company
session_start();
  $phoneNumber=$_SESSION['phoneNumber'];
  if(isset($_SESSION['Loggedin'])){ 
    include '../partials/profileDetails.php';
    if($row['type']!='company')
    {
        header('Location:../partials/error504.php');
        exit;
    }
  }
  else
  {
        header('Location:../partials/error504.php');
  }
  //cheacking that user is applied for this or not
  $jobsno=$_GET['jobsno'];
  $userPhoneNumber=$_GET['userPhoneNumber'];
  $sql1="SELECT * FROM `usersappliedforjobs` WHERE `sno`='$jobsno' AND `phoneNumber`='$userPhoneNumber'";
  $result1=mysqli_query($connect,$sql1);
  $num1=mysqli_num_rows($result1);
  $row1=mysqli_fetch_assoc($result1);
  if($num1!=1)
  {
      //user not applied for this job
    header('Location:../partials/error505.php');
    exit;
  }
  else
  {
  //fetching resume details of user
  $sql2="SELECT * FROM `userbasicdetails`,`accounts` WHERE userbasicdetails.phoneNumber='$userPhoneNumber' AND accounts.phoneNumber='$userPhoneNumber'";
  $result2=mysqli_query($connect,$sql2);
  $num2=mysqli_num_rows($result2);
  $row2=mysqli_fetch_assoc($result2);
     if($num2!=1)
     {
         //if user of this phone Number not present in tha database accidently
        header('Location:../partials/error505.php');
        exit;
     }
     
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/applicantResume.css">
    <title>Resume | <?php echo $row2['fullName']; ?></title>
</head>
<body>
    <div id="middleArea1">
        <?php
        echo'
         <div id="middleArea1a">
             <div id="middleArea1a1">
              <img src="../img/userImages/'.$row2['userImage'].'" alt="not loaded">
              <h1>'.$row2['fullName'].'</h1>
             </div>
             <hr>
             <div id="middleArea1a6">
                <h2>Basic Details</h2>
                <p>Age:'.$row2['age'].'<br>City:'.$row2['city'].'</p>
             </div>
             
             <div id="middleArea1a2">
              <a href="tel:'.$row2['phoneNumber'].'"><img src="../icons/callUs.png" alt="">'.$row2['phoneNumber'].'</a>
              <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to='.$row2['email'].'" target="_blank"><img src="../icons/mailUs.png" alt="">'.$row2['email'].'</a>
             </div>
             <hr>
            <div id="middleArea1a3">
                <h2>Highest Qualification</h2>
                <p>'.$row2['digreeOrCertification'].'(Computer Science) with '.$row2['percentage'].'% Marks<br>From '.$row2['educationInstitute'].','.$row2['instituteLocation'].'</p>
            </div>
            <hr>
            <div id="middleArea1a4">
                <h2>About Experience</h2>
                <p>'.$row2['experienceYears'].' year Experience<br>From '.$row2['experiencePlace'].' </p>
            </div>
            <div id="middleArea1a5">
                <h2>Skills and Strenghts</h2>
                <p>Skills in '.$row2['skills'].' <br>And Have Strengths of '.$row2['strengths'].' </p>
            </div>

         </div>';
         ?>
    </div>
</body>
</html>