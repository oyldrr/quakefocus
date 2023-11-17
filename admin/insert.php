<?php
ob_start();
include_once "header.php";

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) === true) {
	header('location:index.php');
	exit();
}

// Include config file
require_once "config/connection.php";

// signup | insertion

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_GET['table'] == "users") {
		$insert = "INSERT INTO `users` (`uname`, `pwd`, `fullname`, `birthdate`, `country`, `province`, `city`, `phone`, `address`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

		if ($stmt = mysqli_prepare($conn, $insert)) {
			// Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "sssssssss", $param_email, $param_password, $param_fullname, $param_birthday, $param_country, $param_province, $param_city, $param_phone, $param_address);

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

			// Attempt to execute the prepared statement
			if (mysqli_stmt_execute($stmt)) {
				// Redirect to login page
				header('location: login.php?registration=successfull');
				exit();
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}

			// Close statement
			mysqli_stmt_close($stmt);
		} else {
			header('location: signup.php?mysqliproblem');
		}
	} else {
		header('location: signup.php?passwords-arent-same');
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insert - QuakeFocus Admin </title>

	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Bootstrap Library -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

	<!-- AOS Library -->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
	<div class="content py-5 d-flex justify-content-center">
		<form action="" method="POST" class="w-50 text-light">

			<div class="d-flex mt-5">
				<img class="mx-auto pb-3" src="img/logo.png" alt="logo" width="150">
			</div>

			<!-- Name input -->
			<h5>Personal Info (Required)</h5>
			<div class="form-outline mb-4">
				<input required class="form-control me-1" placeholder="Full name" name="signup-name" type="text">
				<input required class="form-control" placeholder="E-mail" name="signup-mail" id="mail" type="email">
			</div>

			<!-- Password input -->
			<h5>Password (Required)</h5>
			<div class="form-outline mb-4">
				<input required class="form-control me-1" placeholder="Password" name="signup-password" id="password" type="password">
				<input required class="form-control " placeholder="Confirm password" name="signup-cpassword" id="cpassword" type="password">
			</div>

			<!-- Birthday input -->
			<h5>Birthdate (Optional)</h5>
			<div class="form-outline mb-4">
				<input class="form-control" placeholder="dd.mm.yyyy" name="signup-birthday" type="date">
			</div>

			<!-- Adress Input -->
			<h5>Address (Optional)</h5>
			<div class="form-outline mb-4">
				<input class="form-control me-1" placeholder="Country" name="signup-country" type="text">
				<input class="form-control me-1" placeholder="Province" name="signup-province" type="text">
				<input class="form-control" placeholder="City" name="signup-city" type="text">
			</div>
			<!-- Contact Info -->
			<h5>Contact Info (Optional)</h5>
			<div class="form-outline mb-4">
				<input class="form-control me-1" placeholder="Phone" name="signup-phone" type="text">
				<input class="form-control" placeholder="Address" name="signup-address" type="text">
			</div>
			<!-- 2 column grid layout for inline styling -->
			<div class="row mb-4">
				<div class="col">
					<p>Already have an account? <a href="login.php">Login</a></p>
				</div>
				<div class="col">
					<!-- Submit button -->
					<input type="submit" class="btn btn-primary mb-4 w-100" value="Sign in">
				</div>
			</div>
		</form>
	</div>

	<div class="d-block mt-5 pt-5"></div>
	<?php include_once "footer.php"; ?>
</body>

</html>