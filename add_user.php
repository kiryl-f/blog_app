<?php

require_once 'db_handler.php';

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    createUser($_POST['login'], $_POST['password'], $_POST['name'], $_POST['email']);
    //echo json_encode(array('result' => 'user_created'));
    /*$servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "blog_app_db";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $login = $_POST['login'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql
        = "INSERT INTO users (login, password, name, email) VALUES ($login, $password, $name, $email)";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('result' => 'user_created'));
    } else {
        echo json_encode(array('result' => 'error'));
    }
    $conn->close();*/
}
