<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$_GET['name']?></title>
    <link rel="stylesheet" href="css/header.css">
</head>

<?php
require_once 'blogs_db_handler.php';

$id = $_GET['id'];
$response = deleteBlogPost($id);
?>
<body>
    <h1><?= $response?></h1>
</body>