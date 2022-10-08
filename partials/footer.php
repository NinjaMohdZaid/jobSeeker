<?php
if($page=='index')
{
    echo '<div id="footer1"><img src="icons/logo.jpeg"></div>
    <div id="footer2">
        <div id="footer2a"><h3>Services</h3></h3><a href="index.php">JobSeeker</a><a href="stj/stj.php">STJ</a></div>
        <div id="footer2b"><h3>Communty</h3></h3><a href="php/termsOfUse.php" target="_blank">Terms of Use</a></div>
        <div id="footer2c"><h3>Meta</h3><a href="php/signUpForUser.php">Create Account</a><a href="stj/stj.php">Short Term Jobs</a></div>
    </div>';
}
if($page=='unlogin')
{
        echo '<div id="footer1"><img src="../icons/logo.jpeg"></div>
        <div id="footer2">
            <div id="footer2a"><h3>Services</h3></h3><a href="../index.php">JobSeeker</a><a href="../stj/stj.php">STJ</a></div>
            <div id="footer2b"><h3>Communty</h3></h3><a href="termsOfUse.php" target="_blank">Terms of Use</a></div>
            <div id="footer2c"><h3>Meta</h3><a href="signUpForUser.php">Create Account</a><a href="../stj/stj.php">Short Term Jobs</a></div>
        </div>'; 
}
if($page=='common')
{
    echo '<div id="footer1"><img src="../icons/logo.jpeg"></div>
    <div id="footer2">
        <div id="footer2a"><h3>Services</h3></h3><a href="../index.php">JobSeeker</a><a href="../stj/stj.php">STJ</a></div>
        <div id="footer2b"><h3>Communty</h3></h3><a href="termsOfUse.php" target="_blank">Terms of Use</a></div>
        <div id="footer2c"><h3>Meta</h3><a href="../stj/stj.php">Short Term Jobs</a><a href="../partials/logout.php">Logout</a></div>
    </div>';   
}
if($page=='userInterface')
{
    echo '<div id="footer1"><img src="../icons/logo.jpeg"></div>
    <div id="footer2">
        <div id="footer2a"><h3>Services</h3></h3><a href="../index.php">JobSeeker</a><a href="../stj/stj.php">STJ</a></div>
        <div id="footer2b"><h3>Communty</h3></h3><a href="termsOfUse.php" target="_blank">Terms of Use</a></div>
        <div id="footer2c"><h3>Meta</h3><a href="../stj/stj.php">Short Term Jobs</a><a href="profile.php">Profile</a><a href="findJob.php">Search Jobs</a><a href="accountSetting.php">Account Setting</a><a href="../partials/logout.php">Logout</a></div>
    </div>';   
}
if($page=='companyInterface')
{
    echo '<div id="footer1"><img src="../icons/logo.jpeg"></div>
    <div id="footer2">
        <div id="footer2a"><h3>Services</h3></h3><a href="../index.php">JobSeeker</a><a href="../stj/stj.php">STJ</a></div>
        <div id="footer2b"><h3>Communty</h3></h3><a href="termsOfUse.php" target="_blank">Terms of Use</a></div>
        <div id="footer2c"><h3>Meta</h3><a href="../stj/stj.php">Short Term Jobs</a><a href="companyProfile.php">Profile</a><a href="step1postJob.php">Post a Job</a><a href="postedJobs.php">Posted Jobs</a><a href="companyAccountSetting.php">Account Setting</a><a href="../partials/logout.php">Logout</a></div>
    </div>';   
}




?>