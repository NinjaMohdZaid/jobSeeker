<?php
   session_start();
   $phoneNumber=$_SESSION['phoneNumber'];
   require '../partials/profileDetails.php';
    if(isset($_SESSION['Loggedin'])){ 
        if($row['type']!='company')
            {
                header('Location:../partials/error504.php');
                exit;
            }
    }
    else
    {
        header('Location:../index.php');
    }

   if($_SERVER['REQUEST_METHOD']=='POST'){
    if($_GET['value']==1)
    {
        //for image updating/changing
        if(isset($_FILES['companyImage']['name'])){
            $image_name = $_FILES['companyImage']['name'];
            $tmp = explode('.', $image_name);
            $file_extension = end($tmp);
            //Rename the Image 
            $imageName = "img_".rand(000, 9999999999).".".$file_extension;
            $source_path = $_FILES['companyImage']['tmp_name'];
            $destination_path = "../img/companyImages/".$imageName;
            //Finally Upload the Image
            $upload = move_uploaded_file($source_path, $destination_path);
            $sql="UPDATE `companybasicdetails` SET logoCompany='$imageName' where phoneNumber='$phoneNumber'";
            $result=mysqli_query($connect,$sql);
            if($result){
                         header('Location:../php/companyProfile.php?status=recived&changeImage=yes');
                 }
                 else
                 {
                         header('Location:../php//companyProfile.php?status=recived&changeImage=no');
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
            $name=$_POST['name'];
            $sql="UPDATE `accounts` SET fullName='$name' WHERE phoneNumber='$phoneNumber'";
            $result=mysqli_query($connect,$sql);
            if($result){
                         header('Location:../php/companyProfile.php?status=recived&changeName=yes');
                 }
                 else
                 {
                         header('Location:../php//companyProfile.php?status=recived&changeName=no');
                 }
        }
        else{
            $website=$_POST['website'];
            $headquarterAddress=$_POST['headquarterAddress'];
            $aboutCompany=$_POST['aboutCompany'];
            $sql="UPDATE `companybasicdetails` SET website='$website',headquarterAddress='$headquarterAddress',aboutCompany='$aboutCompany' WHERE phoneNumber='$phoneNumber'";
            $result=mysqli_query($connect,$sql);
            if($result){
                header('Location:../php/companyProfile.php?status=recived&changeData=yes');
                }
                else
                {
                        header('Location:../php//companyProfile.php?status=recived&changeData=no');
                }
        }
    }   
    

   }
   else
   {
        //header('Location:../partials/error504.php');
   }

?>