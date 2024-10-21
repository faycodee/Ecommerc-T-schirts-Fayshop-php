<?php 
session_start();
$dbn = "mysql:host=localhost;dbname=fayshop" ;
$user="root";
$pass="";
$con =new PDO($dbn,$user,$pass);

if (isset($_GET['id'])&&isset($_GET['quantity'])) {
  $ID =$_GET['id'];
  $quantity =$_GET['quantity'];
  $USER_ID =$_SESSION['id'];
  $ordcount ="SELECT COUNT(*) AS total_products FROM `order_items` where user_id=$USER_ID";
                    $stc = $con->prepare($ordcount);
                    $stc->execute();
                    $total_products = $stc->fetch();
                    $count =$total_products[0];
                   echo $count ;}
                    ?>