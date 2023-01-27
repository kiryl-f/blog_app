<!DOCTYPE html>
<html lang="en">

<head>
    <title>My articles</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main_page_style.css">
    <link rel="stylesheet" href="css/base_style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="js/save_blog_post_changes.js"></script>
</head>

<?php
$log_in_button_text = 'Log in';
$log_in_button_link = "authentication.php";
$logged_in = false;
$id = $_COOKIE['id'];
$name = $_COOKIE['name'];
$log_in_button_text = 'Log out';
echo "Hello, $name (user $id)";

$blog_id = $_POST['id_input'];
$conn = new mysqli("localhost", "root", "", "blog_app_db");
$get_blogs_sql = "SELECT * FROM blogs WHERE blogs.id='$blog_id'";
$query = mysqli_query($conn, $get_blogs_sql);
$blogs = array();
while($blog = mysqli_fetch_assoc($query)) {
    $blogs[] = $blog;
}
$name = $blogs[0]['name'];
$text = $blogs[0]['text'];
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
    <form onsubmit="saveChanges(<?=$blog_id?>)">
        <textarea rows="1" id="edit_name"><?=$name?></textarea>
        <br>
        <textarea id="edit_text"><?=$text?></textarea>
        <br>
        <input type="submit" value="Save changes">
    </form>
</div>
</body>