<?php

/*if (session_status()==PHP_SESSION_NONE){
    session_start();
    $_SESSION['userlevel']='0';
}
else{
    session_start();
}*/
session_start();
    require_once("/resources/config.php");
    include TEMPLATES_PATH . "/header.php";
    include TEMPLATES_PATH . "/nav.php";
    include TEMPLATES_PATH . "/sidebar.php";
?>
<div id="container">
   <div id="content">
      <!-- content -->
   </div>
</div>
<?php include TEMPLATES_PATH . "/footer.php"; ?>