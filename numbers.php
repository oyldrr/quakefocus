<?php
require_once "config/connection.php";
include_once "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quake Focus | Numbers</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap Library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php
    
    // Supply data from database
    $stmt = $conn->prepare("SELECT * FROM `supply` ORDER BY created_at DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    ?>

    <div class="content pt-5">
        <h1 class="numbers-heading">
            What did we success?
        </h1>
        <div class="chartCard mx-auto">
            <div class="chartBox">
                <canvas id="myChart"></canvas>
                <p class="text-light text-center mt-5">Last Data Update at <?= $row['created_at'] ?></p>
            </div>
        </div>

        <div class="h-25 w-75 mx-auto">

        </div>
    </div>



    <!-- Chart script -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Water", "Food", "Education", "Shelter"],
                datasets: [{
                    label: '# supplied',
                    data: [<?= $row['water'] ?>, <?= $row['food'] ?>, <?= $row['education'] ?>, <?= $row['shelter'] ?>],
                    borderWidth: .1
                }]
            },
            options: {}
        });
    </script>
    <!-- End -->

    <?php include_once "footer.php"; ?>

</body>

</html>