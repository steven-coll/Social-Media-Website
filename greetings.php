
<!DOCTYPE html>

<html lang="en">

<head>

<?php require_once('head.php'); ?>

<title>Greetings</title>

</head>

<body>

<?php

require_once "config.php";

session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

    header("location: login.php");
    exit;

}?>

<?php include("header.php"); ?>

<h1 class="center">Greetings, <?php echo $_SESSION["username"]  ?>! </h1>

</body>

</html>
