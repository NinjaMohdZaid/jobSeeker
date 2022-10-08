<!--Front user page-->
<?php
session_start();
if(isset($_SESSION['Loggedin']))
{
   header("Location: partials/afterLogin.php");
   exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Home</title>
</head>
<body>
    <!--navigation starts from here-->
    <nav>
      <?php
        $page='index';
        include 'partials/navigation.php';
      ?>
    </nav>
    <!--Div for section in middle Start form here-->
    <div id="middleArea1">
    <h1>ITS TIME TO DO THE BEST WORK OF YOUR LIFE</h1>
    <p>By continuing, you agree to our Terms of Use and Privacy Policy.</p>
    <!-- id Middile area 1b 1a means contents inside of the middle area-->
        <div id="middleArea1b">
            <form action="./" method="post" id="loginForm">
            <input type="text" class="loginInput" name="phoneNumber" placeholder="Enter Phone Number">
            <input type="password" class="loginInput" name="password" placeholder="Enter Password">
            <?php
                //php to redirect if login credentials are right otherwise show warnings
            if($_SERVER['REQUEST_METHOD']=='POST'){
                require 'partials/dbmsConnection.php';
                $phoneNumber=$_POST['phoneNumber'];
                $password=$_POST['password'];
                $sql="SELECT * FROM `accounts` WHERE phoneNumber='$phoneNumber' and password='$password'";
                $result=mysqli_query($connect,$sql);
                $num=mysqli_num_rows($result);
            if($num==1){
                $row=mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['Loggedin']=TRUE;
                $_SESSION['phoneNumber']=$phoneNumber;
                header("Location: partials/afterLogin.php");
                exit;
                //echo "hello ".$row['fullName']." welcome to login ".$row['phoneNumber'];
            }
            else{
                echo '<div id="warning"><p>Incorrect Credentials Re-Enter Again<p></div>';
            }
        }
            ?>
            <button id="loginButton">Login</button>
        </form>
        </div>
        <!--<a href="hiring.php" id="hiringTag">Are You Hiring?Post A Job</a>-->
        <a href="php/signUpForUser.php" id="createAccountTag">Dont Have Account?Create An Account</a>
    </div>
    <div id="middleArea2">
        <h3 class="alertClass">NEW!</h3>
        <p>Tools to help you Navigate COVID-19 and find jobs you love</p>
        <a href="php/covid.php" target="_blank">View Covid-19 Resources</a>
    </div>
    <hr>
    <div id="middleArea4">
            <h2>Explore More about JobSeeker</h2>
            <p>Millions of people are searching for jobs, salary information, company reviews, and interview questions. See what others are looking for 
                on Glassdoor today.</p>
                <div id="middleArea4a">
                 <h2>The right jobs out here</h2>
                 <a href="php/signUpForUser.php">Register For Free</a>
                </div>
                <button id="arrowButton" onclick="showHide()"><img id="arrowKey" src="icons/downArrowKey.png" alt="Show More/Show Less"></button>
                <script>
                //script for the show or hide contents
                    function showHide(){
                       if(document.getElementById("middleArea4a").style.display=='none'){
                           document.getElementById("middleArea4a").style.display='flex';
                           document.getElementById("arrowKey").style.transform='rotate(180deg)';
                        }
                        else{
                                document.getElementById("middleArea4a").style.display='none';
                                document.getElementById("arrowKey").style.transform='rotate(0)';
                        }
                    }
                </script>
        </div>
        <hr>
        <br>
    <!-- <div id="middleArea5">
        <div id="middleArea5a">
            <img src="icons/logo.jpeg" alt="JobSeeker">
        </div>
        <div id="middleArea5b">
            <div class="middleArea5b1"><h3 class="exploreJobseekerHeading">JobSeeker</h3><a href="php/about.php">About</a><a href="php/blog.php">Blog</a><a href="">STJ</a></div>
            <div class="middleArea5b1"><h3 class="exploreJobseekerHeading">Employers</h3><a href="/">Employer Hub</a><a href="">Get a Free Employer</a><a href="/">Employers Hub</a></div>
            <div class="middleArea5b1"><h3 class="exploreJobseekerHeading">Community</h3><a href="php/help.php">Help</a><a href="php/contact.php">Contact Us</a><a href="php/termsOfUse.php" target="_blank">Terms of Use</a></div>
         <div class="middleArea5b1"><h3 class="exploreJobseekerHeading">Work With Us</h3><a href="/">Advertisers</a><a href="/">Developers</a><a href="/">Careers</a></div>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div id="middleArea6">
          <a href="/" id="facebookIcon"><img src="icons/facebookIcon.png" alt="Icon Facebook"></a>
          <a href="/" id="instagramIcon"><img src="icons/instagramIcon.png" alt="Icon Instagram"></a>
          <a href="/" id="twitterIcon"><img src="icons/twitterIcon.png" alt="Icon Twitter"></a>
          <a href="/" id="youtubeIcon"><img src="icons/youtubeIcon.png" alt="Icon YouTube"></a>
    </div>
    <br>
    <hr>
    <br>-->
    <!--footer starts from here-->
   <footer>
        <?php
            $page='index';
            include 'partials/footer.php';
        ?>
   </footer>
</body>
</html>