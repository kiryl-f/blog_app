<!DOCTYPE html>
<html lang="en">
<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$sql = "CREATE DATABASE IF NOT EXISTS blog_app_db";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<head>
    <title>Welcome!</title>
    <link rel="stylesheet" href="css/welcome_page_style.css">
</head>

<body>
<div class="container" id="login">
    <h1>Welcome</h1>
    <p>Enter your data here</p>
    <form id="#login_form">
        <input type="text" id="login_input" name="login_input" placeholder="Enter your login here" required><br>
        <input type="password" id="password_input" name="password_input" placeholder="Enter your password here" required><br>
        <input type="submit" value="Log in">
    </form>
</div>

</body>