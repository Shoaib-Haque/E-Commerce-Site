<?php require_once("../resources/config.php");?>
<?php

   $Name = $_POST['search'];

   $query = "select * from products where product_title LIKE '%$Name%' LIMIT 5";
   $result = mysqli_query($connection, $query);
   echo '
<ul>
     ';
     while ($row = mysqli_fetch_array($result)) {
         ?>

     <li onclick='fill("<?php echo $row['product_title']; ?>")'>
     <a>
         <?php echo $row['product_title']; ?>
     </li></a>
   
     <?php
  }
?>
</ul>