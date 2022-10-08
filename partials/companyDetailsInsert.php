<?php
//for inserting the details of the company
session_start();
$phoneNumber=$_SESSION['phoneNumber'];
require 'dbmsConnection.php';
      if($_SERVER['REQUEST_METHOD']=='POST'){ 
          //is a post method
          if(isset($_FILES['logoCompany']['name'])){
                   $image_name = $_FILES['logoCompany']['name'];
                   $tmp = explode('.', $image_name);
                   $file_extension = end($tmp);
                   $imageName = "img_".rand(000, 9999999999).".".$file_extension;
                   $source_path = $_FILES['logoCompany']['tmp_name'];
                   $destination_path = "../img/companyImages/".$imageName;
                   //Finally Upload the Image
                   $upload = move_uploaded_file($source_path, $destination_path);
                   $website=$_POST['website'];
                   $headquarterAddress=$_POST['headquarterAddress'];
                   $aboutCompany=$_POST['aboutCompany'];
                   $sql="INSERT INTO `companybasicdetails`(`phoneNumber`, `logoCompany`, `website`, `headquarterAddress`, `aboutCompany`) VALUES ('$phoneNumber','$imageName','$website','$headquarterAddress','$aboutCompany')";
                   $result=mysqli_query($connect,$sql);
            if($result){
                
                 header( 'Location:../php/companyInterface.php?profileStatus=yes');
            }
            else
            {
                 header( 'Location:../php/companyInterface.php?profileStatus=no');
            }
          }
          else{
              echo 'something wrong';
          }
      }
      else{
          //not a post method
         header('Location:../php/error504.php');
         exit;
      }

?>