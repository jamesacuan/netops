<?php
   include 'sidebar.php';
?>

<?php
    $query = "SELECT * FROM `user` WHERE 1";
    $stmt = $con->prepare($query);
    $stmt->execute();

    $num = $stmt->rowCount();
?>

<div class="content">
<div class="toolbar">testing</div>

<?php

if ($num>0){
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        echo "<div class='row'>";
        echo "<div>$username</div>";
        echo "</div>";
    }
}
?>
<?php
if($num>0){
    echo "<table>";
        echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Password</th>";
            echo "<th>Action</th>";
        echo "</tr>";
         
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
             
            echo "<tr>";
                echo "<td>{$user_id}</td>";
                echo "<td>{$username}</td>";
                echo "<td>{$password}</td>";
                echo "<td>asd</td>";
            echo "</tr>";
        }
    echo "</table>";    
}
 
else{
    echo "<div'>No records found.</div>";
}
?>
</div>