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

<!DOCTYPE html>
<html>
<head>
    <title>See Artists</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap');
        @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700");

        body {
            background-color: #580935;
            font-family: 'Permanent Marker', BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;

        }

        #container {
            margin-top: 20px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            border-radius: 20px;
        }

        table {
            border-collapse: separate;
            border-spacing: 0;

            width: 100%;
            color: #ff8b36;
            border: 3px solid #ff8b36;

            font-size: 25px;

            padding: 15px;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            border: 3px solid #ff8b36;
            border-radius: 20px;
            -moz-border-radius: 5px;

        }

        th {
            border: 3px solid #ff8b36;
            border-radius: 20px;
            -moz-border-radius: 5px;
            background-color: #580935;
            color: #ff8b36;
            padding: 15px;
        }

        tr:nth-child(even) {
            background-color: #94316e;
            border: 3px solid #ff8b36;


        }

        .navtop {
            background-color: #94316e;
            border-radius: 20px;
            height: 60px;
            width: 100%;
            border: 0;
        }

        .navtop div {
            display: flex;
            margin: 0 auto;
            width: 1000px;
            height: 100%;
        }

        .navtop div h1, .navtop div a {
            display: inline-flex;
            align-items: center;
        }

        .navtop div h1 {
            flex: 1;
            font-size: 20pt;
            padding: 0;
            margin: 0;
            color: #ff8b36;
            font-weight: normal;
        }

        .navtop div a {
            font-size: 20pt;
            padding: 0 20px;
            text-decoration: none;
            color: #ff8b36;
            font-weight: bold;
        }

        /*.navtop div a:hover {*/
        /*    padding: 0 20px;*/
        /*    text-decoration: none;*/
        /*    color: #580935;*/
        /*    font-weight: bold;*/
        /*}*/

        .navtop div a i {
            padding: 2px 8px 0 0;
        }

        .navtop div a:hover {
            color: #580935;
        }

    </style>
</head>
<body>
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
<div id="container">
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Genre</th>
        </tr>
        <?php


        // If the user is not logged in redirect to the login page...
        if (!isset($_SESSION['loggedin'])) {
            header('Location: index.html');
            exit;
        }
        $sql = "SELECT id,name, artist,year,genre FROM album";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["artist"] . "</td><td>" . $row["year"] . "</td><td>" . $row["genre"];
            }
            echo "</table></div>";
        } else {
            echo "0 results";
        }
        $con->close();
        ?>
    </table>
</body>
</html>

