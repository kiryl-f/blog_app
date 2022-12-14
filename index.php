<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome!</title>
    <link rel="stylesheet" href="css/header.css">
</head>

<body>

<?php
$log_in_button_text = 'Log in';
$log_in_button_link = "authentication.php";
if(isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
    echo "Hello, $name";
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


<table>
    <?php foreach($blogs as $blog): ?>
        <tr>
            <td><?= $blog['NAME'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>