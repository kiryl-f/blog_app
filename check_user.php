<?php

require_once 'users_db_handler.php';

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if(isset($_COOKIE['name'])) {
        setcookie('name', "", time() - 3600);
        echo json_encode(array('result' => 'cool'));
    } else {
        if (userExists($_POST['login'], $_POST['password']) === 'cool') {
            echo json_encode(array('result' => 'cool'));
        } else if (userExists($_POST['login'], $_POST['password']) === 'password_incorrect') {
            echo json_encode(array('result' => 'password_incorrect'));
        } else {
            echo json_encode(array('result' => 'invalid_login'));
        }
    }
}