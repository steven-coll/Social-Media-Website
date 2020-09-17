<?php
include("config.php");
include("backendreg.php");
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: greetings.php");
    exit;
}
 ?>
 
<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<title>Sign Up</title>

<?php require_once('head.php'); ?>

</head>

<body>

<?php include("header.php"); ?>

<div class="formhold col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
    
    <h2>Sign Up</h2>
    
    <form action="backendreg.php" method="post">
        
        <div class="form-group <?php echo (!empty($usernameError)) ? 'has-error' : ''; ?>">
            
            <label>Username</label>
            
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            
            <span class="error"><?php echo $usernameError; ?></span>
            
        </div>    
        
            <div class="form-group <?php echo (!empty($passwordError)) ? 'has-error' : ''; ?>">
                
                <label>Password</label>
                
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                
                <span class="error"><?php echo $passwordError; ?></span>
                
            </div>
        
            <div class="form-group <?php echo (!empty($confirm_passwordError)) ? 'has-error' : ''; ?>">
                
                <label>Confirm Password</label>
                
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                
                <span class="error"><?php echo $confirm_passwordError; ?></span>
                
            </div>
        
            <div class="formgroup">
                
                <input type="submit" class="button" value="Submit">
                
                
            </div>
        
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        
    </form>
    
</div>

</body>

</html>