<?php
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

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../css/applicantsCheck.css">
  </head>
  <body>
  <nav>
                            <?php
                               $page='companyInterface';
                               include '../partials/navigation.php';
                             ?>
                         </nav>
    <!-- middleArea1 starts from here-->
    <div id="middleArea1">

        <div id="middleArea1a">
            <img src="../icons/resumeC.png" alt="Image Not Loaded">
            <h2>Applied By The Following Candidates</h2>
        </div>
       <div id="middleArea1b">
           
           <div id="middleArea1b1">
           
            <!--Data fetching-->
            <?php
             //fetching applicants data 
             $sno=$_GET['sno'];
             $sql="SELECT * FROM `usersappliedforjobs` WHERE sno='$sno'";
             $result=mysqli_query($connect,$sql);
             $num=mysqli_num_rows($result);
             if($num>0){
                 //fetching candidate details
             echo '<h4>'.$num.' Candidates applied for this check </h4>
                <table>';
                 while($row=mysqli_fetch_assoc($result))
                 {
                    $temp=$row['phoneNumber'];//fetch user phone Number
                    $sql1="SELECT * FROM `userbasicdetails`,`accounts` WHERE userbasicdetails.phoneNumber='$temp' AND accounts.phoneNumber='$temp'";
                    $result1=mysqli_query($connect,$sql1);
                    $row1=mysqli_fetch_assoc($result1);
                    echo ' <tr>
                         <td><img id="candidateImage" src="../img/userImages/'.$row1['userImage'].'" alt="Image Not Loaded"></td>
                         <td>'.$row1['fullName'].'</td>
                         <td>'.$row1['email'].'</td>
                         <td>'.$row['phoneNumber'].'</td>
                         <td>'.$row1['digreeOrCertification'].'</td>
                         <td><a href="applicantResume.php?userPhoneNumber='.$row1['phoneNumber'].'&jobsno='.$sno.'" target="_blank"> Click Watch Resume</a></td>
                     </tr>';
                 }
              echo '</table>';
             }
             else{
                 echo '<h4>No Candidate Applied For This Job</h4><img src="../icons/noResult.png" id="noResultImage" alt="Image Not Loaded" id="noResultImage">';
             }
                 


                 
                 ?>
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