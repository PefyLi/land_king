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
	header("location:login/index.php");}
	elseif($_SESSION['active'] !=1){
	header("location:login/profile.php");
	}
}

?>

<?php 


	$link = mysqli_connect( 
	'localhost',  // MySQL主機名稱 
	'root',       // 使用者名稱 
	'',     // 密碼 
	'land_king');    // 預設使用的資料庫名稱
	mysqli_select_db($link, 'official_land');
	//mysqli_query($link,"set names utf8");
	
	//呼叫R
	if(isset($_POST['n'])) {
        $n = $_POST['n'];
		$area = $_POST['area'];
		
	
        /* $str = '"C:\Program Files\R\R-[版本]\bin\Rscript"' . ' .\[所要執行的 R 檔名].R' ." $[物件]";*/
         $str = '"C:\Program Files\R\R-3.4.0\bin\Rscript"' . ' .\script1.R' . " $area , $n";
        //echo '"C:\Program Files\R\R-3.4.2\bin\Rscript"' . ' .\script1.R' . " $area , $n";
	   /* 以外部指令的方式呼叫 R 進行繪圖 */
        shell_exec($str);        
 
        $nocache = rand();


        }

	
	
	//地價相關資料
	$data = mysqli_query($link,"SELECT * FROM official_land where duan = '$n' order by year DESC ");  
	//echo  "SELECT * FROM official_land where duan = '$n' " ;  
	$rs=mysqli_fetch_row($data);

	
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
					<h1><a href="index.html">桃園地價王</a></h1>
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

					<div class="row" style="margin: -40px 0 0 -20px;">
						<h2>行政區:<?php echo $rs[1];?></h2>
						<h2>地號:<?php echo $rs[2];?></h2>
					</div>


					<div class="row 200%"> 
						<div class="6u 12u$(medium)">
							<div id="content">
								<!-- Content -->
								<article>  
									<iframe width="95%" height="470px" frameborder="0" style="border: 0; " src='http://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&q=<?php echo $rs[1];?>&z=16&output=embed&t='>
								    </iframe>
								</article>
							</div>
						</div>
						<div class="6u 12u$(medium)">
							<div id="content">
								<!-- Sidebar -->
								<article>
									<h3>最新公告現值：</h3>
									<p><h3 style="font-size: 3.35em;
										margin: 0 0 0 1em; color: #C62828;"><?php echo $rs[4];?>萬 元<h3></p>
									</article>
								</div>
							</div>
						</div>  



						<div class="row" style="margin: 40px 0px 0 -25px;">
							<hr align="center" width="100%">
						</div>
						<div class="row">
							<div class="12u 12u$(medium)">
								<div id="tabs">

									<div class="menu-div-top" data-tabs="tabs">
										<ul id="tabs-nav">
											<li><a href="#tab1" class="tab-menu tabs-active">公告地價趨勢</a></li>
											<li><a href="#tab2" class="tab-menu">指標</a></li>
										</ul>
									</div>

									<div class="tab-div">
										<div class="tabs-container">
											<div id="tab1" class="tabs-panel" style="display: block;">
												<?php 
													/* 輸出圖檔 */
													echo("<img src='output/land0.png?$nocache' />"); 
												?>
											</div>
											<div id="tab2" class="tabs-panel">
											<?php
											//指標
													$link1 = mysqli_connect( 
														'localhost',  // MySQL主機名稱 
														'root',       // 使用者名稱 
														'',     // 密碼 
														'land_king');    // 預設使用的資料庫名稱
														mysqli_select_db($link1	, 'official_land');
														$data1 = mysqli_query($link1,"SELECT * FROM pointer where district = $area");  
														//echo "SELECT * FROM pointer where district = '$area'" ;
														$rs1=mysqli_fetch_row($data1);
											
											?>
												 										 
												 學校: <?php echo $rs1[2];?> 間												 												 
												 醫院: <?php echo $rs1[3];?> 間
												 空氣測站: <?php echo $rs1[4];?> 站 
												 
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
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