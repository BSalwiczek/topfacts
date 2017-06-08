<?php
  session_start();
  if(!isset($_SESSION['login']))
    header("Location: index.php");
  else{
    unset($_SESSION['login']);
    header("Location: admin.php");
  }
?>
