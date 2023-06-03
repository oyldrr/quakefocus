<?php
ob_start();
require_once "config/connection.php";
include_once "header.php";

session_start();

if (isset($_SESSION["loggedin"]) !== true) {
    header('location:login.php');
    exit();
}
?>  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quake Focus | Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="content"></div>
    <?php include_once "footer.php";?>
</body>

</html>