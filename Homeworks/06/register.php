<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = "";
$username_err = $password_err = $confirm_password_err = $email_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM accounts WHERE username = ?";


        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong.<br>";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter a email.";
    } elseif (strlen(trim($_POST["email"])) < 6) {
        $email_err = "Email must have atleast 6 characters.";
    } else {
        $email= trim($_POST["email"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "<br>Password must have atleast 6 characters.<br>";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "<br>Please confirm password.<br>";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "<br>Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
//        $sql = "INSERT INTO accounts (id, username, password, email) VALUES (?, ?, ?, ?)";
        $sql = "INSERT INTO `srimel1`.accounts (username,password,email)
     VALUES ('$username','$password','$email')";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password, $param_email);

            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: index.html");
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

<div class="login">
    <h1>Register</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username"><img src="user.png" width="20px" height="20px"/></label>
        <input type="text" name="username" placeholder="Username" id="username" required value="<?php echo $username; ?>">
        <span class="help-block"><?php echo $username_err; ?></span>
        <label for="password"><img src="key.png" width="20px" height="20px"/></label>
        <input type="password" name="password" placeholder="Password" id="password" required value="<?php echo $password; ?>">
        <span class="help-block"><?php echo $password_err; ?></span>
        <label for="confirm_password"><img src="key.png" width="20px" height="20px"/></label>
        <input type="password" name="confirm_password" placeholder="confirm Password" id="confirm_password" required value="<?php echo $confirm_password; ?>">
        <span class="help-block"><?php echo $confirm_password_err; ?></span>
        <label for="email"><img src="email.png" width="20px" height="20px"/></label>
        <input type="email" name="email" placeholder="email" id="email"  required value="<?php echo $email; ?>">
        <span class="help-block"><?php echo $email_err; ?></span>
        <input type="submit" class="btn btn-primary" value="Sign Up">
    </form>
</div>
<a href="index.html"><h3>Log In</h3></a>




</body>
</html>
