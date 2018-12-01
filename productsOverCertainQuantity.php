<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add new user</title>
</head>
    <body>

        <?php
            include 'connectdb.php';
        ?>
//script to show products bought over a certain quantity
        <?php
            $quantity= $_POST["quantity"]; //get the quantity entered by user
            if (!$quantity){
                echo "<h1> missing information </h1>";
            }
            else{
    // query
                $query='SELECT * FROM Product JOIN BoughtBy ON Product.ProductID = BoughtBy.ProductID AND Quantity>"'.$quantity.'" JOIN Customer ON Customer.CustomerID = BoughtBy.CustomerID';
                //select Customer.FirstName, Product.Description, BoughtBy.Quantity  from Product JOIN BoughtBy ON Product.ProductID = BoughtBy.ProductID
                //and BoughtBy.Quantity > 5 JOIN Customer ON Customer.CustomerID = BoughtBy.CustomerID;
                $result = mysqli_query($connection,$query);
                if (!$result) {
                    die("databases query failed.");
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<h3> ";
                    echo $row["FirstName"]. " ". $row["Description"]. " ". $row["Quantity"];//display
                    //        var_dump($row);
                    //        echo $row;
                    echo "</h3> ";
                }
            }
        ?>


        <form action="index.php" method="post">
             <input type="submit" value="Go back to homepage">
        </form>

    </body>
</html>