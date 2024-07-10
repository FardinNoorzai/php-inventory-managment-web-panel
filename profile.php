<?php
  session_start();
  $connection = mysqli_connect("localhost","root","12345","php");

  $username = $_SESSION['username'];
  $password = $_SESSION['password'];
  if(!(isset($username) && isset($password))){
    header('location: login.php');
  }
    $res = mysqli_query($connection,"select * from users where user_name='{$username}'");
    $user = mysqli_fetch_assoc($res);
 
  if(isset($_POST['submit'])){
    $new_name =  $_POST['name'];
    $new_email = $_POST['email'];
    $new_username = $_POST['username'];
    $new_password = $_POST['password'];
    $new_profile_path = "profiles/". $_FILES['profile']['name'];
    $hash = password_hash($new_password,PASSWORD_BCRYPT);
    $old_user = $user;
    if(file_exists($old_user['profile_url'])){
      if(unlink($old_user['profile_url'])){
        $query = "update users set name='{$new_name}',email='{$new_email}',user_name='{$new_username}',profile_url='{$new_profile_path}',password='{$hash}' where user_name='{$username}'";
        mysqli_query($connection,$query);
        move_uploaded_file($_FILES['profile']['tmp_name'],$new_profile_path);
        $_SESSION['username'] = $new_username;
        $_SESSION['password'] = $new_password;
      }
    }
  }

  
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Dreams Pos admin template</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/animate.css">

<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div id="global-loader">
<div class="whirly-loader"> </div>
</div>

<div class="main-wrapper">
    <?php 
    include('header.php');
    include('sidebar.php');
?>


<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Profile</h4>
<h6>User Profile</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<div class="profile-set">
<div class="profile-head">
</div>
<div class="profile-top">
<div class="profile-content">
<div class="profile-contentimg">
  <?php 
    $user =find_by_user_name($username);

    echo "<img src='{$user['profile_url']}' alt='img' id='blah'>"

  ?>
<div class="profileupload">
  <form action="profile.php" method="post" enctype="multipart/form-data">
<input type="file" name="profile">
<a href="javascript:void(0);"><img src="assets/img/icons/edit-set.svg" alt="img"></a>
</div>
</div>
<div class="profile-contentname">

<?php 
  echo "<h2>{$user['name']}</h2>";

?>
<h4>Updates Your Photo and Personal Details.</h4>
</div>
</div>
<div class="ms-auto">
<a href="javascript:void(0);" class="btn btn-submit me-2">Save</a>
<a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-sm-12">
<div class="form-group">
<label>First Name</label>
<?php 
 echo "<input type='text' name='name' placeholder='{$user['name']}'>";
?>
</div>
</div>
<div class="col-lg-6 col-sm-12">
<div class="form-group">
<label>Role</label>
<?php 
 echo "<input type='text' name='password' placeholder='Password'>"
?>
</div>
</div>
<div class="col-lg-6 col-sm-12">
<div class="form-group">
<label>Email</label>
<?php 
 echo "<input type='text' name='email' placeholder='{$user['email']}'>"
?>
</div>
</div>
<div class="col-lg-6 col-sm-12">
<div class="form-group">
<label>User Name</label>
<?php 
 echo "<input type='text' name='username' placeholder='{$user['user_name']}'>";
?>
</div>
</div>
<div class="col-12">
<input type="submit" href="javascript:void(0);" name="submit" class="btn btn-submit me-2">
<a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
</form>
</div>
</div>
</div>
</div>

</div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>