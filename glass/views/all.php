<?php
$glass = new Table_Handler("items");

$glassse_array = $glass->select_records($first_rec);

?>


<html>

<body>
  <table>
    <thead>
      <th>
        Name
      </th>

      <th>
        code
      </th>

      <th>
        image
      </th>

      <th>
        price
      </th>

      <th>
        actions
      </th>
    </thead>

    <?php foreach($glassse_array as $glass){ ?>
      <tr>
        <td>
          <?php echo $glass["product_name"]; ?>
        </td>
        <td>
          <?php echo $glass["PRODUCT_code"]; ?>
        </td>
        <td>
          <?php echo $glass["Photo"]; ?>
        </td>
        <td>
          <?php echo $glass["list_price"]; ?>
        </td>
        <td>
          <a href="details.php?id=<?php echo $glass['id']; ?>">more</a>
        </td>
      </tr>
    <?php } ?>

  </table>

  <h5> <a href="<?php echo $prev ?>"> << prev</a> | <a href="<?php echo $next ?>"> next >> </a> </h5>

</body>

</html>