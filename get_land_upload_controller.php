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

    if( $_SESSION['logged_in'] != 0 && $_SESSION['active'] !=0) {
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
   
  


  $sql = "INSERT INTO actual_land(member_ID,title, district,duan,land_no,ping,land_info,sale_price) VALUES('$member_ID','$title','$location','$duan','$address','$ping','$description','$price' )";
  echo "INSERT INTO actual_land(member_ID,title, district,duan,land_no,ping,land_info,sale_price) VALUES('$member_ID','$title','$location','$duan','$address','$ping','$description','$price' )";
  $mysqli->query($sql);
  
  

  


  //上傳到的地點(請已"/"結束)
  $upload_path = "images/";

  //可接受的最大檔案大小(單位: bytes)
  //不設代表可以接受任意大小
  $max_size = '';

  /* 上傳程序開始 */

  //檢查是否有錯誤
  if(isset($_FILES['uploadedfile']) && sizeof($_FILES['uploadedfile']) > 0)
 {
   if($_FILES['uploadedfile']['error'] > 0)
  {
  //發生錯誤
  //錯誤代碼資訊可以上php官網看:
  //http://tw.php.net/manual/en/features.file-upload.errors.php
  // echo '上傳錯誤代碼: ' . $_FILES['uploadedfile']['error'] . '<br />';
   exit;
  }

  //是否有限制檔案大小?
  if(($max_size > 0) && ($_FILES['uploadedfile']['size'] > $max_size))
  {
  //檔案過大
   echo '您上傳的檔案大小大於系統可接受的範圍';
   exit;
  }

  //檢查檔案是否已存在
  if(file_exists($upload_path . basename($_FILES['uploadedfile']['name'])))
  {
   echo '檔案已存在';
   exit;
  }

  //檢查目錄是否存在, 不存在的話新增一個
  if(!is_dir($upload_path) && !mkdir($upload_path))
  {
  //目錄不存在, 無法新增資料夾
   echo '系統無法新增資料夾';
   exit;
  }

  //移動已上傳的檔案
  if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $upload_path . basename($_FILES['uploadedfile']['name'])))
  { 
   // echo "檔案名稱:" .$_FILES["uploadedfile"]["name"]."</br>";
    //echo '上傳成功!<br />';
	//echo $upload_path ;
	//echo $_FILES["uploadedfile"]["name"];
	//echo '<br />';
    //echo '點<a href="' . $upload_path . basename($_FILES['uploadedfile']['name']) . '">這裡</a>下載您的檔案';
    $upload_path = "{$upload_path}"."{$_FILES['uploadedfile']['name']}";
	//echo $upload_path ;
      
    //echo $address;  
    $sql2= "UPDATE actual_land SET picture ='$upload_path' WHERE member_ID = {$member_ID} AND land_no = '$address' ; ";
    $mysqli->query($sql2); 
	
  //重定向瀏覽器 
  header("Location: index.php"); 
  //確保重定向後，後續代碼不會被執行 
  exit; 
  }
   

}     

 
 ?>