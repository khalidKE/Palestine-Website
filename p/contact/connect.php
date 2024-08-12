<?php

$host = "Localhost";
$user = "root";
$password = "";
$db_name = "users";
$conn = mysqli_connect($host, $user, $password, $db_name);
if (!$conn) {
    echo "Error " . mysqli_connect_error();
}
