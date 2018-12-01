/*
script used to obtain customer data from the db, along with the phoen numebr and display it on index.php
*/
<?php
//get customer data with phone number from mysql db
    $query = "SELECT FirstName, LastName, CustomerID, PhoneNumber FROM Customer ORDER BY Customer.LastName"; //get all the data from customer table, order it by the lastname
    $result = mysqli_query($connection,$query);
    if (!$result) {
         die("databases query failed.");
    }
    echo '<div class="list-group" id="myList" role="tablist">'; //create list group, iterate and create radio buttons for each result
    while ($row = mysqli_fetch_assoc($result)) {
            echo '<input type="radio" name="customername" value="';
            echo $row["CustomerID"];
            echo '">'. $row["FirstName"]. " " .$row["LastName"]. " ". $row["PhoneNumber"];
    //        var_dump($row);
    //        echo $row;
    }
    echo '</div>';
    mysqli_free_result($result);
?>