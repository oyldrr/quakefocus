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
    <title>Quake Focus | About us</title>

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

        <!-- About Us Section -->
        <section id="about-us">
            <div class="about-us">
                <h1 data-aos="fade-down" data-aos-delay="300">
                    about us
                </h1>

                <p class="short-desc" data-aos="fade-down" data-aos-delay="400">
                    Quake Focus is an original website designed to enhance your focus and concentration using the Pomodoro technique.
                    It is user-friendly and easy to use. You can set a timer for the Pomodoro technique. Additionally, it closes all
                    other windows open in your browser and brings the task you need to work on to the foreground, which helps you maintain
                    your focus and attention.
                    The revenue generated from the ads on the website is donated to organizations helping earthquake victims. Therefore,
                    by using the Quake Focus website, you can increase your personal productivity and help earthquake victims at the same time.
                </p>
            </div>
        </section>
        <!-- End -->

        <!-- Timeline Section -->
        <section id="timeline">
            <div id="timeline-container" class="timeline-container">

                <h2>Timeline</h2>
                <ul class="timeline">
                    <li>
                        <h4>February 2023</h4>
                        <p>On February 6, 2023, earthquakes that occurred in Kahramanmaraş, Turkey resulted in the deaths of over 50,000 people.</p>
                    </li>
                    <li>
                        <h4>March 2023</h4>
                        <p>The idea was started to be developed by Oğuzhan Yıldırır within the scope of a university course project.</p>
                    </li>
                    <li>
                        <h4>April 2023</h4>
                        <p>quakefocus.com domain name and hosting service were purchased and it started to be published with a countdown set to June 10th.</p>
                    </li>
                    <li>
                        <h4>May 2023</h4>
                        <p>Oğuzhan Yıldırır, the sole team member, initiated the coding process using designs that had been created earlier.</p>
                    </li>
                    <li>
                        <h4>June 2023</h4>
                        <p>Site published with the end users and the marketing process has began.</p>
                    </li>
                </ul>
            </div>
        </section>
        <!-- End -->

        <!-- Team Members Section -->
        <section id="team-members">
            <div class="container team-members py-5">
                <h1 data-aos="fade-down" data-aos-delay="300"> Team Members </h1>
                <div class="row vh-100">
                    <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                        <div class="box shadow-sm p-4">
                            <div class="image-wrapper mb-3">
                                <img class="img-fluid" src="img/team-members/oguz.jpg" alt="..." />
                            </div>
                            <div class="box-desc">
                                <h5>Oğuzhan Yıldırır</h5>
                                <p>Founder</p>
                            </div>
                            <ul class="social">
                                <li><a href="https://www.linkedin.com/in/oyldrr/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="https://twitter.com/oguzhanyildirir" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://github.com/oyldrr" target="_blank"><i class="fab fa-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End -->
    </div>

    <?php include_once "footer.php"; ?>
</body>
<script>
    /* About us Scroll Timeline Effect */
    document.addEventListener('scroll', timeline);

    function timeline() {
        var threshold_position = window.scrollY + window.innerHeight * 2 / 3;
        //compare scrolltop with scrolltop on each timeline event
        var timeline_events = document.querySelectorAll('.timeline li');
        for (i in timeline_events) {
            if (timeline_events[i].offsetTop < threshold_position) {
                timeline_events[i].classList.add('visible');
            } else {
                timeline_events[i].classList.remove('visible');
            }
        }
    }
    timeline();
    /* */
</script>

</html>