<?php
            session_start();
            require '../partials/dbmsConnection.php';
            if($_SERVER['REQUEST_METHOD']=='POST'){        
           if(isset($_FILES['userImage']['name'])){
               //Upload the Image
               //to upload image we need image name, source path and destination path
           $image_name = $_FILES['userImage']['name'];
           //Auto rename our image
                       //Get the Extention of our image (jpg,png,gif, etc) e.g. "asdzfgfds.jpg"
                    //    $ext = end(explode('.',$image_name));
                       $tmp = explode('.', $image_name);
                       $file_extension = end($tmp);
                       //Rename the Image 
                       $imageName = "img_".rand(000, 9999999999).".".$file_extension;
                       $source_path = $_FILES['userImage']['tmp_name'];
                       $destination_path = "../img/userImages/".$imageName;
                       //Finally Upload the Image
                       $upload = move_uploaded_file($source_path, $destination_path);
                       $phoneNumber=$_SESSION['phoneNumber'];   
           $gender=$_POST['gender'];
           $dateOfBirth=$_POST['dateOfBirth'];        
           $age=$_POST['age'];
           $city=$_POST['city'];
           $educationInstitute=$_POST['educationInstitute'];
           $digreeOrCertification=$_POST['digreeOrCertification'];
           $fieldOfStudy=$_POST['fieldOfStudy'];
           $instituteLocation=$_POST['instituteLocation'];
           $percentage=$_POST['percentage'];
           $passingYear=$_POST['passingYear'];
           $experienceYears=$_POST['experienceYears'];
           $experiencePlace=$_POST['experiencePlace'];
           $skills=$_POST['skills'];
           $strengths=$_POST['strengths'];
           $sql="INSERT INTO `userbasicdetails` (`sno`, `phoneNumber`, `userImage`,`gender`,`dateOfBirth`,`age`, `city`, `educationInstitute`, `digreeOrCertification`, `fieldOfStudy`, `instituteLocation`, `percentage`, `passingYear`, `experienceYears`, `experiencePlace`, `skills`, `strengths`) VALUES (NULL, '$phoneNumber', '$imageName','$gender','$dateOfBirth','$age', '$city', '$educationInstitute', '$digreeOrCertification', '$fieldOfStudy', '$instituteLocation', '$percentage', '$passingYear', '$experienceYears', '$experiencePlace', '$skills', '$strengths')"; 
           $result=mysqli_query($connect,$sql);
            if($result){
                 header('Location:../php/userInterface.php?profileStatus=completed');
            }
            else
            {
                header('Location:../php/userInterface.php?profileStatus=failed');
            }
        }
     }
?>