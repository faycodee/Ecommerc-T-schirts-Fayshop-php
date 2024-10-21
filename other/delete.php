<?php 
session_start();
include("../connection.php");
$user =$_SESSION['id'] ;
if ($_GET['id']) {
    $id =$_GET['id'];
    $sql = "DELETE FROM order_items WHERE product_id = $id and user_id =$user";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    if ($stmt) {
        echo "success";
    }
    
}

header('Location: ../cart.php');


?>