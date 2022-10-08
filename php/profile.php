<?php
   session_start();
   include '../partials/profileDetails.php';
    if(isset($_SESSION['Loggedin'])){ 
        if($row['type']!='user')
            {
                header('Location:../partials/error504.php');
                exit;
            }
        // fetching profile details like image or name etc 
        $sql1="SELECT * FROM `userbasicdetails` WHERE phoneNumber='$phoneNumber'";
        $result1=mysqli_query($connect,$sql1);
        $num1=mysqli_num_rows($result1);
        $row1=mysqli_fetch_assoc($result1);
        //$num1=0 meaans no profile complete then
        if($num1==0)
        {
           header('Location:../partials/error504.php');
        }
    }
    else
    {
        header('Location:../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <title>User Profile</title>
</head>
<body>
    <?php
    if(isset($_GET['status']))
    {
        if(isset($_GET['changeImage']))
        {
            if($_GET['changeImage']=='yes')
            {
                 $placeholder='Image Has been Changed';
                 include '../partials/successStatus.php';
            }
            else{
                   $placeholder='Image has not beet changed';
                   include '../partials/successStatus.php';
            }
        }
        if(isset($_GET['changeDataStatus']))
        {
            if($_GET['changeDataStatus']=='yes')
            {
                  $placeholder='Data Updated ';
                  include '../partials/successStatus.php';
            }
            else{
                $placeholder='Data Has not Been Updated';
                include '../partials/successStatus.php';
            }
        }
    }


?>
    <nav>
        <?php
           $page='userInterface';
           include '../partials/navigation.php';
         ?>
     </nav>
     <div id="middleArea1">

         <div id="middleArea1b">
                <h1>Profile</h1>
                <div id="middleArea1b1">
                    <?php
                        echo '<img src="../img/userImages/'.$row1['userImage'].'" alt="Image Not Loaded">';
                    ?>
                    <form action="../partials/changeUserProfileDetails.php?value=1&ph=<?php echo $phoneNumber; ?>" method="POST" id="changeImage" enctype="multipart/form-data">
                        <input type="file" name="userImage" required>
                        <button>Update</button>
                    </form>
                    <button id="changeProfilePic" onclick="show()">Change</button>
                    <script>
                        function show()
                        {
                            document.getElementById('changeImage').style.display='inline';
                            document.getElementById('changeProfilePic').style.display='none';
                        }
                    </script>
                </div>
                <div id="middleArea1b2">
                      <form action="../partials/changeUserProfileDetails.php?value=4&ph=<?php echo $phoneNumber; ?>" method="POST" id="changeName">
                        <input type="text" name="fullName" value="<?php echo $row['fullName']; ?>" readOnly="True" id="i1" required>
                        <button id="btnName">Update</button>
                    </form>
                    <button id="changeProfileName" onclick="show1()"><img src="../icons/pencilSign.png" class="pencilEdit"></button>
                    <script>
                        function show1()
                        {
                            document.getElementById('btnName').style.display='inline';
                            //changing form read only to writable
                            document.getElementById('changeProfileName').style.display='none';
                            document.getElementById('i1').readOnly=false;
                             document.getElementById('i1').style.background='#0ad2e6fa';
                            document.getElementById('i1').style.border='2px solid #24ead8';
                        }
                    </script>
                </div>
                <hr>
                <div id="middleArea1b3">
                        <form action="../partials/changeUserProfileDetails.php?value=2&ph=<?php echo $phoneNumber; ?>" method="post" id="changeOther1">
                              <div>
                              <label for="age">Age:</label>
                              <input id="middleArea1b3a" type="text" name="age" value="<?php echo $row1['age']; ?>" readOnly="True" required>
                              </div>
                              <div>
                              <label for="city">City:</label>
                              <input id="middleArea1b3b" type="text" name="city" value="<?php echo $row1['city']; ?>" readOnly="True" required>
                              </div>
                              <div>
                              <label for="educationInstitute">Educated From:</label>
                              <input id="middleArea1b3c" type="text" name="educationInstitute" value="<?php echo $row1['educationInstitute']; ?>" readOnly="True" required>
                              </div>
                              <div>
                              <label for="digreeOrCertification">Ceriticate Or Degree Of:</label>
                              <input id="middleArea1b3d" type="text" name="digreeOrCertification" value="<?php echo $row1['digreeOrCertification']; ?>" readOnly="True" required>
                              </div>
                              <div>
                              <label for="fieldOfStudy">Educated In The Field Of:</label>
                              <input id="middleArea1b3e" type="text" name="fieldOfStudy" value="<?php echo $row1['fieldOfStudy']; ?>" readOnly="True" required>
                              </div>
                              <div>
                              <label for="instituteLocation">Location Of Institute Is:</label>
                              <input id="middleArea1b3f" type="text" name="instituteLocation" value="<?php echo $row1['instituteLocation']; ?>" readOnly="True" required>
                              </div>
                              <div>
                              <label for="percentage">Percentage Gain In Last Certificate/Digree:</label>
                              <input id="middleArea1b3g" type="text" name="percentage" value="<?php echo $row1['percentage']; ?>" readOnly="True" required>
                              </div>
                              <div>
                              <label for="passingYear">Year Of Passing:</label>
                              <input id="middleArea1b3h" type="text" name="passingYear" value="<?php echo $row1['passingYear']; ?>" readOnly="True" required>
                              </div>
                              <button id='btnName1'>Update</button>
                        </form>
                        <button id="changeOtherBtn1" onclick="show2()"><img src="../icons/pencilSign.png" class="pencilEdit"></button>
                        <script>
                        //array for selecting ids becouse ath this time class selector is not work well
                           const ids = ["middleArea1b3a", "middleArea1b3b", "middleArea1b3c","middleArea1b3d","middleArea1b3e","middleArea1b3f","middleArea1b3g","middleArea1b3h","middleArea1b3i"];  
                           function show2()
                            {
                            document.getElementById('btnName1').style.display='inline';
                            //changing form read only to writable
                            document.getElementById('changeOtherBtn1').style.display='none';
                            for(var i=0;i<ids.length;i++){
                                //i choose a variable a for storing ids and use in the next lines
                                a=ids[i];
                                document.getElementById(a).readOnly=false;
                                document.getElementById(a).style.background='#0ad2e6fa';
                                document.getElementById(a).style.border='2px solid #24ead8';
                            }
                        }
                    </script>
                </div>
                <hr>
                <div id="middleArea1b4">
                     <form action="../partials/changeUserProfileDetails.php?value=3&ph=<?php echo $phoneNumber; ?>" method="POST">
                             <div>
                              <label for="experiencePlace">Experienced From:</label>
                              <input id="middleArea1b4a" type="text" name="experiencePlace" value="<?php echo $row1['experiencePlace']; ?>" readOnly="True">
                              </div>
                              <div>
                              <label for="experienceYears">Experience In Years:</label>
                              <input id="middleArea1b4b" type="text" name="experienceYears" value="<?php echo $row1['experienceYears']; ?>" readOnly="True">
                              </div>
                              <div>
                              <label for="skills">Skills:</label>
                              <input id="middleArea1b4c" type="text" name="skills" value="<?php echo $row1['skills']; ?>" readOnly="True" required>
                              </div>
                              <div>
                              <label for="strengths">Strengths:</label>
                              <input id="middleArea1b4d" type="text" name="strengths" value="<?php echo $row1['strengths']; ?>" readOnly="True" required>
                              </div>
                         <button id='btnName2'>Update</button>
                     </form>
                     <button id="changeOtherBtn2" onclick="show3()"><img src="../icons/pencilSign.png" class="pencilEdit"></button>
                       <script>
                        //array for selecting ids becouse ath this time class selector is not work well
                           const ids1 = ["middleArea1b4a", "middleArea1b4b", "middleArea1b4c","middleArea1b4d"];  
                           function show3()
                            {
                            document.getElementById('btnName2').style.display='inline';
                            //changing form read only to writable
                            document.getElementById('changeOtherBtn2').style.display='none';
                            for(var i=0;i<ids1.length;i++){
                                //i choose a variable a for storing ids and use in the next lines
                                a=ids1[i];
                                document.getElementById(a).readOnly=false;
                                document.getElementById(a).style.background='#0ad2e6fa';
                                document.getElementById(a).style.border='2px solid #24ead8';
                            }
                        }
                     </script>
                </div>
         </div>
     </div>
     <footer>
          <?php
           $page='userInterface';
           include '../partials/footer.php';
          ?>
</footer>
</body>
</html>