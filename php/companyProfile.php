<?php
   session_start();
   include '../partials/profileDetails.php';
    if(isset($_SESSION['Loggedin'])){ 
        if($row['type']!='company')
            {
                header('Location:../partials/error504.php');
                exit;
            }
        // fetching profile details like image or name etc 
        $sql1="SELECT * FROM `companybasicdetails` WHERE phoneNumber='$phoneNumber'";
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
    <link rel="stylesheet" href="../css/companyProfile.css">
    <title>Comapany Profile</title>
</head>
<body>
  <!--navigation starts from here-->
    <nav>
        <?php
           $page='companyInterface';
           include '../partials/navigation.php';
         ?>
     </nav>
     <?php
        if(isset($_GET['status']))
        {
            if(isset($_GET['changeImage']))
            {
                if($_GET['changeImage']=='yes')
                {
                   $placeholder="Logo Changed ";
                   include '../partials/successStatus.php';
                }
                else{
                    $placeholder="Logo not Changed ";
                    include '../partials/successStatus.php';
                }
            }
            if(isset($_GET['changeName']))
            {
                if($_GET['changeName']=='yes')
                {
                   $placeholder="Name Changed ";
                   include '../partials/successStatus.php';
                }
                else{
                    $placeholder="Name not Changed ";
                    include '../partials/successStatus.php';
                }
            }
            if(isset($_GET['changeData']))
            {
                if($_GET['changeData']=='yes')
                {
                   $placeholder="Data updated ";
                   include '../partials/successStatus.php';
                }
                else{
                    $placeholder="Data not Changed ";
                    include '../partials/successStatus.php';
                }
            }
        }

     ?>
     <!--middleArea1 starts from here-->
     <div id="middleArea1">
         <?php
            echo '<img src=../img/companyImages/'.$row1['logoCompany'].' id="companyLogo"><button id="imageChange" onclick="hideShow()">Change</button>';
            ?>
            <form id="imageUpload" action="../partials/changeCompanyProfileDetails.php?value=1" method="POST" enctype="multipart/form-data">
                <input type="file" name="companyImage" required>
                <button>Update</button>
            </form>
            <div id="middleArea1a">
            <form id="nameChange" action="../partials/changeCompanyProfileDetails.php?value=2" method="POST">
                <input type="text" id='i1' name="name" value="<?php echo $row['fullName']; ?>" readonly="true" required>
                <button id="nameChangeButton">Update</button>
            </form>
            <button id="changeProfileName" onclick="show1()"><img src="../icons/pencilSign.png" class="pencilEdit"></button>
            </div>
            
            <div id="middleArea1b">
                <form action="../partials/changeCompanyProfileDetails.php?value=3" method="POST">
                   <label for="website">Website</label>
                   <input type="url" name="website" id="i2" value="<?php echo $row1['website'] ?>" readonly="false" required>
                   <label for="headquarterAddress">Headquarter Address</label>
                   <input type="text" name="headquarterAddress" id="i3" value="<?php echo $row1['headquarterAddress']; ?>" readonly="true" required>
                   <label for="aboutCompany">About Company</label>
                   <textarea name="aboutCompany" id="i4" cols="55" rows="10" readonly="true" required><?php echo $row1['aboutCompany']; ?></textarea>
                   <button id="dataChangeButton">Update</button>
                </form>
                <button id="changeProfileData" onclick="show2()"><img src="../icons/pencilSign.png" class="pencilEdit"></button>
            </div>
        </div>
     <!--script for hide and show-->
     <script>
         function hideShow(){
           document.getElementById('imageChange').style.display='none';
           document.getElementById('imageUpload').style.display='block';
         }
         function show1(){
            document.getElementById('changeProfileName').style.display='none';
            document.getElementById('nameChangeButton').style.display='inline';
            document.getElementById('i1').style.background='#06f5df';
            document.getElementById('i1').readOnly=false;
         }
         function show2(){
            document.getElementById('changeProfileData').style.display='none';
            document.getElementById('dataChangeButton').style.display='inline'
            document.getElementById('i4').style.background='#06f5df';
            document.getElementById('i4').readOnly=false;
            document.getElementById('i2').style.background='#06f5df';
            document.getElementById('i2').readOnly=false;
            document.getElementById('i3').style.background='#06f5df';
            document.getElementById('i3').readOnly=false;
            document.getElementById('i4').style.color='black';
            document.getElementById('i2').style.color='black';
            document.getElementById('i3').style.color='black';
         }
     </script>
     <!--footer starts from here-->
     <footer>
          <?php
           $page='companyInterface';
           include '../partials/footer.php';
          ?>
</footer>
</body>
</html>