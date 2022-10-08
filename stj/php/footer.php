
<link rel="stylesheet" href="../css/footer.css">
<hr>
    <div id="middleArea5">
        <div id="middleArea5a">
            <img src="../icons/stjIcon.jpg" alt="STJ">
        </div>
        <div id="middleArea5b">
            <div class="middleArea5b1"><h3 class="exploreJobseekerHeading">Services</h3><a href="../../">JobSeeker</a><a href="../stj.php">STJ</a></div>
            <div class="middleArea5b1"><h3 class="exploreJobseekerHeading">Community</h3><a href="../../php/termsOfUse.php">Terms of Use</a></div>
        <div class="middleArea5b1"><h3 class="exploreJobseekerHeading">Meta</h3><?php 
    if(!isset($_SESSION['Login'])){
    echo '<a href="createAccount.php">Create Account</a>';
    }
    else{
      echo '<a href="form.php">Provide Service</a>';
    }
    ?><a href="admin_Stj.php">Admin Panel</a><?php 
    if(!isset($_SESSION['Login'])){
    echo '<a href="login.php">Sign In</a>';
    }
    else{
      echo '<a href="logout.php">Logout</a>';
    }
    ?>
    </div>
    </div>
    </div>
    <hr>
    <div id="middleArea6">
          <a href="/" id="facebookIcon"><img src="../icons/facebookIcon.png" alt="Icon Facebook"></a>
          <a href="/" id="instagramIcon"><img src="../icons/instagramIcon.png" alt="Icon Instagram"></a>
          <a href="/" id="twitterIcon"><img src="../icons/twitterIcon.png" alt="Icon Twitter"></a>
          <a href="/" id="youtubeIcon"><img src="../icons/youtubeIcon.png" alt="Icon YouTube"></a>
    </div>
    <hr>
    <footer id="copyright">
        <p>Copyright © 2021-2030,Short Term Job, Inc. "Short Term Job" and logo are registered trademarks of Short Term Job, Inc</p>
    </footer>
</body>
</html>