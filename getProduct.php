<?php
    $query = "SELECT * FROM Product ORDER BY Product.Description"; //get product data and order it by the product description
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
    while ($row = mysqli_fetch_assoc($result)) {
         var_dump($row);
         echo $row;
    }
    mysqli_free_result($result);
?>