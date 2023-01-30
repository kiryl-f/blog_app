<!DOCTYPE html>
<html lang="en">

<head>
    <title>New blog post</title>
    <link rel="stylesheet" href="css/header.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="js/new_blog_post.js"></script>
</head>

<body>

<div class="topnav">
    <a href="index.php">Home</a>
    <div class="topnav-right">
        <a href="authentication.php">Log in</a>
        <a href="registration.php">Create an account</a>
    </div>
</div>

<div>
    <form>
        <h2>New blog post</h2>
        <textarea id="blog_name" name="blog_name" placeholder="Blog name..." required></textarea>
        <br>
        <textarea id="blog_text" name="blog_text"  placeholder="Blog text" required></textarea>
        <br>
        <input type="submit" value="Create a blog post">
    </form>
</div>
</body>