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
	$member_ID=$_SESSION['member_ID'];
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
	
	<script type="text/javascript">
    
	 function check() {
         if ( document.forms[0].elements[0].value == "" ) {
                alert("請點選土地位置！");
                document.forms[0].elements[0].focus();
         }else if( document.forms[0].elements[1].value == "" ) {
                alert("請點選土地位置！");
                document.forms[0].elements[1].focus();
         } 
		 else  
         {
			    alert("上傳成功");
                return true;
        }
        return false;
 
}

	</script>
	<script type="text/javascript">
	department=new Array();
	department[0]=["八角店段", "八角段", "三元段", "三聖段", "大有段", "大林段", "大樹林段", "大興段", "大檜溪段", "小檜溪段", "中山段", "中平段", "中正段", "中埔段", "中路一段", "中路二段", "中路三段", "中路五段", "中路段", "中德段", "介壽段", "水汴頭段", "水汴頭段下埔子小段", "水汴頭段小段", "永安段", "玉山段", "皮寮段", "同安段", "同德段", "成功段", "有恒段", "江南段", "西門段", "西埔段", "汴洲段", "和平段", "延平段", "延壽段", "忠義段", "昆民段"];	
	department[1]=["三層段八結小段", "三層段十三分小段"];	
	department[2]=["三民段", "三座屋段三座屋小段","三層段舊社小段","上嶺段"];			
	department[3]=["二重溪段", "三湖段", "上四湖段", "上田心子段田心子小段", "上田段"];	
	department[4]=["八股段", "上竹段", "上興段", "大竹段"];
	department[5]=["大牛稠段大牛稠小段", "大牛稠段倒厝子小段","大園段","中正段"];	
	department[6]=["下湖段", "大同段", "大埔段", "大崗段", "山頂段", "山福段", "山德段"];		
	department[7]=["八塊段", "力行段", "下庄子段", "大仁段", "大安段", "大庄段", "大成段"];		
	department[8]=["九座段", "九座寮段","九龍段","八張犁段","八德段","十一份段","三元段"];		
	department[9]=["三崇段", "三興段", "山子頂段", "中央段", "中庸段", "中興段", "六和段"];	
	department[10]=["九斗段", "十五間段十五間小段",, "十五間段十五間尾小段","上青埔段",];	
	department[11]=["三座屋段三座屋小段", "三座屋段新興小段", "三座屋橫圳頂小段", "上大段", "上大堀段", "下大堀段"];	
	department[12]=["三光段", "大曼段", "夫婦山段", "巴陵段", "水流東段", "卡拉段", "卡普段", "四稜段", "石牛段"];	
	function renew(index){
		for(var i=0;i<department[index].length;i++)
			   document.myForm.duan.options[i]=new Option(department[index][i], department[index][i]);	// 設定新選項
			   document.myForm.duan.length=department[index].length;	// 刪除多餘的選項
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
										<form name="myForm" enctype="multipart/form-data" method="post" action="get_land_upload_controller.php" onsubmit="return check()">
											<b>土地位置：</b><br/>
											<div class="row">
												<div class="4u 12u(medium)">
													<section class="box feature">
														<!--class="update" 注意!如果有上傳檔案的動作,表單要改成multipart/form-data格式!-->
														<select name="Location" onChange="renew(this.selectedIndex);">
														    <option value="00">行政區</option>
															<option value="桃園區">桃園區</option>
															<option value="大溪區">大溪區</option>
															<option value="中壢區">中壢區</option>
															<option value="楊梅區">楊梅區</option>
															<option value="蘆竹區">蘆竹區</option>
															<option value="大園區">大園區</option>
															<option value="龜山區">龜山區</option>
															<option value="八德區">八德區</option>
															<option value="龍潭區">龍潭區</option>
															<option value="平鎮區">平鎮區</option>
															<option value="新屋區">新屋區</option>
															<option value="觀音區">觀音區</option>
															<option value="復興區">復興區</option>

														</select>
													</section>
												</div>
												<div class="4u 12u(medium)">
													<section class="box feature">
														<div>
															<select name="duan" ><option value="" ></select>
														</div>	
													</section>
												</div>
											</div>
											<div class="row">
												<div class="5u 12u(medium)">
													<b>地號 :</b> <input type="text" name="address" required/><br><br> 
												</div>
											</div>
											<div class="row">
												<div class="5u 12u(medium)" style="margin: -70px 0px 0px 0px;">
													<b>標題(最長30字) :</b> <input type="text" name="title" size="30" maxlength="30" required/><br><br> 
												</div>
											</div>
											<div class="row">
												<div class="5u 12u(medium)" style="margin: -70px 0px 0px 0px;">
													<b>價格（以萬為單位）:<input type="text" name="price"  required/></b><br><br> 
												</div>
											</div>
											<div class="row">
												<div class="5u 12u(medium)" style="margin: -70px 0px 0px 0px;">
													<b>坪數 :<input type="text" name="ping" required/></b><br><br> 
												</div>
											</div>
											<div class="row">
												<div class="9u 12u(medium)" style="margin: -70px 0px 0px 0px;">
													<b>土地介紹 :</b>
													<textarea cols="50" rows="3" name="description" maxlength="30" required/></textarea>
												</div>
											</div>
											<div class="row">
												<div class="5u 12u(medium)" style="margin: 0px 0px 0px 0px;">
													<b>上傳圖片 :<input type="file" name="uploadedfile" required/></b><br>
												</div>
											</div>
											<div class="row" style="margin: 0px 0px 80px 0px;">
												<div class="4u 12u(medium)" style="margin: 0px 0px 80px 0px;position: absolute; right: 0;">
													<input type="submit" name="button" id="button" value="確認上傳" >
												</div>
											</div>
										</form>
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