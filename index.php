<?php
session_start();
require_once "config/connection.php";
include_once "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quake Focus | Counter</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap Library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>

    <div class="content">

        <!-- Counter Section -->
        <section id="counter">
            <div class="counter text-center" data>
                <h2 data-aos='fade-in' data-aos-delay='100'>Be focus & start working!</h2>
                <section data-aos='fade-in' data-aos-delay='300'>
                    <span>
                        00
                    </span>
                    <span class="dots">: </span>
                    <span>
                        00
                    </span>
                    <span class="dots">: </span>
                    <span>
                        00
                    </span>
                </section>

                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo "
                    <button class='btn btn-primary' id='startCounterBtn' data-aos='fade-in' data-aos-delay='500'>
                        Start now!
                    </button>";
                } else {
                    echo "
                    <button class='btn btn-primary' data-aos='fade-in' data-aos-delay='500'>
                        <a class='text-decoration-none' href='login.php'>
                        Please login to use counter!
                        </a> 
                    </button>";
                }
                ?>
            </div>
        </section>
        <!-- End -->
        
    </div>
    
    <?php include_once "footer.php"; ?>
</body>

</html>