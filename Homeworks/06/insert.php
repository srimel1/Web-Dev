<?php
//include("config.php");
//
//if (isset($_POST['submit'])) {
//    $name = $_POST['name'];
//    $gender = $_POST['gender'];
//    $dob = $_POST['dob'];
//    $genre = $_POST['genre'];
//    echo $name."<br>";
//    echo $gender."<br>";
//    echo $dob."<br>";
//    echo $genre."<br>";
//
////    $sql = "INSERT INTO `artist` (artist, gender, dob, genre)
////     VALUES ('$artist','$gender','$dob', '$genre')";
//
//    $sql = "INSERT INTO `srimel1`.artist (name,gender,dob, genre)
//     VALUES ('$name','$gender','$dob', '$genre')";
//
//
//    if (mysqli_query($conn, $sql)) {
//        echo "New record has been added successfully !";
//    } else {
//        echo "Error: " . $sql . ":-" . mysqli_error($conn);
//    }
//    mysqli_close($conn);
//}
//?>

<?php
$servername = "localhost";
$username = "root";
$password = "uber";
$dbname = "Web Programming";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form
    $name = $_POST["name"]; //set PHP variables like this so we can use them anywhere in code below
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $genre = $_POST["genre"];


    $sql = "INSERT INTO artist (name, gender, dob, genre)
VALUES ('$name', '$gender', '$dob', '$genre')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


