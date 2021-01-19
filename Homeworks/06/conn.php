<?php

    $servername='localhost';
    $username='srimel1';
    $password='srimel1';
    $dbname = "srimel1";
    $con=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$con){
          die('Could not Connect MySql Server:' .mysql_error());
      }

$sql = "
CREATE TABLE IF NOT EXISTS accounts (
id INT(10) NOT NULL AUTO_INCREMENT,
firstname VARCHAR(50) NOT NULL,
lastname VARCHAR(100) NOT NULL,
email VARCHAR(100),
primary key (id));
";

if ($con->query($sql) === TRUE) {
    echo "Table accounts created successfully";
} else {
    echo "Error creating table: " . $con->error;
}


$sql = "INSERT INTO `Web Programming`.accounts (id, username,password,email)
     VALUES (DEFAULT, 'ste','ste@ste.com','stestte')";

$sql2 = "INSERT INTO `Web Programming`.accounts (username,password,email)
     VALUES ('ste','ste@ste.com','stestte')";


if (mysqli_query($con, $sql)) {
    echo "New record has been added successfully !";
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($con);
}
//mysqli_close($conn);

$con->close();

?>