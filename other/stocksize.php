<?php
session_start();
$dbn = "mysql:host=localhost;dbname=fayshop" ;
$user="root";
$pass="";
$con =new PDO($dbn,$user,$pass);

if (isset($_GET['id'])&&isset($_GET['size'])) {
  $ID =$_GET['id'];
  $size =($_GET['size']);
  $USER_ID =$_SESSION['id'];
$Sizee = $size."Stock";
$ORNid = "SELECT s.$Sizee as stock from tshirts t , sizes s where t.id=$ID and t.size = s.id " ;
$ORDID = $con->prepare($ORNid);
$ORDID->execute();
$t = $ORDID->fetch();
if (isset($t[0])) {

  echo $t[0] ;

}else{ 
echo" Add not success ";
}


}

?>