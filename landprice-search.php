<?php
/* Displays user information and some useful messages */

session_start();

					                  // Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 0) {
						                  // Makes it easier to read
	$first_name = $_SESSION['first_name'];
	$last_name = $_SESSION['last_name'];
	$email = $_SESSION['email'];
	$active = $_SESSION['active'];
	$variable = '歡迎，'.$first_name.''.$last_name;
}
else
	header("location:login/profile.php");

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
	<script type="text/javascript">
    
	 function check() {
         if ( document.forms[0].elements[0].value == "" ) {
                alert("請點選行政區！");
                document.forms[0].elements[0].focus();
         } else  
         {
                return true;
        }
        return false;
 
}

	</script>
	</head>
	<body class="homepage">
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
							<li class="current"><a href="landprice-search.php">地價查詢</a></li>
							<li><a>土地買賣</a>
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
									<div class="4u 12u(medium)">
												<section class="box feature">
													<div>
														<a href="https://www.land.moi.gov.tw/ngis/chhtml/query1.asp">點我查詢土地段名</a>
													</div>	
												</section>
											</div><br>
									<form name="myForm" method="post" action="landprice-searchresult.php" onsubmit="return check()">
										<div class="row">
											<div class="4u 12u(medium)">
												<section class="box feature">	
													<select name="area" >
													 <Option value="">行政區</Option>
													 <Option Value="'Daxi'">大溪區</Option>
													 <Option Value="'Zhongli'">中壢區 </Option>
													 <Option Value="'Yangmei'">楊梅區 </Option>
													 <Option Value="'Luzhu'">蘆竹區 </Option>
													 <Option Value="'Dayuan'">桃園區 </Option>
													 <Option Value="''">平鎮區 </Option>
													 <Option Value="''">龍潭區 </Option>
													 <Option Value="''">新屋區 </Option>
													 <Option Value="''">觀音區 </Option>
													 <Option Value="''">龜山區 </Option>
													 <Option Value="''">八德區 </Option>
													 <Option Value="''">復興區 </Option>
													 <Option Value="''">大園區 </Option>
													</select>
												</section>
											</div>
											
											<div class="4u 12u(medium)">
												<section class="box feature">
													<div>
														<input type='text' name='n' placeholder = "請輸入地段代碼" required/>
													</div>	
												</section>
											</div>
											<div class="4u 12u(medium)">
												<section>
													<button class="button button-block" name="search"  />查詢</button>
												</section>
											</div>
										</div>
									</form>

								</div>
							</div>

						</div>
						
						<div class="row">
							<div class="12u 12u(medium)">
								<section>	
								
									
								</section>
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