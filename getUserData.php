<?php
//get customer data from mysql db
    $query = "SELECT FirstName, LastName FROM Customer ORDER BY Customer.LastName"; //get all the data from customer table, order it by the lastname
    $result = mysqli_query($connection,$query);
    if (!$result) {
         die("databases query failed.");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<a class=list-group-item list-group-item-action data-toggle=list href=#home role=tab>";
        echo $row["FirstName"];
        echo "</a>";
//        var_dump($row);
//        echo $row;
    }
    mysqli_free_result($result);
?>