<?php
$log_in_button_text = 'Log in';
$log_in_button_link = 'main_pages/authentication.php';
$logged_in = false;
$id = '';
$name = '';
if(isset($_COOKIE['name'])) {
    $logged_in = true;
    $name = $_COOKIE['name'];
    $id = $_COOKIE['id'];
    echo "Hello, $name (user $id)";
    $log_in_button_text = 'Log out';
    $log_in_button_link = 'log_out.php';
}