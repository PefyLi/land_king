<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
*/ 
header("Content-Type:text/html; charset=utf-8");
require 'PHPMailer-master/PHPMailerAutoload.php';
// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = '這個E-mail帳戶已經註冊過了！';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (first_name, last_name, email, password, hash) " 
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] ='驗證鏈接已發送至'.$email.'，請點擊郵件中的鏈接驗證您的賬戶！';
        // Send registration confirmation link (verify.php)
        $subject = 'Account Verification';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/land-king/login/verify_controller.php?email='.$email.'&hash='.$hash;
        $mail = new PHPMailer();
        $mail ->IsSMTP();
        $mail ->SMTPDebug = 1;
        $mail ->SMTPAuth = true;
        $mail ->SMTPSecure = 'tls';
        $mail ->Host = 'smtp-mail.outlook.com';
        $mail ->Port = 587; // or 587
        $mail ->IsHTML(true);
        $mail ->Username = 'NCUlandpriceking@gmail.com';
        $mail ->Password = 'software04';
        $mail ->SetFrom('NCUlandpriceking@gmail.com');
        $mail ->AddAddress($email,$first_name);
        $mail->Subject = $subject; 
        $mail ->Body = $message_body;
        /*$mail->AltBody = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/login-system/verify.php?email='.$email.'&hash='.$hash; */
        $mail ->send();
        /*$to      = $email;
        $subject = 'Account Verification';
        $from_mail = "confidence551217@gmail.com";
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/login-system/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );*/

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = '註冊失敗！';
        header("location: error.php");
    }

}
