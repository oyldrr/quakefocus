<?php
// Initialize the session
session_start();
require_once "config/connection.php";
include_once "header.php";

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) === true) {
    header("location:index.php");
    exit;
}