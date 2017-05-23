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
        $query = "SELECT * FROM `menu`";
        $stmt  = $con->prepare($query);
        $stmt->execute();

        $num=$stmt->rowCount();
        echo "<ul>";
        if($num>0){
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
              echo "<li><a href='{$url}'>{$name}</a></li>";
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