<?php
require_once "config.php";
include "header.php";

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
$has_session = session_status() == PHP_SESSION_ACTIVE;
if ($has_session != 1) {
    session_start();
}
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}

?>


<html>
<head>
    <meta charset="utf-8">
    <title>Input Artist</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        h1{
            color:#ff8b36;
        }
        a{
            color:#ff8b36;
        }
        a:hover{
            color: #9b2981;
            text-decoration: none;
            text-align: center;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
<body class="loggedin">
<!--<nav class="navtop">-->
<!--    <div>-->
<!--        <h1>Artists And Albums User Interface</h1>-->
<!--        <a href="authenticate.php">-->
<!--            <label for="name"><img src="home.png" width="20px" height="20px"/></label>-->
<!--            Home</a>-->
<!--        <a href="profile.php">            <label for="name"><img src="user.png" width="20px" height="20px"/></label>-->
<!---->
<!--            Profile</a>-->
<!--        <a href="logout.php">-->
<!--            <label for="name"><img src="log-out.png" width="20px" height="20px"/></label>-->
<!--            Logout</a>-->
<!--    </div>-->
<!--</nav>-->
<h1><?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form
        $name = $_POST["name"]; //set PHP variables like this so we can use them anywhere in code below
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $genre = $_POST["genre"];
        $message=" ";

        $sql = "INSERT INTO artist (name, gender, dob, genre)
VALUES ('$name', '$gender', '$dob', '$genre')";

        if ($conn->query($sql) === TRUE) {
            $message = "New record created successfully";
            echo $message;
        } else {
            $message ="Error: " . $sql . "<br>" . $conn->error;
            echo $message;
        }
    }

    $conn->close();
    ?></h1><br>
<a href="display-artist.php"><h1>View All Records</h1></a>

<div class="art">
    <h1>Input Artist</h1>
    <!--    <form action="insert.php" method="post">-->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <label for="name"><i class="fa fa-user"></i></label>
        <input type="name" name="name" placeholder="name" id="name" required>

        <label for="gender"><i class="fa fa-venus-mars"></i></label>
        <input type="gender" name="gender" placeholder="gender" id="gender" required>

        <label for="dob"><i class="fa fa-birthday-cake"></i></label>
        <input type="dob" name="dob" placeholder="dob" id="dob" required>

        <label for="genre"><i class="fa fa-music"></i></label>
        <input type="genre" name="genre" placeholder="genre" id="genre" required>


        <input type="submit" value="Submit Artist">

    </form>
</div>

</body>
</html>