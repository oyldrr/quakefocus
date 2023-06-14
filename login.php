<?php
ob_start();

// Initialize the session
session_start();
require_once "config/connection.php";
include_once "header.php";

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) === true) {
    header('location:index.php');
    exit();
}

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter the username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter the password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, uname, pwd FROM users WHERE uname = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header('location:index.php');
                            exit();
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Password is not correct.";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "We couldn't find this username in our records.";
                }
            } else {
                echo "Oops! Something went wrong! Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quake Focus | Login</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap Library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
    <div class="content pt-5">
        <form action="" method="POST" class="w-25 mx-auto text-light">

            <div class="d-flex mt-5">
                <img class="mx-auto pb-3" src="img/logo.png" alt="logo" width="150">
            </div>

            <?php
            // Printing errors
            echo " <p class='text-danger text-center'>" . "$login_err" . "</p>";
            ?>


            <!-- Email input -->
            <div class="form-outline mb-4">
                <input name="username" type="email" id="formUsername" class="form-control" placeholder="Username" />
                <?php
                echo "
                    <p class='text-danger'>" . "$username_err" . "</p> 
                    ";
                ?>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input name="password" type="password" id="formPassword" class="form-control" placeholder="Password" />
                <?php 
                echo "
                <p class='text-danger'>" . "$password_err" . "</p> ";
                ?>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check py-2">
                        <input name="rememberme" class="form-check-input" type="checkbox" value="checked" id="rememberme" checked />
                        <label class="form-check-label" for="rememberme"> Remember me </label>
                    </div>
                </div>
                <div class="col">
                    <!-- Submit button -->
                    <input type="submit" class="btn btn-primary mb-4 w-100" value="Sign in">
                </div>

            </div>
            <div class="text-center">
                <!-- Forgot password and signup link --> 
                <p>Forgot password? <a href="recover-password.php">Reset password</a></p>
                <p>Not a member? <a href="signup.php">Sign up</a></p>

                <!-- Social media icons -->
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <a href="https://www.instagram.com/quakefocus/" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-instagram"></i>
                    </a>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <a href="https://www.linkedin.com/company/quakefocus" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <a href="https://twitter.com/quakefocus" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-twitter"></i>
                    </a>
                </button>
            </div>
        </form>
    </div>
    <?php include_once "footer.php"; ?>
</body>

</html>