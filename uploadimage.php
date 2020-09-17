
<?php session_start();

require_once "config.php";

require_once "upload.php";

if(isset($_POST['upload'])){

    $name = ($_FILES['file']['name']);

    $unname = uniqid() . $name;

    $target_dir = "uploads/";

    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $extensions_arr = array("jpg","jpeg","png","gif");


    if( in_array($imageFileType,$extensions_arr) ){
        
        $username = mysqli_real_escape_string($link, $_SESSION['username']);
        
        $cap   = mysqli_real_escape_string($link, $_POST['cap']);
        
        $unname = mysqli_real_escape_string($link, str_replace(" ", "_", $unname));

    $query = "insert into images(name,userpost,caption) values('". $unname ."','". $username ."','". $cap ."')";

    mysqli_query($link,$query);
  
    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$unname);
    
    header("location: upload.php?success=1");

  }

    else {
        echo "<script>alert('Error uploading your photo!');</script>";
        }
 
}

?>