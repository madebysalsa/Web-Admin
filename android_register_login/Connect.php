<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "urbansky";

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//try {
    //$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user);
//}
//catch (PDOException $e) {
   // die("Terjadi Masalah: " . $e->getMessage());
//}

//$conn = mysqli_connect("localhost", "root", "", "user");
?>