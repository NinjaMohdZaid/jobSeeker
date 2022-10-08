<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/companyDetails.css">
    <title>Complete Profile</title>
</head>
<body>
    <!-- page for taking company basic details -->
                        <nav>
                            <?php
                               $page='companyInterface';
                               include '../partials/navigation.php';
                             ?>
                         </nav>
<!-- middlearea1 starts from here -->
      <div id="middleArea1">
             <h1>Provide us your basic details before performing any action.</h1>
             <form action="../partials/companyDetailsInsert.php" method="post" enctype="multipart/form-data">
                 <div><label for="logoCompany">Logo Of Company:</label><input type="file" name="logoCompany"></div>
                 <div><label for="website">Website:</label><input type="url" name="website"></div>
                 <div><label for="headquarterAddress">Main Headquarter Address:</label><input type="text" name="headquarterAddress"></div>
                 <div><label for="aboutCompany">Tell Us More About Company:</label><textarea name="aboutCompany" cols="30" rows="10"></textarea></div>
                 <button>Update</button>
             </form>
      </div>
    <footer>
           <?php
                    $page='companyInterface';
                    include '../partials/footer.php';
                 ?>
    </footer>
</body>
</html>