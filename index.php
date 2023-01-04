<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome!</title>
    <link rel="stylesheet" href="css/header.css">
</head>

<body>

<?php
$log_in_button_text = 'Log in';
if(isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
    echo "Hello, $name";
    $log_in_button_text = 'Log out';
}
?>

<div class="topnav">
    <a class="active" href="#home">Home</a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <div class="topnav-right">
        <a href="authentication.php"><?php echo $log_in_button_text?></a>
        <a href="registration.php">Create an account</a>
    </div>
</div>

</body>