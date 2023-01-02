<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log in</title>
    <link rel="stylesheet" href="css/header.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="js/login.js"></script>
</head>

<body>

<div class="topnav">
    <a href="index.php">Home</a>
    <div class="topnav-right">
        <a class="active" href="authentication.php">Log in</a>
        <a href="registration.php">Create an account</a>
    </div>
</div>


<div class="container" id="login">
    <h1>Welcome</h1>
    <p>Enter your data</p>
    <form>
        <input type="text" id="login" name="login" placeholder="Enter your login here" required><br>
        <input type="password" id="password" name="password" placeholder="Enter your password here" required><br>
        <input type="submit" value="Log in">
    </form>
</div>

</body>