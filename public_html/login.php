<?php    
    require_once("/resources/config.php");
    include TEMPLATES_PATH . "/header.php";
    session_start();
?>
<div class='body login'>
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
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
               extract($row);
               $_SESSION['username']  = $_POST['username'];
               $_SESSION['userlevel'] = $userlevel_id;
               $_SESSION['islogin']  = "true";
            }
            /*if (isset($_GET['rel'])){
                header('Location:' . $_GET['rel']);
            }
            else{
                header('Location:index.php');
            }*/
            header('Location:index.php');
        }else {
            $msg = 'Wrong username or password';
        }
    }

?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "post">
    <div class="cont">
        <label>Username</label>
        <input type="text" placeholder="Enter Username" name="username">

        <label>Password</label>
        <input type="password" placeholder="Enter Password" name="password">
        <button type = "submit" name = "login">Login</button>
    </div>
    </form>
</div>

</body>
</html>