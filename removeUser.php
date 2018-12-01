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
        //script to remove a certain user

            echo "<h1>remove customer ";
            echo $_POST["customername"];
            echo "</h1>";
            $whichCustomer = $_POST["customername"]; //customer ID of the customer picked
// check first if customer id already in db
            $query='DELETE FROM Customer where CustomerID="'.$whichCustomer.'"';
//            $checkCustomerExists = 'SHOW INDEX FROM Customer WHERE CustomerID ="' . $customerID . '"';
//            $checkAgentExists = 'SHOW INDEX FROM Agent WHERE AgentID ="' . $agentID . '"';
            $result = mysqli_query($connection, $query);
            if (!$result) {
                echo '<p>user has purchased products, cannot remove</p>';
            }
            else {
                 echo '<p>deleted customer from db</p>';
            }
            mysqli_close($connection);
        ?>


        <form action="index.php" method="post">
             <input type="submit" value="Go back to homepage">
        </form>

    </body>
</html>