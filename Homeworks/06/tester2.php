<?php
$servername = "localhost";
$username = "srimel1";
$password = "srimel1";
$dbname = "srimel1";

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


    $sql = "INSERT INTO `srimel1`.artist (name, gender, dob, genre)
VALUES ('$name', '$gender', '$dob', '$genre')";

    if ($conn->query($sql) === TRUE) {
        echo "<center><font color='#ff8b36'>New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


<html>
<head>
    <meta charset="utf-8">
    <title>Input Artist</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>


<nav class="navtop">
    <div>
        <h1>Artists And Albums User Interface</h1>
        <a href="authenticate.php">
            <label for="name"><img src="home.png" width="20px" height="20px"/></label>
            Home</a>
        <a href="profile.php">            <label for="name"><img src="user.png" width="20px" height="20px"/></label>

            Profile</a>
        <a href="logout.php">
            <label for="name"><img src="log-out.png" width="20px" height="20px"/></label>
            Logout</a>
    </div>
</nav>



<div class="art">
    <h1>Input Artist</h1>
<!--    <form action="insert.php" method="post">-->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <label for="name">
            <img src="user.png" width="20px" height="20px"/>
        </label>
        <input type="name" name="name" placeholder="name" id="name" required>

        <label for="gender">
            <img src="key.png" width="20px" height="20px"/>
        </label>
        <input type="gender" name="gender" placeholder="gender" id="gender" required>

        <label for="dob">
            <img src="key.png" width="20px" height="20px"/>
        </label>
        <input type="dob" name="dob" placeholder="dob" id="dob" required>

        <label for="genre">
            <img src="key.png" width="20px" height="20px"/>
        </label>
        <input type="genre" name="genre" placeholder="genre" id="genre" required>


        <input type="submit" value="Submit Artist">

    </form>

</div>
</body>
</html>