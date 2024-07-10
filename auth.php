<?php
  session_start();

  $username = $_SESSION['username'];
  $password = $_SESSION['password'];
  if(!(isset($username) && isset($password))){
    header('location: login.php');
  }
  $connection = mysqli_connect("localhost","root","12345","php");

  
?>