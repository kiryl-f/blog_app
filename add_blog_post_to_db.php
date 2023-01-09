<?php

require_once 'oop/blog.php';

$name = $_POST['blog_name'];
$text = $_POST['blog_text'];
$blog = new Blog($name, $text);

if($blog->getErrorMessage() === '') {
    //add to DB

    echo json_encode(array('res' => 'added'));
} else {
    echo json_encode(array('res' => $blog->getErrorMessage()));
}
