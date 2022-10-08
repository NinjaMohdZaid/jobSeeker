<?php
session_start();
session_unset();
session_destroy();
$_SESSION['Login']=FALSE;
header('location:login.php');
?>