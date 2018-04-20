<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'land_king';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
session_start();

// Make sure email and hash variables aren't empty
if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 

    // Make sure user email with matching hash exist
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "您輸入重設密碼的網址是錯誤的！";
        header("location: error.php");
    }
}
else {
    $_SESSION['message'] = "很抱歉，驗證錯誤，請再試一次！";
    header("location: error.php");  
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>重設密碼</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <div class="form">

          <h1>輸入您新的密碼</h1>
          
          <form action="reset_password_controller.php" method="post">
              
          <div class="field-wrap">
            <label>
              新密碼<span class="req">*</span>
            </label>
            <input type="password"required name="newpassword" autocomplete="off"/>
          </div>
              
          <div class="field-wrap">
            <label>
              確認新密碼<span class="req">*</span>
            </label>
            <input type="password"required name="confirmpassword" autocomplete="off"/>
          </div>
          
          <!-- This input field is needed, to get the email of the user -->
          <input type="hidden" name="email" value="<?= $email ?>">    
          <input type="hidden" name="hash" value="<?= $hash ?>">    
              
          <button class="button button-block"/>確定</button>
          
          </form>

    </div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
