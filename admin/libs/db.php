<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "web_movie";

$link = mysqli_connect($server, $user, $pass, $database);
mysqli_query($link,'set names utf8');
if (!$link) {
    die("<script>alert('Connection Failed.')</script>");
}

?>