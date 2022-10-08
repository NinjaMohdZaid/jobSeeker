<?php
//this page is to fetch all the details of the account
    require 'dbmsConnection.php';
    $phoneNumber=$_SESSION['phoneNumber'];
    $sql="SELECT * FROM `accounts` WHERE phoneNumber='$phoneNumber'";
    $result=mysqli_query($connect,$sql);
    $row=mysqli_fetch_assoc($result);
?>