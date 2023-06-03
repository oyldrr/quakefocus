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
	$fullname = mysqli_real_escape_string($conn, $_POST['signup-name']);
	$email = mysqli_real_escape_string($conn, $_POST['signup-mail']);
	$pwd = mysqli_real_escape_string($conn, $_POST['signup-password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['signup-cpassword']);
	$birthday = mysqli_real_escape_string($conn, $_POST['signup-birthday']);
	$country = mysqli_real_escape_string($conn, $_POST['signup-country']);
	$province = mysqli_real_escape_string($conn, $_POST['signup-province']);
	$city = mysqli_real_escape_string($conn, $_POST['signup-city']);
	$phone = mysqli_real_escape_string($conn, $_POST['signup-phone']);
	$address = mysqli_real_escape_string($conn, $_POST['signup-address']);

	// Prepare a select statement
	$sql = "SELECT uname FROM users WHERE uname = ?";

	if ($stmt = mysqli_prepare($conn, $sql)) {
		// Bind variables to the prepared statement as parameters
		mysqli_stmt_bind_param($stmt, "s", $param_username);

		// Set parameters
		$param_username = $email;

		// Attempt to execute the prepared statement
		if (mysqli_stmt_execute($stmt)) {
			// Store result
			mysqli_stmt_store_result($stmt);

			// Check if username exists, if yes then verify password
			if (mysqli_stmt_num_rows($stmt) == 1) {
				mysqli_stmt_close($stmt);
				header('location:login.php?username-already-exists');
				exit();
			} else {
				mysqli_stmt_close($stmt);
				if ($pwd == $cpassword) {
					$insert = "INSERT INTO `users` (`uname`, `pwd`, `fullname`, `birthdate`, `country`, `province`, `city`, `phone`, `address`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

					if ($stmt = mysqli_prepare($conn, $insert)) {
						// Bind variables to the prepared statement as parameters
						mysqli_stmt_bind_param($stmt, "sssssssss", $param_email, $param_password, $param_fullname, $param_birthday, $param_country, $param_province, $param_city, $param_phone, $param_address);

						// Set parameters
						$param_email = $email;
						$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
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
							header("location:login.php");
							exit();
						} else {
							echo "Oops! Something went wrong. Please try again later.";
						}

						// Close statement
						mysqli_stmt_close($stmt);
					} else {
						header("location: signup.php?mysqliproblem");
					}
				} else {
					header("location: signup.php?passwords-arent-same");
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quake Focus | Sign up</title>

	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/signup.css">

	<!-- Bootstrap Library -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

	<!-- AOS Library -->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
	<div class="content pt-5 text-light">
		<form id="regForm" action="" method="POST">
			<h1>Sign up:</h1>
			<!-- One "tab" for each step in the form: -->
			<div class="tab">Personal Info:
				<p><input required placeholder="Full name..." oninput="this.className = ''" name="signup-name" type="text"></p>
				<p><input required placeholder="E-mail..." oninput="this.className = ''" name="signup-mail" type="mail"></p>
			</div>
			<div class="tab">Password:
				<p><input required placeholder="Password..." oninput="this.className = ''" name="signup-password" type="password"></p>
				<p><input required placeholder="Confirm password..." oninput="this.className = ''" name="signup-cpassword" type="password"></p>
			</div>
			<div class="tab">Birthday: (Optional)
				<p><input placeholder="dd.mm.yyyy" oninput="this.className = ''" name="signup-birthday" type="date"></p>
			</div>
			<div class="tab">Country: (Optional)
				<p><input placeholder="Country..." oninput="this.className = ''" name="signup-country" type="text"></p>
				<p><input placeholder="Province..." oninput="this.className = ''" name="signup-province" type="text"></p>
				<p><input placeholder="City..." oninput="this.className = ''" name="signup-city" type="text"></p>
			</div>
			<div class="tab">Contact Info: (Optional)
				<p><input placeholder="Phone..." oninput="this.className = ''" name="signup-phone" type="text"></p>
				<p><input placeholder="Address..." oninput="this.className = ''" name="signup-address" type="text"></p>
			</div>
			<div style="overflow:auto;">
				<div style="float:right;">
					<button class="buttonRegForm" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
					<button class="buttonRegForm" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
				</div>
			</div>
			<!-- Circles which indicates the steps of the form: -->
			<div style="text-align:center;margin-top:40px;">
				<span class="step"></span>
				<span class="step"></span>
				<span class="step"></span>
				<span class="step"></span>
				<span class="step"></span>
			</div>
		</form>

		<?php include_once "footer.php"; ?>

		<script>
			/* Sign up Page */
			let currentTab = 0; // Current tab is set to be the first tab (0)
			showTab(currentTab); // Display the crurrent tab

			function showTab(n) {
				// This function will display the specified tab of the form...
				const x = document.getElementsByClassName("tab");
				x[n].style.display = "block";
				//... and fix the Previous/Next buttons:
				if (n === 0) {
					document.getElementById("prevBtn").style.display = "none";
				} else {
					document.getElementById("prevBtn").style.display = "inline";
				}
				if (n === (x.length - 1)) {
					document.getElementById("nextBtn").innerHTML = "Submit";

				} else {
					document.getElementById("nextBtn").innerHTML = "Next";
				}
				//... and run a function that will display the correct step indicator:
				fixStepIndicator(n)
			}

			function nextPrev(n) {
				// This function will figure out which tab to display
				const x = document.getElementsByClassName("tab");
				// Exit the function if any field in the current tab is invalid:
				if (n === 1 && !validateForm()) return false;
				// Hide the current tab:
				x[currentTab].style.display = "none";
				// Increase or decrease the current tab by 1:
				currentTab = currentTab + n;
				// if you have reached the end of the form...
				if (currentTab >= x.length) {
					// ... the form gets submitted:
					document.getElementById("regForm").submit();
					return false;
				}
				// Otherwise, display the correct tab:
				showTab(currentTab);
			}

			function validateForm() {
				// This function deals with validation of the form fields
				let x;

				let y;
				let i;
				let valid = true;
				x = document.getElementsByClassName("tab");
				y = x[currentTab].getElementsByTagName("input");
				// A loop that checks every input field in the current tab:
				for (i = 0; i < y.length; i++) {
					// If a field is empty...
					if (y[i].value === "" && y[i].required == "true") {
						// add an "invalid" class to the field:
						y[i].className += " invalid";
						// and set the current valid status to false
						valid = false;
					}
				}
				// If the valid status is true, mark the step as finished and valid:
				if (valid) {
					document.getElementsByClassName("step")[currentTab].className += " finish";
				}
				return valid; // return the valid status
			}

			function fixStepIndicator(n) {
				// This function removes the "active" class of all steps...
				let i;

				const x = document.getElementsByClassName("step");
				for (i = 0; i < x.length; i++) {
					x[i].className = x[i].className.replace(" active", "");
				}
				//... and adds the "active" class on the current step:
				x[n].className += " active";
			}
			/* */
		</script>
</body>

</html>