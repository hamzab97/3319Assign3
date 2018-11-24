<!DOCTYPE html>
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

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h5>Users</h5>
                <div class="list-group" id="myList" role="tablist">
                    <?php
                        include 'getUserData.php';
                    ?>
                </div>
            </div>

            <div class="col-sm">
                <div class="tab-content">
                    <h5>Details</h5>
                    <?php
                        include 'getProduct.php';
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!--insert new customer form-->
        <h5>Submit new user</h5>
        <form>
            <div class="form-group">
                <label for="customerID">Customer ID</label>
                <input type="text" class="form-control" id="customerID" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" placeholder="Enter lastname">
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone number</label>
                <input type="number" class="form-control" id="phoneNumber"  placeholder="Enter phone number">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city"  placeholder="Enter city">
            </div>
            <div class="form-group">
                <label for="agentID">Agent ID</label>
                <input type="text" class="form-control" id="agentID" placeholder="Enter agent ID">
            </div>
            <button type="submit" class="btn btn-primary" id="submitNewUser">Submit</button>
        </form>
    </div>

    <!--insert new product form-->
    <div class="container">
        <!--insert new customer form-->
        <h5>Submit new product</h5>
        <form>
            <div class="form-group">
                <label for="productID">Product ID</label>
                <input type="text" class="form-control" id="productID" placeholder="Enter product ID">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" placeholder="Enter quantity">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description"  placeholder="Enter description">
            </div>
            <div class="form-group">
                <label for="cost">Cost</label>
                <input type="number" class="form-control" id="cost"  placeholder="Enter cost">
            </div>

            <button type="submit" class="btn btn-primary" id="submitNewProduct">Submit</button>
        </form>
    </div>

    <!--bootstrap javascript cdns-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>