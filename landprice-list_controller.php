<?php 

if (isset($_POST['search'])) { //user logging in
    $link = mysqli_connect( 
	'localhost',  // MySQL主機名稱 
	'root',       // 使用者名稱 
	'',     // 密碼 
	'land_king');    // 預設使用的資料庫名稱
	mysqli_select_db($link, 'official_land');
	mysqli_query($link,"set names utf8");
	$city = $_POST['district'];
	$data = mysqli_query($link,"SELECT * FROM official_land where district = $city ");   
	echo "SELECT * FROM official_land where district = $city ";
    }	
?> 