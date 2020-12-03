<?php
//if($_SERVER['REQUEST_METHOD'] == 'POST') {
  //  $response =  array();
  require "Connect.php";
     $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $c_pass = $_POST["c_pass"];
   // $password=password_hash($password, PASSWORD_DEFAULT);

   /*$name = "Salsabillare";
   $username = "tydfsd";
   $password = "123123123";
   $c_pass = "123123123";*/

    $isValidUsername = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
    if($conn){
        if(strlen($password)>30 || strlen($password)<6){
            echo "Password harus kurang dari 30 karakter dan lebih dari 6 karakter";
        } else if($isValidUsername === false){
            echo "This username is not valid!";
        } else {
            $sqlCheckName = "SELECT * FROM user_table  WHERE name LIKE '$name'";
            $nameQuery = mysqli_query($conn, $sqlCheckName);

            $sqlCheckUsername = "SELECT * FROM user_table  WHERE username LIKE '$username'";
            $usernameQuery = mysqli_query($conn, $sqlCheckUsername);

            if(mysqli_num_rows($nameQuery) > 0 ){
                echo "Name is already used";
            }else if(mysqli_num_rows($usernameQuery) > 0 ){
                echo "Username already used";
            }
            else{
                $sql_register = "INSERT INTO user_table (name, username, password, c_pass) VALUES ('$name', '$username','$password','$c_pass')";
                if(mysqli_query($conn, $sql_register)){
                    echo "Successfully Registered";
                } else{
                    echo "Failed to register";
                }
            }
            }

    } else {
        echo "Connection Error";
    }
?>