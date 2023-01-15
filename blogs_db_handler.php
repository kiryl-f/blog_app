<?php

$conn = new mysqli("localhost", "root", "", 'blog_app_db');

function addBlogToDB($name, $text) {
    global $conn;
    $date = date("Y/m/d");
    $user_id = $_COOKIE['id'];
    $sql = "INSERT INTO blogs (name, text, date, added_by_id) VALUES ('$name', '$text', '$date', '$user_id')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('result' => 'blog_added'));
    } else {
        echo json_encode(array('result' => 'error'));
    }
}

function deleteBlogPost($id) {
    $conn = new mysqli("localhost", "root", "", 'blog_app_db');
    $sql = "DELETE FROM blogs WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        return 'Blog deleted!';
    }
    return 'Something went wrong';
}