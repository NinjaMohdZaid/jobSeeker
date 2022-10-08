<?php 
include('../partial/config.php');
session_start();
if(!isset($_SESSION['Login'])){
    header('location:login.php');
}
else{
    $phoneNumber=$_SESSION['phoneNumber'];
}
?>
<title>Form For Provide Service | STJ</title>
<link rel="stylesheet" href="../css/form.css">
<?php include('navigationBar.php'); 
if(isset($_GET['success'])){
    if($_GET['success']==1){
        $placeholder='Your Service Has Been Inserted';
        include('../partial/successStatus.php');
    }
    else{
        $placeholder='Your Service Has Not Been Inserted';
        include('../partial/successStatus.php');
    }
}
?>
<!-- middleArea1 starts from here  -->
<div id="middleArea1">
    <h2>Provide Service</h2>
    </div>
<div id="middleArea2">
<h2>Provide Your Work Details</h2>
<form action="form.php" method="POST" enctype="multipart/form-data">
<label for="typeOfWork">Type Of Work</label>
<input type="text" list="works" name="typeOfWork">
<datalist id="works">
<option value="Doctor">
<option value="Plumber">
<option value="Machanic">
<option value="Mehndi Artist">
<option value="Sweets">
<option value="Raj Mistri">
<option value="Car Painter">
<option value="Painter">
<option value="Electrician">
</datalist>
<label for="image">Image</label>
<input type="file" name="image">
<label for="specialist">Specialist</label>
<input type="text" name="specialist">
<label for="time">Timing from</label>
<input type="time" name="timeFrom">
<label for="time">Timing to</label>
<input type="time" name="timeTo">
<label for="details">Address</label>
<input type="text" name="details">
<label for="price">Price</label>
<input type="text" name="price">


<button>Save & Continue</button>
</form>
</div>
<?php include('footer.php'); ?>

</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
        $categoryName=$_POST['typeOfWork'];


        if(isset($_FILES['image']['name'])){
            $image = $_FILES['image']['name'];
            $tmp = explode('.', $image);
            $file_extension = end($tmp);
            //Rename the Image 
            $imageName = "img_".rand(000, 9999999999).".".$file_extension;
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../img/categoryImage_1/".$imageName;
            //Finally Upload the Image
            $upload = move_uploaded_file($source_path, $destination_path);

        }
        else{
            echo 'Something Error';
        }
        $specialist=$_POST['specialist'];
        $timeFrom=$_POST['timeFrom'];
        $timeTo=$_POST['timeTo'];
        $details=$_POST['details'];
        $price=$_POST['price'];
        $sql="INSERT INTO `insidecategory` (`categoryName`, `image`, `specialist`, `timeFrom`, `timeTo`, `details`, `price`, `phoneNumber`) VALUES ('$categoryName', '$imageName', '$specialist', '$timeFrom', '$timeTo', '$details', '$price', '$phoneNumber')";
        $result=mysqli_query($connect,$sql);

        header('location:form.php');

        if($result){
            header('location:form.php?success=1');// Insert Data
        }
        else{
            header('location:form.php?success=0');// Data Not Insert
        }
    }

?>

