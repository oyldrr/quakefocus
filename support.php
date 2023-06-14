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
    <title>Quake Focus | Support</title>

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
        <div class="be-support" data-aos="fade-up" data-aos-delay="100">
            <h2 class="text-center pt-5 pb-5 text-light" data-aos="fade-up" data-aos-delay="200">Do you wanna support us?</h2>
            <div class="d-flex justify-content-center mt-5" data-aos="fade-up" data-aos-delay="300">
                <button class="btn btn-light">Support as a firm</button>
            </div>

            <div class="d-flex justify-content-center mt-1" data-aos="fade-up" data-aos-delay="400">
                <button class="btn btn-light">Support as a person</button>
            </div>
        </div>
        <div class="w-75 mx-auto text-light">
            <div class="section-heading" data-aos="flip-down" data-aos-delay="500">
                <span class="section-title text-capitalize">
                    firms
                </span>
            </div>
            <p class="text-center h1" data-aos="fade-up" data-aos-delay="600">
                <i class="fas fa-caret-right"></i>
                
                <span class="firm-count">
                    <?php
                    //Getting firm counts from database
                    $result = mysqli_query($conn, "SELECT * FROM `supporters` WHERE active = 1 AND tag LIKE 'firm'");
                    $row_count = mysqli_num_rows($result);
                    echo "$row_count";
                    //
                    ?>
                </span>
                <i class="fas fa-caret-left"></i>
            </p>
            <p class="text-center" data-aos="fade-up" data-aos-delay="700">
                <i>firms are supporting us to help natural disaster victims by financially.</i>
            </p>

            <?php
            //Getting  supporter firms from database
            $stmt = $conn->prepare("SELECT * FROM `supporters` WHERE active = 1 AND tag LIKE 'firm' ORDER BY amount DESC");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) :
            ?>
                <div class="support-box" data-aos="fade-up" data-aos-delay="800">
                    <img src="img/supporter-firms/<?= $row['image'] ?>" alt="firm logo">
                    <p><?= $row['name'] ?></p>
                    <p><?= $row['message'] ?></p>
                    <p><?= $row['amount'] ?>$</p>
                </div>
            <?php
            endwhile;
            //
            ?>

            <hr class="divider">

            <div class="section-heading" data-aos="flip-down" data-aos-delay="100">
                <span class="section-title text-capitalize">
                    people
                </span>
            </div>

            <p class="text-center h1" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-caret-right"></i>
                <span class="person-count">
                    <?php
                    // Getting people counts from database
                    $result = mysqli_query($conn, "SELECT * FROM `supporters` WHERE active = 1 AND tag LIKE 'financially' OR tag LIKE 'voluntarily'");
                    $row_count = mysqli_num_rows($result);
                    echo "$row_count";
                    //
                    ?>
                </span>
                <i class="fas fa-caret-left"></i>
            </p>
            <p class="text-center" data-aos="fade-up" data-aos-delay="300">
                <i>people are supporting us to help natural disaster victims by financially or voluntarily.</i>
            </p>
            <div class="row mx-auto mt-5">

                <div class="col-6">
                    <h3 class="px-3 text-capitalize" data-aos="fade-right" data-aos-delay="400">financially</h3>

                    <?php
                    // Getting supporter people from database
                    $stmt = $conn->prepare("SELECT * FROM `supporters` WHERE active = 1 AND tag LIKE 'financially' ORDER BY amount DESC");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) :
                    ?>
                        <div class="support-box" data-aos="fade-up" data-aos-delay="500">
                            <img src="img/supporter-people/financially/<?= $row['image'] ?>" alt="supporter photo">
                            <p><?= $row['name'] ?></p>
                            <p><?= $row['message'] ?></p>
                            <p><?= $row['amount'] ?>$</p>
                        </div>
                    <?php
                    endwhile;
                    ?>

                </div>

                <div class="col-6">
                    <h3 class="px-3 text-capitalize" data-aos="fade-right" data-aos-delay="600">voluntarily</h3>

                    <?php
                    // Volunteer data getting from database
                    $stmt = $conn->prepare("SELECT * FROM `supporters` WHERE active = 1 AND tag LIKE 'voluntarily' ORDER BY amount DESC");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) :
                    ?>
                        <div class="support-box" data-aos="fade-up" data-aos-delay="700">
                        <img src="img/supporter-people/voluntarily/<?= $row['image'] ?>" alt="supporter photo">
                            <p><?= $row['name'] ?></p>
                            <p><?= $row['message'] ?></p>
                            <p><?= $row['amount'] ?> events</p>
                        </div>
                    <?php
                    endwhile;
                    //
                    ?>  
                </div>
            </div>
        </div>

        <!-- Temporary fix the footer problem. Fix properly later. -->
        <br class="mt-5 pt-5 mb-5 pb-5">
        <br class="mt-5 pt-5 mb-5 pb-5">
        <br class="mt-5 pt-5 mb-5 pb-5">
        <br class="mt-5 pt-5 mb-5 pb-5">
        <br class="mt-5 pt-5 mb-5 pb-5">
        <br class="mt-5 pt-5 mb-5 pb-5">
        <br class="mt-5 pt-5 mb-5 pb-5">
        <br class="mt-5 pt-5 mb-5 pb-5">
        <br class="mt-5 pt-5 mb-5 pb-5">
        <br class="mt-5 pt-5 mb-5 pb-5">
        <br class="mt-5 pt-5 mb-5 pb-5">
        <br class="mt-5 pt-5 mb-5 pb-5">
        <br class="mt-5 pt-5 mb-5 pb-5">
        <!-- I know its too ugly -->
    </div>
    <?php include_once "footer.php"; ?>
</body>

</html>