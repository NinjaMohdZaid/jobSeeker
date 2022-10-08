<?php
session_start();
include 'dbmsConnection.php';
$phoneNumber=$_SESSION['phoneNumber'];
//$sql="select type from accounts WHERE phoneNumber='$phoneNumber'";
//something is remains to add in this section by using sql like agar type user hai tb kya ho orr...samajh lo khud hi
    $sql="UPDATE accounts SET type = 'user' WHERE phoneNumber='$phoneNumber'";
    $result=mysqli_query($connect,$sql);
    header("Location: ../php/userInterface.php");
?>