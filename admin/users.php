<?php
ob_start();
require_once "config/connection.php";

session_start();


// If its not logged in direct to login page
if (isset($_SESSION["adminLoggedin"]) !== true) {
    header('location:login.php');
    exit();
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
    <title>Users - Quakefocus Admin</title>
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
            <div class="container-fluid px-4">
                <h1 class="mt-4">Users</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Users</li>
                </ol>


                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Daily Registration
                            </div>
                            <div class="card-body"><canvas id="dailyRegistration" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Monthly Registration
                            </div>
                            <div class="card-body"><canvas id="monthlyRegistration" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <i class="fas fa-users me-1"></i>
                            User Records
                        </div>
                        <a class="btn btn-primary " href="insert.php?table=users">Create new <i class="fas fa-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Fullname</th>
                                    <th>Birthdate</th>
                                    <th>Country</th>
                                    <th>Province</th>
                                    <th>City</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Image Path</th>
                                    <th>Rank</th>
                                    <th>Type</th>
                                    <th>Active</th>
                                    <th>Updated At</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Fullname</th>
                                    <th>Birthdate</th>
                                    <th>Country</th>
                                    <th>Province</th>
                                    <th>City</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Image Path</th>
                                    <th>Rank</th>
                                    <th>Type</th>
                                    <th>Active</th>
                                    <th>Updated At</th>
                                    <th>Created At</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                <?php
                                // Getting all the users which is active and ordering by newest to oldest
                                $stmt = $conn->prepare("SELECT *  FROM users ORDER BY created_at DESC");
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while ($row = $result->fetch_assoc()) :
                                ?>
                                    <tr>
                                        <td>
                                            <a class="btn btn-link" href="update.php?table=users&id=<?= $row['id'] ?>">
                                                <i class="fas fa-cog">
                                                </i>
                                            </a>
                                        </td>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['uname'] ?></td>
                                        <td><?= $row['pwd'] ?></td>
                                        <td><?= $row['fullname'] ?></td>
                                        <td><?= $row['birthdate'] ?></td>
                                        <td><?= $row['country'] ?></td>
                                        <td><?= $row['province'] ?></td>
                                        <td><?= $row['city'] ?></td>
                                        <td><?= $row['phone'] ?></td>
                                        <td><?= $row['address'] ?></td>
                                        <td><?= $row['user_img'] ?></td>
                                        <td><?= $row['rank'] ?></td>
                                        <td><?= $row['type'] ?></td>
                                        <td><?= $row['active'] ?></td>
                                        <td><?= $row['updated_at'] ?></td>
                                        <td><?= $row['created_at'] ?></td>
                                    </tr>

                                <?php
                                endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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