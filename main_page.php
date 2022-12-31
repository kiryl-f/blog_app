<?php
$servername = "localhost";
$username = "root";
$db_password = "";
$dbname = "blog_app_db";

$conn = new mysqli($servername, $username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT login, password FROM users WHERE login='login'";
$query = mysqli_query($conn, $sql);
$arr = mysqli_fetch_all($query, MYSQLI_ASSOC);
var_dump($arr);