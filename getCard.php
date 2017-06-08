<?php

  require_once("db_connect.php");

	//session_start();

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

	$sql="SELECT * FROM facts ORDER BY RAND() LIMIT 1";

	if($result = $connect->query($sql))
	{
		$numberOfFormulas = $result->num_rows;
		if($numberOfFormulas > 0)
		{
				$row=$result->fetch_assoc();
        $text = $row['text'];
        $img = $row['img'];
        echo '<div class="card"><div class="imgCont"><img class="cardImg" src="img/'.$img.'"></div><p class="cardDesc">'.$text.'</p><button class="next" >Next</button></div>';
		}

	}else
		exit();
	$connect->close();

?>
