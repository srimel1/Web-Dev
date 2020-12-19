<?php
require_once "config.php";
include "header.php";

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
        h1 {
            color: #ff8b36;
        }

        #record {
            position: absolute;
            height: 10%;
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
<h1><?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form
        $name = $_POST["name"]; //set PHP variables like this so we can use them anywhere in code below
        $artist = $_POST["artist"];
        $year = $_POST["year"];
        $genre = $_POST["genre"];


        $sql = "INSERT INTO album (name, artist, year, genre)
VALUES ('$name', '$artist', '$year', '$genre')";

        $message = " ";
        if ($conn->query($sql) === TRUE) {
            $message = "New record created successfully";
            echo $message;
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
            echo $message;
        }
    }

    $conn->close();
    ?></h1><br>
<a href="display-album.php"><h1>View All Records</h1></a>
<div class="alb">
    <h1>Input Album</h1>
    <!--    <form action="insert.php" method="post">-->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name"><img src="user.png" width="20px" height="20px"/></label>
        <input type="name" name="name" placeholder="album name" id="name" required>
        <label for="artist"><img src="gender.png" width="20px" height="20px"/></label>
        <input type="artist" name="artist" placeholder="artist name" id="artist" required>
        <label for="year"><img src="calendar.png" width="20px" height="20px"/></label>
        <input type="year" name="year" placeholder="year released" id="year" required>
        <label for="genre"><img src="dj.png" width="20px" height="20px"/></label>
        <input type="genre" name="genre" placeholder="genre" id="genre" required>
        <input type="submit" value="Submit Album">
    </form>

</div>
<div id="record">

</div>
</body>
</html>