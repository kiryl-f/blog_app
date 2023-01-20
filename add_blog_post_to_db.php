<?php

require_once 'oop/blog.php';
require_once 'blogs_db_handler.php';

$name = $_POST['blog_name'];
$text = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum';
$blog = new Blog($name, $text);

if($blog->getErrorMessage() === '') {
    $res = addBlogToDB($name, $text);
    echo json_encode(array('result' => $res));
} else {
    echo json_encode(array('result' => $blog->getErrorMessage()));
}
//echo json_encode(array('res' => 'cool'));