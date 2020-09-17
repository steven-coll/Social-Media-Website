<?php 
if(isset($_POST['submit'])){
    
    $to = "src4gb@mail.missouri.edu"; 
    
    $from = $_POST['name'];
    
    $subject = "Devmsg";
    
    $message = $_POST['message'];
    
    $head = "From:" . $from;
    
    mail($to,$subject,$message,$head);
    
    echo "Your message has been sent to the developer!";
    
    }
?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>Report</title>

<?php require_once('head.php'); ?>

</head>

<body>

<?php include("header.php"); ?>

<p class="abouttext">Message the developer</p>

<p class="center">If reporting an image, include the url in the message.</p>

<div class="formhold col-md-6 col-md-offset-3">

    <form action="#" method="post">
        
        <label>Name: </label>
        
            <input class="marg" type="text" name="name"><br>
        
        <label>Message:</label>
            
            <textarea class="marg" rows="5" name="message" cols="30"></textarea><br>

        <input type="submit" class="marg button" name="submit" value="Submit">
        
    </form>

</div>

</body>

</html>