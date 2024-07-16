<?php
session_start();
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
    
<div class="card" style="margin:60px">
<H2 style="margin:30px 0px 0px 20px"><?php echo $_SESSION['username']; ?></H2>
    
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-path">
                                    <a class="btn btn-filter" id="filter_search">
                                        <img src="assets/img/icons/filter.svg" alt="img">
                                        <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                    </a>
                                </div>
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                            alt="img"></a>
                                </div>
                            </div>
                            <div class="wordset">
                                <ul>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                src="assets/img/icons/pdf.svg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                src="assets/img/icons/excel.svg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                src="assets/img/icons/printer.svg" alt="img"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card mb-0" id="filter_inputs">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Product</option>
                                                        <option>Macbook pro</option>
                                                        <option>Orange</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Category</option>
                                                        <option>Computers</option>
                                                        <option>Fruits</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Sub Category</option>
                                                        <option>Computer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Brand</option>
                                                        <option>N/D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12 ">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Price</option>
                                                        <option>150.00</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <a class="btn btn-filters ms-auto"><img
                                                            src="assets/img/icons/search-whites.svg" alt="img"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table  datanew" id="table">
                                <thead>
                                    <tr style="text-align: center;">    
                                        <th>ID</th>
                                        <th>Amount</th>
                                        <th>Product</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        $username = $_SESSION['username'];
                                        $query = "select `order`.*,users.name as username,products.name as product_name from `order` inner join users on `order`.users_user_id = users.user_id inner join products on products.product_id = `order`.products_product_id where users.user_name = '$username';";
                                        $connection = mysqli_connect("localhost","root","12345","php");
                                        $res = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($res)){
                                            $order_id = $row['order_id'];
                                            $amount = $row['amount'];
                                            $product_name = $row['product_name'];
                                            $user = $row['username'];
                                            $date = $row['date'];


                                     echo "<tr style='text-align: center;''>";
                                       

                                            echo "<td>$order_id</td>";
                                            echo "<td>$amount</td>";
                                            echo "<td>$product_name</td>";
                                            echo "<td>$date</td>";
                                        }
                                        
                                        
                                    echo "</tr>";
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-path">
                                    <a class="btn btn-filter" id="filter_search">
                                        <img src="assets/img/icons/filter.svg" alt="img">
                                        <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                    </a>
                                </div>
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                            alt="img"></a>
                                </div>
                            </div>
                            <div class="wordset">
                                <ul>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                src="assets/img/icons/pdf.svg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                src="assets/img/icons/excel.svg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                src="assets/img/icons/printer.svg" alt="img"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card mb-0" id="filter_inputs">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Product</option>
                                                        <option>Macbook pro</option>
                                                        <option>Orange</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Category</option>
                                                        <option>Computers</option>
                                                        <option>Fruits</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Sub Category</option>
                                                        <option>Computer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Brand</option>
                                                        <option>N/D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12 ">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Price</option>
                                                        <option>150.00</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <a class="btn btn-filters ms-auto"><img
                                                            src="assets/img/icons/search-whites.svg" alt="img"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table  datanew" id="table">
                                <thead>
                                    <tr style="text-align: center;">    
                                        <th>ID</th>
                                        <th>Amount</th>
                                        <th>Product</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        $username = $_SESSION['username'];
                                        $query = "select * from users where user_name = '$username'";
                                        $res = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($res)){
                                            $user_name = $row['name'];
                                            $user_id = $row['user_id'];
                                            $query_product = "select * from products";
                                            $res_products = mysqli_query($connection,$query_product);
                                            while($row_product = mysqli_fetch_assoc($res_products)){
                                                $product_id = $row_product['product_id'];
                                                $product_name = $row_product['name'];
                                                $product_url = $row_product['icon_url'];
                                                $query_order = "select sum(amount) as sum,transactionscol as status from `order` where users_user_id=$user_id and products_product_id = $product_id group by transactionscol;";
                                                $resault = mysqli_query($connection,$query_order);
                                                $balance = 0;
                                                while($r = mysqli_fetch_assoc($resault)){
                                                    if($r['status'] == 1){
                                                        $balance += $r['sum'];
                                                    }else{
                                                        $balance -= $r['sum'];
                                                    }
                                                }
                                                if($balance != 0){
                                                    echo "<tr>
                                                    <td><a href='javascript:void(0);'>$user_name</a></td>
                                                    <td class='productimgname'>
                                                        <a class='product-img' href='productlist.html'>
                                                            <img src='$product_url' alt='product'>
                                                        </a>
                                                        <a href='productlist.html'>$product_name</a>
                                                    </td>
                                                    <td>$product_name</td>
                                                    <td>$balance</td>
                                                </tr>";
                                                }
                                            }
                                            
                                            
                                        }
                                            
                                    
                                    ?>
                                    
                                </tbody>
                            </table>
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