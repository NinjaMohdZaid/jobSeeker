<!-- this page is for company in which company can watch the posted jobs -->
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
  $sql1="SELECT * FROM `jobs` WHERE phoneNumber='$phoneNumber' AND InRecycleBin=''";
  $result1=mysqli_query($connect,$sql1);
  $num1=mysqli_num_rows($result1);
  //material in recycle bin
  $sql2="SELECT * FROM `jobs` WHERE phoneNumber='$phoneNumber' AND InRecycleBin='yes'";
  $result2=mysqli_query($connect,$sql2);
  $num2=mysqli_num_rows($result2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/postedJobs.css">
    <title>Posted Jobs</title>
</head>
<body>
<?php
                //status for any action performed by company\
                if(isset($_GET['actionPerformed']))
                {
                   if(isset($_GET['deleted'])){
                         if($_GET['deleted']=='yes')
                          {
                             //show status is deleted
                             $placeholder='Job has been Deleted And Moved to Recycle Bin';
                             include '../partials/successStatus.php';
                          }
                         else
                          {
                            //show status not deleted
                            $placeholder='Job has not been Deleted';
                            include '../partials/successStatus.php';
                        }
                   }
                   else
                   {
                       if(isset($_GET['recycled']))
                       {
                             if($_GET['recycled']=='yes')
                             {
                                 //show status is recycled
                                 $placeholder='You can Check here Job has been Recycled';
                                 include '../partials/successStatus.php';
                             }
                             else{
                                 //show status not recycled
                                 $placeholder='Job has not been Recycled';
                                 include '../partials/successStatus.php';
                             }
                       }
                       else{
                            if($_GET['p_deleted']=='yes')
                                 {
                                 //show status is recycled
                               $placeholder='Job has been permanently Deleted';
                               include '../partials/successStatus.php';
                            }
                            else{
                                  //show status not recycled
                                 $placeholder='Job has not been deleted permanently';
                                 include '../partials/successStatus.php';
                        }

                       }
                   }
                }

          ?>
                        <nav>
                            <?php
                               $page='companyInterface';
                               include '../partials/navigation.php';
                             ?>
                         </nav>
          
    <div id="middleArea1">
        <div id="middleArea1a">
             <button onclick="showJobs()" id="jobs"><img src="../icons/jobs.png" alt="Imgae Not Loaded"> Posted Jobs</button>
             <button onclick="showRecycleBin()" id="recycleBin"><img src="../icons/recycle.png" alt="Imgae Not Loaded">Recycle Bin</button>
        </div>
           <script>
               // this script show any one of the following middleAreas from the following
               function showJobs()
               {
                   document.getElementById('middleArea1b').style.display="block";
                   document.getElementById('middleArea1c').style.display="none";
                   document.getElementById('jobs').style.background="#06f5df";
                   document.getElementById('recycleBin').style.background="#b5ffee";

               }
               function showRecycleBin(){
                   document.getElementById('middleArea1c').style.display="block";
                   document.getElementById('middleArea1b').style.display="none";
                   document.getElementById('recycleBin').style.background="#06f5df";
                   document.getElementById('jobs').style.background="#b5ffee";

               }
           </script>
        <div id="middleArea1b">
            
            <?php
            if($num1>0){
                // have posted jobs
              echo '<h2>Your Posted Jobs</h2>
              <p>You have Posted '.$num1.' Jobs</p><div id="middleArea1b1">';
              while($row1=mysqli_fetch_assoc($result1))
              {
                $sno=$row1['sno'];
                $sqlU="SELECT * FROM `usersappliedforjobs` WHERE sno='$sno'";
                $resultU=mysqli_query($connect,$sqlU);
                $numU=mysqli_num_rows($resultU);
              echo '
                  <div class="middleArea1b1a">
                  <img src="https://source.unsplash.com/weekly?'.$row1['typeOfJob'].'" alt="image Not Loaded">
                  <h3>'.$row1['jobTitle'].'</h3><p>'.mb_strimwidth($row1['jobDescription'], 0, 80, ".....").'</p>
                  <a href="applicantsCheck.php?sno='.$row1['sno'].'">'.$numU.' Peoples Applied For this ! Click And Check</a>
                  <div id="action">
                  <a href="../partials/moveJobInRecycleBin.php?sno='.$row1['sno'].'"><img src="../icons/delete.png" alt="delete"></a>
                  <a href="previewJob.php?s='.$row1['sno'].'"><img src="../icons/view.png" alt="View"></a>
                  <a href="editJob.php?s='.$row1['sno'].'"><img src="../icons/edit.png" alt="edit"></a>
                  </div>
                  </div>';
              }
            }
            else{
                //no job posted 
                echo 'No Job is posted';
            }
            echo '</div>';
              ?>
        </div>
        <div id="middleArea1c">

        <?php
            if($num2>0){
                
                // have deleted jobs
              echo '<h2>Your Deleted Jobs Stored Here</h2>
              <p>You have Deleted '.$num2.' Jobs</p><div id="middleArea1c1">';
              $break=1;
              while($row2=mysqli_fetch_assoc($result2))
              {
                $sno=$row2['sno'];
                $sqlU="SELECT * FROM `usersappliedforjobs` WHERE sno='$sno'";
                $resultU=mysqli_query($connect,$sqlU);
                $numU=mysqli_num_rows($resultU);
                  
              echo '
                  <div class="middleArea1c1a">
                  <img src="https://source.unsplash.com/weekly?'.$row2['typeOfJob'].'" alt="image Not Loaded">
                  <h3>'.$row2['jobTitle'].'</h3><p>'.mb_strimwidth($row2['jobDescription'], 0, 80, ".....").'</p>
                  <a href="applicantsCheck.php">'.$numU.' Peoples Applied For this ! Click And Check</a>
                  <div id="action">
                  <a href="../partials/deleteJobPermanently.php?sno='.$row2['sno'].'"><img src="../icons/delete.png" alt="delete"></a>
                  <a href="../partials/recycleJob.php?sno='.$row2['sno'].'"><img src="../icons/reuse.png" alt="reuse"></a>
                  </div>
                  </div>';
            }
            }
            else{
                //no job in recycle bin
                echo 'Empty Recycle Bin';
            }
            echo '</div>';
              ?>
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