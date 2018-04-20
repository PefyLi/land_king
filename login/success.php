<?php
/* Displays all successful messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>建立成功</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
<div class="form">
    <h1><?= '建立成功'; ?></h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message'];    
    else:
        header( "location: account.php" );
    endif;
    ?>
    </p>
    <a href="account.php"><button class="button button-block"/>返回</button></a>
</div>
</body>
</html>
