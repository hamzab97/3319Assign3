<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
    <body>
/*
script responsible to obtain all the products purchased by the a customer that the user selects
form in index.php passes the customer ID which is assigned a variable
the variable is used in the query to obtain all the products
*/
        <?php
                include 'connectdb.php';
        ?>

        <?php
            echo "<h1>Products purchased by customer ";
            echo $_POST["customername"];
            echo "</h1>";
            $whichCustomer = $_POST["customername"]; //customer ID of the customer picked
    //        echo '<h1>hello';
    //        echo $whichCustomer;
    //        echo '</h1>';
            $query = 'SELECT * FROM Product JOIN BoughtBy ON Product.ProductID = BoughtBy.ProductID AND BoughtBy.CustomerID ="' . $whichCustomer . '"'; //sql query to get all the products
            $result = mysqli_query($connection,$query);//handle results
            if (!$result) {
                die("databases query failed.");
            }
            while ($row = mysqli_fetch_assoc($result)) {//display each result
                 echo '<p>';
                 echo $row["Description"];
                 echo '</p>';
            }
            mysqli_free_result($result);
        ?>


        <form action="index.php" method="post">//form to redirect to previous page
             <input type="submit" value="Go back to homepage">
        </form>

    </body>
</html>