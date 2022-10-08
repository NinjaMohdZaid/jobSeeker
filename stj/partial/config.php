<?php  
    $servername="localhost";
    $username="root";
    $password="";
    $database="stj";
    $connect=mysqli_connect($servername, $username, $password, $database);
    if(!$connect)
    {
        echo 'Failed to connect database';
    }

?>