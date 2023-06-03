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
    <title>Quake Focus | Contact</title>

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
        <div class="contact">
            <div class="row">
            <div class="col-md-6">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <h1 class="mb-3" data-aos="fade-in" data-aos-delay="100" data-aos-once="true">Contact us</h1>
                                <form action="https://formsubmit.co/contact@quakefocus.com" method="POST">
                                    <input type="hidden" name="_subject" value="New message from 'contact us' page!">
                                    <input type="hidden" name="_captcha" value="false">
                                    <input type="hidden" name="_next" value="https://quakefocus.com/contact.php?WeGotYourMessage">
                                    <div class="row g-3">
                                        <div class="col-md-6" data-aos="fade-in" data-aos-delay="200" data-aos-once="true">
                                            <label for="fullname" class="form-label"><i class="fa fa-user"></i> Fullname </label>
                                            <input type="text" class="form-control text-primary" id="name" name="fullname" required>
                                        </div>
                                        <div class="col-md-6" data-aos="fade-in" data-aos-delay="300" data-aos-once="true">
                                            <label for="tel" class="form-label"><i class="fa fa-phone"></i> Phone number </label>
                                            <input type="text" class="form-control text-primary" id="phone" name="tel">
                                        </div>
                                        <div class="col-md-6" data-aos="fade-in" data-aos-delay="400" data-aos-once="true">
                                            <label for="email" class="form-label"><i class="fa fa-envelope"></i> E-mail address </label>
                                            <input type="email" class="form-control text-primary" id="email" name="email" required>
                                        </div>
                                        <div class="col-md-6" data-aos="fade-in" data-aos-delay="500" data-aos-once="true">
                                            <label for="subject" class="form-label"><i class="fa fa-pencil"></i> Subject </label>
                                            <input type="text" class="form-control text-primary" id="subject" name="subject">
                                        </div>
                                        <div class="col-12" data-aos="fade-in" data-aos-delay="600" data-aos-once="true">
                                            <label for="message" class="form-label"><i class="fa fa-feather"></i> Message</label>
                                            <textarea style="max-height:135px; min-height:135px; max-width:100%" class="form-control text-primary" id="message" name="message" rows="5" required></textarea>
                                        </div>
                                        <div class="col-12" data-aos="fade-in" data-aos-delay="700" data-aos-once="true">
                                            <button type="submit" class="btn btn-primary w-100 fw-bold send-button" data-aos="fade-in" data-aos-delay="100" data-aos-once="true">
                                                <div class="alt-send-button">
                                                    <i class="fa fa-paper-plane"></i>
                                                    <span class="send-text">
                                                        Send
                                                    </span>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-5" data-aos="fade-in" data-aos-delay="100" data-aos-once="true">
                    <!-- Google Map -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d200.30405172467255!2d31.991697655448792!3d36.55737205721658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1str!2str!4v1683537827206!5m2!1str!2str" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <!-- End -->
                    <div class="contact-address">
                        <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                        <span>
                            Sugözü mah. Kütürüp Cad. 2/8 İç kapı no:8, 07400 Alanya/Antalya
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once "footer.php"; ?>
</body>

</html>