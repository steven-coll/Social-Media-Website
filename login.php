
<?php
include("backendlog.php");

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

    header("location: greetings.php");

    exit;

}
 if ( isset($_GET['denied']) && $_GET['denied'] == 1 )
{
     echo "<script>alert('You must be logged in to upload a photo!');</script>";
 
 } 

 if ( isset($_GET['created']) && $_GET['created'] == 1 )
{
      $created = "<div class='alert alert-success'><p class='abouttext'> Your account was succesfully created!</p></div>";
 } ?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>Login</title>

<?php require_once('head.php'); ?>

</head>
    
<body>

<?php include("header.php"); ?>

<div class="formhold col-md-6 col-md-offset-3">

    <h2>Login</h2>
    
    <?php echo $created; ?>
    
    <p>Enter Username and Password</p>

<form action="backendlog.php" method="post">
    
    <div class="form-group <?php echo (!empty($usernameError)) ? 'has-error' : ''; ?>">
        
        <label>Username</label>
        
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
        
        <span class="error"><?php echo $usernameError; ?></span>
        
        </div>
    
    <div class="form-group <?php echo (!empty($passwordError)) ? 'has-error' : ''; ?>">
            
        <label>Password</label>
        
        <input type="password" name="password" class="form-control">
        
        <span class="error"><?php echo $passwordError; ?></span>
        
        </div>
    
    <div class="formgroup">
    
        <input type="submit" class="button" value="Login">
    
            </div>

    <p>Don't have an account? <a href="register.php">Register here!</a></p>
    
</form>

</div>

</body>
</html>