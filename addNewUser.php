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
            echo "<h1>adding new customer ";
            echo $_POST["customerID"];
            echo "</h1>";
            $customerID = $_POST["customerID"]; //customer ID of the customer picked
            $firstName= $_POST["firstName"];
            $lastName= $_POST["lastName"];
            $phoneNumber= $_POST["phoneNumber"];
            $city= $_POST["city"];
            $agentID= $_POST["agentID"];
    // check first if customer id already in db
            $query='SELECT * FROM Customer where CustomerID="'.$customerID.'"';
//            $checkCustomerExists = 'SHOW INDEX FROM Customer WHERE CustomerID ="' . $customerID . '"';
//            $checkAgentExists = 'SHOW INDEX FROM Agent WHERE AgentID ="' . $agentID . '"';
            if ($result = mysqli_query($connection, $query)){
                //customer already exists in the db
                if(mysqli_num_rows($result)>0){

                    echo "<h1>customer exists ";

                }else{

                    echo "<h1>customer doesnt exist ";

                }
            }
            //check if agent exists
//            if (!$result = mysqli_query($connection, $checkAgentExists)){
//                            //customer already exists in the db
//                echo '<h1>agent doesnt exist</h1>';
//            }
            else{
                $query = 'INSERT INTO Customer VALUES ("'.$customerID.'", "'. $firstName.'", "'.$lastName.'", "'.$city.'", "'.$phoneNumber.'", "'.$agentID.'")';
                $result = mysqli_query($connection,$query);
                if (!$result) {
                    die("databases query failed.");
                }
                while ($row = mysqli_fetch_assoc($result)) {
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