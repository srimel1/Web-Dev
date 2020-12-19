<?php
// We need to use sessions, so you should always start sessions using the below code.
$has_session = session_status() == PHP_SESSION_ACTIVE;
if($has_session != 1){
    session_start();
}
include "header.php";
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
//if ($account['activation_code'] == 'activated') {
//    // account is activateda
//    // Display home page etc
//} else {
//    // account is not activated
//    // redirect user or display an error
//}
?>

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



