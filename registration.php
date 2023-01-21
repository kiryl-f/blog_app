<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/input_forms_style.css">
    <link rel="stylesheet" href="css/base_style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="js/create_user.js"></script>
</head>

<body>

<div class="topnav">
    <a href="index.php">Home</a>
    <div class="topnav-right">
        <a href="authentication.php">Log in</a>
        <a class="active" href="registration.php">Create an account</a>
    </div>
</div>


<div class="container" id="login">
    <h1 id="welcome_header">Welcome</h1>
    <p id="enter_data_paragraph">Create an account</p>
    <form>
        <input class="input_form" type="text" id="login" name="login" placeholder="Enter your login here" required><br>
        <input class="input_form" type="password" id="password" name="password" placeholder="Enter your password here" required><br>
        <input class="input_form" type="text" id="name" name="name" placeholder="Enter your name here" required><br>
        <input class="input_form" type="email" id="email" name="email" placeholder="Enter your email here" required><br>
        <input class="submit_form" type="submit" value="Log in">
    </form>
</div>

<footer> Kiryl(c) 2022 All rights reserved</footer>

</body>

