<?php
  session_start();

  $username = $_SESSION['username'];
  $password = $_SESSION['password'];
  $connection = mysqli_connect("localhost","root","12345","php");
  if((isset($_SESSION['username']) && (isset($_SESSION['password'])))){
    $mysql_query = "select * from users where user_name='$username'";
    if($row = mysqli_fetch_assoc(mysqli_query($connection,$mysql_query))){
    if(password_verify($password,$row['password'])){
        if($row['role'] == 'user'){
          $userid = $row['user_id'];
          header("location:user_orders.php");
        }
      }
    }
  }else{
    header("location:login.php");
  }

  
?>