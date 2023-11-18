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
			(`uname`, `pwd`, `fullname`, `birthdate`, `country`, `province`, `city`, `phone`, `address`, `image`, `rank`, `type`, `active`) 
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
		}
		
		elseif ($_GET['table'] == "supporters") {
			
		}

		elseif ($_GET['table'] == "supply") {
			
		}

		elseif ($_GET['table'] == "newsletter") {
			
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

							<!-- Image Info -->
							<h5 class='text-dark'>Image Info (Optional)</h5>
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
									<p>Already have an account? <a href='login.php'>Login</a></p>
								</div>
								<div class='col'>
									<!-- Submit button -->
									<input type='submit' class='btn btn-primary mb-4 w-100' value='Sign in'>
								</div>
							</div>
					";
					}
					
					elseif ($_GET['table'] == "supporters") {
						echo "";
					}

					elseif ($_GET['table'] == "supply") {
						echo "";
					}

					elseif ($_GET['table'] == "newsletter") {
						echo "";
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

	<!-- Charts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

	<!-- Area Chart -->
	<script>
		// Set new default font family and font color to mimic Bootstrap's default styling
		Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
		Chart.defaults.global.defaultFontColor = '#292b2c';

		<?php
		// Initialize an array to store daily visit counts
		$dailyRegistration = array();

		// Create an array to store daily labels
		$dailyLabels = array();

		// Loop through each day in the desired date range


		$currentYear = date('Y');
		$currentMonth = date('m');

		// Get the first day of the current month
		$startDate = date('Y-m-01', strtotime("$currentYear-$currentMonth-01"));

		// Get the last day of the current month
		$endDate = date('Y-m-t', strtotime("$currentYear-$currentMonth-01"));

		$currentDate = $startDate;
		while ($currentDate <= $endDate) {
			$sql = "SELECT COUNT(*) AS total_user FROM users WHERE DATE_FORMAT(created_at, '%Y-%m-%d') = ?";

			// Use prepared statements to avoid SQL injection
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $currentDate);
			$stmt->execute();

			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$userCount = $row["total_user"];

			// Store the data in the array
			$dailyRegistration[] = $userCount;

			// Store the current date in the labels array
			$dailyLabels[] = $currentDate;

			// Move to the next day
			$currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));

			// Close the prepared statement
			$stmt->close();
		}

		// Convert the arrays to JSON
		$dailyRegistrationJSON = json_encode($dailyRegistration);
		$dailyLabelsJSON = json_encode($dailyLabels);
		?>


		// Area Chart Example
		var ctx = document.getElementById("dailyRegistration");

		var dailyLabels = <?= $dailyLabelsJSON ?>;
		var dailyRegistration = <?= $dailyRegistrationJSON ?>;

		var myLineChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: dailyLabels,
				datasets: [{
					label: "New users",
					lineTension: 0.3,
					backgroundColor: "rgba(2,117,216,0.2)",
					borderColor: "rgba(2,117,216,1)",
					pointRadius: 5,
					pointBackgroundColor: "rgba(2,117,216,1)",
					pointBorderColor: "rgba(255,255,255,0.8)",
					pointHoverRadius: 5,
					pointHoverBackgroundColor: "rgba(2,117,216,1)",
					pointHitRadius: 50,
					pointBorderWidth: 2,
					data: dailyRegistration,
				}],
			},
			options: {
				scales: {
					xAxes: [{
						time: {
							unit: 'date'
						},
						gridLines: {
							display: false
						},
						ticks: {
							maxTicksLimit: 7
						}
					}],
					yAxes: [{
						ticks: {
							min: 0,
							max: 5,
							maxTicksLimit: 10
						},
						gridLines: {
							color: "rgba(0, 0, 0, .125)",
						}
					}],
				},
				legend: {
					display: false
				}
			}
		});
	</script>

	<!-- Bar Chart -->
	<script>
		// Set new default font family and font color to mimic Bootstrap's default styling
		Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
		Chart.defaults.global.defaultFontColor = '#292b2c';


		// Getting Monthly datas from the database
		<?php
		// Initialize an array to store monthly visit counts
		$monthlyRegistration = array();

		// Create an array with month names
		$months = [
			'October', 'November', 'December', 'January', 'February', 'March', 'April', 'May', 'June',
			'July', 'August', 'September'
		];

		// Loop through each month and fetch the data
		foreach ($months as $monthName) {
			$sql = "SELECT COUNT(*) AS total_user FROM users WHERE DATE_FORMAT(created_at, '%M') = ?";

			// Use prepared statements to avoid SQL injection
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $monthName);
			$stmt->execute();

			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$userCount = $row["total_user"];

			// Store the data in the array
			$monthlyRegistration[] = $userCount;

			// Close the prepared statement
			$stmt->close();
		}
		// Convert the array to JSON
		$monthlyRegistrationJSON = json_encode($monthlyRegistration);

		// Generate month labels
		$monthLabels = array(
			'October', 'November', 'December', 'January', 'February', 'March', 'April', 'May', 'June',
			'July', 'August', 'September'
		);

		// for ($i = 0; $i < 12; $i++) {
		//     $monthLabels[] = date('F', strtotime("+$i months"));
		// }

		// Convert the array to JSON
		$monthLabelsJSON = json_encode($monthLabels);
		?>

		// Bar Chart for Monthly Visits
		var ctx = document.getElementById("monthlyRegistration");

		var monthLabels = <?= $monthLabelsJSON ?>;
		var monthlyRegistration = <?= $monthlyRegistrationJSON ?>;

		var monthlyRegistration = <?= $monthlyRegistrationJSON ?>;

		var myLineChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: monthLabels,
				datasets: [{
					label: "New users",
					backgroundColor: "rgba(2,117,216,1)",
					borderColor: "rgba(2,117,216,1)",
					data: monthlyRegistration,
				}],
			},
			options: {
				scales: {
					xAxes: [{
						time: {
							unit: 'month'
						},
						gridLines: {
							display: false
						},
						ticks: {
							maxTicksLimit: 12
						}
					}],
					yAxes: [{
						ticks: {
							min: 0,
							max: 20,
							maxTicksLimit: 10
						},
						gridLines: {
							display: true
						}
					}],
				},
				legend: {
					display: false
				}
			}
		});
	</script>

</body>

</html>