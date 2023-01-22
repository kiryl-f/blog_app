<!DOCTYPE html>
<html lang="en">

<head>
    <title>My articles</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main_page_style.css">
    <link rel="stylesheet" href="css/base_style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="js/delete_blog_post.js"></script>
</head>

<?php
$log_in_button_text = 'Log in';
$log_in_button_link = "authentication.php";
$logged_in = false;
$id = $_COOKIE['id'];
$name = $_COOKIE['name'];
$log_in_button_text = 'Log out';
echo "Hello, $name (user $id)";

$conn = new mysqli("localhost", "root", "", "blog_app_db");
$get_blogs_sql = "SELECT * FROM blogs WHERE blogs.added_by_id='$id'";
$query = mysqli_query($conn, $get_blogs_sql);
$blogs = array();
while($blog = mysqli_fetch_assoc($query)) {
    $blogs[] = $blog;
}
?>

<body>

<div class="topnav">
    <a href="index.php">Home</a>
    <div class="topnav-right">
        <a href=<?php echo $log_in_button_link?>><?php echo $log_in_button_text?></a>
        <a href="registration.php">Create an account</a>
        <a class="active" href="my_articles.php">My articles</a>
    </div>
</div>

<h2 style="color: #222222; font-size: 36px" align="center">Your blogs</h2>

<div id="blogs_table" class="scroll">
    <?php foreach($blogs as $blog): ?>
        <div id="blogpost<?php echo $blog['id']?>">
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