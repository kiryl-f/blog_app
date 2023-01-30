<?php

require_once 'oop/blog.php';
require_once 'blogs_db_handler.php';

$id = $_POST['blog_id'];
$name = $_POST['new_name'];
$text = $_POST['new_text'];

$blog = new Blog($name, $text);
if($blog->getErrorMessage() === '') {
    $res = saveBlogPostChanges($id, new Blog($name, $text));
    if ($res === 'blog_added') {
        echo json_encode(array('res' => 'saved'));
    } else {
        echo json_encode(array('res' => 'error'));
    }
} else {
    echo json_encode(array('res' => $blog->getErrorMessage()));
}
