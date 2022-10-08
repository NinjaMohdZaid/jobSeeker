<!--Program to connect with sql database-->
<?php
$servername="localhost";
$username="root";
$password="";
$database="jobseeker";
//connecting to the database jobSeeker 
$connect=mysqli_connect($servername,$username,$password,$database);
if(!$connect)
{
die("failed to connect".mysqli_connect_error());
}
?>