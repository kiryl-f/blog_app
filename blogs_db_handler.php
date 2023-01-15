<?php

$conn = new mysqli("localhost", "root", "", 'blog_app_db');

function addBlogToDB($name, $text) {
    global $conn;
    $date = date("Y/m/d");
    $sql = "INSERT INTO blogs (name, text, date) VALUES ('$name', '$text', '$date')";
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