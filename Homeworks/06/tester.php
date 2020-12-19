<?php
$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "uber";
$dbName = "Web Programming";

// create connection
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>
<?php
// Include config file


// Define variables and initialize with empty values
$name = $gender = $dob = $genre = "";
$name_err = $gender_err = $dob_err = $genre_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter a name.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM artist WHERE name = ?";


        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);

            // Set parameters
            $param_name = trim($_POST["name"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $name_err = "This artist is already in the database.";
                } else {
                    $name = trim($_POST["name"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Validate genre
    if (empty(trim($_POST["genre"]))) {
        $genre_err = "Please enter a genre.";
    }else {
        $genre= trim($_POST["genre"]);
    }

    // Validate gender
    if (empty(trim($_POST["gender"]))) {
        $gender_err = "Please enter a gender.";
    } else {
        $gender = trim($_POST["gender"]);
    }

    // Validate dob
    if (empty(trim($_POST["dob"]))) {
        $dob_err = "Please enter dob.";
    } else {
        $dob = trim($_POST["dob"]);
        if (empty($dob_err) ) {
            $dob_err = "dob not entered.";
        }
    }

    // Check input errors before inserting in database
    if (empty($name_err) && empty($gender_err) && empty($dob_err)) {


        $sql = "INSERT INTO `Web Programming`.artist (name,gender,dob,genre)
     VALUES ('$name','$gender','$dob','$genre')";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_gender, $param_dob, $param_genre);

            // Set parameters
            $param_name = $name;
            $param_genre = $genre;
            $param_gender = $gender;
            $param_dob = $dob;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: authenticate.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
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


<script>mdc.ripple.MDCRipple.attachTo(document.querySelector('.foo-button'));</script>

<div class="artist">
    <h1>Add Artist</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <label for="username">
            <img src="user.png" width="20px" height="20px"/>
        </label>
        <input type="text" name="name" placeholder="artist" id="name" required value="<?php echo $name; ?>">
        <span class="help-block"><?php echo $name_err; ?></span>

        <label for="password">
            <img src="key.png" width="20px" height="20px"/>
        </label>
        <input type="gender" name="gender" placeholder="gender" id="gender" required value="<?php echo $gender; ?>">
        <span class="help-block"><?php echo $gender_err; ?></span>


        <label for="confirm_password">
            <img src="key.png" width="20px" height="20px"/>
        </label>
        <input type="dob" name="dob" placeholder="dob" id="dob" required value="<?php echo $dob; ?>">
        <span class="help-block"><?php echo $dob_err; ?></span>



        <label for="email">
            <img src="email.png" width="20px" height="20px"/>
        </label>
        <input type="genre" name="genre" placeholder="genre" id="genre"  required value="<?php echo $genre; ?>">
        <span class="help-block"><?php echo $genre_err; ?></span>





        <input type="submit" class="btn btn-primary" value="Sign Up">

        <a href="index.html">Log In</a>
    </form>

</div>



</body>
</html>
