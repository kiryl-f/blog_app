<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$_GET['name']?></title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/base_style.css">
</head>

<?php
$log_in_button_text = '';
$log_in_button_link = '';

include_once 'cookies.php';

$id = $_GET['id'];

$conn = new mysqli("localhost", "root", "", 'blog_app_db');
$sql = "SELECT * FROM blogs WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
$name = $data['0']['name'];
$text = $data[0]['text'];
?>

<div class="topnav">
    <a href="../index.php">Home</a>
    <div class="topnav-right">
        <a href=<?php echo $log_in_button_link?>><?php echo $log_in_button_text?></a>
        <a href="registration.php">Create an account</a>
        <?php if(isset($_COOKIE['id'])):?>
            <a href="my_blogs.php">My blogs</a>
        <?php endif;?>
    </div>
</div>

<div>
    <h1> <?=$text?></h1>
    <br>
    <p><?=$name?></p>
</div>

<body>

</body>

