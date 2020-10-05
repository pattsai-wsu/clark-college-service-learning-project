<?php

$servername="localhost";
$username="user_name";
$password="_psswrd;
$dbname="db_name";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}

//echo "<p>Connected to MYSQL DB successfully</p>";
?>

