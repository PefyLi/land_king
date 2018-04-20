<?php
session_start();
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
                 				 <div class="form">
                 				 <?php  
                  					                   					                					
                  					if($_SESSION['logged_in'] !=0){
                  						$first_name = $_SESSION['first_name'];
   										$last_name = $_SESSION['last_name'];
									    $email = $_SESSION['email'];
									    $active = $_SESSION['active'];
									    $variable = '歡迎，'.$first_name.''.$last_name;
                  						echo "<li>                    
                  							  <h1><a>
                  							  <font color=\"white\">$variable</font></a></h1>
                  							  <li><a href=\"login\logout.php\">登出</a></li>
                  							  </li>";
				  					}
				 					elseif($_SESSION['logged_in'] ==0){
				  						echo "<li><a href=\"login\account.php\">登入/註冊</a></li>";
									}
                  					?>
								</ul>
							</nav>

					</header>
				</div>

			

			<!-- Features -->
				<div id="features-wrapper">
					<div class="container">
						<div class="row">
							<div class="4u 12u(medium)">

								<!-- Box -->
									<section class="box feature">
										<a href="landprice-list.php" class="image featured"><img src="images/pic01.jpg" alt=""  style="width: 80%; padding:20px;"/></a>
										<div class="inner">
											<header>
												<h2>最新地價列表</h2>
											</header>
										</div>
									</section>

							</div>
							<div class="4u 12u(medium)">

								<!-- Box -->
									<section class="box feature">
										<a href="landprice-search.php" class="image featured"><img src="images/pic02.jpg" alt=""  style="width: 80%; padding:20px;"/></a>
										<div class="inner">
											<header>
												<h2>地價查詢</h2>
											</header>
										</div>
									</section>

							</div>
							<div class="4u 12u(medium)">

								<!-- Box -->
									<section class="box feature">
										<a href="sellland-search.php" class="image featured"><img src="images/pic03.jpg" alt=""   style="width: 80%; padding:20px;"/></a>
										<div class="inner">
											<header>
												<h2>土地買賣</h2>
											</header>
										</div>
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
