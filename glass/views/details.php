<?php

$glass = new Table_Handler("items");
$glass_arr = $glass->select_record_by_id($glass_id);

?>

<html>

  <h2> <?php echo $glass_arr["product_name"] /*var_dump($glass_arr)*/ ?> </h2>

  <img src="images/<?php echo $glass_arr["Photo"] ?>" alt="">
  
</html>