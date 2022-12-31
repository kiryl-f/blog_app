<?php

require_once 'db_handler.php';

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    createUser($_POST['login'], $_POST['password'], $_POST['name'], $_POST['email']);
    /*$servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "blog_app_db";


    $login = $_POST['login'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (login, password, name, email) VALUES ($login, $password, $name, $password)";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('result' => 'user_created'));
    } else {
        echo json_encode(array('result' => 'error'));
    }
    $conn->close();*/

}
