<?php
session_start();
$dbn = "mysql:host=localhost;dbname=fayshop";
$user = "root";
$pass = "";
$con = new PDO($dbn, $user, $pass);

$order = "SELECT * FROM tshirts";
if (isset($_GET['word']) && !empty($_GET['word'])) {
    $s = $_GET['word'];
    $order .= " WHERE name LIKE '%$s%' OR rate LIKE '%$s%' OR brand LIKE '%$s%' OR price LIKE '%$s%' OR descr LIKE '%$s%' OR gender LIKE '%$s%' OR size LIKE '%$s%'";
    $order .= " ORDER BY id";

    $st = $con->query($order);
    $tshirts = $st->fetchAll(PDO::FETCH_OBJ);


 foreach($tshirts as $tshirt){

?>
<div class="pro" id="<?=$tshirt->id?>"  >
 <img src=<?=$tshirt->photo?> alt=""  onclick="location.href='sproduct.php?id=<?=$tshirt->id?>'">
 <div class="des" onclick="location.href='sproduct.php?id=<?=$tshirt->id?>'" >
   <span><?=$tshirt->brand?></span>
   <h5> <?=$tshirt->name?> </h5>
   <div>

   <?php for ($i=0; $i< $tshirt->rate ; $i++) { ?>
     <i class="fa fa-star" aria-hidden="true"></i>
       <?php } ?>
       <?php for ($j=0; $j<5-$i ; $j++) { ?>
       <i class="far fa-star"></i>
       <?php } ?>
   </div>
   <h5><?=$tshirt->price?><span> MAD</span></h5>
 </div>

</div>
<?php 
} }else{ 

   $productsPerPage = 12; // Number of products per page
   $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Default to page 1 if not set
   $offset = ($current_page - 1) * $productsPerPage; // Offset calculation for pagination
   $order = "SELECT * FROM tshirts ";
   $order .= " ORDER BY id LIMIT $offset, $productsPerPage";
   $st = $con->query($order);
   $tshirts = $st->fetchAll(PDO::FETCH_OBJ);
   // Total number of products for pagination calculation
   $totalProductsQuery = 'SELECT COUNT(*) AS total FROM tshirts';
   $totalProductsResult = $con->query($totalProductsQuery);
   $totalProducts = $totalProductsResult->fetchColumn();
   $totalPages = ceil($totalProducts / $productsPerPage);
   foreach($tshirts as $tshirt){
   ?>

<div class="pro" id="<?=$tshirt->id?>"  >
 <img src=<?=$tshirt->photo?> alt=""  onclick="location.href='sproduct.php?id=<?=$tshirt->id?>'">
 <div class="des" onclick="location.href='sproduct.php?id=<?=$tshirt->id?>'" >
   <span><?=$tshirt->brand?></span>
   <h5> <?=$tshirt->name?> </h5>
   <div>

   <?php for ($i=0; $i< $tshirt->rate ; $i++) { ?>
     <i class="fa fa-star" aria-hidden="true"></i>
       <?php } ?>
       <?php for ($j=0; $j<5-$i ; $j++) { ?>
       <i class="far fa-star"></i>
       <?php } ?>
   </div>
   <h5><?=$tshirt->price?><span> MAD</span></h5>
 </div>

</div>
<?php 
} }?>


