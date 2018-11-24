<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<body>

    <?php
        $whichCustomer = $_POST["customername"]; //customer ID of the customer picked
//        echo '<h1>hello';
//        echo $whichCustomer;
//        echo '</h1>';
        $query = "SELECT Product.Description FROM Product JOIN BoughtBy ON Product.ProductID = BoughtBy.ProductID AND whichCustomer = BoughtBy.CustomerID"; //get product data and order it by the product description
        $result = mysqli_query($connection,$query);
        if (!$result) {
            die("databases query failed.");
        }
        while ($row = mysqli_fetch_assoc($result)) {
             echo '<div class="tab-pane" id="$row["Customer.FirstName"]" role="tabpanel">';
             echo $row;
             echo '</div>';
        }
        mysqli_free_result($result);
    ?>

</body>
</html>