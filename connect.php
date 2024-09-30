<?php

$host = "localhost";
$user="root";
$pass = "";
$db = "login";
$connect = new mysqli($host, $user, $pass, $db);

if ($connect->connect_error) {
    echo "Failed to connect to database.".$connect->connect_error;
}

?>