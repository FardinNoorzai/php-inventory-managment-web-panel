
<?php
include('auth.php');
if (isset($_POST['id'])) {
    try{
        $id = $_POST['id'];
    $sql = "delete from products where product_id='$id'";
    if(mysqli_query($connection,$sql)){
        echo "Category with ID $id was deleted";
    }
    }catch(Exception $e){
        echo "error";
    }
    
    
} 
?>
