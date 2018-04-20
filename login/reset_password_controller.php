<?php
/* Password reset process, updates database with new user password */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'land_king';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
session_start();

// Make sure the form is being submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    // Make sure the two passwords match
    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 

        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        
        // We get $_POST['email'] and $_POST['hash'] from the hidden input field of reset.php form
        $email = $mysqli->escape_string($_POST['email']);
        $hash = $mysqli->escape_string($_POST['hash']);
        
        $sql = "UPDATE users SET password='$new_password', hash='$hash' WHERE email='$email'";

        if ( $mysqli->query($sql) ) {

        $_SESSION['message'] = "您的新密碼成功重新設定！";
        header("location: success.php");    

        }

    }
    else {
        $_SESSION['message'] = "兩次輸入的密碼不相符，請再試一次！";
        header("location: error.php");    
    }

}
?>