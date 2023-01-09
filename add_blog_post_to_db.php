<?php

require_once 'oop/blog.php';

$name = $_POST['blog_name'];
$text = $_POST['blog_text'];
$blog = new Blog($name, $text);

if($blog->getErrorMessage() === '') {
    //add to DB
    $sql = "INSERT INTO users ($name, $text) VALUES ('$name',   '$text','$blog->getDate()')";
    if (mysqli_query($conn, $sql)) {
        setcookie('name', $name);
        echo json_encode(array('result' => 'user_created'));
    } else {
        echo json_encode(array('result' => 'error'));
    }
    echo json_encode(array('res' => 'added'));
} else {
    echo json_encode(array('res' => $blog->getErrorMessage()));
}
