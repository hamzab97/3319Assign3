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
            echo "<h1>showing all products by description ";
            echo "</h1>";
            $whichCustomer = $_POST["customername"]; //customer ID of the customer picked
    //        echo '<h1>hello';
    //        echo $whichCustomer;
    //        echo '</h1>';
            $query = 'SELECT * FROM Product ORDER BY Description';
            $result = mysqli_query($connection,$query);
            if (!$result) {
                die("databases query failed.");
            }
            while ($row = mysqli_fetch_assoc($result)) {
                 echo '<p>hoi ';
                 echo $row["Description"];
                 echo '</p>';
            }
            mysqli_free_result($result);
        ?>

        <form action="index.php" method="post">
             <input type="submit" value="Go back to homepage">
        </form>

    </body>
</html>