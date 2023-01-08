<?php

$conn = new mysqli("localhost", "root", "", 'blog_app_db');

function addBlogToDB($name, $text) {
    global $conn;
    $sql = "INSERT INTO blogs (name, text, name, email) VALUES ('$name', '$text')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('result' => 'blog_added'));
    } else {
        echo json_encode(array('result' => 'error'));
    }
}