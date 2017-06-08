<?php
  session_start();
  if(!isset($_SESSION['login']))
    header("Location: index.php");


  if(isset($_POST['text']) && !empty($_POST['text'))
  {
    //upload img
    $target_dir = "img/";
    $unix = time();
    $type = exif_imagetype($_FILES['imgUpl']['tmp_name']);
    $typeString = "";
    switch($type){
      case 2:
        $typeString = ".jpg";
        break;
      case 3:
          $typeString = ".png";
          break;
    }

    echo $target_file = $target_dir . $unix . $typeString;

    $check = getimagesize($_FILES["imgUpl"]["tmp_name"]);

    if ($_FILES["imgUpl"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($check != false){
      if (move_uploaded_file($_FILES["imgUpl"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imgUpl"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading file.";
      }
    }else {
      echo "Something doesn't work !";
    }

    require_once('db_connect.php');

    $text = $_POST['text'];
    $filename = $unix . $typeString;
    $now = date("Y-m-d H:i:s");
    $sql = "INSERT INTO `facts` (`id`,`text`,`img`,`views`,`created_at`,`updated_at`) VALUES (null,$text,$filename,0,$now,$now)";

    try
  	{
  			$connect = @new mysqli($host,$db_user,$db_password,$db_name);
  			$connect->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
  			$connect->query("SET CHARSET utf8");

  			if($connect->connect_errno != 0)
  				throw new Exception('Error while connecting to database');
  	}catch(Exception $e)
  	{
  		echo $e->getMessage();
  		die();
  	}

    if($result = $connect->query($sql))
  	{
      echo "ok";
  	}else
  		exit();
  	$connect->close();


  }
 ?>
