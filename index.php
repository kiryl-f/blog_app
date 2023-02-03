<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome!</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main_page_style.css">
    <link rel="stylesheet" href="css/base_style.css">
    <link rel="stylesheet" href="css/input_forms_style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="js/delete_blog_post.js"></script>
</head>

<body>

<?php

$log_in_button_text = '';
$log_in_button_link = '';
$conn = null;
require_once 'cookies.php';
require_once 'create_db_and_connect.php';

require_once 'blogs_db_handler.php';
$blogs = getAllBlogs();
?>

<div class="topnav">
    <a class="active" href="#home">Home</a>
    <div class="topnav-right">
        <a href=<?php echo $log_in_button_link?>><?php echo $log_in_button_text?></a>
        <a href="registration.php">Create an account</a>
        <?php if(isset($_COOKIE['id'])):?>
            <a href="my_blogs.php">My blogs</a>
        <?php endif;?>
    </div>
</div>

<h1 style="color: #222222; font-size: 36px" align="center">All blogs</h1>

<?php if(isset($_COOKIE['name'])) : ?>
    <div style="margin-bottom: 8px; margin-top: 8px">
        <form action="new_blog_post.php">
            <input type="submit" value="Create a blog post" id="new_blog">
        </form>
    </div>
<?php endif; ?>
<div id="blogs_table" class="scroll">
    <?php foreach($blogs as $blog): ?>
        <div id="blogpost<?php echo $blog['id']?>" style="margin-top: 10px">
            <img src="assets/blog-gc2b74ed2e_1920.jpg" width="200" height="200" alt="Ooops!" style="border-radius: 16px" id="blog_cover_img">
            <br>
            <a style="margin-bottom: 5px; margin-top: 5px" href="blog_page.php?id=<?php echo $blog['id']?>?name=<?php echo $blog['name']?>"><?= $blog['name'] .' ('. $blog['date'] .')' ?></a>
            <br>
        </div>
    <?php endforeach; ?>
</div>

<footer> Kiryl(c) 2022 All rights reserved</footer>
</body>

