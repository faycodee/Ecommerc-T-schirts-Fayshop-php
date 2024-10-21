<?php
session_start();
$dbn = "mysql:host=localhost;dbname=fayshop" ;
$user="root";
$pass="";
$con =new PDO($dbn,$user,$pass);

if (isset($_GET['id'])&&isset($_GET['quantity'])&&isset($_GET['size'])) {
  $ID =$_GET['id'];
  $quantity =$_GET['quantity'];
  $size =strtoupper($_GET['size']);
  $USER_ID =$_SESSION['id'];


  $ORNid = "SELECT id from  order_items where product_id=$ID and user_id=$USER_ID" ;
  $ORDID = $con->prepare($ORNid);
  $ORDID->execute();
 $id = $ORDID->fetch();
if (isset($id[0])) {
  
  $idd =$id[0];
  $ORD = "UPDATE`order_items`
  SET `qte$size` = `qte$size` + $quantity  where id =$idd ;
  UPDATE`order_items` SET quantity = qteXS + qteS + qteM + qteL + qteXL + qteXXL + qteXXXL;
  ";
  $stmt = $con->prepare($ORD);
  $stmt->execute();
  
  echo" Modifed Quantity success ";

}else{

  $ORD = "INSERT INTO `order_items`( `user_id`, `product_id`, `qte$size` ,quantity) 
  VALUES ($USER_ID,$ID,$quantity,$quantity)";
  $stmt = $con->prepare($ORD);
  $stmt->execute();
  $ORD2 = "UPDATE`order_items`
   SET quantity = qteXS + qteS + qteM + qteL + qteXL + qteXXL + qteXXXL;
  ";
  $stmt2 = $con->prepare($ORD2);
  $stmt2->execute();

  echo" Add success ";
}
}

?>