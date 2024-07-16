<?php 
$globalpassword = "12345";
$globalmysql_username = "root";
$globaldatabase = "php";
$globalhost = "localhost";

function find_by_user_name($username){
    $connection = mysqli_connect("localhost", "root", "12345", "php");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $escaped_username = mysqli_real_escape_string($connection, $username);
    $query = "SELECT * FROM users WHERE user_name='{$escaped_username}'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }
    mysqli_close($connection); 
    return mysqli_fetch_assoc($result);
}

function add_user($name,$email,$hashed_password,$username,$profile_path){
    $query = "insert into users(name,email,user_name,password,role,status,profile_url) values('{$name}','{$email}','{$username}','{$hashed_password}','user','1','{$profile_path}')";
    $connection = mysqli_connect("localhost", "root", "12345", "php");
    if(mysqli_query($connection,$query)){
        return true;
    }else{
        return false;
    }
}




?>
