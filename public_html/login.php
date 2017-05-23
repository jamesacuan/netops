<?php    
    require_once("/resources/config.php");
    include TEMPLATES_PATH . "/header.php";
    session_start();
?>
    <div class='loginBackground'></div>
<?php
    $msg = '';
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $query = "SELECT * FROM `user` 
                  WHERE `username`= '" . $_POST['username'] . "' AND `password`= '" . $_POST['password'] . "'";
        $stmt  = $con->prepare($query);
        $stmt->execute();

        $num=$stmt->rowCount();
        if($num>0){
           
        //if ($_POST['username'] == '1234' && 
            //$_POST['password'] == '1234') {
            //$_SESSION['username'] = '1234';
            
            //echo '<script>alert("You have entered valid use name and password")</script>';
            $_SESSION['username'] = $_POST['username'];
            header('Location:index.php');
        }else {
            $msg = 'Wrong username or password';
        }
         echo $query;
        echo $_POST['username'] . " " . $_POST['password'];
    }
?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "post">
    <div class="container">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username">

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password">
        <button type = "submit" name = "login">Login</button>
    </div>
    </form>
</body>
</html>