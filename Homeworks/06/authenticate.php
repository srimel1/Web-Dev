<head>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
</head>

<?php
session_start();
//require_once "config.php";

// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'uber';
$DATABASE_NAME = 'Web Programming';
// Try and connect using the info above.
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}


$sql = "SELECT id, username, password FROM accounts";
$result = $conn->query($sql);


// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['username'], $_POST['password'])) {
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param("s", $_POST["username"]);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);

        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
//                echo " password: " .$password;
        if ($_POST['password'] === $password) {

            session_regenerate_id();
            $_SESSION["loggedin"] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;

        } else {
            // Incorrect password
            $test = "123";

                    echo "Incorrect username and/or password!";
        }
    } else {
        // Incorrect username

               echo "Incorrect username and/or password!";
    }


    $stmt->close();

}



// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel="stylesheet" type="text/css">

    <meta charset="utf-8">
    <title>Artists And Albums</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body class="loggedin">
<nav class="navtop">
    <div>
        <h1>Artists And Albums</h1>
        <a href="authenticate.php"><label for="name"><img src="home.png" width="20px" height="20px"/></label>Home</a>
        <a href="profile.php"><label for="name"><img src="user.png" width="20px" height="20px"/></label>Profile</a>
        <a href="logout.php"><label for="name"><img src="log-out.png" width="20px" height="20px"/></label>Logout</a>

    </div>
</nav>

<!--<h3>Welcome back, --><?//= $_SESSION['name'] ?><!--!<br></h3>-->
<div class="content">
    <h2>Add Music</h2>
    <p>
        <button onclick="location.href='add-artist.php';" class="big-button">Add Artist</button>
        <button onclick="location.href='add-album.php';" class="big-button">Add Album</button>
        <button onclick="location.href='search.php';" class="big-button">Search</button>
        <br><br>
     </p>
<!---->

    <h2>See Music</h2>

    <div id="nav" font-size="9px">
        <!--        <button class="big-button" type="button" onclick="location.href='add-artist.php';" value="Go to Google" />-->
        <button onclick="location.href='display-artist.php';" class="big-button">See Artist</button>
        <button onclick="location.href='display-album.php';" class="big-button">See Album</button>
        <button onclick="location.href='search.php';" class="big-button">Search</button>
                <br><br>
            </div>


    </div>


</div>
</body>
</html>


