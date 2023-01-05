<?php

require_once 'user.php';

$conn = new mysqli("localhost", "root", "", 'blog_app_db');
createUser(new User('lg', 'pw','nm','mail'));

function loginTaken($login): bool {
    global $conn;

    $sql = "SELECT login FROM users WHERE login='$login'";
    $query = mysqli_query($conn, $sql);
    $arr = mysqli_fetch_all($query, MYSQLI_ASSOC);
    if (count($arr) > 0) {
        return true;
    }
    return false;
}

function checkUserFields($user) {
    if(strlen($user->getErrorMessage()) === 0) {
        return 'ok';
    }
    return $user->getErrorMessage();
}

function createUser($user) {

    global $conn;

    if(checkUserFields($user) !== 'ok') {
        echo json_encode(array('result' => checkUserFields($user)));
        exit;
    }

    /*$servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "blog_app_db";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }*/

    $login = $user->getLogin();
    $password = $user->getPassword();
    $name = $user->getName();
    $email = $user->getEmail();

    if(loginTaken($user->getLogin())) {
        echo json_encode(array('result' => 'login_taken'));
    } else {
        $sql = "INSERT INTO users (login, password, name, email) VALUES ('$login',   '$password', '$name', '$email')";
        if (mysqli_query($conn, $sql)) {
            setcookie('name', $name);
            echo json_encode(array('result' => 'user_created'));
        } else {
            echo json_encode(array('result' => 'error'));
        }
    }
    $conn->close();
}

function userExists($login, $password) {
    /*$servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "blog_app_db";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }*/

    global $conn;

    $sql = "SELECT login, password, name FROM users WHERE login='$login'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    if(count($data) === 0) {
        return 'not_exist';
    } else {
        if ($data[0]['password'] === $password) {
            setcookie('name', $data[0]['name']);
            return 'cool';
        } else {
            return 'password_incorrect';
        }
    }
}
