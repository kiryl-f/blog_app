<?php

require_once 'db_handler.php';

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    //createUser($_POST['login'], $_POST['password'], $_POST['name'], $_POST['email']);
    if(userExists($_POST['login'], $_POST['password']) === 'cool') {
        setcookie('name', $_POST['name']);
        echo json_encode(array('result' => 'cool'));
    } else if(userExists($_POST['login'], $_POST['password']) === 'password_incorrect') {
        echo json_encode(array('result' => 'password_incorrect'));
    } else {
        echo json_encode(array('result' => 'invalid_login'));
    }
}