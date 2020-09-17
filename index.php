
<!DOCTYPE html>

<html lang="en">

<head>

<?php require_once('head.php'); ?>

<title>Home</title>

</head>

<body>

<?php include("header.php"); ?>

<div class="imgwrap">

<?php
    
session_start();

include("config.php");

$sql = "SELECT * FROM images";

$result = mysqli_query($link,$sql);

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<div class='img_div'>";
        
            echo "<div class='inner'>";
        
                echo "<div class='front'>";
            
                    echo "<img alt='' class='img-rounded' src='uploads/".$row['name']."' >";
        
                  
                    echo "<p class='margtop'> @" . $row['userpost'] . "</p>";

                echo "</div>";
        
                echo "<div class='back'>";

                    echo "<p> @" . $row['userpost'] . "</p>";
        
                    echo "<p>" . $row['caption'] . "</p>";

                echo "</div>";
        
            echo "</div>";

        echo "</div>";
    } 

?>
  
</div>  


</body>

</html>
