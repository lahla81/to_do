<?php
session_start();
$_SESSION['user_id']= 1;
$server_name = "localhost";
$user_name = "root";
$password = "";
$dbname = "to_do";
$connection = new mysqli($server_name, $user_name, $password, $dbname);
if ($connection->connect_error) {
    echo "فشل الإتصال مع قاعدة البيانات $connection->connect_error";
} else {
   echo "تم الإتصال بقاعدة البيانات بنجاح";
}
