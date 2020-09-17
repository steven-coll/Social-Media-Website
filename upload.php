<?php
require_once "config.php";

require_once "uploadimage.php";

session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

    header("location: login.php?denied=1");
    exit;

}
 if ( isset($_GET['success']) && $_GET['success'] == 1 )
{
      $success = "<p class='abouttext'> Your file was succesfully uploaded!</p>";
 
 } ?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>Upload</title>

<?php require_once('head.php'); ?>

</head>

<body>

<?php include("header.php"); ?>

<div class="formhold col-md-6 col-md-offset-3">
    <h2>Upload Image</h2>
            
    <?php echo $success ?>

    <form method="post" action="uploadimage.php" enctype='multipart/form-data'>
        
        <div class="form-group">
            
            <input type='file' id="file" onchange="imgpreview();" class="center" name='file' />
        
        </div>
        
        <div class="form-group">
            
            <p class="cap">Preview:</p>
            
            <img src="preview.png" class="img-rounded" height="200" alt="Preview">
            
            <p class="cap">Caption:</p>
            
            <textarea class="form-control" placeholder="140 character limit" rows="6" onkeyup="javascript:this.value=this.value.replace(/[<,>]/g,'');" maxlength="140" name="cap"></textarea>
        
        </div>

            <input type='submit' class="button" value='Upload' name='upload'>
    
</form>
</div>

</body>
</html>
    
