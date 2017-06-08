<?php
  session_start();
  if(isset($_POST['login']))
  {
    if($_POST['login']=="Admin" && $_POST['password']=="qwerty")
    {
      $_SESSION['login'] = true;
      header('Location: adminPanel.php');
    }else {
      $_SESSION['error'] = true;
       header('Location: admin.php');
    }
  }
?>
