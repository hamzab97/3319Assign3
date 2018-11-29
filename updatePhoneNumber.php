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
            echo "<h1>update phone number of customer ";
            echo $_POST["customername"];
            echo "old number is: ";
            echo $_POST["phoneNumber"];
            echo "</h1>";
            $whichCustomer = $_POST["customername"]; //customer ID of the customer picked
            $phoneNumber = $_POST["phoneNumber"];
// check first if customer id already in db
            $query='UPDATE Customer SET PhoneNumber="'.$phoneNumber.'" where CustomerID="'.$whichCustomer.'"';
//            $checkCustomerExists = 'SHOW INDEX FROM Customer WHERE CustomerID ="' . $customerID . '"';
//            $checkAgentExists = 'SHOW INDEX FROM Agent WHERE AgentID ="' . $agentID . '"';
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("databases query failed.");
            }
            else {
                 echo '<p>updated number</p>';
            }
            mysqli_close($connection);
        ?>
        <?php
           mysqli_close($connection);
        ?>

        <form action="index.php" method="post">
             <input type="submit" value="Go back to homepage">
        </form>
    </body>
</html>