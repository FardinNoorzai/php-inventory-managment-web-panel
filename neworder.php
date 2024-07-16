<?php
  include('auth.php');
  
  if(isset($_POST['submit'])){
    $product = $_POST['product'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $user = $_POST['user'];
    $amount = $_POST['amount'];
    $date = DateTime::createFromFormat('d-m-Y', $date);
    $formattedDate = $date->format('Y-m-d');
    $sql_query = "insert into `order`(date,amount,users_user_id,products_product_id,transactionscol) values('$formattedDate','$amount','$user','$product','$status')";
    $res = mysqli_query($connection,$sql_query);
    
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dreams Pos admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

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
    <?php 
            include('header.php');
            include('sidebar.php');
        ?>


    <div class="main-wrapper">



        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Expense Add</h4>
                        <h6>Add/Update Expenses</h6>
                    </div>
                </div>
                <form action="neworder.php" method="post">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                            
                                <div class="form-group">
                                    
                                    <label>Product</label>
                                    <select class="select" name="product">
                                        <?php 
                                            $query = 'select * from products';
                                            $res = mysqli_query($connection,$query);
                                            while($row = mysqli_fetch_assoc($res)){
                                                $name = $row['name'];
                                                $id = $row['product_id'];
                                                echo "<option value='$id'>$name</option>";
                                            }

                                        ?>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Date </label>
                                    <div class="input-groupicon">
                                        <input type="text" placeholder="Choose Date" name="date" class="datetimepicker">
                                        <div class="addonset">
                                            <img src="assets/img/icons/calendars.svg" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="select" name="status">
                                        <option value="1">Income</option>
                                        <option value="0">Outgo</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>User</label>
                                    <select class="select" name="user">
                                        <?php 
                                            $query = "select * from users where role='user'";
                                            $res = mysqli_query($connection,$query);
                                            while($row = mysqli_fetch_assoc($res)){
                                                $name = $row['name'];
                                                $id = $row['user_id'];
                                                echo "<option value='$id'>$name</option>";
                                            }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="amount">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <input type="submit" name="submit" href="javascript:void(0);" class="btn btn-submit me-2">
                                <a href="expenselist.html" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
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

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>