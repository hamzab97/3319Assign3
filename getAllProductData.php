<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
    <body>
<!--/*
file used fro finding all the data for a given column. the total quantity sold and the total revenue
gets the product name parameter from the input form from index.php

*/ -->
        <?php
                include 'connectdb.php';
        ?>

        <?php
            $productname = $_POST["productname"]; //customer ID of the customer picked
            echo '<h1>Getting all purchase data for product ';
            echo $productname;
            echo '</h1>';

            //query for getting total amoutn purcahsed
            //select * from BoughtBy where BoughtBy.ProductID = (select Product.ProductID from Product where Product.Description = "Socks");
            $query = 'SELECT SUM(Quantity) FROM BoughtBy WHERE BoughtBy.ProductID = (SELECT Product.ProductID FROM Product WHERE Product.Description="' . $productname . '")';
            $result = mysqli_query($connection,$query);
            if (!$result) {
                die("databases query failed.");
            }

            $row = mysqli_fetch_assoc($result);
            echo '<p>total quantity of products purchased ';
            echo $row["SUM(Quantity)"];
            echo '</p>';
            mysqli_free_result($result);

            //query for getting total revenue from sales of that product
            $query = 'SELECT SUM(Quantity * CostPerItem)  FROM BoughtBy, Product WHERE BoughtBy.ProductID = Product.ProductID AND Product.Description ="' . $productname . '"';
            $result = mysqli_query($connection,$query);
            if (!$result) {
                die("databases query failed.");
            }
            $row = mysqli_fetch_assoc($result);
            echo '<p>total revenue from sales: ';
            echo $row["SUM(Quantity * CostPerItem)"];
            echo '</p>';
            mysqli_free_result($result);
            mysqli_close($connection);
        ?>



        <form action="index.php" method="post">
             <input type="submit" value="Go back to homepage">
        </form>

    </body>
</html>