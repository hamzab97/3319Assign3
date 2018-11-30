<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
    <body>

        <?php
                include 'connectdb.php';
        ?>

        <?php
            $productname = $_POST["productname"]; //customer ID of the customer picked
            echo '<h1>Getting all purchase data for product ';
            echo $productname;
            echo '</h1>';
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
//            while ($row = mysqli_fetch_assoc($result)) {
//                 echo '<p> hoi : ';
//                 echo $row["SUM(Quantity)"];
//                 echo '</p>';
//            }
            mysqli_free_result($result);
        ?>



        <form action="index.php" method="post">
             <input type="submit" value="Go back to homepage">
        </form>

    </body>
</html>