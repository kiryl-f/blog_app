<?php

require_once 'oop/user.php';

$conn = new mysqli("localhost", "root", "", 'blog_app_db');

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
            echo json_encode(array('result' => 'errorr'));
        }
    }
    $conn->close();
}

function userExists($login, $password): string {
    global $conn;

    $sql = "SELECT id, login, password, name FROM users WHERE login='$login'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    if(count($data) === 0) {
        return 'not_exist';
    } else {
        if ($data[0]['password'] === $password) {
            setcookie('name', $data[0]['name']);
            setcookie('id', $data[0]['id']);
            return 'cool';
        } else {
            return 'password_incorrect';
        }
    }
}
