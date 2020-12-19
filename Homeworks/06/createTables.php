<?php
require_once ("config.php");
//$servername = "localhost";
//$username = "srimel1";
//$password = "srimel1";
//$dbname = "srimel1";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "
CREATE TABLE IF NOT EXISTS accounts (
id INT(10) NOT NULL AUTO_INCREMENT,
username VARCHAR(50) NOT NULL,
password VARCHAR(100) NOT NULL,
email VARCHAR(100),
primary key (id));
";

$sql_album = "
CREATE TABLE IF NOT EXISTS album (
id INT(10) NOT NULL AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
artist VARCHAR(100) NOT NULL,
year VARCHAR(100) NOT NULL,
genre VARCHAR(100),
primary key (id));
";

$sql_artist = "
CREATE TABLE IF NOT EXISTS artist (
id INT(10) NOT NULL AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
gender VARCHAR(100) NOT NULL,
dob VARCHAR(100),
genre VARCHAR(100),
primary key (id));
";


if ($conn->query($sql) === TRUE && $conn->query($sql_album) === TRUE && $conn->query($sql_artist) === TRUE) {
    echo "Table accounts created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
