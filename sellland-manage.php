<?php
					                  /* Displays user information and some useful messages */
session_start();

					                  // Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 0 && $_SESSION['active'] !=0) {
						                  // Makes it easier to read
	$first_name = $_SESSION['first_name'];
	$last_name = $_SESSION['last_name'];
	$email = $_SESSION['email'];
	$active = $_SESSION['active'];
	$variable = '歡迎，'.$first_name.''.$last_name;
	}
 else{
 	if($_SESSION['logged_in'] != 1){
	header("location:login/account.php");}
	elseif($_SESSION['active'] !=1){
	header("location:login/profile.php");
	}
	}

  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'land_king';
  $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
  header("Content-Type:text/html;charset=utf-8");	
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $member_ID=$_SESSION['member_ID'];
    $introduction=$_SESSION['introduction']; 

?>
<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>桃園地價王</title>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
	  
	 <script>
     function myFunction()
     {
      alert("刪除成功！");
     }
     </script>
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="index.php">桃園地價王</a></h1>
								<!-- <span>by HTML5 UP</span>-->
							</div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="index.php">首頁</a></li>
									<li><a href="landprice-list.php">最新地價列表</a></li>
									<li><a href="landprice-search.php">地價查詢</a></li>
									<li class="current"><a>土地買賣</a>
										<ul>
											<li><a href="sellland-search.php">土地查詢</a></li>
											<li><a href="sellland-upload.php">土地上傳</a></li>
											<li><a href="sellland-manage.php">土地管理</a></li>
										</ul>
									</li>
									<li><?php echo "<font color=\"white\">$variable</font>" ?>
                  					<li><a href="login/logout.php">登出</a></li>	

								</ul>
							</nav>

					</header>
				</div>

			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div class="row">
							<div class="8u 12u(medium) important(medium)">
							<!-- Content -->
								<div id="content">
									<div class="row">
										<div class="4u 12u(medium)">
											<section class="box feature">
											  <?php
                                                $query = " SELECT actual_land_ID,title,district,duan,land_no,ping,land_info,sale_price,picture FROM actual_land where member_ID = {$member_ID} ORDER BY actual_land_ID DESC";
	                                            $data = $mysqli->query($query);
	                                            while($row = mysqli_fetch_array($data)){ 
                                              ?>
												<fieldset style="width: 250; height: 100">
                                                <div align="left">
                                                <img src="<?php echo $row['picture'] ?>" style="width:350px"> <br></div>
                                                <div align="left"><font style="background-color:#9999FF"><b>標題：</b></font>
                                                <?php echo $row['title'] ?><br></div>
		                                        <div align="left"><font style="background-color:#CCFFFF "><b>區：</b></font>
                                                <?php echo $row['district'] ?> <br></div>
		                                        <div align="left"><font style="background-color:#CCFFFF "><b>段：</b></font>
                                                <?php echo $row['duan'] ?> <br></div>
                                                <div align="left"><font style="background-color:#CCFFFF "><b>地號：</b></font>
                                                <?php echo $row['land_no'] ?> <br> </div>   
                                                <div align="left"><font style="background-color:#CCFFFF "><b>坪數：</b></font>
                                                <?php echo $row['ping'] ?>坪 <br> </div>
                                                <div align="left"><font style="background-color:#CCFFFF "><b>土地介紹：</b></font>
                                                <?php echo $row['land_info'] ?> <br></div>
                                                <div align="left"><font style="background-color:#CCFFFF "><b>售價：</b></font>
                                                <?php echo $row['sale_price'] ?>萬 <br></div>
                                                
                                                <div >
                                                <form style="float:left" name="upd_form" method="post" action="update_land.php?p=<?php echo $row['actual_land_ID']; ?>" >
                                                 <input type="hidden"  name=actual_land_ID value="<?php echo $row['actual_land_ID'] ?>">	
                                                 <input class="w3-btn  w3-right w3-theme-d3" type="submit" name="upt_btn" id="upt_btn" value="更新資料">&nbsp;  &nbsp;   &nbsp;  
                                                </form>
                                                
                                               
                                                <form style="float:left" name="dele_form" method="post" action="delete_land_controller.php?p=<?php echo $row['actual_land_ID']; ?>" >
                                                 <input type="hidden"  name=actual_land_ID value="<?php echo $row['actual_land_ID'] ?>">	
                                                 <input class="w3-btn  w3-right w3-theme-d3" type="submit" name="dele_btn" id="dele_btn" onclick="myFunction()" value="刪除">                             

                                                </form> 
                                              </div>
                                          </fieldset>
                                          <br>
                                          <?php 
	                                         }
                                            ?>
											 
											</section>
                                           
										</div>
										
										
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">
							<div class="12u">
								<div id="copyright">
									<ul class="menu">
										<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
									</ul>
								</div>
							</div>
						</div>
					</footer>
				</div>

			</div>

		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>