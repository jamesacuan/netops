<div class="header">
  <div class="container">
    <div class="left title"><a href="index.php"><h1><?php echo COMPANY_NAME ?></h1></a></div>
    <div class="clear"></div>
  </div>
</div>
<div class="nav">
  <div class="container">
   <div class="left">
      <div class="left menu">
        <?php 
          $query = "SELECT * FROM `menu` where `submenu_id`=0 ORDER BY `order_number`";
          $stmt  = $con->prepare($query);
          $stmt->execute();

          $num=$stmt->rowCount();
          echo "<ul>";
          if($num>0){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              extract($row);
              $temp_url = $url;
              $temp_name = $name;
              //echo "<li><a href='{$url}'>{$name}</a></li>";

              if($userlevel_id <= $_SESSION['userlevel']){
                //check if menu has submenus
                  $qry2 = "SELECT * FROM `menu` where `submenu_id`={$menu_id} ORDER BY `order_number`";
                  $stmt2  = $con->prepare($qry2);
                  $stmt2->execute();
                  $num2=$stmt2->rowCount();
                  
                  // with submenus
                  if($num2>0){
                    echo "<li class='dropdown' class='_{$userlevel_id}'>";
                    echo "<a href='{$temp_url}'>{$temp_name}</a>";
                    echo "<div class='dropdown-content'>";
                    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                      extract($row2);
                      echo "<a href='{$url}'>{$name}</a>";
                    }
                    echo "</div>";
                    echo "</li>";
                  }

                  // without submenu
                  else{
                    echo "<li><a href='{$temp_url}'>{$temp_name}</a></li>";
                  }
                }
            }
          }
          echo "</ul>";
        ?>
      </div>
    </div>
    <div class="right">
      <?php
        if (isset($_SESSION['username'])){
          echo "<div class='menu'>";
          echo "<ul>";
          echo "<li class='dropdown'><a href='#'>" . $_SESSION['username'] . '</a>';
          echo "<div class='dropdown-content'>";
          echo "<a href='#'>Change Password</a>";
          echo "<a href='logout.php'>Logout'</a></div></li>";
        }
        else{
          echo "<a href='login.php'>Login</a>";
        }
      ?></div>
    </div>
    <div class="clear"></div>
    </div>
</div>