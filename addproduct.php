<?php
    include("auth.php");
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $product_category_id = $_POST['select'];
        $sql = "insert into products(name,product_category,description) values('$name','$product_category_id','$description')";
        mysqli_query($connection,$sql);        
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

    <div class="main-wrapper">

        
    <?php 
            include('header.php');
            include('sidebar.php');
        ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Product Add</h4>
                        <h6>Create new product</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <form action="addproduct.php" method="post">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Enter the product name</label>
                                    <input type="text" id="productname" name="name">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-2 col-12">
                                <div class="form-group">
                                    <label>Choose category</label>
                                    <select class="select" name="select">
                                        <?php
                                            $res = mysqli_query($connection,"select * from product_category");
                                            while($row = mysqli_fetch_assoc($res)){
                                                $product_category_id = $row['product_category_id'];
                                                $category_name = $row['name'];
                                                echo "<option value='$product_category_id'>$category_name</option>";
                                            }
                                        ?>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" id="productdesc" name="description"></textarea>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <input type="submit" name="submit" href="javascript:void(0);" class="btn btn-submit me-2" id="submit">
                                <a href="productlist.html" class="btn btn-cancel">Cancel</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="appproduct.js"></script>
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