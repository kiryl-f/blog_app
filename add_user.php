<?php

require_once 'db_handler.php';

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    createUser($_POST['login'], $_POST['password'], $_POST['name'], $_POST['email']);
    echo json_encode(array('result' => 'ok'));
}
