<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome Icons Library -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/footer.css" />

    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Bootstrap Library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <!-- Wave svg -->
    <svg id="wave-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#fff" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
    <!-- End -->

    <div class="footer">
        <div class="container">
            <div class="row py-4">

                <!-- Logo and description -->
                <div class="col-lg-4 col-md-3 col-sm-12 mb-4 mb-lg-0" data-aos="fade-right" data-aos-delay="300">
                    <a href="index.php"><img src="img/logo.png" alt="logo" width="180" class="logo mb-3"></a>
                    <p class="text-links">Help earthquake victims while increasing your productivity. Have a good work!</p>
                </div>
                <!--------- End -------------->

                <!-- Socia Media Links -->
                <div class="col-lg-2 col-md-3 col-sm-4 mb-4 mb-lg-0">
                    <h6 class="text-uppercase font-weight-bold mb-4" data-aos="fade-down" data-aos-delay="100">Social Media</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2" data-aos="fade-right" data-aos-delay="100">
                            <i class="social-media-icon bi-twitter"></i>
                            <a href="https://twitter.com/quakefocus" target="_blank" class="text-links">
                                Twitter
                            </a>
                        </li>
                        <li class="mb-2" data-aos="fade-right" data-aos-delay="200">
                            <i class="social-media-icon bi-instagram"></i>
                            <a href="https://instagram.com/quakefocus" target="_blank" class="text-links">
                                Instagram
                            </a>
                        </li>
                        <li class="mb-2" data-aos="fade-right" data-aos-delay="300">
                            <i class="social-media-icon bi-linkedin"></i>
                            <a href="https://linkedin.com/company/quakefocus" target="_blank" class="text-links">
                                LinkedIn
                            </a>
                        </li>
                        <li class="mb-2" data-aos="fade-right" data-aos-delay="400">
                            <i class="social-media-icon bi-discord"></i>
                            <a href="https://discord.gg/MEMpmfNN" target="_blank" class="text-links">
                                Discord
                            </a>
                        </li>
                    </ul>
                </div>
                <!---------- End ---------->

                <!-- Corporation -->
                <div class="col-lg-2 col-md-3 mb-4 col-sm-4 mb-lg-0">
                    <h6 class="text-uppercase font-weight-bold mb-4" data-aos="fade-down" data-aos-delay="200">Organization</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2" data-aos="fade-right" data-aos-delay="100">
                            <i class="fa fa-caret-right text-links"></i>
                            <a href="about-us.php" class="text-links">
                                About Us
                            </a>
                        </li>
                        <li class="mb-2" data-aos="fade-right" data-aos-delay="200">
                            <i class="fa fa-caret-right text-links"></i>
                            <a href="contact.php" class="text-links">
                                Contact
                            </a>
                        </li>
                        <li class="mb-2" data-aos="fade-right" data-aos-delay="300">
                            <i class="fa fa-caret-right text-links"></i>
                            <a href="cookie-policy.php" class="text-links">
                                Cookie Policy
                            </a>
                        </li>
                        <li class="mb-2" data-aos="fade-right" data-aos-delay="400">
                            <i class="fa fa-caret-right text-links"></i>
                            <a href="agreements.php" class="text-links">
                                Agreements
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div class="col-lg-4 col-md-3 col-sm-4 mb-lg-0">
                    <h6 class="text-uppercase font-weight-bold mb-4" data-aos="fade-down" data-aos-delay="300">Newsletter</h6>
                    <p class="text-links mb-4" data-aos="fade-right">You can get lots of information by subscribing to our newsletter.</p>
                    <div class="form-group" data-aos="fade-right" data-aos-delay="200">
                        <div class="input-group">
                            <input required type="email" placeholder="Enter a mail addres..." aria-describedby="button-addon1" class="form-control border-0 shadow-0 bg-transparent">
                            <div class="input-group-append">
                                <button id="button-addon1" type="submit" class="btn btn-link">
                                    <i class="fa fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!------ End ------>

            </div>
        </div>
        <!---------- End ------------->

        <!-- Copyrights -->
        <div class="copyright text-center mt-3 pb-3">
            <p class="text-links">
                ©
                <!-- Getting Current Year -->
                <script>
                    document.write(new Date().getFullYear())
                </script>
                Quake Focus All rights reserved.
            </p>
        </div>
        <!-- End -->
    </div>

    <script>
        AOS.init();
    </script>
</body>

</html>