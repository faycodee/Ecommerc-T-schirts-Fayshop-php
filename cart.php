<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="Discription"
      content="T-Shirts from Spreadshirt ✓ Easy 90 day return policy ✓  
     Large assortment for Men & Women ✓ Unique designs on V-necks & more  
     featuring unique designs by the global Threadless artist community ...
     Shop T-Shirts now!"
    />
    <meta
    name="keywords"
    content="FayShop, php, Ecommerce Website, T-shirts for men, T-shirts for women, T-shirts for kids, Unisex T-shirts, Cotton T-shirts, Graphic T-shirts, Custom T-shirts, Trendy T-shirts, Printed T-shirts, Short sleeve T-shirts, Long sleeve T-shirts, Sports T-shirts, Casual T-shirts, All season T-shirts, Organic T-shirts, Quality T-shirts, Fashion T-shirts, Stylish T-shirts, Unique T-shirts, Online T-shirts, Online T-shirt shopping, T-shirt sale, Cheap T-shirts, Discounted T-shirts, New T-shirts, T-shirt collection, Patterned T-shirts, Crew neck T-shirts, V-neck T-shirts, Customizable T-shirts"
/>

    <link rel="icon" href="img/logo.jpg" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="media.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <title>FayShop | Cart</title>
    <link rel="icon" href="img/logo.jpg" />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link rel="stylesheet" href="package/swiper-bundle.min.css" />
    <link
      rel="stylesheet"
      href="path/to/font-awesome/css/font-awesome.min.css"
    />
    <?php session_start();include("connection.php"); ?>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="media.css" />
    <?php include('headfoot/header.php');
    $iduser = $_SESSION["id"];
    $ord = "SELECT t.id, t.photo, t.brand, t.name, t.rate, t.price,
          t.category_id, t.descr, t.stock, t.gender, t.size, t.is_featured,
          t.created_at, t.updated_at, c.name as category_name ,
          o.quantity
          FROM order_items o
          JOIN tshirts t ON o.product_id = t.id
          JOIN categories c ON t.category_id = c.id
          WHERE o.user_id = :iduser";
    
    $stmt = $con->prepare($ord);
    $stmt->bindParam(':iduser', $iduser, PDO::PARAM_INT);
    $stmt->execute();
    $tshirts = $stmt->fetchAll(PDO::FETCH_OBJ);
    
    $Subtotal=0;
    
    if (isset($_POST["Order"])) {
    $user_id=$_SESSION["id"];
    $st3 = $con->query("select a.* from addresses a , users u where u.id = $user_id and u.id =a.user_id");
    $addresses =$st3->fetch(PDO::FETCH_OBJ);
    if (empty($addresses->address_line1)||empty($addresses->city)||empty($addresses->state)||empty($addresses->postal_code)) {
      echo "<script>alert('you must to write your information first .')</script>";
      echo "<script>document.location.href='profildeatail.php'</script>";
    }else{

// ---------------------------------------| to resolve |-------------------------------------------------

    // echo "<script>alert(woork)</script>";
      $iduser = $_SESSION["id"];
      $or1= "SELECT id FROM `order_items` WHERE user_id =$iduser ";
      $stm1 = $con->prepare($or1);
      $stm1->execute();
      $orders_user= $stm1->fetchAll(PDO::FETCH_OBJ);
      
      
      foreach($orders_user as $order){ 
           
     
                                      }
      
    }}

    // ---------------------------------------| /to resolve |-------------------------------------------------
?>
    <?php


if ( isset($_POST['listdelete'])) {
    
    $listdelete = $_POST['listdelete'];
$user =$_SESSION['id'] ;
    if (!empty($listdelete)) {
        try {
            foreach ($listdelete as $id) {
           
                $sql = "DELETE FROM order_items WHERE product_id = $id and user_id =$user";
                $stmt = $con->prepare($sql);
                $stmt->execute();
                if ($stmt) {
                    echo "success";
                }
                
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } 
} 
?>



    <style>
   #cartM {
  overflow-x: auto;
}

#cartM table {
  
  border-collapse: collapse;
  table-layout: fixed;
  white-space: nowarp;
}
#cartM table img {
  width: 70px;
}
#cartM table td:nth-child(1) {
  width: 100px;
  text-align: center;
}
#cartM table td:nth-child(2) {
  width: 150px;
  text-align: center;
}
#cartM table td:nth-child(3) {
  width: 250px;
  text-align: center;
}
#cartM table td:nth-child(4),
#cartM table td:nth-child(5),
#cartM table td:nth-child(6),
#cartM table td:nth-child(7),
#cartM table td:nth-child(8),
#cartM table td:nth-child(9),
#cartM table td:nth-child(10),
#cartM table td:nth-child(12),
#cartM table td:nth-child(13),
#cartM table td:nth-child(11) {
  width: 170px;
  text-align: center;
  margin: 0 20px;
}

#cartM table td:nth-child(5) input {
  width: 70px;
  padding: 10px 5px 10px 15px;
}
#cartM table thead {
  border: 1px solid #e2e9e1;
  border-left: none;
  border-right: none;
}
#cartM table thead td {
  font-weight: 700;
  text-transform: uppercase;
  font-size: 11px;
  padding: 18px 5px;
}
#cartM table tbody td {
  padding-top: 15px;
}
#cartM table tbody td {
  font-size: 13px;
}
#cartM-add {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
    
/* #inpqte{
  width: auto;
  background: none;
  appearance: none;
  border: none;
} */
 .RemoveSelected{
  transform: translate(890px);

 }
 .RemoveSelected:hover{
background-color: black;
color: white;

 }
 #idel:hover{
    color: red;
 }
 #btncheckout:hover{
  background-color: transparent;
color: black;
 }
</style>
  </head>

  <body>

  

    <button id="totop" class="normal">
      <i class="fa fa-level-up" aria-hidden="true"></i>
    </button>

    <section class="about-header" style="background-image: url('img/banner/cartbg.jpg');"  id="page-header cart">
      <h1>#Shop now !</h1>
      <p>LEAVE A MESSAGE ,We love to hear from you!</p>
    </section>
    <form action="" method="post">
   <section id="cartM" class="section-p1">
      <table id="tableM">
        <thead>
          <tr>
            <td></td>
            <td>photo</td>
            <td>Name</td>
            <td>Brand</td>
            <td>Price</td>
            <td>Rating</td>
            <td>gender</td>
            <td>size</td>
            <td>category</td>
            <td>total quantity</td>
            <td>total price</td>
            <td> Action</td>
          </tr>
        </thead>
        <tbody>
        <?php 
foreach($tshirts as $t){ 
    $order = "SELECT * FROM order_items WHERE product_id = ? and user_id=?";
    $stmt = $con->prepare($order);
    $stmt->execute([$t->id, $_SESSION["id"]]);
    $sizes = $stmt->fetch(PDO::FETCH_OBJ);

    
    if ($sizes) {


        $validSizes = [];

        if ($sizes->qteXS > 0) {
            array_push($validSizes, "XS");
        }
        if ($sizes->qteS > 0) {
            array_push($validSizes, "S");
        }
        if ($sizes->qteM > 0) {
            array_push($validSizes, "M");
        }
        if ($sizes->qteL > 0) {
            array_push($validSizes,"L");
        }
        if ($sizes->qteXL > 0) {
            array_push($validSizes, "XL");
        }
        if ($sizes->qteXXL > 0) {
            array_push($validSizes,"XXL");
        }
        if ($sizes->qteXXXL > 0){
            array_push($validSizes, "XXXL");
        }
    } 


?>

            <tr>
            <td>
             <input type="checkbox" name="listdelete[]" value="<?=$t->id?>">
            </td>
            <td><img src="<?=$t->photo?>" width="30px"></td>
            <td><?=$t->name?></td>
            <td><?=$t->brand?></td>
            <td><?=$t->price?><span style="color: blue;"> DH</span></td>
            <td><?=$t->rate?></td>
            <td><?=$t->gender?></td>
            <td> 
              <?php foreach($validSizes as $size ) {
                if (!isset($count)) {?>
                  <?=strtoupper($size)?> 
                 <?php $count =1; } 
                 else if (isset($count)) {?>
                 <span style="color: blue;"><b>,</b></span> <?= strtoupper($size)?> 
                 <?php } ?>
          <?php }?></td>
            <td><?=$t->category_name?></td>
            <td><?=$t->quantity?></td>
            <td><?=$t->quantity*$t->price?> <span style="color: blue;"> DH</span></td>
            <td>
            <i id="idel" onclick="confirm('Are you sure you want to delete <?=$t->name?> ')?document.location.href='other/delete.php?id=<?= $t->id ?>':''" class="fa fa-trash" aria-hidden="true"></i></center></td>
          </tr>
         <?php $Subtotal+=$t->quantity*$t->price ; unset($count);}?>

        </tbody>
      </table>
      <section>
        <br><br>
      <button type="submit" class="normal RemoveSelected" onclick="return confirm('Are you sure you want to delete the selected ?')">Remove Selected</button>
    </section>
  

    <section id="cart-add" class="section-p1">

      <div id="subtotal">
        <h3>Cart Totals</h3>
        <table>
          <tr>
            <td>Cart Subtotal</td>
            <td><?=$Subtotal?></td>
          </tr>
          <tr>
            <td>Shipping</td>
            <td>Free</td>
          </tr>
          <tr>
            <td><strong>Total</strong></td>
            <td><strong><?=$Subtotal?></strong></td>
          </tr>
        </table>
        <button class="normal " name="Order"  id="btncheckout" type="submit">Order Now</button>
      </div>
    </section>
    </form>
    <?php include('headfoot/footer.php')?>
    <script src="script.js"></script>
    <script >
      // function Order() {
      //   if (>0) {
      //     alert("yes")
      //   }
      // }
    </script>
  
   
  </body>
</html>
