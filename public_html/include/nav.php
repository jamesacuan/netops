<div class="header">
  <div class="container">
    <div class="left title"><h1><?php echo COMPANY_NAME ?></h1></div>
    <div class="clear"></div>
  </div>
</div>
<div class="nav">
  <div class="container">
   <div class="left">
      <div class="left menu">
        <?php 
        //$count = 0;
        //while($count !=10){

          //  get the maximum menu_id
          //$qry_max = "SELECT max(menu_id) as `highest` FROM `menu`";
          //$stmt  = $con->prepare($qry_max);
          //$stmt->execute();
          //$row = $stmt->fetch(PDO::FETCH_ASSOC);
          //$max = $row['highest'];
          //echo $max;

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

              //check if menu has submenus
                $qry2 = "SELECT * FROM `menu` where `submenu_id`={$menu_id} ORDER BY `order_number`";
                $stmt2  = $con->prepare($qry2);
                $stmt2->execute();
                $num2=$stmt2->rowCount();
                
                // with submenus
                if($num2>0){
                  echo "<li class='dropdown'>";
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
          echo "</ul>";
        ?>
      </div>
    </div>
    <div class="right">Login</div>
    <div class="clear"></div>
    </div>
</div>