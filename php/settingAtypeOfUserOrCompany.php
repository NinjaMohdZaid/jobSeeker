<?php
session_start();
if(!isset($_SESSION['Loggedin']))
{
   header("Location: ../");
  exit;
}
?>

<!--This page is for the new user to ask about the type (user or Company)
this page opens only when the type of user is not set-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>jobSearchPostJob</title>
	<link rel="stylesheet" type="text/css" href="../css/settingAtypeOfUserOrCompany.css">
</head>
<body>
    <?php
     if(isset($_GET['status']))
     {
         if($_GET['status']=='accountCreated')
         {
             $placeholder="Account Created ";
             include '../partials/successStatus.php';
         }
     }
    ?>
                       <nav>
                            <?php
                               $page='common';
                               include '../partials/navigation.php';
                             ?>
                         </nav>
<div id="middleArea">
	<div id="middleArea1a">
	  <h2 id="middleArea1a1">JobSeeker</br>
          Where You Can Find Employer Or Search For Jobs Easily</h2>
	  </div>
	  <div id="middleArea2a">
		<div class="middleArea2a1"><h3>I'm Candidate</h3>
			<p>Many job openings all over India</p>
            <a href="../partials/setTypeUser.php">Search Job</a>
		</div>
		<div class="middleArea2a1"><h3>I'm Company</h3>
			<p>Hire staff with ease</p>
            <a href="../partials/setTypeCompany.php">Hire Now</a>
		</div>
		</div>
</div>
<footer>
    <?php
       $page='common';
       include '../partials/footer.php'
    ?>
</footer>

</body>
</html>