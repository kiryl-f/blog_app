<?php

require_once 'oop/blog.php';
require_once 'blogs_db_handler.php';

$name = $_POST['blog_name'];
$text = $_POST['blog_text'];
$blog = new Blog($name, $text);

if($blog->getErrorMessage() === '') {
    $res = addBlogToDB($name, $text);
    echo json_encode(array('result' => $res));
} else {
    echo json_encode(array('result' => $blog->getErrorMessage()));
}
//echo json_encode(array('res' => 'cool'));