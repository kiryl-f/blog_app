<!DOCTYPE html>
<html lang="en">

<head>
    <title>My blogs</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main_page_style.css">
    <link rel="stylesheet" href="css/base_style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="js/delete_blog_post.js"></script>
</head>

<?php
$log_in_button_text = '';
$log_in_button_link = '';

require_once 'cookies.php';
require_once 'blogs_db_handler.php';

$id = $_COOKIE['id'];
$blogs = getBlogsByCreatorID($id);
?>

<body>

<div class="topnav">
    <a href="index.php">Home</a>
    <div class="topnav-right">
        <a href=<?php echo $log_in_button_link?>><?php echo $log_in_button_text?></a>
        <a href="registration.php">Create an account</a>
        <a class="active" href="my_blogs.php">My blogs</a>
    </div>
</div>

<h2 style="color: #222222; font-size: 36px" align="center">Your blogs</h2>

<div id="blogs_table" class="scroll">
    <?php foreach($blogs as $blog): ?>
        <div id="blogpost<?php echo $blog['id']?>" style="margin-top: 10px ">
            <img src="assets/blog-gc2b74ed2e_1920.jpg" width="200" height="200" alt="Ooops!" style="border-radius: 16px">
            <br>
            <a style="margin-bottom: 5px; margin-top: 5px" href="blog_page.php?id=<?php echo $blog['id']?>?name=<?php echo $blog['name']?>"><?= $blog['name'] .' ('. $blog['date'] .')' ?></a>
            <br>
            <?php if(isset($_COOKIE['id'])): ?>
                <?php if($blog['added_by_id'] === $_COOKIE['id']): ?>
                    <button type="button" style="margin-top: 5px" onclick="deleteBlogPost(<?=$blog['id']?>)">Delete</button>
                    <br>
                    <form method="post" action="edit_blog_post.php">
                        <input type="hidden" name="id_input" id="id_input" value="<?=$blog['id']?>">
                        <input type="submit" value="Edit">
                    </form>
                    <br>
                <?php endif;?>
            <?php endif;?>
        </div>
    <?php endforeach; ?>
</div>

<footer> Kiryl(c) 2022 All rights reserved</footer>

</body>