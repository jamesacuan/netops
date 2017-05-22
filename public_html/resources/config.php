<?php
// define constants
define("TEMPLATES_PATH", "../public_html/include");
define("TEMPLATE_DIR", "../public_html");
define("COMPANY_NAME", "Company Corp.");

// database
$host = "localhost";
$db_name = "db_netops";
$username = "root";
$password = "";
 
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
 
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>