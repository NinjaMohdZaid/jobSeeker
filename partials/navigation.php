<?php
if($page=='index')
{
    echo '<div id="nav1"><a href="index.php">JobSeeker</a></div>
          <div id="nav2">
          <a href="stj/stj.php">STJ</a>
          <a href="php/signUpForUser.php">Sign Up</a>
         </div>';
}
if($page=='unlogin')
{
    echo '<div id="nav1"><a href="">JobSeeker</a></div>
          <div id="nav2">
          <a href="../stj/stj.php">STJ</a>
          <a href="signUpForUser.php">Sign Up</a>
         </div>';
}
if($page=='common')
{
    echo '<div id="nav1"><a href="">JobSeeker</a></div>
          <div id="nav2">
          <a href="../stj/stj.php">STJ</a>
         </div>
         <div id="nav3">
                <img src="../icons/accountLogo.png" alt="user"  id="userIcon">
                <div class="dropdown">
                  <a href="../partials/logout.php">Logout</a>
                </div>
            </div>';
}


if($page=='userInterface')
{
    echo '<div id="nav1"><a href="">JobSeeker</a></div>
         <div id="nav2">
          <a href="../stj/stj.php">STJ</a>
          <a href="findJob.php">Search Jobs</a>
          <a href="savedJobs.php">Saved Jobs</a>
         </div>
         <div id="nav3">
                <img src="../icons/accountLogo.png" alt="user"  id="userIcon">
                <div class="dropdown">
                  <a href="profile.php">Profile</a><a href="savedJobs.php">Saved Jobs</a><a href="accountSetting.php">Account Settings</a><a href="../partials/logout.php">Logout</a>
                </div>
            </div>';
}
if($page=='companyInterface')
{
    echo '<div id="nav1"><a href="">JobSeeker</a></div>
         <div id="nav2">
          <a href="../stj/stj.php">STJ</a>
          <a href="step1postJob.php">Post a Job</a>
         </div>
         <div id="nav3">
                <img src="../icons/accountLogo.png" alt="user"  id="userIcon">
                <div class="dropdown">
                  <a href="companyProfile.php">Profile</a><a href="postedJobs.php">Posted Jobs</a><a href="companyAccountSetting.php">Account Settings</a><a href="../partials/logout.php">Logout</a>
                </div>
            </div>';
}

?>