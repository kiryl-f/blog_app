<?php

require_once 'oop/blog.php';
$id = $_POST['id'];
$name = $_POST['name'];
$text = $_POST['text'];

$res = saveBlogPostChanges($id, new Blog($name, $text));
if($res === 'blog_added') {
    echo json_encode(array('res' => 'added'));
} else {
    echo json_encode(array('res' => 'error'));
}