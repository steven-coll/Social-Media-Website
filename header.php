<!DOCTYPE html>
<html lang="en">
<head>



</head>

<body>    

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav row">
        <li><a href="index.php">Home</a></li>
       
        <li><a href="upload.php">Upload</a></li>
        <li><a href="about.php">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
   <?php                             session_start();
 if  ($_SESSION["loggedin"]) { ?>
            <li><a href="logout.php" title="">Logout</a></li>             
        <?php } else { ?>
            <li><a href="register.php" title="">Register</a></li>
            <li><a href="login.php" title="">Login</a></li>   

        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
    </body>
</html>