<?php

    function register($username,$password,$name,$email,$profile_path){
        include('mysql_functions.php');
        $hashed_password = password_hash($password,PASSWORD_BCRYPT);
        $user = find_by_user_name($username);
        if($user){
            if($user['user_name'] == $username){
                return false;
            }
        }if(add_user($name,$email,$hashed_password,$username,$profile_path)){
            return true;
        }else{
            return false;
        }
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $profile_directory = "profiles/";
    $profile_path = $profile_directory . basename($_FILES['profile']['name']);
    if(register($username,$password,$name,$email,$profile_path)){
        move_uploaded_file($_FILES["profile"]["tmp_name"],$profile_path);
        header('location: login.php?register=1');
    }else{
        header('location: signup.php?register=0');
    }



?>