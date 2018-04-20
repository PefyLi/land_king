<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'land_king';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
header("Content-Type:text/html;charset=utf-8");		 

 $member_ID = $_SESSION['member_ID'];
 $actual_land_ID=$_REQUEST['actual_land_ID'];


$sql = "DELETE FROM `actual_land` WHERE actual_land_ID='$actual_land_ID' AND member_ID='$member_ID'" ;
$mysqli->query($sql);

  //重定向瀏覽器 
  header("Location: sellland-manage.php"); 
  //確保重定向後，後續代碼不會被執行 
  exit; 

?>