<?php
$phoneNumber=$_GET['ph'];
require '../partials/dbmsConnection.php';
//  this page is for changing the details of user
if($_SERVER['REQUEST_METHOD']=='POST'){

    if($_GET['value']==1)
    {
        //for image updating/changing
        if(isset($_FILES['userImage']['name'])){
            $image_name = $_FILES['userImage']['name'];
            $tmp = explode('.', $image_name);
            $file_extension = end($tmp);
            //Rename the Image 
            $imageName = "img_".rand(000, 9999999999).".".$file_extension;
            $source_path = $_FILES['userImage']['tmp_name'];
            $destination_path = "../img/userImages/".$imageName;
            //Finally Upload the Image
            $upload = move_uploaded_file($source_path, $destination_path);
            $sql="UPDATE `userbasicdetails` SET userImage='$imageName' where phoneNumber='$phoneNumber'";
            $result=mysqli_query($connect,$sql);
            if($result){
                         header('Location:../php/profile.php?status=recived&changeImage=yes');
                 }
                 else
                 {
                         header('Location:../php/profile.php?status=recived&changeImage=no');
                 }
        }
        else
        {
            header('Loaction:error504.php');
        }
           
    }
    else{

        if($_GET['value']==2)
        {
                     $age=$_POST['age'];
                     $city=$_POST['city'];
                     $educationInstitute=$_POST['educationInstitute'];
                     $digreeOrCertification=$_POST['digreeOrCertification'];
                     $fieldOfStudy=$_POST['fieldOfStudy'];
                     $instituteLocation=$_POST['instituteLocation'];
                     $percentage=$_POST['percentage'];
                     $passingYear=$_POST['passingYear'];
                    $sql="UPDATE `userbasicdetails` SET age='$age',city='$city',educationInstitute='$educationInstitute',digreeOrCertification='$digreeOrCertification',fieldOfStudy='$fieldOfStudy',instituteLocation='$instituteLocation',percentage='$percentage',passingYear='$passingYear' where phoneNumber='$phoneNumber'";
                    $result=mysqli_query($connect,$sql);
                if($result)
                {
                    header('Location:../php/profile.php?status=recived&changeDataStatus=yes');
                }
               else
                  {
                    header('Location:../php/profile.php?status=recived&changeDataStatus=no');
                  }
        }
        else{
            //other than 2
            if($_GET['value']==3)
            {
                
                $experiencePlace=$_POST['experiencePlace'];
                $experienceYears=$_POST['experienceYears'];
                $skills=$_POST['skills'];
                $strengths=$_POST['strengths'];
                $sql="UPDATE `userbasicdetails` SET experiencePlace='$experiencePlace',experienceYears='$experienceYears',skills='$skills',strengths='$strengths' where phoneNumber='$phoneNumber'";
                $result=mysqli_query($connect,$sql);
                if($result)
                {
                    header('Location:../php/profile.php?status=recived&changeDataStatus=yes');
                     
                }
               else
                  {
                    header('Location:../php/profile.php?status=recived&changeDataStatus=no');
                  }

             
            }
            else{
                  
                  $name=$_POST['fullName'];
                  $sql="UPDATE `accounts` SET fullName='$name' WHERE phoneNumber='$phoneNumber'";
                  $result=mysqli_query($connect,$sql);
                  if($result)
                  {
                    header('Location:../php/profile.php?status=recived&changeDataStatus=yes');
                  }
                  else
                  {
                    header('Location:../php/profile.php?status=recived&changeDataStatus=no');
                  }
            }
        }

    }
}
else{
    header('Location:error504.php');
}
?>