<?php
require_once "register.php";
require_once "config.php";
session_start();

$username = $password = $confirm_password = "";

$usernameError = $passwordError = $confirm_passwordError = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(empty(trim($_POST["username"]))){

        $usernameError = "Username cannot be blank";

    } elseif(strlen(trim($_POST["username"])) > 16){

        $usernameError = "Username cannot be greater than 16 characters.";

    }else{
        
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $p_username);
            
            $p_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
            
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                
                    $usernameError = "This username is already taken.";
                
                } else{
                
                    $username = trim($_POST["username"]);
                    
                }
            } else{
                
                echo "An error occurred!";
            
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    if(empty(trim($_POST["password"]))){
    
        $passwordError = "Please enter a password.";
    
    } elseif(strlen(trim($_POST["password"])) < 4){
    
        $passwordError = "Password must have atleast 4 characters.";
    
    } else{
    
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
    
        $confirm_passwordError = "Please confirm your password.";   
    
    } else{
    
        $confirm_password = trim($_POST["confirm_password"]);
    
        if(empty($passwordError) && ($password != $confirm_password)){
    
            $confirm_passwordError = "Your password did not match.";
    
        }
    }
    
    if(empty($usernameError) && empty($passwordError) && empty($confirm_passwordError)){
        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "ss", $p_username, $p_password);
            
            $p_username = $username;
        
            $p_password = password_hash($password, PASSWORD_DEFAULT);
            
            if(mysqli_stmt_execute($stmt)){

                header("location: login.php?created=1");
    
            } else{
                
                echo "An error occurred";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
}
?>