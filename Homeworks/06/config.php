<?php
//$dbServerName = "localhost";
//$dbUsername = "root";
//$dbPassword = "uber";
//$dbName = "Web Programming";
//
//// create connection
//$con = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
//
//// check connection
//if ($con->connect_error) {
//    die("Connection failed: " . $con->connect_error);
//}
//

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'uber';
$DATABASE_NAME = 'Web Programming';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}


//$DATABASE_HOST = 'localhost';
//$DATABASE_USER = 'srimel1';
//$DATABASE_PASS = 'srimel1';
//$DATABASE_NAME = 'srimel1';
//// Try and connect using the info above.
//$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
//if (mysqli_connect_errno()) {
//    // If there is an error with the connection, stop the script and display the error.
//    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
//}

?>


