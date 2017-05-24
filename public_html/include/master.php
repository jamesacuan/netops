<?php
    session_start();
    if (isset($_SESSION['islogin']) && $_SESSION['islogin']){
    }
    else{
       $_SESSION['userlevel'] = 0;
    }
    include "/header.php";
    include "/nav.php";
    include "/sidebar.php";
    include ($page_content);
?>