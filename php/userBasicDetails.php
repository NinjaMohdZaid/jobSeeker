<?php
    session_start();
    $phoneNumber=$_SESSION['phoneNumber'];
    // echo $phoneNumber;
    require '../partials/dbmsConnection.php';
    if(isset($_SESSION['Loggedin'])){ 
        //if logged in check
        include '../partials/profileDetails.php';
        if($row!='user')
        {
           //checked user or not
           //i do all variable as like $sql1,$result1 becouse of not over written 
           $sql1="SELECT * FROM `userbasicdetails` WHERE phoneNumber='$phoneNumber'";
           $result1=mysqli_query($connect,$sql1);
           $num1=mysqli_num_rows($result1);
           $row1=mysqli_fetch_assoc($result1);
           if($num1!=0)
           {
             //check profile is complete or not without else
             //if $num1 !=0 mean profile is already updated
             header('Location:../partials/error504.php');
           }
           
        }   
        else{
            //throw to the error page if not type user
            header('Location:../partials/error504.php');
        }  
    }
    else
    {
        //if not logged in show login page
        header('Location:../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userBasicDetails.css">
    <title>User | Basic Details</title>
</head>
<body>
            <nav>
                 <?php
                    $page='userInterface';
                    include '../partials/navigation.php';
                  ?>
                 </nav>
    <!--middleArea1 starts from here-->
    <div id="middleArea1">
    <h2>Find A Job at India's No.1 Job Site</h2>
            <form action="userInterface.php" method="get">
            <div id="middleArea1a"><img src="../icons/graySearchIcon.png" alt="image Not Loaded"><input type="search" name="SkillsDesignationCompanies" placeholder="Skills,Companies,Designations"></div>
            <div id="middleArea1b"><img src="../icons/grayLocationIcon.png" alt="image not Loaded"><input type="search" name="Location"placeholder="Enter Location"></div>
            <input type="hidden" name="search" value="true" >
            <button>Search</button>
            </form>
            <!--area for last search-->
            <div id="middleArea1c">
            <?php
            include '../partials/resultPastSearchJobs.php';
            ?>
        </div>
        <div>
            <?php
               
                if (isset($_GET['search'])) {
                    include '../partials/jobSearchResult.php';
                    }
            ?>
        </div>
        <div id="middleArea1d">
            <div id="middleArea1d1"><img src="../icons/job.jpg" alt="Icon"> Jobs</div>
            <div id="middleArea1d2"><img src="../icons/companyBuilding.png" alt="Icon">Companies</div>
            <div id="middleArea1d3"><img src="../icons/salary.png" alt="Icon">Salaries</div>
        </div>
</div>
    <!--middle Area2 starts from here-->
    <div id="middleArea2">
    <div id="middleArea2a">
        <img src="../icons/accountLogo.png" alt="Image Not Loaded"  id="userIconImage">
    </div>
    <div id="middleArea2b">
        <h1>Enter Your Details</h1>
        <form action="../partials/userBasicDetailsInsert.php" method="POST" enctype="multipart/form-data">
        <div class="formInput">
            <label for="userImage">Upload Profile Picture</label>
            <input type="file" name="userImage" required>
            </div>
            <div class="formInput">
            <label for="gender">Gender</label>
            <SELECT name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="other">Other</option>
            </SELECT>
            </div>
            <div class="formInput">
            <label for="dateOfBirth">Date of Birth</label>
            <input type="date" placeholder="eg..28/04/2000" name="dateOfBirth" required>
            </div>
            <div class="formInput">
            <label for="age">Age</label>
            <input type="text" placeholder="eg..18" name="age" required>
            </div>
             <div class="formInput">
            <label for="city" >Current City</label>
            <input type="text" name="city" placeholder="eg..New Delhi" required>
            </div>
            <h2>Write About Your Qualification</h2>
            <div class="formInput">
            <label for="educationInstitute">Collage/University of Highest Education</label>
            <input type="text" name="educationInstitute" placeholder="eg..Jamia Millia Islamia" required>
            </div>
            <div class="formInput">
            <label for="digreeOrCertification">Digree/Certification</label>
            <select name="digreeOrCertification" required> 
            <option value="High School">High School</option>
            <option value="Intermediate">Inttermediate</option>
            <option value="Digree">Digree</option>
            <option value="Diploma">Diploma</option>
            <option value="Master's">Master's</option>
            <option value="Certification">Certification</option>
            <option value="MBA">MBA</option>
            <option value="LLB/LLM">MBA</option>
            <option value="MD">MD</option>
            <option value="PHD">PHD</option>
        </select>
            </div>
            <div class="formInput">
            <label for="fieldOfStudy">Field Of Study</label>
            <input type="text" name="fieldOfStudy" placeholder="eg..Computer Engineering" required>
            </div>
            <div class="formInput">
            <label for="instituteLocation">Collage/University/School Location</label>
            <input type="text" name="instituteLocation" placeholder="eg..New Delhi" required>
            </div>
            <div class="formInput">
            <label for="percentage">Percentage Of Passing</label>
            <input type="text" name="percentage" placeholder="eg..95" required>
            </div>
            <div class="formInput">
            <label for="passingYear">Year Of Passing</label>
            <input type="text" name="passingYear" placeholder="eg..2017" required>
            </div>
            <div class="formInput">
            <label for="experienceYears">Experience In Years</label>
            <input type="text" name="experienceYears" placeholder="eg..3">
            </div>
            <div class="formInput">
            <label for="experiencePlace">Experience Place</label>
            <input type="text" name="experiencePlace" placeholder="eg..Microsoft">
            </div>
            <div class="formInput">
            <label for="skills">Skills</label>
            <textarea name="skills" id="" cols="30" rows="10" placeholder="eg..Web Developer" required></textarea>
            </div>
            <div class="formInput">
            <label for="strengths">Strengths</label>
            <textarea name="strengths" id="" cols="30" rows="10" placeholder="eg..Leadership" required></textarea>
            </div>
            <button>Save</button>
        </form>
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