<?php
  session_start();
  if(isset($_SESSION['login']))
    header("Location: adminPanel.php");
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
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="style.css" type="text/css"/>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{
      background-image: url('img/login.jpg');
      background-size: 100%;

    }
  </style>

  <script>
    $('document').ready(function(){
      setFormPos();
      setFromSize();

      $(window).resize(function(){
        setFromSize();
        setFormPos();
      })

      function setFormPos()
      {
        var margin = $(window).height()/4;
        $(".login-form").css({
          "margin-top": margin
        })
      }
      function setFromSize()
      {
        var h = $(window).height()/15;
        $("input").css({
          "height": h,
          "font-size": h/2,
          "padding": h/3
        })
        $("label").css({
          "margin-top": h/2,
          "font-size": h/2
        })
        $("button").css({
          "margin-top": h,
          "font-size": h/2
        })
      }
    })
  </script>

</head>
<body>
  <form action="login.php" method="post" class="login-form">
    <label class="login" name="login">Login: </label>
    <input type="text" class="form-control" name="login"/>
    <label class="login" name="password">Password: </label>
    <input type="password" class="form-control" name="password"/>
    <?php
    session_start();
      if(isset($_SESSION['error']))
      {
        echo "<span style='color:red'>Your login or password is incorrect !</span><br /><br />";
        unset($_SESSION['error']);
      }
     ?>

    <button class="btn btn-lg btn-block btn-success">Login</button>
  </form>

</body>
</html>
