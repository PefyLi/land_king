<?php 

if (isset($_POST['search'])) { //user logging in
    $link = mysqli_connect( 
	'localhost',  // MySQL主機名稱 
	'root',       // 使用者名稱 
	'',     // 密碼 
	'land_king');    // 預設使用的資料庫名稱
	mysqli_select_db($link, 'land_king');
	mysqli_query($link,"set names utf8");
	$location = $_POST['location'];
	$duan = $_POST['duan'];
	$data = mysqli_query($link,"SELECT * FROM actual_land where duan = '$duan' ");  
	//echo  "SELECT * FROM actual_land where duan = '$duan' " ;  
    
    }
?>