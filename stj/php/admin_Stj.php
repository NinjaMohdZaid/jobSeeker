<!DOCTYPE html>
<html>
<head>
<title>Admin Add Category | STJ</title>
<link rel="stylesheet" href="../css/admin_Stj.css">
</head>
<body>
<?php include('../partial/config.php'); ?>
<div id="middleArea1">
    <h2>Admin STJ</h2>
</div>
<div id="middleArea2">
<h1 class="text-center">Add Category</h1>
<br><br>

<!-- Login Form Start Here -->
<form action="admin_Stj.php" method="POST" class="inp" enctype="multipart/form-data">
<label for="Category_name">Category Name</label>
<input type="text" name="categoryName" placeholder="Enter Category Name"> <br><br>
<label for="Image">Image</label>
<input type="file" name="image" placeholder="Insert Image">
<input type="submit" name="submit" class="middleArea2a">
</form>
<?php 
        if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];
                    $tmp = explode('.', $image_name);
                    $file_extension = end($tmp);
                    //Rename the Image 
                    $imageName = "img_".rand(000, 9999999999).".".$file_extension;
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../img/categoryImages/".$imageName;
                    //Finally Upload the Image
                    $upload = move_uploaded_file($source_path, $destination_path);
                    $categoryName = $_POST['categoryName'];
                
                    $sql = "INSERT INTO `category` (`sno`,`categoryName`,`image`) VALUES(NULL, '$categoryName', '$imageName')";
                
                    $result = mysqli_query($connect,$sql);
                
                    if($result){
                        echo 'Successfully Inserted';
                    }
                    else{
                        echo 'Failed Insert';
                    }
                }
                else{
                    echo 'Something wrong';
                }
        }
        
    ?>
</div>
<?php include('footer.php'); ?>
</body>

</html>