
<?php
include('auth.php');
if (isset($_POST['id'])) {
    try{
        $id = $_POST['id'];
    $sql = "delete from `order` where order_id='$id'";
    if(mysqli_query($connection,$sql)){
        echo "order with ID $id was deleted";
    }
    }catch(Exception $e){
        echo "error";
    }
    
    
} 
?>
