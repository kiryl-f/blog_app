<?php

function connectToDB() {
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

    createTable();
}

function createTable() {
    $servername = "localhost";
    $username = "root";
    $password = "";

// Create connection
    $conn = new mysqli($servername, $username, $password, 'blog_app_db');
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

    $conn->close();
}

function createUser($login, $password, $name, $email) {
    $servername = "localhost";
    $username = "root";
    $password = "";

// Create connection
    $conn = new mysqli($servername, $username, $password, 'blog_app_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO MyGuests (LOGIN, PASSWORD, NAME, EMAIL) VALUES ($login, $password, $name, $email)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}