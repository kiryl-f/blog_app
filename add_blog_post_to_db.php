<?php

require_once 'oop/blog.php';
require_once 'blogs_db_handler.php';

$name = $_POST['blog_name'];
$text = $_POST['blog_text'];
$blog = new Blog($name, $text);

if($blog->getErrorMessage() === '') {
    //add to DB
    addBlogToDB($name, $text);
    //echo json_encode(array('res' => 'added'));
} else {
    echo json_encode(array('res' => $blog->getErrorMessage()));
}
//echo json_encode(array('result' => 'blog_added'));