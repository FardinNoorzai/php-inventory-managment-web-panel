<?php
  
  include('auth.php');


  function add_product_category($name,$description){
    $query = "insert into product_category(name,description) values('{$name}','{$description}')";
    $connection = mysqli_connect("localhost", "root", "12345", "php");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }
   
    return true;
}
  
  $globalflag = false;
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $result = add_product_category($name, $desc);
    if($result === true) {
        $globalflag = true;
    }
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
                        <h4>Add Product Category</h4>
                        <h6>Create new Category</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">

                        <form action="/inventory/addproductcategory.php" method="post">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Enter the category name</label>
                                    <input type="text" name="name">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="desc"></textarea>
                                </div>
                            </div>
                            <?php 
                                if(isset($_POST['name'])){
                                    if($globalflag){
                                        echo '<p style="color:green">Added</p>';
                                    }else{
                                        echo '<p style="color:red">Added</p>';
        
                                    }
                                }
                            ?>

                            <div class="col-lg-12">
                                <input type="submit" href="javascript:void(0);" class="btn btn-submit me-2">
                                <a href="productlist.html" class="btn btn-cancel">Cancel</a>
                            </div>
                        </form>
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