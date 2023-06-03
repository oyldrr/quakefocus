<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/headers.css" />

  <!-- AOS Library -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>

<body>
  <!-- DESKTOP HEADER NAVBAR -->
  <div class="desktop" data-aos="fade-down">
    <ul>
      <!-- SUPPORT BUTTON -->
      <?php
      if ($_SERVER['PHP_SELF'] == "/quakefocus/support.php") {
        echo "<li class='list active' data-aos='fade-down' data-aos-delay='300'>
                    <a href='support.php'>
                      <span class='icon'><i class='far fa-handshake'></i></span>
                      <span class='title'>Support</span>
                    </a>
                  </li>";
      } else {
        echo "<li class='list' data-aos='fade-down' data-aos-delay='300'>
                  <a href='support.php'>
                    <span class='icon'><i class='fas fa-handshake'></i></span>
                    <span class='title'>Support</span>
                  </a>
                </li>";
      }
      ?>
      <!-------------------->

      <!-- BLOG BUTTON -->
      <?php
      if ($_SERVER['PHP_SELF'] == "/quakefocus/blog.php") {
        echo "<li class='list active' data-aos='fade-down'data-aos-delay='200'>
                    <a href='blog.php'>
                      <span class='icon'><i class='far fa-rss'></i></span>
                      <span class='title'>Blog</span>
                    </a>
                  </li>";
      } else {
        echo "<li class='list' data-aos='fade-down' data-aos-delay='200'>
                  <a href='blog.php'>
                    <span class='icon'><i class='fas fa-rss'></i></span>
                    <span class='title'>Blog</span>
                  </a>
                </li>";
      }
      ?>
      <!-------------------->

      <!-- COUNTER BUTTON -->
      <?php
      if ($_SERVER['PHP_SELF'] == "/quakefocus/index.php") {
        echo "<li class='list active' data-aos='fade-down' data-aos-delay='100'>
                    <a href='index.php'>
                      <span class='icon'><i class='far fa-stopwatch'></i></span>
                      <span class='title'>Counter</span>
                    </a>
                  </li>";
      } else {
        echo "<li class='list' data-aos='fade-down' data-aos-delay='100'>
                  <a href='index.php'>
                    <span class='icon'><i class='fas fa-stopwatch'></i></span>
                    <span class='title'>Counter</span>
                  </a>
                </li>";
      }
      ?>
      <!-------------------->

      <!-- NUMBERS BUTTON -->
      <?php
      if ($_SERVER['PHP_SELF'] == "/quakefocus/numbers.php") {
        echo "<li class='list active' data-aos='fade-down' data-aos-delay='200'>
                    <a href='numbers.php'>
                      <span class='icon'><i class='far fa-cubes'></i></span>
                      <span class='title'>Numbers</span>
                    </a>
                  </li>";
      } else {
        echo "<li class='list' data-aos='fade-down' data-aos-delay='200'>
                  <a href='numbers.php'>
                    <span class='icon'><i class='fas fa-cubes'></i></span>
                    <span class='title'>Numbers</span>
                  </a>
                </li>";
      }
      ?>
      <!-------------------->

      <!-- PROFILE BUTTON -->
      <?php
      if ($_SERVER['PHP_SELF'] == "/quakefocus/profile.php") {
        echo "<li class='list active' data-aos='fade-down' data-aos-delay='300'>
                    <a href='profile.php'>
                      <span class='icon'><i class='far fa-user'></i></span>
                      <span class='title'>Profile</span>
                    </a>
                  </li>";
      } else {
        echo "<li class='list' data-aos='fade-down' data-aos-delay='300'>
                  <a href='profile.php' >
                    <span class='icon'><i class='fas fa-user'></i></span>
                    <span class='title'>Profile</span>
                  </a>
                </li>";
      }
      ?>
      <!-------------------->
    </ul>
  </div>
  <!-------------------------->


  <!-- MOBILE BOTTOM NAVBAR -->
  <div class="mobile">
    <ul>

      <!-- SUPPORT BUTTON -->
      <?php
      if ($_SERVER['PHP_SELF'] == "/quakefocus/support.php") {
        echo "<li class='list active'>
                    <a href='support.php'>
                      <span class='icon'><i class='far fa-handshake'></i></span>
                      <span class='title'>Support</span>
                    </a>
                  </li>";
      } else {
        echo "<li class='list'>
                  <a href='support.php'>
                    <span class='icon'><i class='far fa-handshake'></i></span>
                    <span class='title'>Support</span>
                  </a>
                </li>";
      }
      ?>
      <!-------------------->

      <!-- BLOG BUTTON -->
      <?php
      if ($_SERVER['PHP_SELF'] == "/quakefocus/blog.php") {
        echo "<li class='list active'>
                    <a href='blog.php'>
                      <span class='icon'><i class='far fa-rss'></i></span>
                      <span class='title'>Blog</span>
                    </a>
                  </li>";
      } else {
        echo "<li class='list'>
                  <a href='blog.php'>
                    <span class='icon'><i class='far fa-rss'></i></span>
                    <span class='title'>Blog</span>
                  </a>
                </li>";
      }
      ?>
      <!-------------------->

      <!-- COUNTER BUTTON -->
      <?php
      if ($_SERVER['PHP_SELF'] == "/quakefocus/index.php") {
        echo "<li class='list active'>
                    <a href='index.php'>
                      <span class='icon'><i class='far fa-stopwatch'></i></span>
                      <span class='title'>Counter</span>
                    </a>
                  </li>";
      } else {
        echo "<li class='list'>
                  <a href='index.php'>
                    <span class='icon'><i class='far fa-stopwatch'></i></span>
                    <span class='title'>Counter</span>
                  </a>
                </li>";
      }
      ?>
      <!-------------------->

      <!-- NUMBERS BUTTON -->
      <?php
      if ($_SERVER['PHP_SELF'] == "/quakefocus/numbers.php") {
        echo "<li class='list active'>
                    <a href='numbers.php'>
                      <span class='icon'><i class='far fa-cubes'></i></span>
                      <span class='title'>Numbers</span>
                    </a>
                  </li>";
      } else {
        echo "<li class='list'>
                  <a href='numbers.php'>
                    <span class='icon'><i class='far fa-cubes'></i></span>
                    <span class='title'>Numbers</span>
                  </a>
                </li>";
      }
      ?>
      <!-------------------->

      <!-- PROFILE BUTTON -->
      <?php
      if ($_SERVER['PHP_SELF'] == "/quakefocus/profile.php") {
        echo "<li class='list active'>
                    <a href='profile.php'>
                      <span class='icon'><i class='far fa-user'></i></span>
                      <span class='title'>Profile</span>
                    </a>
                  </li>";
      } else {
        echo "<li class='list'>
                  <a href='profile.php' >
                    <span class='icon'><i class='far fa-user'></i></span>
                    <span class='title'>Profile</span>
                  </a>
                </li>";
      }
      ?>
      <!-------------------->

      <div class="indicator"></div>
    </ul>
  </div>
  <!-------------------------------->
</body>


<script src="js/header.js"></script>

<script>
  AOS.init();
</script>

</html>