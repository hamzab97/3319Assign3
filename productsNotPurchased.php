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

            echo 'showing all products that have not been purchased';
            $query = 'SELECT * FROM Product WHERE Product.ProductID NOT IN (SELECT BoughtBy.ProductID FROM BoughtBy)';
            $result = mysqli_query($connection,$query);
            if (!$result) {
                die("databases query failed.");
            }
            while ($row = mysqli_fetch_assoc($result)) {
                 echo '<p>';
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