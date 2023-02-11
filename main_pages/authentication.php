<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log in</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/input_forms_style.css">
    <link rel="stylesheet" href="../css/base_style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="../js/login.js"></script>
</head>

<body>

<div class="topnav">
    <a href="../index.php">Home</a>
    <div class="topnav-right">
        <a class="active" href="authentication.php">Log in</a>
        <a href="registration.php">Create an account</a>
    </div>
</div>


<div class="container" id="login_div">
    <h1 id="welcome_header">Welcome</h1>
    <p id="enter_data_paragraph">Enter your data</p>
    <form>
        <input type="text" class="input_form" id="login" name="login" placeholder="Enter your login here" required><br>
        <input type="password" class="input_form" id="password" name="password" placeholder="Enter your password here" required><br>
        <input type="submit" class="submit_form" value="Log in">
    </form>
</div>

<footer> Kiryl(c) 2022 All rights reserved</footer>

</body>
