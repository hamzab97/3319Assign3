<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<body>

    <?php
        echo "<h1>Products purchased by customer ";
        echo $_POST["customername"];
        echo "</h1>";
        $whichCustomer = $_POST["customername"]; //customer ID of the customer picked
//        echo '<h1>hello';
//        echo $whichCustomer;
//        echo '</h1>';
        $query = "SELECT Product.Description FROM Product JOIN BoughtBy ON Product.ProductID = BoughtBy.ProductID AND BoughtBy.CustomerID = whichCustomer"; //get product data and order it by the product description
        $result = mysqli_query($connection,$query);
        if (!$result) {
            die("databases query failed.");
        }
        while ($row = mysqli_fetch_assoc($result)) {
             echo '<p>';
             echo $row;
             echo '</p>';
        }
        mysqli_free_result($result);
    ?>

</body>
</html>