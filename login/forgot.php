<?php 
/* Reset your password form, sends reset.php password link */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'land_king';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
require 'PHPMailer-master/PHPMailerAutoload.php';
session_start();

// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 ) // User doesn't exist
    { 
        $_SESSION['message'] = "該電子郵件用戶不存在！";
        header("location: error.php");
    }
    else { // User exists (num_rows != 0)

        $user = $result->fetch_assoc(); // $user becomes array with user data
        
        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

        // Session message to display on success.php
        $_SESSION['message'] = "<p>請查看你的信箱 <span>$email</span>"
        . " ，點擊連結完成您的密碼重置！</p>";

        // Send registration confirmation link (reset.php)
        $subject = 'Password Reset Link';
        $message_body = '
        Hello '.$first_name.',

        You have requested password reset!

        Please click this link to reset your password:

        http://localhost/land-king/login/reset.php?email='.$email.'&hash='.$hash; 
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
        $mail ->send();
        header("location: success.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>重設密碼</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    
  <div class="form">

    <h1>重設密碼</h1>

    <form action="forgot.php" method="post">
     <div class="field-wrap">
      <label>
        電子信箱<span class="req">*</span>
      </label>
      <input type="email"required autocomplete="off" name="email"/>
    </div>
    <button class="button button-block"/>確認</button>
    </form>
  </div>
          
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>

</html>
