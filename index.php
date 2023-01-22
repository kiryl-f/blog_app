<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome!</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main_page_style.css">
    <link rel="stylesheet" href="css/base_style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="js/delete_blog_post.js"></script>
</head>

<body>

<?php
$log_in_button_text = 'Log in';
$log_in_button_link = "authentication.php";
$logged_in = false;
$id = '';
$name = '';
if(isset($_COOKIE['name'])) {
    $logged_in = true;
    $name = $_COOKIE['name'];
    $id = $_COOKIE['id'];
    echo "Hello, $name (user $id)";
    $log_in_button_text = 'Log out';
    $log_in_button_link = "log_out.php";
}

$db_name = "blog_app_db";
$conn = new mysqli("localhost", "root", "");
if(!mysqli_select_db($conn, $db_name)) {
    $create_db_sql = "CREATE DATABASE blog_app_db";
}
$conn->select_db($db_name);
$create_users_table_sql = "CREATE TABLE IF NOT EXISTS users (
id INT(11) AUTO_INCREMENT PRIMARY KEY,
login VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
name VARCHAR(255),
email VARCHAR(255))";
$conn->query($create_users_table_sql);

$create_blogs_table_sql = "CREATE TABLE IF NOT EXISTS blogs (
id INT(11) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
text VARCHAR(255) NOT NULL,
date VARCHAR(255) NOT NULL,
added_by_id INT(11) NOT NULL)";
$conn -> query($create_blogs_table_sql);

//$conn = new mysqli("localhost", "root", "", 'blog_app_db');

$sql = "SELECT * FROM blogs";
$query = mysqli_query($conn, $sql);
$blogs = array();
while($blog = mysqli_fetch_assoc($query)) {
    $blogs[] = $blog;
}
//var_dump($blogs);
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
            <input type="submit" value="Create a blog post">
        </form>
    </div>
<?php endif; ?>
<div id="blogs_table" class="scroll">
    <?php foreach($blogs as $blog): ?>
        <div id="blogpost<?php echo $blog['id']?>" style="margin-top: 10px">
            <img src="https://i.picsum.photos/id/168/200/200.jpg?hmac=VxnpUGg87Q47YRONmdsU2vNGSPjCs5vrwiAL-0hEIHM" alt="Ooops!" style="border-radius: 16px">
            <br>
            <a style="margin-bottom: 5px; margin-top: 5px" href="blog_page.php?id=<?php echo $blog['id']?>?name=<?php echo $blog['name']?>"><?= $blog['name'] .' ('. $blog['date'] .')' ?></a>
            <br>
            <?php if(isset($_COOKIE['id'])): ?>
                <?php if($blog['added_by_id'] === $_COOKIE['id']): ?>
                    <button type="button" style="margin-top: 5px" onclick="deleteBlogPost(<?php echo $blog['id']?>)">Delete</button>
                    <br>
                <?php endif;?>
            <?php endif;?>
        </div>
    <?php endforeach; ?>
</div>
</body>

<footer> Kiryl(c) 2022 All rights reserved</footer>