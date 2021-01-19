
<?php
require_once "config.php";
include "header.php";
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form
    $name = $_POST["name"]; //set PHP variables like this so we can use them anywhere in code below



    $sql = "SELECT * FROM album (name,artist,year,genre) WHERE name='$name'";

    if ($con->query($sql) === TRUE) {
        echo "<center><font color='#ff8b36'>New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

$con->close();
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
<!---->
<!--<nav class="navtop">-->
<!--    <div>-->
<!--        <h1>Artists And Albums User Interface</h1>-->
<!--        <a href="authenticate.php"><label for="name"><img src="home.png" width="20px" height="20px"/></label>Home</a>-->
<!--        <a href="profile.php"><label for="name"><img src="user.png" width="20px" height="20px"/></label>Profile</a>-->
<!--        <a href="logout.php"><label for="name"><img src="log-out.png" width="20px" height="20px"/></label>Logout</a>-->
<!--    </div>-->
<!--</nav>-->


<div class="float-container">
    <div class="float-child">
        <div class="login">
            <h1>Search For Artist</h1>
            <form action="search-artist.php" method="post">
                <label for="password"><img src="dj.png" width="20px" height="20px"/></label>
                <input type="text" name="artist" placeholder="Enter Artist Name" id="artist" required>
                <input type="submit" value="Search" id="submit-artist">
            </form>
        </div>
    </div>
    <div class="float-child">
        <div class="login">
            <h1>Search For Album</h1>
            <form action="search-album.php" method="post">
                <label for="password"><img src="album.png" width="20px" height="20px"/></label>
                <input type="text" name="album" placeholder="Enter Album Name" id="album" required>
                <input type="submit" value="Search" id="submit-album">
            </form>
        </div>
    </div>
</div>


</body>
</html>