<?php
					                  /* Displays user information and some useful messages */
session_start();
require 'selland-search_controller.php';
					                  // Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 0 ) {
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
	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="login/profile2.php">桃園地價王</a></h1>
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
												<form name="myForm" method="post" action="">
 												 <select name="location" onChange="renew(this.selectedIndex);">	
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
										 		<select name="duan" >
	                                   				<option value="段小段">段小段</option>
	                                   				
	                                   		    </select>
 												<button class="button button-block" name="search" />查詢</button>
												</form>									
											</section>
										</div>	
										<table width="1500" border="1">
										   <tr>
										    <td >會員編碼</td>
										    <td >標題</td>
										    <td >區域</td>
										    <td >地段</td>
										    <td >地號</td>
										    <td >價格(萬)</td>
										    <td >土地資訊</td>
										   
										  </tr>					  
										<?php 
										if(empty($data)){
											$rs[1] = 'NULL';
                                            $rs[2] = 'NULL';
											$rs[3] = 'NULL';
											$rs[4] = 'NULL';
											$rs[5] = 'NULL';
											$rs[8] = 'NULL';
											$rs[9] = 'NULL';
										}
										else{
										for($i=1;$i<=mysqli_num_rows($data);$i++){
										  	$rs=mysqli_fetch_row($data);																				
										?>
										  <tr >
                                            <form method="post" action="sellland-searchresult.php?p=<?php echo $rs[0] ?>">
                                             <td><?php echo $rs[1]?></td>
                                             <td><?php echo $rs[2]?></td>
										     <td><?php echo $rs[3]?></td>
										     <td><?php echo $rs[4]?></td>
										     <td><?php echo $rs[5]?></td>
										     <td><?php echo $rs[8]?></td>
                                             <input type="hidden"  name=actual_land_ID value="<?php echo $rs[0] ?>">
                                             <input type="hidden"  name=member_ID value="<?php echo $rs[1] ?>">
                                             <input type="hidden"  name=title value="<?php echo $rs[2] ?>">
                                             <input type="hidden"  name=district value="<?php echo $rs[3] ?>">	
                                             <input type="hidden"  name=duan value="<?php echo $rs[4] ?>">
                                             <input type="hidden"  name=land_no value="<?php echo $rs[5] ?>">
                                             <input type="hidden"  name=ping value="<?php echo $rs[6] ?>">
                                             <input type="hidden"  name=picture value="<?php echo $rs[7] ?>">
                                             <input type="hidden"  name=sale_price value="<?php echo $rs[9] ?>">
                                             <input type="hidden"  name=land_info value="<?php echo $rs[8] ?>">					
                                             <td><input  type="submit" name="search_btn" id="search_btn"  value="查詢詳細資訊"></td>      
                                            </form> 
										  </tr>										  
										<?php
											}
										}
										?>
										</table>																	
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