<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'university';

$con = mysqli_connect($hostname, $username, $password, $database);

if (!$con) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
