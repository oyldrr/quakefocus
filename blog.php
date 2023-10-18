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
    <title>Quake Focus | Blog</title>

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
        <div class="blog-container w-75 mx-auto p-1 text-light">
            <h1 data-aos="fade-right" data-aos-delay="100">
                <i class="fas fa-fire"></i> Recent Post
            </h1>

            <?php
            // Getting recent post from database
            $stmt = $conn->prepare('SELECT * FROM posts ORDER BY created_at DESC');
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc()
            ?>
            <div class="recent-post" data-aos="fade-up" data-aos-delay="200">
                <h2 data-aos="flip-up" data-aos-delay="300">
                    <?= $row['title'] ?>
                </h2>
                <p data-aos="flip-up" data-aos-delay="400">
                    <?= $row['description'] ?>...
                </p>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-light" data-aos="fade-left" data-aos-delay="500">
                        <a class="text-decoration-none text-dark" href="post.php?post=<?= $row['title'] ?>">Read More</a></button>
                </div>
            </div>

            <div class="row mt-5 post-list">
                <h1 data-aos="fade-right" data-aos-delay="600">
                    <i class="fas fa-bars"></i> Other Posts
                </h1>

                <?php
                // Getting all the posts which is active and ordering by newest to oldest
                $stmt = $conn->prepare('SELECT * FROM posts WHERE active = 1 ORDER BY created_At DESC');
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) :
                ?>
                    <div class="col-sm-10 col-md-4 mx-auto mb-3 post text-light p-5 rounded" data-aos="fade-up" data-aos-delay="700">
                        <img src="img/posts-images/<?=$row['image']?>" alt="Post Image Alt">
                        <h2 data-aos="flip-up" data-aos-delay="800" data-aos-once="true">
                            <?= $row['title'] ?>
                        </h2>
                        <p data-aos="flip-up" data-aos-delay="900" data-aos-once="true">
                            <?= $row['description'] ?>...
                        </p>
                        <div>
                            <div class="d-block">
                                <button class="btn btn-light" data-aos="flip-up" data-aos-delay="1000" data-aos-once="true">
                                    <i class="fas fa-eye"></i>
                                    <a class="text-decoration-none text-dark" href="post.php?post=<?= $row['title'] ?>">Read More</a>
                                </button>
                            </div>
                        </div>
                    </div>

                <?php
                endwhile;
                ?>
        </div>
    </div>
    <?php include_once "footer.php"; ?>
</body>

</html>