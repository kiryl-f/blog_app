<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome!</title>
    <link rel="stylesheet" href="css/welcome_page_style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="js/add_user_ajax.js"></script>
</head>

<body>
<div class="container" id="login">
    <h1>Welcome</h1>
    <p>Enter your data here</p>
    <form>
        <input type="text" id="login_input" name="login_input" placeholder="Enter your login here" required><br>
        <input type="password" id="password_input" name="password_input" placeholder="Enter your password here" required><br>
        <input type="submit" value="Log in">
    </form>
</div>

</body>