<?php 
include('../partial/config.php');
session_start();
if(isset($_SESSION['Login'])){
    $phoneNumber=$_SESSION['phoneNumber'];
}
?>
<link rel="stylesheet" href="../css/stj2.css">
<title>All Category | STJ</title>
<?php include('navigationBar.php'); ?>
    <hr>
        <?php 
        include('../partial/config.php');
        if(isset($_GET['categoryName'])){
            $categoryName = $_GET['categoryName'];
            $sql = "SELECT * FROM `insidecategory` WHERE categoryName='$categoryName' ";
            $result = mysqli_query($connect, $sql);
            while($row=mysqli_fetch_assoc($result)){         
                echo '<div class="middleArea">

                    <div class="middleArea1">
                    <div class="middleArea1a"><img src="../img/categoryImage_1/'.$row['image'].'" alt="Not Found"></div>
                    </div>';
                echo '<div class="middleArea2">
                            <h1>'.$row['categoryName'].'</h1>
                            <hr>
                            <ul>
                                <li>Specialist: '.$row['specialist'].'</li>
                                <li>Time From: '.$row['timeFrom'].'</li>
                                <li>Time To: '.$row['timeTo'].'</li>
                                <li>Address: '.$row['details'].'</li>
                                <li>Price: '.$row['price'].'</li>
                            </ul>
                        </div>';
                echo '<div class="middleArea3">
                            <br>
                            <a href="tel:'.$row['phoneNumber'].'">Call</a>
                </div>
                </div>';
            }
        }
        ?>
    <?php include('footer.php'); ?>
</body>
</html>