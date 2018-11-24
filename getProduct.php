<?php
    $whichCustomer = $_POST["customers"];
    echo $whichCustomer;
//    $query = "SELECT Product.Description, Customer.FirstName FROM Product, BoughtBy, Customer"; //get product data and order it by the product description
//    $result = mysqli_query($connection,$query);
//    if (!$result) {
//        die("databases query failed.");
//    }
//    while ($row = mysqli_fetch_assoc($result)) {
//         echo '<div class="tab-pane" id="$row["Customer.FirstName"]" role="tabpanel">';
//         echo $row;
//         echo '</div>';
//    }
//    mysqli_free_result($result);
?>