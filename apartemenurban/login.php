<?php
require "Connect.php";
/*$username = $_POST["username"];
$password = $_POST["password"];*/

$username = "typical";
$password = "123123123";

$isValidUsername = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
if($conn){
if($isValidUsername === false){
echo "Username Salah";
}else{
$sqlCheckUsername = "SELECT * FROM sales_login  WHERE username LIKE '$username'";
$usernameQuery = mysqli_query($conn, $sqlCheckUsername);
if(mysqli_num_rows($usernameQuery) > 0){
$sqlLogin = "SELECT * FROM sales_login WHERE username LIKE '$username' AND password LIKE '$password'";
$login_query = mysqli_query($conn, $sqlLogin);
if(mysqli_num_rows($login_query) > 0){
echo "Berhasil masuk";
}else{
echo "Password Salah";
}
}else{
echo "Username belum terdaftar";
}
}
}
else{
echo "Connection Error";
}