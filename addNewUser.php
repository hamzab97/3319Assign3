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
            $firstName= $_POST["firstName"];
            $lastName= $_POST["lastName"];
            $phoneNumber= $_POST["phoneNumber"];
            $city= $_POST["city"];
            $agentID= $_POST["agentID"];
            if (!$customerID || !$firstName || !$lastName || !$phoneNumber || !$city || !$agentID){
                echo "<h1> missing information </h1>";
            }
            else{
                echo "<h1>adding new customer ";
                echo $_POST["customerID"];
                echo "</h1>";
    // check first if customer id already in db
                $query='SELECT * FROM Customer where CustomerID="'.$customerID.'"';
    //            $checkCustomerExists = 'SHOW INDEX FROM Customer WHERE CustomerID ="' . $customerID . '"';
    //            $checkAgentExists = 'SHOW INDEX FROM Agent WHERE AgentID ="' . $agentID . '"';
                if ($result = mysqli_query($connection, $query)){
                    //customer already exists in the db
                    if(mysqli_num_rows($result)>0){
                        //check if customer exists
                        echo "<h1>customer exists ";

                    }else{ //if customer doesnt exist, check if agent exists

                        $query='SELECT * FROM Agent where AgentID="'.$agentID.'"';

                        if ($result = mysqli_query($connection, $query)){
                            //customer already exists in the db
                            if(mysqli_num_rows($result)>0){
                                //agent exists, can add customer
                                $query = 'INSERT INTO Customer VALUES ("'.$customerID.'", "'. $firstName.'", "'.$lastName.'", "'.$city.'", "'.$phoneNumber.'", "'.$agentID.'")';
                                $result = mysqli_query($connection,$query);
                                if (!$result) {
                                    echo "<p>databases query failed.</p>";
                                }
                                else {
                                     echo '<p>inserted customer into db</p>';
                                }
                                mysqli_free_result($result);

                            }else{ //agent doesnt exists, cannot add customer

                                echo "<h1>agent doesnt exist</h1>";

                            }
                        }

                    }
                }
            }
        ?>

        <form action="index.php" method="post">
             <input type="submit" value="Go back to homepage">
        </form>

    </body>
</html>