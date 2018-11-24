<?php
    $query = "SELECT Product.Description FROM Product JOIN BoughtBy ON Product.ProductID = BoughtBy.ProductID JOIN Customer ON Customer.CustomerID = BoughtBy.CustomerID ORDER BY Product.Description"; //get product data and order it by the product description
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
    while ($row = mysqli_fetch_assoc($result)) {
         echo '<div class="tab-pane" id="$row[FirstName]" role="tabpanel">';
         echo $row;
         echo '</div>';
    }
    mysqli_free_result($result);
?>