<?php
   session_start();
   session_unset();
   $_SESSION['islogin']  = "false";

   header('Location:index.php');
?>