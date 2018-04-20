<?php 
/* Main page with two forms: sign up and log in */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'land_king';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
session_start();
$_SESSION['logged_in'] = false;
?>
<!DOCTYPE html>
<html>
<head>
  <title>註冊/登入</title>
  <?php include 'css/css.html'; ?>
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login_controller.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register_controller.php';
        
    }
}
?>
<body>
<script type="text/javascript">
function check() {
  alert("登入成功");
}
</script>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab"><a href="#signup">註冊</a></li>
        <li class="tab active"><a href="#login">登入</a></li>
      </ul>
      
      <div class="tab-content">

         <div id="login">   
          <h1>歡迎回來!</h1>
          
          <form action="account.php" method="post" onsubmit="return check()" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              電子信箱<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              密碼<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>
          
          <p class="forgot"><a href="forgot.php">忘記密碼?</a></p>          
          <button class="button button-block" name="login" />登入</button>
          
          </form>
          <br><a button class="button button-block" href="../index.php" align="center">返回</a></br> 
        </div>

        <div id="signup">   
          <h1>免費註冊</h1>
          
          <form action="account.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                姓<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' />
            </div>
        
            <div class="field-wrap">
              <label>
                名<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              電子信箱<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' />
          </div>
          
          <div class="field-wrap">
            <label>
              設定密碼<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='password'/>
          </div>
          
          <button type="submit" class="button button-block" name="register" />完成</button>
          
          </form>

        </div>  
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
