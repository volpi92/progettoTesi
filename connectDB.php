<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "progettotesimwd";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$mysqli->set_charset("utf8");

?>