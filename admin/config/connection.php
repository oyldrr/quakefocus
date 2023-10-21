<?php
// MYSQLI
$conn = mysqli_connect('localhost', 'root', 'password', 'quakefocus');

if (!$conn) {
    echo 'Connection error : ' . mysqli_connect_error();
} 

// PDO
try {
    $connection = new PDO("mysql:host=localhost;dbname=quakefocus;charset=utf8", 'root', 'password');
} catch (Exception $e) {

    echo $e->getMessage();
}
