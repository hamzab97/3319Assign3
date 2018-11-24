<?php
//connect to database file
//code from owl week 7 tutorial videos
    $dbhost = "localhost";
    $dbuser= "root";
    $dbpass = "0000";
    $dbname = "hbana3assign2db";
    $connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
    if (mysqli_connect_errno()) {
         die("database connection failed :" .
         mysqli_connect_error() .
         "(" . mysqli_connect_errno() . ")"
             );
    }
?>