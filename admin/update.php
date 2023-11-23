<?php
ob_start();
require_once "config/connection.php";

session_start();


// If its not logged in direct to login page
if (isset($_SESSION["adminLoggedin"]) !== true) {
    header('location:login.php');
    exit();
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_GET['id'];

        if ($_GET['table'] == "users") {
            $fullname = mysqli_real_escape_string($conn, $_POST['update-name']);
            $email = mysqli_real_escape_string($conn, $_POST['update-mail']);
            $pwd = mysqli_real_escape_string($conn, $_POST['update-password']);
            $cpassword = mysqli_real_escape_string($conn, $_POST['update-cpassword']);
            $birthday = mysqli_real_escape_string($conn, $_POST['update-birthday']);
            $country = mysqli_real_escape_string($conn, $_POST['update-country']);
            $province = mysqli_real_escape_string($conn, $_POST['update-province']);
            $city = mysqli_real_escape_string($conn, $_POST['update-city']);
            $phone = mysqli_real_escape_string($conn, $_POST['update-phone']);
            $address = mysqli_real_escape_string($conn, $_POST['update-address']);
            $image = mysqli_real_escape_string($conn, $_POST['update-image']);
            $rank = mysqli_real_escape_string($conn, $_POST['update-rank']);
            $type = mysqli_real_escape_string($conn, $_POST['update-type']);
            $active = mysqli_real_escape_string($conn, $_POST['update-active']);

            $update = "UPDATE `users` SET 
            `uname` = ?, `pwd` = ?, `fullname` = ?, 
            `birthdate` = ?, `country` = ?, `province` = ?, 
            `city` = ?, `phone`= ?, `address` = ?, `user_img` = ?, 
            `rank` = ?, `type` = ?, `active` = ?
            WHERE id = ?";


            if ($stmt = mysqli_prepare($conn, $update)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssssssssssssss", $param_email, $param_password, $param_fullname, $param_birthday, $param_country, $param_province, $param_city, $param_phone, $param_address, $param_image, $param_rank, $param_type, $param_active, $param_id);

                // Set parameters
                $param_email = $email;
                $param_password = password_hash($pwd, PASSWORD_DEFAULT); // Creates a password hash
                $param_fullname = $fullname;
                $param_birthday = $birthday;
                $param_country = $country;
                $param_province = $province;
                $param_city = $city;
                $param_phone = $phone;
                $param_address = $address;
                $param_image = $image;
                $param_rank = $rank;
                $param_type = $type;
                $param_active = $active;
                $param_id = $id;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    header('location: users.php?update=successfull');
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            } else {
                header('location: users.php?mysqliproblem');
            }
        } elseif ($_GET['table'] == "supporters") {
            $name = mysqli_real_escape_string($conn, $_POST['update-name']);
            $message = mysqli_real_escape_string($conn, $_POST['update-message']);
            $amount = mysqli_real_escape_string($conn, $_POST['update-amount']);
            $image = mysqli_real_escape_string($conn, $_POST['update-image']);
            $active = mysqli_real_escape_string($conn, $_POST['update-active']);
            $tag = mysqli_real_escape_string($conn, $_POST['update-tag']);

            $update = "UPDATE `supporters` SET 
            `name` = ?, `message` = ?, `amount` = ?, `image` = ?, `active` = ?, `tag` = ?
            WHERE id = ?";


            if ($stmt = mysqli_prepare($conn, $update)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssssss", $param_name, $param_message, $param_amount, $param_image, $param_active, $param_tag, $param_id);

                // Set parameters
                $param_name = $name;
                $param_message = $message;
                $param_amount = $amount;
                $param_image = $image;
                $param_active = $active;
                $param_tag = $tag;
                $param_id = $id;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    header('location: supporters.php?update=successfull');
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            } else {
                header('location: supporters.php?mysqliproblem');
            }
        } elseif ($_GET['table'] == "supply") {
            $water = mysqli_real_escape_string($conn, $_POST['update-water']);
            $food = mysqli_real_escape_string($conn, $_POST['update-food']);
            $education = mysqli_real_escape_string($conn, $_POST['update-education']);
            $shelter = mysqli_real_escape_string($conn, $_POST['update-shelter']);
            $entered_by = mysqli_real_escape_string($conn, $_POST['update-entered_by']);

            $update = "UPDATE `supply` SET 
            `water` = ?, `food` = ?, `education` = ?, `shelter` = ?, `entered_by` = ?
            WHERE id = ?";


            if ($stmt = mysqli_prepare($conn, $update)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssssss", $param_water, $param_food, $param_education, $param_shelter, $param_entered_by, $param_id);

                // Set parameters
                $param_water = $water;
                $param_food = $food;
                $param_education = $education;
                $param_shelter = $shelter;
                $param_entered_by = $entered_by;
                $param_id = $id;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    header('location: supply.php?update=successfull');
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            } else {
                header('location: supply.php?mysqliproblem');
            }
        } elseif ($_GET['table'] == "newsletter") {
            $email = mysqli_real_escape_string($conn, $_POST['update-email']);
            $active = mysqli_real_escape_string($conn, $_POST['update-active']);

            $update = "UPDATE `newsletter` SET 
            `email` = ?, `active` = ?
            WHERE id = ?";


            if ($stmt = mysqli_prepare($conn, $update)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sss", $param_email, $param_active, $param_id);

                // Set parameters
                $param_email = $email;
                $param_active = $active;
                $param_id = $id;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    header('location: newsletter.php?update=successfull');
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            } else {
                header('location: newsletter.php?mysqliproblem');
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Update - Quakefocus Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <?php
    include_once "sidenav.html";
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="content py-5 d-flex justify-content-center">
                <form action="" method="POST" class="w-50 text-light">
                    <?php
                    $id = $_GET['id'];

                    if ($_GET['table'] == "users") {

                        $stmt = $conn->prepare('SELECT * FROM users WHERE id = ' . $id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();

                            echo "
                        <!-- Name input -->
                        <h5 class='text-dark'>Personal Info (Required)</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Full name' name='update-name' type='text' value='" . $row['fullname'] . "'>
                            <input required class='form-control' placeholder='E-mail' name='update-mail' id='mail' type='email' value='" . $row['uname'] . "'>
                        </div>

                        <!-- Password input -->
                        <h5 class='text-dark'>Password (Required)</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Password' name='update-password' id='password' type='password' value='" . $row['pwd'] . "'>
                        </div>

                        <!-- Birthday input -->
                        <h5 class='text-dark'>Birthdate (Optional)</h5>
                        <div class='form-outline mb-4'>
                            <input class='form-control' placeholder='dd.mm.yyyy' name='update-birthday' type='date' value='" . $row['birthdate'] . "'>
                        </div>

                        <!-- Adress Input -->
                        <h5 class='text-dark'>Address (Optional)</h5>
                        <div class='form-outline mb-4'>
                            <input class='form-control me-1' placeholder='Country' name='update-country' type='text' value='" . $row['country'] . "'>
                            <input class='form-control me-1' placeholder='Province' name='update-province' type='text' value='" . $row['province'] . "'>
                            <input class='form-control' placeholder='City' name='update-city' type='text' value='" . $row['city'] . "'>
                        </div>
                        <!-- Contact Info -->
                        <h5 class='text-dark'>Contact Info (Optional)</h5>
                        <div class='form-outline mb-4'>
                            <input class='form-control me-1' placeholder='Phone' name='update-phone' type='text' value='" . $row['phone'] . "'>
                            <input class='form-control' placeholder='Address' name='update-address' type='text' value='" . $row['address'] . "'>
                        </div>

                        <!-- Image -->
                        <h5 class='text-dark'>Image (Optional)</h5>
                        <div class='form-outline mb-4'>
                            <input class='form-control me-1' placeholder='Image' name='update-image' type='file' value='" . $row['user_img'] . "'>
                        </div>

                        <!-- Only Admins -->
                        <h5 class='text-dark'>Only Admins (Optional)</h5>
                        <div class='form-outline mb-4'>
                            <input class='form-control me-1' placeholder='Rank' name='update-rank' type='text' value='" . $row['rank'] . "'>
                            <input class='form-control' placeholder='Type' name='update-type' type='text' value='" . $row['type'] . "'>
                            <input class='form-control' placeholder='Active' name='update-active' type='text' value='" . $row['active'] . "'>
                        </div>
                        <div class='row mb-4'>
                            <div class='col'>
                                <!-- Submit button -->
                                <input type='submit' class='btn btn-primary mb-4 w-100' value='Update the record'>
                            </div>
                        </div>";
                    } elseif ($_GET['table'] == "supporters") {
                        $stmt = $conn->prepare('SELECT * FROM supporters WHERE id = ' . $id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();

                            echo "
                        <!-- Name input -->
                        <h5 class='text-dark'>Name</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Full name' name='update-name' type='text' value='" . $row['name'] . "'>
                        </div>

                        <!-- Message input -->
                        <h5 class='text-dark'>Message</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Message' name='update-message' type='text' value='" . $row['message'] . "'>
                        </div>

                        <!-- Amount input -->
                        <h5 class='text-dark'>Amount</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Amount' name='update-amount' type='text' value='" . $row['amount'] . "'>
                        </div>

                        <!-- Image input -->
                        <h5 class='text-dark'>Image</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Image' name='update-image' type='text' value='" . $row['image'] . "'>
                        </div>

                        <!-- Active input -->
                        <h5 class='text-dark'>Active</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Active' name='update-active' type='text' value='" . $row['active'] . "'>
                        </div>

                        <!-- Tag input -->
                        <h5 class='text-dark'>Tag</h5>
                        <div class='form-outline mb-4'>
                            <select required class='form-control me-1' name='insert-tag'>
								<option value='firm'>Firm</option>
								<option value='voluntarily'>Voluntarily</option>
								<option value='financially'>Financially</option>
							</select>
                        </div>

                        <div class='row mb-4'>
                            <div class='col'>
                                <!-- Submit button -->
                                <input type='submit' class='btn btn-primary mb-4 w-100' value='Update the record'>
                            </div>
                        </div>";
                    } elseif ($_GET['table'] == "supply") {
                        $stmt = $conn->prepare('SELECT * FROM supply WHERE id = ' . $id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();

                            echo "
                        <!-- Water input -->
                        <h5 class='text-dark'>Water</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='water' name='update-water' type='text' value='" . $row['water'] . "'>
                        </div>

                        <!-- Food input -->
                        <h5 class='text-dark'>Food</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Food' name='update-food' type='text' value='" . $row['food'] . "'>
                        </div>

                        <!-- Education input -->
                        <h5 class='text-dark'>Education</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Education' name='update-education' type='text' value='" . $row['education'] . "'>
                        </div>

                        <!-- Shelter input -->
                        <h5 class='text-dark'>Shelter</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Shelter' name='update-shelter' type='text' value='" . $row['shelter'] . "'>
                        </div>

                        <!-- Entered By input -->
                        <h5 class='text-dark'>Entered By</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Entered By' name='update-entered_by' type='text' value='" . $row['entered_by'] . "'>
                        </div>

                        <div class='row mb-4'>
                            <div class='col'>
                                <!-- Submit button -->
                                <input type='submit' class='btn btn-primary mb-4 w-100' value='Update the record'>
                            </div>
                        </div>";
                    } elseif ($_GET['table'] == "newsletter") {
                        $stmt = $conn->prepare('SELECT * FROM newsletter WHERE id = ' . $id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();

                            echo "
                        <!-- Email input -->
                        <h5 class='text-dark'>Email</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Email' name='update-email' type='text' value='" . $row['email'] . "'>
                        </div>

                        <!-- Active input -->
                        <h5 class='text-dark'>Active</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Active' name='update-active' type='text' value='" . $row['active'] . "'>
                        </div>

                        <div class='row mb-4'>
                            <div class='col'>
                                <!-- Submit button -->
                                <input type='submit' class='btn btn-primary mb-4 w-100' value='Update the record'>
                            </div>
                        </div>";
                    } else {
                        include_once '404.html';
                    }

                    ?>
                </form>
            </div>
        </main>


        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; QuakeFocus</div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

</body>

</html>