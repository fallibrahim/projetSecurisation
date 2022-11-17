<?php
  session_start();
  session_destroy();
  header('location:loginPage.php?login=disconnect'); 
?>