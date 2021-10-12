<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "web_movie";

$link = mysqli_connect($server, $user, $pass, $database);

if (!$link) {
    die("<script>alert('Connection Failed.')</script>");
}

?>