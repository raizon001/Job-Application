<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "list";  // Change to 'list' as per your database table name

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
