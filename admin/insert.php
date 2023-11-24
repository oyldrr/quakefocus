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
		if ($_GET['table'] == "users") {
			$fullname = mysqli_real_escape_string($conn, $_POST['insert-name']);
			$email = mysqli_real_escape_string($conn, $_POST['insert-mail']);
			$pwd = mysqli_real_escape_string($conn, $_POST['insert-password']);
			$cpassword = mysqli_real_escape_string($conn, $_POST['insert-cpassword']);
			$birthday = mysqli_real_escape_string($conn, $_POST['insert-birthday']);
			$country = mysqli_real_escape_string($conn, $_POST['insert-country']);
			$province = mysqli_real_escape_string($conn, $_POST['insert-province']);
			$city = mysqli_real_escape_string($conn, $_POST['insert-city']);
			$phone = mysqli_real_escape_string($conn, $_POST['insert-phone']);
			$address = mysqli_real_escape_string($conn, $_POST['insert-address']);
			$image = mysqli_real_escape_string($conn, $_POST['insert-image']);
			$rank = mysqli_real_escape_string($conn, $_POST['insert-rank']);
			$type = mysqli_real_escape_string($conn, $_POST['insert-type']);
			$active = mysqli_real_escape_string($conn, $_POST['insert-active']);

			$insert = "INSERT INTO `users` 
			(`uname`, `pwd`, `fullname`, `birthdate`, `country`, `province`, `city`, `phone`, `address`, `user_img`, `rank`, `type`, `active`) 
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = mysqli_prepare($conn, $insert)) {
				// Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "sssssssssssss", $param_email, $param_password, $param_fullname, $param_birthday, $param_country, $param_province, $param_city, $param_phone, $param_address, $param_image, $param_rank, $param_type, $param_active);

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

				// Attempt to execute the prepared statement
				if (mysqli_stmt_execute($stmt)) {
					// Redirect to login page
					header('location: users.php?insertion=successfull');
					exit();
				} else {
					echo "Oops! Something went wrong. Please try again later.";
				}

				// Close statement
				mysqli_stmt_close($stmt);
			} else {
				header('location: insert.php?table=users&mysqliproblem');
			}
		} elseif ($_GET['table'] == "supporters") {
			$name = mysqli_real_escape_string($conn, $_POST['insert-name']);
			$message = mysqli_real_escape_string($conn, $_POST['insert-message']);
			$amount = mysqli_real_escape_string($conn, $_POST['insert-amount']);
			$image = mysqli_real_escape_string($conn, $_POST['insert-image']);
			$active = mysqli_real_escape_string($conn, $_POST['insert-active']);
			$tag = mysqli_real_escape_string($conn, $_POST['insert-tag']);

			$insert = "INSERT INTO 
			`supporters` (`name`, `message`, `amount`, `image`, `active`, `tag`)
			VALUES (?, ?, ?, ?, ?, ?)";


			if ($stmt = mysqli_prepare($conn, $insert)) {
				// Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_message, $param_amount, $param_image, $param_active, $param_tag);

				// Set parameters
				$param_name = $name;
				$param_message = $message;
				$param_amount = $amount;
				$param_image = $image;
				$param_active = $active;
				$param_tag = $tag;

				// Attempt to execute the prepared statement
				if (mysqli_stmt_execute($stmt)) {
					// Redirect to login page
					header('location: supporters.php?insertion=successfull');
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
			$water = mysqli_real_escape_string($conn, $_POST['insert-water']);
			$food = mysqli_real_escape_string($conn, $_POST['insert-food']);
			$education = mysqli_real_escape_string($conn, $_POST['insert-education']);
			$shelter = mysqli_real_escape_string($conn, $_POST['insert-shelter']);
			$entered_by = mysqli_real_escape_string($conn, $_POST['insert-entered_by']);

			$insert = "INSERT INTO 
			`supply` (`water`, `food`, `education`, `shelter`, `entered_by`)
			VALUES (?, ?, ?, ?, ?)";


			if ($stmt = mysqli_prepare($conn, $insert)) {
				// Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "sssss", $param_water, $param_food, $param_education, $param_shelter, $param_entered_by);

				// Set parameters
				$param_water = $water;
				$param_food = $food;
				$param_education = $education;
				$param_shelter = $shelter;
				$param_entered_by = $entered_by;

				// Attempt to execute the prepared statement
				if (mysqli_stmt_execute($stmt)) {
					// Redirect to login page
					header('location: supply.php?insertion=successfull');
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
			$email = mysqli_real_escape_string($conn, $_POST['insert-email']);
			$active = mysqli_real_escape_string($conn, $_POST['insert-active']);

			$insert = "INSERT INTO 
			`newsletter` (`email`, `active`)
			VALUES (?, ?)";


			if ($stmt = mysqli_prepare($conn, $insert)) {
				// Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_active);

				// Set parameters
				$param_email = $email;
				$param_active = $active;

				// Attempt to execute the prepared statement
				if (mysqli_stmt_execute($stmt)) {
					// Redirect to login page
					header('location: newsletter.php?insertion=successfull');
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
	<title>Insert - Quakefocus Admin</title>
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
					if ($_GET['table'] == "users") {
						echo "
							<!-- Name input -->
							<h5 class='text-dark'>Personal Info (Required)</h5>
							<div class='form-outline mb-4'>
								<input required class='form-control me-1' placeholder='Full name' name='insert-name' type='text'>
								<input required class='form-control' placeholder='E-mail' name='insert-mail' id='mail' type='email'>
							</div>

							<!-- Password input -->
							<h5 class='text-dark'>Password (Required)</h5>
							<div class='form-outline mb-4'>
								<input required class='form-control me-1' placeholder='Password' name='insert-password' id='password' type='password'>
								<input required class='form-control ' placeholder='Confirm password' name='insert-cpassword' id='cpassword' type='password'>
							</div>

							<!-- Birthday input -->
							<h5 class='text-dark'>Birthdate (Optional)</h5>
							<div class='form-outline mb-4'>
								<input class='form-control' placeholder='dd.mm.yyyy' name='insert-birthday' type='date'>
							</div>

							<!-- Adress Input -->
							<h5 class='text-dark'>Address (Optional)</h5>
							<div class='form-outline mb-4'>
								<input class='form-control me-1' placeholder='Country' name='insert-country' type='text'>
								<input class='form-control me-1' placeholder='Province' name='insert-province' type='text'>
								<input class='form-control' placeholder='City' name='insert-city' type='text'>
							</div>
							<!-- Contact Info -->
							<h5 class='text-dark'>Contact Info (Optional)</h5>
							<div class='form-outline mb-4'>
								<input class='form-control me-1' placeholder='Phone' name='insert-phone' type='text'>
								<input class='form-control' placeholder='Address' name='insert-address' type='text'>
							</div>

							<!-- Image -->
							<h5 class='text-dark'>Image (Optional)</h5>
							<div class='form-outline mb-4'>
								<input class='form-control me-1' placeholder='Image' name='insert-image' type='file'>
							</div>

							<!-- Only Admins -->
							<h5 class='text-dark'>Only Admins (Optional)</h5>
							<div class='form-outline mb-4'>
								<input class='form-control me-1' placeholder='Rank' name='insert-rank' type='text'>
								<input class='form-control' placeholder='Type' name='insert-type' type='text'>
								<input class='form-control' placeholder='Active' name='insert-active' type='text'>
							</div>
							<!-- 2 column grid layout for inline styling -->
							<div class='row mb-4'>
								<div class='col'>
									<!-- Submit button -->
									<input type='submit' class='btn btn-primary mb-4 w-100' value='Insert the record'>
								</div>
							</div>";
					} elseif ($_GET['table'] == "supporters") {

						echo "
                        <!-- Name input -->
                        <h5 class='text-dark'>Name</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Name' name='insert-name' type='text'>
                        </div>

                        <!-- Message input -->
                        <h5 class='text-dark'>Message</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Message' name='insert-message' type='text'>
                        </div>

                        <!-- Amount input -->
                        <h5 class='text-dark'>Amount</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Amount' name='insert-amount' type='text'>
                        </div>

                        <!-- Image input -->
                        <h5 class='text-dark'>Image</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Image' name='insert-image' type='text'>
                        </div>

                        <!-- Active input -->
                        <h5 class='text-dark'>Active</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Active' name='insert-active' type='text'>
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
                                <input type='submit' class='btn btn-primary mb-4 w-100' value='Insert the record'>
                            </div>
                        </div>
						";
					} elseif ($_GET['table'] == "supply") {
						echo "
                        <!-- Water input -->
                        <h5 class='text-dark'>Water</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Water' name='insert-water' type='text'>
                        </div>

                        <!-- Food input -->
                        <h5 class='text-dark'>Food</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Food' name='insert-food' type='text'>
                        </div>

                        <!-- Education input -->
                        <h5 class='text-dark'>Education</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Education' name='insert-education' type='text'>
                        </div>

                        <!-- Shelter input -->
                        <h5 class='text-dark'>Shelter</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Shelter' name='insert-shelter' type='text'>
                        </div>

                        <!-- Entered By input -->
                        <h5 class='text-dark'>Entered By</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Entered By' name='insert-entered_by' type='text'>
                        </div>

                        <div class='row mb-4'>
                            <div class='col'>
                                <!-- Submit button -->
                                <input type='submit' class='btn btn-primary mb-4 w-100' value='Insert the record'>
                            </div>
                        </div>
						";
					} elseif ($_GET['table'] == "newsletter") {
						echo "
                        <!-- Email input -->
                        <h5 class='text-dark'>Email</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Email' name='insert-email' type='text'>
                        </div>

						<!-- Active input -->
                        <h5 class='text-dark'>Active</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Active' name='insert-active' type='text'>
                        </div>

                        <div class='row mb-4'>
                            <div class='col'>
                                <!-- Submit button -->
                                <input type='submit' class='btn btn-primary mb-4 w-100' value='Insert the record'>
                            </div>
                        </div>
						";
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

</body>

</html>