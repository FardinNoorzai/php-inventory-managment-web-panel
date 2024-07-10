<?php 
    session_start();
    if(isset($_POST['submit']) && (!empty($_POST['username']) && !empty($_POST['password']))){
      include('mysql_functions.php');
      $user = find_by_user_name($_POST['username']);
      if($user){
        if(password_verify($_POST['password'],$user['password'])){
          $_SESSION['username'] = $_POST['username'];            
          $_SESSION['password'] = $_POST['password'];
          header('location:index.php');
        }else{
          header('location:login.php?error=1');  
        }
      }else{
        header('location:login.php?error=1'); 
      }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/inventory/assets/css/login.css">
    <title>Login Page</title>
</head>
<body>
    
<div class="wrapper fadeInDown">
  <div id="formContent">
    <h2 class="active"><a href="">Sign In</a></h2>
    <h2 class="inactive underlineHover"><a href="signup.php">Sign Up</a></h2>
    <div class="fadeIn first">
      <img src="/inventory/assets/img/icons/users1.svg" id="icon" alt="User Icon" />
    </div>
    <form method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
    </form>
    <?php 
      if(isset($_GET['error'])){
        if($_GET['error'] == 1)
         echo '<p style="color:red;">Invalid password or username</p>';
      }
    ?>
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
</body>
</html>