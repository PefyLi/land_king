<?php 
 session_start();
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'land_king';
  $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
  header("Content-Type:text/html;charset=utf-8");		    

    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $member_ID=$_SESSION['member_ID'];
    $introduction=$_SESSION['introduction']; 

   $location = $_REQUEST['Location'];
   $duan = $_REQUEST['duan'];
   $address = $_REQUEST['address'];
   $title = $_REQUEST['title'];
   $price = $_REQUEST['price'];
   $ping = $_REQUEST['ping'];
   $description = $_REQUEST['description'];
   $actual_land_ID=$_REQUEST['actual_land_ID'];
  
  $sql = "UPDATE actual_land SET title ='$title', district='$location',duan='$duan',land_no='$address',ping='$ping',land_info='$description',introduction='$introduction',sale_price='$price' WHERE actual_land_ID='$actual_land_ID' AND member_ID='$member_ID'" ;
  $mysqli->query($sql);
 
  //重定向瀏覽器 
  header("Location: sellland-manage.php"); 
  //確保重定向後，後續代碼不會被執行 
  exit; 

 
 ?>