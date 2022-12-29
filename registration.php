<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration</title>
    <link rel="stylesheet" href="css/welcome_page_style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="js/add_user_ajax.js"></script>
</head>

<body>
<div class="container" id="login">
    <h1>Welcome</h1>
    <p>Create an account</p>
    <form>
        <input type="text" id="login" name="login" placeholder="Enter your login here" required><br>
        <input type="password" id="password" name="password" placeholder="Enter your password here" required><br>
        <input type="text" id="name" name="name" placeholder="Enter your name here" required><br>
        <input type="text" id="email" name="email" placeholder="Enter your email here" required><br>
        <input type="submit" value="Log in">
    </form>
</div>

</body>