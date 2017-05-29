<?php
/*
    require_once("resources/config.php");
    $page_content = "page-index.php";
    include TEMPLATES_PATH . "/master.php";
*/?>

<?php    
    require_once("/resources/config.php");
    session_start();
        if (isset($_SESSION['islogin']) && $_SESSION['islogin']){
    }
    else{
       $_SESSION['userlevel'] = 0;
    }
    include TEMPLATES_PATH . "/header.php";
    include TEMPLATES_PATH . "/nav.php";
?>
<?php 
if (isset($_SESSION['username'])){ 
    echo "<div class=\"body grid\">";
    include TEMPLATES_PATH . "/sidebar.php";
    echo "</div>";
}
else {
    echo "<div class=\"body page\">";
    echo "</div>";
}
?>
<?php
    include TEMPLATES_PATH . "/footer.php";
?>