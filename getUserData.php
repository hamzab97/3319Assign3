<?php
//get customer data from mysql db
    $query = "SELECT FirstName, LastName, CustomerID FROM Customer ORDER BY Customer.LastName"; //get all the data from customer table, order it by the lastname
    $result = mysqli_query($connection,$query);
    if (!$result) {
         die("databases query failed.");
    }
    echo '<div class="list-group" id="myList" role="tablist">'
    while ($row = mysqli_fetch_assoc($result)) {
            echo '<input type="radio" name="customername" value="';
            echo $row["FirstName"];
            echo '">'. $row["FirstName"]. " " .$row["LastName"];
    //        var_dump($row);
    //        echo $row;
        }
    echo '</div>'
    mysqli_free_result($result);
?>