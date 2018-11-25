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
            $customerID = $_POST["customerID"]; //customer ID of the customer picked
            if (!$customerID){
                echo "<h1> missing information </h1>";
            }
            else{
                echo "<h1>deleting customer customer ";
                echo $_POST["customerID"];
                echo "</h1>";
    // check first if customer id already in db
                $query='DELETE * FROM Customer where CustomerID="'.$customerID.'"';
    //            $checkCustomerExists = 'SHOW INDEX FROM Customer WHERE CustomerID ="' . $customerID . '"';
    //            $checkAgentExists = 'SHOW INDEX FROM Agent WHERE AgentID ="' . $agentID . '"';
                $result = mysqli_query($connection, $query)
                if (!$result) {
                    die("databases query failed.");
                }
                else {
                     echo '<p>inserted customer into db</p>';
                }
                mysqli_free_result($result);
            }
        ?>

        <form action="index.php" method="post">
             <input type="submit" value="Go back to homepage">
        </form>

    </body>
</html>