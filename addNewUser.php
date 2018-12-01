<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add new user</title>
</head>
    <body>
<!--/**
file is used when adding a new user to the data base
error checking for all the fields is conducted
the query is made to check whether user already exists in the database
if the user does not exist in the database, the user is then added given all the paramaeters match the required sql fields
**/-->
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
                                $query = 'INSERT INTO Customer VALUES("' . $customerID . '","' . $firstName . '","' . $lastName . '","' . $city . '","' . $phoneNumber . '","' . $agentID . '")';
//                                $query = 'INSERT INTO Customer VALUES ("'.$customerID.'", "'. $firstName.'", "'.$lastName.'", "'.$city.'", "'.$phoneNumber.'", "'.$agentID.'")';
//                                $result = mysqli_query($connection,$query);
//                                echo $result;
                                if (! mysqli_query($connection,$query)) {
                                    die("Error: insert failed" . mysqli_error($connection));
                                }
                                 echo "new customer was added!";
                                 mysqli_close($connection);

                            }else{ //agent doesnt exists, cannot add customer

                                echo "<h1>agent doesnt exist</h1>";

                            }
                        }

                    }
                }
            }
//            mysqli_close($connection);
        ?>


        <form action="index.php" method="post">
             <input type="submit" value="Go back to homepage">
        </form>

    </body>
</html>