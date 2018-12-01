<!DOCTYPE html>
/*
index.php is the main file display to the user
calls all the other scripts to get, post, put uesr information
*/
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!--add responsiveness-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Hamza Bana - CS3319 Assignment 3</title>
        <!--add bootstrap cdn-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    </head>
    <body>
        <!--include php script to connect to database-->
        <?php
            include 'connectdb.php';
        ?>
        <div class="container-fluid">
            <div class="page-header">
                <h1>Hamza Bana, 250857725 - CS3319 Assignment 3</h1>
            </div>
        </div>

        <div class="container"> //container holds hte information of the user
            <h5>Users</h5>
            <div class="row">
                <div class="col-sm">
                    <h4>View products of the following customers</h4>
                    <form action="getProduct.php" method="post">
                        <?php
                            include 'getUserData.php'; //call php script
                         ?>
                         <button type="submit" class="btn btn-primary" id="getProducts">Get Products</button>
                    </form>
                </div>
                <div class="col-sm">
                    <h4>remove one of the following customers</h4>
                    <form action="removeUser.php" method="post">
                        <?php
                            include 'getUserData.php';
                         ?>
                         <button type="submit" class="btn btn-primary" id="removeCustomer">Remove Customer</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="container"> //container holds the form to intsert new customer information
            <div class="row">
                <div class="col-sm">
                    <!--insert new customer form-->
                    <h5>Submit new user</h5> //fields to geet data
                    <form action="addNewUser.php" method="post">
                        <div class="form-group">
                            <label for="customerID">Customer ID</label>
                            <input type="text" class="form-control" name="customerID" placeholder="Enter customer ID">
                        </div>
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" name="firstName" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" name="lastName" placeholder="Enter lastname">
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone number</label>
                            <input type="number" class="form-control" name="phoneNumber"  placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city"  placeholder="Enter city">
                        </div>
                        <div class="form-group">
                            <label for="agentID">Agent ID</label>
                            <input type="text" class="form-control" name="agentID" placeholder="Enter agent ID">
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitNewUser">Submit</button> //submit button
                    </form>
                </div>

                <div class="col-sm"> //container to update user phone number, calls script that displays user names and current phone numbers and a field that allows user to enter updated number
                    <!--update customer phone number form -->
                    <h5>Update user phone number</h5>
                    <form action="updatePhoneNumber.php" method="post">
                        <?php
                            include 'getUserDataWithPhoneNumber.php';
                         ?>
                         <label for="phoneNumber">New phone number</label>
                         <input type="text" class="form-control" name="phoneNumber" placeholder="New phone number">
                         <button type="submit" class="btn btn-primary" id="updateNumber">Update customer phone number</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="container"> //container that displays ohter user infmration
            <div class="row">
                <div class="col-sm">
                    <h5>Submit new product purchase</h5> //submit new user product purcahses, fields to enter infrmation
                    <form action ="submitNewProduct.php" method="post">
                        <div class="form-group">
                            <label for="customerID">Customer ID</label>
                            <input type="text" class="form-control" name="customerID" placeholder="Enter customer ID">
                        </div>
                        <div class="form-group">
                            <label for="productID">Product ID</label>
                            <input type="text" class="form-control" id="productID" name="productID" placeholder="Enter product ID">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitNewProduct">Submit</button>
                    </form>
                </div>
                <div class="col-sm">
                    <h5>show all products</h5> //button to show all theuser infmration
                    <form action="productsByDescription.php" method="post">
                         <button type="submit" class="btn btn-primary" id="updateNumber">View all products sorted by description</button> //sort products by description
                    </form>
                    <form action="productsByPrice.php" method="post">
                         <button type="submit" class="btn btn-primary" id="updateNumber">View all products sorted by price</button>//sort by price
                    </form>
                    <form action="productsNotPurchased.php" method="post">
                        <button type="submit" class="btn btn-primary" id="updateNumber">View all products that have not been purchased</button>//button to show all products that havent been purcahsed yet
                    </form>
                </div>
            </div>
            <div class="row">//display field and button to allow user to picka number to display products that were purchased ove ra certai amount
                <div class="col-sm">
                    <h5>enter product quantity and show the customers who have purchased more than that quantity</h5>
                    <form action="productsOverCertainQuantity.php" method="post">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
                        <button type="submit" class="btn btn-primary" id="viewQuantity">View all products bought over a certain quantity</button>
                    </form>
                </div>

                <div class="col-sm"> //container to display all hte details of the products for hte user
                    <h5>Choose product to view all details</h5>
                    <form action="getAllProductData.php" method="post">
                        <?php
                            include 'getAllProducts.php';
                         ?>
                         <button type="submit" class="btn btn-primary" id="getProductData">Get Product data</button>
                    </form>
                </div>

            </row>
        </div>

        <!--bootstrap javascript cdns-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    </body>
</html>