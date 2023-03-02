<?php
$db_name = "blog_app_db";
$conn = new mysqli("localhost", "root", "");
if(!mysqli_select_db($conn, $db_name)) {
    $create_db_sql = "CREATE DATABASE blog_app_db";
    $conn->query($create_db_sql);
}
$conn->select_db($db_name);
$create_users_table_sql = "CREATE TABLE IF NOT EXISTS users (
id INT(11) AUTO_INCREMENT PRIMARY KEY,
login VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
name VARCHAR(255),
email VARCHAR(255))";
$conn->query($create_users_table_sql);

$create_blogs_table_sql = "CREATE TABLE IF NOT EXISTS blogs (
id INT(11) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
text VARCHAR(255) NOT NULL,
date VARCHAR(255) NOT NULL,
added_by_id INT(11) NOT NULL)";
$conn -> query($create_blogs_table_sql);