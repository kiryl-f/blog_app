<?php

/*function connectToDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";

// Create connection
    $conn = new mysqli($servername, $username, $password);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
    $sql = "CREATE DATABASE IF NOT EXISTS blog_app_db";
    if (mysqli_query($conn, $sql)) {
        //echo "Database created successfully";
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }

    createTable($conn);

    return $conn;
}*/

/*function createTable($conn) {
    $servername = "localhost";
    $username = "root";
    $password = "";

// Create connection
    //$conn = new mysqli($servername, $username, $password, 'blog_app_db');
    $sql = "CREATE TABLE USERS (
                          ID int(11) AUTO_INCREMENT,
                          LOGIN varchar(255) NOT NULL,
                          PASSWORD varchar(255) NOT NULL,
                          NAME varchar(255) NOT NULL, 
                          EMAIL varchar(255) NOT NULL,
                          PRIMARY KEY  (ID)
                          )";
    if (!mysqli_query( $conn,"DESCRIBE `users`" )) {
        if ($conn->query($sql) === TRUE) {
            //echo "Table MyGuests created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }

    //$conn->close();
}*/


function loginTaken($conn, $login): bool {
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
    if(checkUserFields($user) !== 'ok') {
        echo json_encode(array('result' => checkUserFields($user)));
        exit;
    }

    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "blog_app_db";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $login = $user->getLogin();
    $password = $user->getPassword();
    $name = $user->getName();
    $email = $user->getEmail();

    if(loginTaken($conn, $user->getLogin())) {
        echo json_encode(array('result' => 'login_taken'));
    } else {
        $sql = "INSERT INTO users (login, password, name, email) VALUES ('$login',   '$password', '$name', '$email')";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array('result' => 'user_created'));
        } else {
            echo json_encode(array('result' => 'error'));
        }
    }
    $conn->close();
}

function userExists($login, $password) {
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "blog_app_db";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT login, password FROM users WHERE login='$login'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    if(count($data) === 0) {
        return 'not_exist';
    } else {
        if ($data[0]['password'] === $password) {
            return 'cool';
        } else {
            return 'password_incorrect';
        }
    }
}