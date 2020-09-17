
<?php

session_start();
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    
    header("location: greetings.php");
    
    exit;
}

 

require_once "config.php";

require_once "login.php";

$username = $password = "";

$usernameError = $passwordError = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $usernameError = "Please enter your username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $passwordError = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($usernameError) && empty($passwordError)){

        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
            if(mysqli_stmt_num_rows($stmt) == 1){                    

                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                
                    if(mysqli_stmt_fetch($stmt)){
                    
                        if(password_verify($password, $hashed_password)){
                        
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            header("location: greetings.php");
                        
                        } else{
                            
                            $passwordError = "Wrong Password.";
                        }
                    }
                
                } else{
                
                    $usernameError = "No account found with that username.";
                }
                
            } else{
                
                echo "An error occurred";
            }
        }
        
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
}
?>