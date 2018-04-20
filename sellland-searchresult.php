<?php
					                  /* Displays user information and some useful messages */
session_start();
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'land_king';
  $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
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
	header("location:login/index.php");}
	elseif($_SESSION['active'] !=1){
	header("location:login/profile.php");
	}
}

$actual_land_ID=$_REQUEST['actual_land_ID'];
$member_ID=$_REQUEST['member_ID'];
$district=$_REQUEST['district'];
$duan=$_REQUEST['duan'];
$land_no=$_REQUEST['land_no'];
$sale_price=$_REQUEST['sale_price'];
$land_info=$_REQUEST['land_info'];
$title=$_REQUEST['title'];
$ping=$_REQUEST['ping'];
$picture=$_REQUEST['picture'];

?>
<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
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
					<h1><a href="index.html">桃園地價王</a></h1>
					<!-- <span>by HTML5 UP</span>-->
				</div>

				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li><a href="login/profile2.php">首頁</a></li>
						<li><a href="login/memberlandprice-list.php">最新地價列表</a></li>
						<li><a href="landprice-search.php">地價查詢</a></li>
						<li class="current"><a>土地買賣</a>
							<ul>
								<li><a href="sellland-search.php">土地查詢</a></li>
								<li><a href="sellland-upload.php">土地上傳</a></li>
								<li><a href="sellland-manage.php">土地管理</a></li>
							</ul>
						</li>
						<li><?php echo "<font color=\"white\">$variable</font>" ?><li>
							<li><a href="login/logout.php">登出</a></li>	

						</ul>
					</nav>

			</header>
		</div>

		<!-- Main -->
		<div id="main-wrapper">
			<div class="container">
				<div class="row 300%">
					<div class="9u 12u$(medium)">
						<div class="row" style="margin: -40px 0 0 -20px;">
							<h3><?php echo $district ?></h3>
							<h3><?php echo $duan ?></h3>
							<h3><?php echo $land_no ?></h3>
							<h2><?php echo $title ?></h2>
						</div>


						<div class="row 200%"> 
							<div class="6u 12u$(medium)">
								<div id="content">
									<!-- Content -->
									<article>
										<img width="350px" height="250px" src="<?php echo $picture ?>" >
									</article>
								</div>
							</div>
							<div class="6u 12u$(medium)">
								<div id="content">
									<!-- Sidebar -->
									<article>
										<h4><p>坪數：<?php echo $ping ?>坪</p></h4>
										<h3><p>售價：<?php echo $sale_price ?> 萬元</p></h3>
										
									</article>
								</div>
							</div>
						</div>  
					</div>
					<div class="3u 12u$(medium)">
						<section>
						   <?php  
                            $query = " SELECT * FROM users where member_ID = {$member_ID} ";
	                        $data = $mysqli->query($query);
	                        while($row = mysqli_fetch_array($data)){ 
                           ?>
							<table class="seller"> 
								<tr> 
									<th colspan="2">賣家小檔案</th> 
								</tr> 
								<tr> 
									<td>賣家ID</td> 
									<td><?php echo $member_ID ?></td> 
								</tr> 
								<tr> 
									<td>姓名</td> 
									<td><?php echo $row['first_name'].$row['last_name'] ?></td> 
								</tr> 
								<tr> 
									<td>信箱</td> 
									<td><?php echo $row['email'] ?></td> 
								</tr> 
								
							</table>
							<?php 
	                        }
                           ?>
						</section>
					</div>  
				</div> 




				<div class="row" style="margin: 40px 0px 0 -25px;">
					<hr align="center" width="100%">
				</div>
				<div id="tabs">

						<div class="menu-div-top" data-tabs="tabs">
							<ul id="tabs-nav">
								<li><a href="#tab1" class="tab-menu tabs-active">土地介紹</a></li>
								<li><a href="#tab2" class="tab-menu">地圖導覽</a></li>
							</ul>
						</div>

						<div class="tab-div">
							<div class="tabs-container">
								<div id="tab1" class="tabs-panel" style="display: block;">
									<?php echo $land_info ?>
								</div>
								<div id="tab2" class="tabs-panel" style="text-align: center;">
									<iframe width="95%" height="470px" frameborder="0" style="border: 0; " src='http://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&q=<?php echo $district ?>&z=16&output=embed&t='>
								    </iframe>
								</div>
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
<script>
$(function() {
	$("#tabs-nav a").click(function() {
		$("#tabs-nav a").removeClass("tabs-active");
		$(this).addClass("tabs-active");
		$(".tabs-panel").hide();
		var tab_id = $(this).attr("href");
		$(tab_id).show();
		return false;
	});
});
</script>

</body>
</html>