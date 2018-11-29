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
            $customerID = $_POST["customerID"];
            $productID = $_POST["productID"];
            $quantity= $_POST["quantity"];
            if (!$productID || !$quantity || !$customerID){
                echo "<h1> missing information </h1>";
            }
            else{
    // check first if customer id already in db
                echo '<h1>Submit new product"'. $productID. '" as a purchase for customer "'. $customerID. '" quantity = "'. $quantity. '"</h1>';
                $query='SELECT * FROM Customer where CustomerID="'.$customerID.'"';
    //            $checkCustomerExists = 'SHOW INDEX FROM Customer WHERE CustomerID ="' . $customerID . '"';
    //            $checkAgentExists = 'SHOW INDEX FROM Agent WHERE AgentID ="' . $agentID . '"';
                if ($result = mysqli_query($connection, $query)){
                    //product already exists in the db
                    if(mysqli_num_rows($result)>0){
                        //customer exists
                        //check if customer has bought product before
                        $query='SELECT * FROM BoughtBy where CustomerID="'.$customerID.'" AND ProductID ="'.$productID.'"';
                        if ($result=mysqli_query($connection, $query)){
                            if (mysqli_num_rows($result)>0){
                                //customer has laready purchased product
                                $row = mysqli_fetch_assoc($result); //get the result of the query
                                if ($row["Quantity"] < $quantity){
                                    //update quantity of row
                                    $newAmount = $row["Quantity"] + $quantity; //update the new amount to higher than the amount the user wants now
                                    //update value of row using new amount
                                    //query = update BoughtBy set quantity = newamount where productid = productid and customerid = customerid;
                                    $query = 'UPDATE BoughtBy SET QUANTITY="' . $quantity . '" WHERE ProductID="' . $productID . '" AND CustomerID="' . $customerID. '"';
                                    $result=mysqli_query($connection, $query);
                                    if (!$result) {
                                             die("databases query failed.");
                                    }
                                    echo "<h5>Customer quantity updated</h5>";
                                }
                                else{
                                    echo "<h5>can't decrease customer purchase quantity</h5>";
                                }
                            }
                            else{
                                //customer has not purchased product, add it to the bought by table
                                //new query
                                $query = 'INSERT INTO BoughtBy VALUES("' . $quantity . '","' . $productID . '","' . $customerID. '")';
                                $result=mysqli_query($connection, $query);
                                if (!$result) {
                                        echo "<h5>product doesnt exist</h5>";
                                }
                                else{echo "<h5>Customer purchase inserted</h5>";}

                            }
                        }

                    }else{ //if customer doesnt exist, check if agent exists

                        echo "<h1>customer does not exist";

                    }
                }
            }
        ?>


        <form action="index.php" method="post">
             <input type="submit" value="Go back to homepage">
        </form>

    </body>
</html>