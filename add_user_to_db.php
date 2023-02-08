<?php

require_once 'users_db_handler.php';
require_once 'oop/user.php';

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $user = new User($_POST['login'], md5($_POST['password']) . 'salt', $_POST['name'], $_POST['email']);
    createUser($user);
}
