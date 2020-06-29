<?php
session_start();
$_SESSION["admin_name"] ="";

session_destroy();
header("location:login.php");
?>