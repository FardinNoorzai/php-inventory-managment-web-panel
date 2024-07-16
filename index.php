<?php
  include('auth.php');
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dreams Pos admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

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
                
            
            <div class="row">

                <?php 
                    $query = "SELECT pc.product_category_id, pc.name AS category_name, COUNT(p.product_id) AS product_count FROM product_category pc LEFT JOIN products p ON pc.product_category_id = p.product_category GROUP BY pc.product_category_id, pc.name ORDER BY pc.product_category_id;";
                
                $res = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($res)){
                    
                    $name = $row['category_name'];
                    $count = $row['product_count'];
                    echo "<div class='col-lg-3 col-sm-6 col-12'>
                        <div class='dash-widget'>
                            <div class='dash-widgetimg'>
                                <span><img src='assets/img/icons/dash1.svg' alt='img'></span>
                            </div>
                            <div class='dash-widgetcontent'>
                                <h5>{$name}</h5>
                                <h6><span class='counters' data-count='$count'>{$count}</span></h6>
                            </div>
                        </div>
                    </div>  ";
                }
                    
                ?>          
            </div>


               

                <div class="row">
                    <div class="col-lg-7 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Purchase & Sales</h5>
                                <div class="graph-sets">
                                    <ul>
                                        <li>
                                            <span>Sales</span>
                                        </li>
                                        <li>
                                            <span>Purchase</span>
                                        </li>
                                    </ul>
                                    <div class="dropdown">
                                        <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            2022 <img src="assets/img/icons/dropdown.svg" alt="img" class="ms-2">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a href="javascript:void(120);" class="dropdown-item">2022</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(50);" class="dropdown-item">2021</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(20);" class="dropdown-item">2020</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="sales_charts"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Recently Added Products</h4>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"
                                        class="dropset">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a href="productlist.html" class="dropdown-item">Product List</a>
                                        </li>
                                        <li>
                                            <a href="addproduct.html" class="dropdown-item">Product Add</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive dataview">
                                    <table class="table datatable ">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Products</th>
                                                <th>Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                                $query = "select products.*,product_category.name as category_name from products left join product_category on product_category.product_category_id = products.product_category;";

                                                $res = mysqli_query($connection,$query);
                                                while($row = mysqli_fetch_assoc($res)){
                                                    $icon_url = $row['icon_url'];
                                                    $id = $row['product_id'];
                                                    $name = $row['name'];
                                                    $product_category_name = $row['category_name'];

                                                    echo "<tr>
                                                <td>$id</td>
                                                <td class='productimgname'>
                                                    <a href='productlist.html' class='product-img'>
                                                        <img src='$icon_url' alt='product'>
                                                    </a>
                                                    <a href='productlist.html'>$name</a>
                                                </td>
                                                <td>$product_category_name</td>
                                                </tr>";
                                                }

                                            
                                                

                                            
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-0">
                    <div class="card-body">
                        <h4 class="card-title">User Balance</h4>
                        <div class="table-responsive dataview">
                            <table class="table datatable ">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Icon</th>
                                        <th>Product</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "select * from users where role = 'user'";
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

                        <h4 class="card-title">Stock Balance</h4>
                        <div class="table-responsive dataview">
                            <table class="table datatable ">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Icon</th>
                                        <th>Category</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        
                                            $query_product = "select products.*,product_category.name as category_name from products inner join product_category on products.product_category = product_category.product_category_id;";
                                            $res_products = mysqli_query($connection,$query_product);
                                            while($row_product = mysqli_fetch_assoc($res_products)){
                                                $product_id = $row_product['product_id'];
                                                $product_name = $row_product['name'];
                                                $product_url = $row_product['icon_url'];
                                                $product_category = $row_product['category_name'];
                                                $query_order = "select sum(amount) as sum,transactionscol as status from `order` where products_product_id = $product_id group by transactionscol;";
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
                                                    <td><a href='javascript:void(0);'>$product_name</a></td>
                                                    <td class='productimgname'>
                                                        <a class='product-img' href='productlist.html'>
                                                            <img src='$product_url' alt='product'>
                                                        </a>
                                                        <a href='productlist.html'>$product_name</a>
                                                    </td>
                                                    <td>$product_category</td>
                                                    <td>$balance</td>
                                                </tr>";
                                                }
                                            }
                                            
                                            
                                        
                                            
                                    
                                    ?>
                                    
                                </tbody>
                            </table>
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

    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>