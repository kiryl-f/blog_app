<!DOCTYPE html>
<html lang="en">

<head>
    <title>My blogs</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main_page_style.css">
    <link rel="stylesheet" href="css/base_style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="js/save_blog_post_changes.js"></script>
</head>

<?php
$log_in_button_text = '';
$log_in_button_link = '';
require_once 'cookies.php';

$blog_id = $_POST['id_input'];

require_once 'blogs_db_handler.php';
$blog = getBlogByID($blog_id);
$name = $blog['name'];
$text = $blog['text'];
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

<div>
    <form>
        <input id="blog_id" name="blog_id" type="hidden" value="<?=$blog_id?>">
        <textarea id="new_name" name="new_name"><?=$name?></textarea>
        <br>
        <textarea rows="1" id="new_text" name="new_text"><?=$text?></textarea>
        <br>
        <input type="submit" value="Save changes">
    </form>
</div>
</body>