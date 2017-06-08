<?php
  session_start();
  if(!isset($_SESSION['login']))
    header("Location: index.php");
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Top facts</title>

	<meta name="description" content="Top and fun facts which you don't know !" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="style.css" type="text/css"/>
  <style>
  body{
    overflow: auto;
  }
  .content{
    margin-left: auto;
    margin-right: auto;
    margin-top: 100px;
    width: 70%;
    background-color: white;
    border-radius: 10px;
    box-sizing: border-box;
    box-shadow: 0px 0px 12px -5px rgba(0,0,0,0.34);
    padding: 50px;
    margin-bottom: 50px;
  }
  h2.title{
    text-align: center;
  }
  button.btn{
    /*margin-left: auto;
    margin-right: auto;
    margin-left: 50%;*/
    width: 300px
  }
  </style>

  <script>
    $("document").ready(function(){
      $("button").css({
        "margin-left": $("form").width()*0.5 - $("button").width()*0.5,
        "margin-top": 40
      })

      $(window).resize(function(){
        $("button").css({
          "margin-left": $("form").width()*0.5 - $("button").width()*0.5
        })
      })
    })
  </script>

</head>
<body>
  <a href="logout.php">Logout</a>
  <div class="content">
    <form action="addCard.php" method="post" enctype="multipart/form-data">
      <h2 class="title" name="text">Add new card</h2>
      <label name="text">Text</label>
      <textarea name="text" class="form-control" style="width: 100%" rows="10"></textarea>
      <label style="margin-top: 20px" name="imgUpl" >Upload image</label>
      <input type="file" name="imgUpl" id="imgUpl">
      <button class="btn btn-lg btn-success">Add to database</button>
    </form>
  </div>
</body>
</html>
