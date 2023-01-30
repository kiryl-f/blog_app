<?php

$conn = new mysqli("localhost", "root", "", 'blog_app_db');

function addBlogToDB($name, $text): string
{
    global $conn;
    $date = date("Y/m/d");
    $user_id = $_COOKIE['id'];
    $sql = "INSERT INTO blogs (name, text, date, added_by_id) VALUES ('$name', '$text', '$date', '$user_id')";
    if (mysqli_query($conn, $sql)) {
        return 'blog_added';
    }
    return 'error';
}

function deleteBlogPost($id): string
{
    global $conn;
    $sql = "DELETE FROM blogs WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        return 'deleted';
    }
    return 'error';
}

function saveBlogPostChanges($id, $blog): string
{
    global $conn;
    $name = $blog->getName();
    $text = $blog->getText();
    $sql = "UPDATE blogs SET name='$name', text='$text' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        return 'blog_added';
    }
    return 'error';
}

function getAllBlogs() {
    global $conn;
    $sql = "SELECT * FROM blogs";
    $query = mysqli_query($conn, $sql);
    while($blog = mysqli_fetch_assoc($query)) {
        $blogs[] = $blog;
    }
    return $blogs;
}
