<?php

require_once 'blogs_db_handler.php';

$id = $_POST['id'];
$res = deleteBlogPost($id);
echo json_encode(array('res' => $res));

//echo json_encode(array('res' => $id));
