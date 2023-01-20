<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$_GET['name']?></title>
    <link rel="stylesheet" href="css/header.css">
</head>

<body>

</body>

<?php
$id = $_GET['id'];

$conn = new mysqli("localhost", "root", "", 'blog_app_db');
$sql = "SELECT * FROM blogs WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
$name = $data['0']['name'];
$text = $data[0]['text'];

echo "<h1>$name</h1> <br> <p>$text</p>";

