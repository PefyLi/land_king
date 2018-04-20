<?php
require "landprice-list_controller.php";
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
						<?php  
                  			session_start();               					                					
                  			if($_SESSION['logged_in'] !=0){
                  			$first_name = $_SESSION['first_name'];
   							$last_name = $_SESSION['last_name'];
							$email = $_SESSION['email'];
							$active = $_SESSION['active'];
							$variable = '歡迎，'.$first_name.''.$last_name;
                  			echo "<li><a href=\"index.php\">首頁</a></li>
							<li class=\"current\"><a href=\"landprice-list.php\">最新地價列表</a></li>  
							<li><a href=\"landprice-search.php\">地價查詢</a></li>
							<li><a>土地買賣</a>
							<ul>
							<li><a href=\"sellland-search.php\">土地查詢</a></li>
							<li><a href=\"sellland-upload.php\">土地上傳</a></li>
							<li><a href=\"sellland-manage.php\">土地管理</a></li>
							</ul>
							</li>
                  			<li><font color=\"white\">$variable</font></a></h1>
                  			<li><a href=\"login\logout.php\">登出</a></li></li>";
							}
							elseif($_SESSION['logged_in'] ==0){
							echo "<li><a href=\"index.php\">首頁</a></li>
							<li class=\"current\"><a href=\"landprice-list.php\">最新地價列表</a></li>
							<li><a href=\"landprice-search.php\">地價查詢</a></li>
							<li><a>土地買賣</a>
							<ul>
							<li><a href=\"sellland-search.php\">土地查詢</a></li>
							<li><a href=\"sellland-upload.php\">土地上傳</a></li>
							<li><a href=\"sellland-manage.php\">土地管理</a></li>
							</ul>
							</li> 
							<li><a href=\"login\account.php\">註冊/登入</a></li>"; 
							}
						?>
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
							<form id="districtform" name = "district" method="post" autocomplete="off">
								<div class="row">
									<div class="4u 12u(medium)">
										<section class="box feature">
											<select name="district">	
												<option value="A">行政區</option>
													 <Option Value="'Daxi'">大溪區</Option>
													 <Option Value="'Zhongli'">中壢區 </Option>
													 <Option Value="'Yangmei'">楊梅區 </Option>
													 <Option Value="'Luzhu'">蘆竹區 </Option>
													 <Option Value="">桃園區 </Option>
													 <Option Value="''">平鎮區 </Option>
													 <Option Value="''">龍潭區 </Option>
													 <Option Value="''">新屋區 </Option>
													 <Option Value="''">觀音區 </Option>
													 <Option Value="''">龜山區 </Option>
													 <Option Value="''">八德區 </Option>
													 <Option Value="''">復興區 </Option>
													 <Option Value="'Dayuan'">大園區 </Option>
											</select>
										</section>
									</div>
									<div class="4u 12u(medium)">
										<section>
											<button class="button button-block" name="search" >查詢</button>
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
							<table class="result">
								<tr>
									<th>編號</th>
									<th>區域</th>
									<th>地段</th>
									<th>年分</th>
									<th>價格(萬)</th>
									
								</tr>
								<?php 
								if(empty($data)){
									$rs[0] = 'NULL';
									$rs[1] = 'NULL';
									$rs[2] = 'NULL';
									$rs[3] = 'NULL';
									$rs[4] = 'NULL';
									
								}
								else{
									for($i=1;$i<=mysqli_num_rows($data);$i++){
										$rs=mysqli_fetch_row($data);																				
										?>
										<tr>
											<td><?php echo $rs[0]?></td>
											<td><?php echo $rs[1]?></td>
											<td><?php echo $rs[2]?></td>
											<td><?php echo $rs[3]?></td>
											<td><?php echo $rs[4]?></td>
											
										</tr>					  
										<?php
									}
								}
								?>
							</table>
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