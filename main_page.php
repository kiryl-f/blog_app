<?php
require_once 'user.php';

$user = new User('login', 'password', 'name', 'email');

$servername = "localhost";
$username = "root";
$db_password = "";
$dbname = "blog_app_db";

$conn = new mysqli($servername, $username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT login FROM users WHERE login='$user->getLogin()'";
$query = mysqli_query($conn, $sql);
var_dump(mysqli_fetch_all($query));