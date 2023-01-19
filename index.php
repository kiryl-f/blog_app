<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome!</title>
    <link rel="stylesheet" href="css/header.css">

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


$conn = new mysqli("localhost", "root", "", 'blog_app_db');

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
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <div class="topnav-right">
        <a href=<?php echo $log_in_button_link?>><?php echo $log_in_button_text?></a>
        <a href="registration.php">Create an account</a>
    </div>
</div>

<?php if(isset($_COOKIE['name'])) : ?>
    <div>
        <a href="new_blog_post.php">Create a blog post</a>
    </div>
<?php endif; ?>

<div id="blogs_table" class="scroll">
    <?php foreach($blogs as $blog): ?>
        <div id="blogpost<?php echo $blog['ID']?>">
            <img src="https://i.picsum.photos/id/168/200/200.jpg?hmac=VxnpUGg87Q47YRONmdsU2vNGSPjCs5vrwiAL-0hEIHM" alt="Ooops!">
            <br>
            <a href="blog.php?id=<?php echo $blog['ID']?>?name=<?php echo $blog['NAME']?>"><?= $blog['NAME'] ?></a>
            <br>
            <button type="button" onclick="deleteBlogPost(<?php echo $blog['ID']?>)">Delete</button>
            <br>
        </div>
    <?php endforeach; ?>
</div>
</body>