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

        <?php
            $quantity= $_POST["quantity"];
            if (!$quantity){
                echo "<h1> missing information </h1>";
            }
            else{
    // check first if customer id already in db
                $query='SELECT * FROM Product JOIN BoughtBy ON Product.ProductID = BoughtBy.ProductID AND Quantity>"'.$quantity.'" JOIN Customer ON Customer.CustomerID = BoughtBy.CustomerID';
                //select Customer.FirstName, Product.Description, BoughtBy.Quantity  from Product JOIN BoughtBy ON Product.ProductID = BoughtBy.ProductID
                //and BoughtBy.Quantity > 5 JOIN Customer ON Customer.CustomerID = BoughtBy.CustomerID;

                while ($row = mysqli_fetch_assoc($result)) {
                            echo $row["Customer.FirstName"]. " ". $row["Product.Description"]. " ". $row["BoughtBy.Quantity"];
                    //        var_dump($row);
                    //        echo $row;
                }
            }
        ?>

        <form action="index.php" method="post">
             <input type="submit" value="Go back to homepage">
        </form>

    </body>
</html>